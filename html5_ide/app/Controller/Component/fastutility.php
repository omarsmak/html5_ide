<?

class FastutilityComponent extends Component {
    
    public function __construct($database = "html5_ide"){
            App::import('component','Databasehelper');
           $db_config = array(
        	"servername"=> "mysql50-91.wc1",
        	"username"	=> "659028_html5",
        	"password"	=> "Iloveaden30",
        	"database"	=> "659028_html5_ide"
        );
            $this->db = new DatabasehelperComponent($db_config); 
    }
    
    public function map_project_name_to_project_id($project_name) {
        $new_project_name = $this->db->escape($project_name);
        $this->db->query("select project_id from projects where project_name = '$new_project_name' limit 1");
        $this->db->nextr();
        return $this->db->f(0);
    }
    
    
    public function map_project_hash_key ($project_hash) {
    //map the hash key 
        $this->Project = ClassRegistry::init('Project');
        
        $project_results = $this->Project->find('first',array('conditions' => array("Project.project_hash_key" => $project_hash)));
        
        return $project_results["Project"]["project_id"] ; 
   }
   
   
   public function get_url_after_hash($project_hash,$current_url){
        //$current_url = Router::url("", false);
        $current_url_1 = explode($project_hash,$current_url);
        $correct_file_name = array_pop($current_url_1);
        
        return substr($correct_file_name,1) ; 
    
   }
    
    
}



?>