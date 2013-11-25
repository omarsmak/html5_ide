<?php

/**************************************************************************/
/*change log : 5/FEB/2012
/* 1- Secured all the API
/* 2- Added closing function for every saved file
/**************************************************************************/

class ServerController extends AppController {
   public $name = "Server";
   public $uses = null ;
  // public $helpers = array("Js", "html", "form");
   //public $components = array("Jsontree");
    public $layout = "view_files" ; 
    public $components = array('Session');
   //public $components = array('Tests');
   
   
   //this file it has to protect
   
   function files_operations(){

	if($this->Session->read("User.user_id")){

        App::import('component','Jsontree');
        $jstree = new JsontreeComponent();
        
        if(isset($_GET["reconstruct"])) {
            $jstree->_reconstruct();
        	die();
        }
        
        if(isset($_GET["analyze"])) {
        	echo $jstree->_analyze();
        	die();
        }

        if($_REQUEST["operation"] && strpos($_REQUEST["operation"], "_") !== 0 && method_exists($jstree, $_REQUEST["operation"])) {
        	header("HTTP/1.0 200 OK");
        	header('Content-type: application/json; charset=utf-8');
        	header("Cache-Control: no-cache, must-revalidate");
        	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        	header("Pragma: no-cache");
        	echo $jstree->{$_REQUEST["operation"]}($_REQUEST);
        	die();
        }

        header("HTTP/1.0 404 Not Found"); 

	} else {
		header("HTTP/1.0 404 Not Found"); 
	}
        
   }
   
   function load_file($project_id = null,$file_id = null) {
        
        //authorize is required ! --> done
       if($this->Session->read("User.user_id") && $this->request->is('post')){

         $this->TreeFile = ClassRegistry::init('TreeFile'); 
         $this->TreeFile->id = $file_id ; 
         
         //$results = $this->TreeFile->read(null,$file_id) ; 
         App::import('Component','Filesoperations');
         $file = new FilesoperationsComponent() ; 
         if($file->get_file_main_route($file_id,$project_id)){
            //header("HTTP/1.0 200 OK");
            $this->set("output",$file->get_file_main_route($file_id,$project_id));
            //highlight_file();
        } else {
            header("HTTP/1.0 404 Not Found"); 
        }

	  }else {
		  header("HTTP/1.0 404 Not Found"); 
	  }
    
   }
   
   
   function save_file($project_id = null,$file_id = null){
    
    //authorize is required !  -->done
     if($this->Session->read("User.user_id") && $this->request->is('post')){   
         $this->TreeFile = ClassRegistry::init('TreeFile'); 
         $this->TreeFile->id = $file_id ; 
         
         $data = $_POST["data"];
         
         //$results = $this->TreeFile->read(null,$file_id) ; 
         App::import('Component','Filesoperations');
         $file = new FilesoperationsComponent() ; 
         
         header("HTTP/1.0 200 OK");
       	header('Content-type: application/json; charset=utf-8');
       	header("Cache-Control: no-cache, must-revalidate");
       	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
       	header("Pragma: no-cache");
         
			 if($file->get_file_main_route($file_id,$project_id)){
				
				$FileModel = new File($file->get_file_main_route($file_id,$project_id));
				$status = $FileModel->write($data);
				//$FileModel->write($data);
				$FileModel->close();
				echo "{ \"status\" : ".$status."}";
				
			} else {
				header("HTTP/1.0 404 Not Found"); 
			}
	 }else {
		 header("HTTP/1.0 404 Not Found"); 
	 }
   }
   
   
   function preview_file($file_id = null,$project_id = null){

	if($this->Session->read("User.user_id") && $this->request->is('post')){

        App::import('Component','Filesoperations');
        $file = new FilesoperationsComponent() ;
        
        $this->set("output",$file->generate_public_link($file_id,$project_id));

	}else {
		header("HTTP/1.0 404 Not Found"); 
	}
        
   }
   
   
   function load_all_code_bits(){
        $this->CodeBitCategory = ClassRegistry::init("CodeBitCategory");
        $all_code_bits = $this->CodeBitCategory->find("all");
        $this->set("code_bits_output",$all_code_bits);
   }
   
   
   function load_code_bit($code_bit_id = null){
        $this->CodeBit = ClassRegistry::init("CodeBit");
        $this->CodeBit->id = $code_bit_id;
        
        $this->set("code_bits_output",$this->CodeBit->findAllById($code_bit_id));
   }
   
   
   function create_new_project($project_name = null){

	if($this->Session->read("User.user_id") && $this->request->is('get')){

        App::import('Component','Projectoperations');
        $project = new ProjectoperationsComponent() ;
        
        $user_id = $this->Session->read("User.user_id") ; /*to be changed*/
        
        $project->create_new_project($project_name,$user_id);
        
         header("HTTP/1.0 200 OK");
       	header('Content-type: application/json; charset=utf-8');
       	header("Cache-Control: no-cache, must-revalidate");
       	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
       	header("Pragma: no-cache");
        
        echo "{ \"status\" : 1}";

	}else {
		 header("HTTP/1.0 200 OK");
       	header('Content-type: application/json; charset=utf-8');
       	header("Cache-Control: no-cache, must-revalidate");
       	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
       	header("Pragma: no-cache");
        
        echo "{ \"status\" : 0}";
	}
   }
   
   function load_projects_list(){

	if($this->Session->read("User.user_id") && $this->request->is('get')){

        $this->Project = ClassRegistry::init("Project");
        
        $user_id = $this->Session->read("User.user_id") ; /*to be changed*/
        
        $conditions = array("Project.user_id" => $user_id);
        
        $output = $this->Project->find("all",array('conditions' => $conditions,'order'=>array('Project.project_id DESC')));
 
        $this->set("output",$output);

	}else {
		header("HTTP/1.0 404 Not Found"); 
	}

   }
   
   
}

?>