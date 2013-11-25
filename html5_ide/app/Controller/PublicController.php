<?php


//this controller open for public view of files

class PublicController extends AppController {
   public $name = "Public";
   public $uses = null ;
   public $helpers = array("Js", "html", "form");
   //public $components = array("Jsontree");

   //public $components = array('Tests');
   
   public $layout = "view_files" ; 
   
   function workplace($project_hash = null){
        try{
            
            App::import('Component','Fastutility');
            $this->TreeFile = ClassRegistry::init('TreeFile');
            $this->Project = ClassRegistry::init('Project');
            $fast_utility = new FastutilityComponent() ; 
            
            $file_url = $fast_utility->get_url_after_hash($project_hash,Router::url("", false));
            $project_id = $fast_utility->map_project_hash_key($project_hash);
            
            if($project_id === "" || $project_id === null){
                throw new NotFoundException("The page is not exist !");
            }
            
            
            $conditions = array(
            "TreeFile.project_id" => $project_id , 
            "TreeFile.parent_id"  => 0 
            );
            
            $results = $this->TreeFile->find("first",array("conditions" => $conditions));
            
            $root_folder = $results["TreeFile"]["title"] ; 
            
            $this->Project->id = $project_id ; 
            
            $results_2 = "" ; 
            
            if(!$this->Project->exists()){
                //throw new NotFoundException("The page is not exist !");
            } else {
                $results_2 = $this->Project->read(null,$project_id);
            }
            
            //print_r($results_2);
            
            
            
            $full_url = USER_PROJECT_DATA_PATH.$project_id."/".$root_folder."/".$results_2["Project"]["project_name"]."/".$file_url ; 
            
            if(file_exists($full_url)){
                $this->set("output",file_get_contents($full_url));
            }else {
                throw new NotFoundException("The page is not exist !");
            }
            
            
        } 
        catch(exception $ex) 
        {
            throw new NotFoundException("The page is not exist !");
        }
   }
   
   
   
   
   
   
   
}

?>