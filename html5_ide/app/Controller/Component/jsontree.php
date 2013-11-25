<?
App::import('Component','Tree');

class JsontreeComponent extends TreeComponent { 
	function __construct($table = "tree_files", $fields = array(), $add_fields = array("title" => "title", "type" => "type", "path" => "path")) {
		parent::__construct($table, $fields);
		$this->fields = array_merge($this->fields, $add_fields);
		$this->add_fields = $add_fields;
	}

	function create_node($data) {
	   
       //echo $data["id"] ; 
       
       $file_cretaed = $this->file->create_file($data);
        
        if(!$file_cretaed){
            
            return "{ \"status\" : 0 }";
        }

        
       	$id = parent::_create((int)$data[$this->fields["id"]], (int)$data[$this->fields["position"]]);
        
		if($id) {
			$data["id"] = $id;
			$this->set_data($data);
			return  "{ \"status\" : 1, \"id\" : ".(int)$id." }";
		}
		return "{ \"status\" : 0 }";
	}
    
    
	function set_data($data) {
		if(count($this->add_fields) == 0) { return "{ \"status\" : 1 }"; }
		$s = "UPDATE `".$this->table."` SET `".$this->fields["id"]."` = `".$this->fields["id"]."` "; 
		foreach($this->add_fields as $k => $v) {
			if(isset($data[$k]))	$s .= ", `".$this->fields[$v]."` = \"".$this->db->escape($data[$k])."\" ";
			else					$s .= ", `".$this->fields[$v]."` = `".$this->fields[$v]."` ";
		}
		$s .= "WHERE `".$this->fields["id"]."` = ".(int)$data["id"];
		$this->db->query($s);
		return "{ \"status\" : 1 }";
	}
    
    
	function rename_node($data) { 
	   
       $file_renamed = $this->file->rename_file($data);
       
       
       
       if(!$file_renamed){
        return "{ \"status\" : 0 }";
       }
       
       return $this->set_data($data); 
       }


	function move_node($data) { 
        
        $file_moved = $this->file->move_file($data);
        //echo $file_moved;
        
        $file_id = (int)$data["id"];
        $file_id_ref = (int)$data["ref"];
        
        if(!$file_moved){
            return "{ \"status\" : 0 }";
        }
       
		$id = parent::_move((int)$data["id"], (int)$data["ref"], (int)$data["position"], (int)$data["copy"]);
		if(!$id) return "{ \"status\" : 0 }";
		if((int)$data["copy"] && count($this->add_fields)) {
			$ids	= array_keys($this->_get_children($id, true));
			$data	= $this->_get_children((int)$data["id"], true);

			$i = 0;
			foreach($data as $dk => $dv) {
				$s = "UPDATE `".$this->table."` SET `".$this->fields["id"]."` = `".$this->fields["id"]."` "; 
				foreach($this->add_fields as $k => $v) {
					if(isset($dv[$k]))	$s .= ", `".$this->fields[$v]."` = \"".$this->db->escape($dv[$k])."\" ";
					else				$s .= ", `".$this->fields[$v]."` = `".$this->fields[$v]."` ";
				}
				$s .= "WHERE `".$this->fields["id"]."` = ".$ids[$i];
				$this->db->query($s);
				$i++;
			}
		}
		return "{ \"status\" : 1, \"id\" : ".$id." }";
	}
    
    
	function remove_node($data) {
        
        $removed_from_server = $this->file->delete_file($data);
        
        if(!$removed_from_server){
            return "{ \"status\" : 0 }";
        }
       
		$id = parent::_remove((int)$data["id"]);
		return "{ \"status\" : 1 }";
	}
    
    
    function get_id_from_project_id($project_id){
        $this->db->query("select id from ".$this->table." where project_id=$project_id and type='' limit 1");
        $this->db->nextr();
        $id = $this->db->f(0);
        return $id;
    }
    
    function get_file_name($file_id){
        $this->db->query("select title from ".$this->table." where id = $file_id limit 1");
        $this->db->nextr();
        return $this->db->f(0);
    }
    
    
	function get_children($data) {
	   
       //here manipulate the project id if the "request_type" = "get_tree_first_load"
       //we map the project id to the first type of drive 

       if(isset($data["request_type"]) && $data["request_type"] == "get_tree_first_load") {
            $id = $this->get_id_from_project_id((int)$data["id"]);
            //$id = 1 ;
       } else {
            $id = (int)$data["id"];
       }

        
        //$id = (int)$data["id"];
        
        //root
        $root = $this->_get_node($id);
        
        $tmp = $this->_get_children($id);
        
        //create default folder
		if($id=== 1 && count($tmp) === 0) {
			$this->_create_default();
			$tmp = $this->_get_children($id);
		}
		$result = array();
		if($id === 0) return json_encode($result);
        
        /*
        $result[] = array(
            "attr" => array("id" => "node_".$id, "rel" => $root[$this->fields['type']]),
		      "data" =>  $root[$this->fields["title"]],
		      "state" => ((int) $root[$this->fields["right"]] - (int) $root[$this->fields["left"]] > 1) ? "closed" : ""
        );
        */
		foreach($tmp as $k => $v) {
			$result[] = array(
				"attr" => array("id" => "node_".$k, "rel" => $v[$this->fields["type"]]),
				"data" => $v[$this->fields["title"]],
				"state" => ((int)$v[$this->fields["right"]] - (int)$v[$this->fields["left"]] > 1) ? "closed" : ""
                //"state" => "closed" 
			);
		}
		return json_encode($result);
	}
    
    
    
	function search($data) {
		$this->db->query("SELECT `".$this->fields["left"]."`, `".$this->fields["right"]."` FROM `".$this->table."` WHERE `".$this->fields["title"]."` LIKE '%".$this->db->escape($data["search_str"])."%'");
		if($this->db->nf() === 0) return "[]";
		$q = "SELECT DISTINCT `".$this->fields["id"]."` FROM `".$this->table."` WHERE 0 ";
		while($this->db->nextr()) {
			$q .= " OR (`".$this->fields["left"]."` < ".(int)$this->db->f(0)." AND `".$this->fields["right"]."` > ".(int)$this->db->f(1).") ";
		}
		$result = array();
		$this->db->query($q);
		while($this->db->nextr()) { $result[] = "#node_".$this->db->f(0); }
		return json_encode($result);
	}
    
    //get parent path for file
    function get_parent_path ($id){
        $parent = parent::_get_parent($id);
        $reversed_parent = array_reverse($parent);
        $path = "";
        //print_r($parent);
        foreach($reversed_parent as $k => $v){
            if($v[$this->fields['title']] != ""){
                $path .= $v[$this->fields['title']];
                $path .= "/";
            }
        }
        $path = substr($path,0,-1);
        return $path;
    }
    
    
    //default new project
    
	function _create_default() {
		$this->_drop();
		$this->create_node(array(
			"id" => 1,
			"position" => 0,
			"title" => "C:",
			"type" => "drive"
		));
		$this->create_node(array(
			"id" => 1,
			"position" => 1,
			"title" => "D:",
			"type" => "drive"
		));
		$this->create_node(array(
			"id" => 2,
			"position" => 0,
			"title" => "_demo",
			"type" => "folder"
		));
		$this->create_node(array(
			"id" => 2,
			"position" => 1,
			"title" => "_docs",
			"type" => "folder"
		));
		$this->create_node(array(
			"id" => 4,
			"position" => 0,
			"title" => "index.html",
			"type" => "default"
		));
		$this->create_node(array(
			"id" => 5,
			"position" => 1,
			"title" => "doc.html",
			"type" => "default"
		));
	}
    
}

?>