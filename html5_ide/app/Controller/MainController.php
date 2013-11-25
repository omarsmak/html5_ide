<?php
class MainController extends AppController {
   public $name = "Main";
   public $uses = null ;
   public $helpers = array("Js", "html", "form");
    public $components = array('Session');
   //public $components = array("Jsontree");

   //public $components = array('Tests');
   
   function index(){
    
        if($this->Session->read("User.user_id")){
            
            $this->redirect("/main/dashboard");
        }
        
        $this->layout = "home_page" ; 
        $this->set("title_for_layout","The Cloud Development Environment, Online Code Editor, Cloud Hosting and Web based access to file-system");
        
   }
   
   function application($project_hash = null){
        
        if(!$this->Session->read("User.user_id")){
            
            $this->redirect("/main/index");
        }
        
        $this->set("output_name",$this->Session->read("User.user_first_name"));
        $this->set("user_type",$this->Session->read("User.user_account_type"));
        
        $this->set("title_for_layout","Main Application");
        
        App::import('Component','Fastutility');
        
        $fast_utility = new FastutilityComponent() ; 
        
        $project_id = $fast_utility->map_project_hash_key($project_hash) ; 
        
        if($project_id == "" || $project_id == null) {
                //project not found
                throw new NotFoundException("The project not exist") ;
        }
        
        //$this->Tests->viewTest();
        //App::import("Component","Tree");
        
        //$tesss = new TreeComponent();
        //$tesss->test_model();
        //$this->Tree->test_model();
        
        /*We have to check if the project ID exist for a user otherwise redirect them to error page */
        
        App::import('Component','Jsontree');
        
        $this_com = new JsontreeComponent();
        //$path = $this_com->get_parent_path(13);
        //echo $path;
        //$this_com->_create_default();
        $data = array() ; 
        //$data["title"] = "testeee.txt" ; 
        //$data["type"] = "file" ; 
        $data["id"] = 62 ; 
        $data["project_id"] = 5 ; 
        //$data['ref'] = 5 ;
        $data['title'] = "jdhd.html";
        
        App::import('Component','Filesoperations');
        App::import('Component','Projectoperations');
        $this->TreeFile = ClassRegistry::init('TreeFile');
        
        $file = new FilesoperationsComponent() ; 
        $project = new ProjectoperationsComponent();
       //$project->create_new_project("New Automated Project New Root",1);
        //print_r($file->generate_public_link(139,$project_id,$project_hash));
        //$this->TreeFile->recursive = 0 ;
        //print_r($this->TreeFile->read(null, 10)); 
        //$this->TreeFile->save();
        //$this->TreeFile->recursive = 0 ;
       //$id =  $this->TreeFile->getLastInsertID();
       
       //echo $id;
        
       //echo $file->create_file($data);
       //echo $file->delete_file($data);
       //echo $file->move_file($data);
       
       //echo $file->rename_file($data);
       
       //echo file_get_contents("G:\/xampp\/htdocs\/html5_ide\/app\/webroot\/storage\/5\/C\/test.html")
        
        //echo hash("crc32b",rand());
        
        //echo highlight_file("G:\/xampp\/htdocs\/html5_ide\/app\/webroot\/storage\/5\style.css");
        
        ?>
        <script>
        var project_hash = "<?=$project_hash?>";
        var project_id = "<?=$project_id?>";
        </script>
        <?
        
   }
   
   
   function dashboard(){
    
        if(!$this->Session->read("User.user_id")){
            
            $this->redirect("/main/index");
        }
        
        $this->set("title_for_layout","Dashboard");
        $this->set("output_name",$this->Session->read("User.user_first_name"));
        $this->set("user_type",$this->Session->read("User.user_account_type"));
        
   }
   
   
   function admin(){
        if(!$this->Session->read("User.user_id")){
            
            $this->redirect("/main/index");
        }
        
        $this->set("title_for_layout","Admin");
        
        $this->CodeBit = ClassRegistry::init('CodeBit');
        
        print_r($this->CodeBit->find("all"));
        
        $this->set("output_name",$this->Session->read("User.user_first_name"));
   }
   

   
   /*
   function test($file_name = null){
        //echo $file_name;
        //$this->layout = "test" ; 
        $current_url = Router::url("", false);
        $current_url_1 = explode('/',$current_url);
        $correct_file_name = array_pop($current_url_1);
        
        $this->set('output',file_get_contents("G:\/xampp\/htdocs\/html5_ide\/app\/webroot\/storage\/5\/C\/$correct_file_name"));
   }
   */
   
}

?>