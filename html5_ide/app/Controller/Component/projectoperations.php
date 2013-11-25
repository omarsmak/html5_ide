<?

class ProjectoperationsComponent extends Component {
    
    public function __construct (){
        
        App::import('Component','Jsontree');
        App::import('Component','Filesoperations');
        App::import('component','Databasehelper');
        $db_config = array(
        	"servername"=> "mysql50-91.wc1",
        	"username"	=> "659028_html5",
        	"password"	=> "Iloveaden30",
        	"database"	=> "659028_html5_ide"
        );
        $this->db = new DatabasehelperComponent($db_config); 
        $this->jsontree = new JsontreeComponent();
        $this->Project = ClassRegistry::init('Project');
        $this->TreeFile = ClassRegistry::init('TreeFile'); 
        $this->FileOperation = new FilesoperationsComponent();
    }
    
    
    private function generate_random_hash_key(){
        return hash("md4",rand());
    }
    
    
    public function create_new_project($project_name = null,$user_id=null){
        //First create user files 
        $data_to_save = array(
            'user_id' => $user_id,
            'project_name' => $project_name , 
            'project_hash_key' => $this->generate_random_hash_key()
        );
        
        //first_step
        $this->Project->create();
        $this->Project->save($data_to_save);
        
        //latest project ID 
        $project_id = $this->Project->getLastInsertID();
        
        //create project folder 
        $this->FileOperation->create_project($project_id);
        
        //creare new record for the folder in the 'tree_file' table
        
        //doesn't working'
        //$this->TreeFile->create();
        /*
        $this->TreeFile->save(array(
            "parent_id" => 0 , 
            "position" => 0 ,
            "left" =>0 , 
            "right" => 0 , 
            "level" => 0 ,
            "title" => $project_name."_"."root",
            "type" => "" ,
            "path" => "" ,
            "project_id" => $project_id
        ));
        */
        
        //anouther way 
        
        $table_name = "tree_files" ; 
        
        $this->db->query("INSERT INTO `$table_name` (
                `id` ,
                `parent_id` ,
                `position` ,
                `left` ,
                `right` ,
                `level` ,
                `title` ,
                `type` ,
                `path` ,
                `project_id`
                )
                VALUES (
                NULL , '0', '0', '0', '0', '0', 'Workplace', '', '', '$project_id'
                );");
        
        $this->db->query("select max(id) from $table_name");
        $this->db->nextr();
        $latest_id_tree_files = $this->db->f(0);
        
        //create new file and node 
        
        $data_to_pass = array(
          "id" => $latest_id_tree_files , 
          "title" => $project_name,
          "type" => "drive",
           "position" => 0 ,
           "project_id" => $project_id,
        );
        
        //create root folder named as the project name
        //echo $latest_id_tree_files ; 
        $this->jsontree->create_node($data_to_pass);
        
    }
    
}


?>