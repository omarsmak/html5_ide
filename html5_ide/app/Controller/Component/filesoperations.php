<?

class FilesoperationsComponent extends Component {
    
    protected $file_route = "";
    protected $base_file = "";
    
    public function  __construct($file_route = "\/app\/webroot\/storage\/") {
        //$this->file_route = $file_route ; 
        
        $current_file_name = dirname(__FILE__);
        //echo $current_file_name;
        
        //base file path
        //$this->base_file = str_replace("app\Controller\Component","",$current_file_name);
        $this->base_file = "" ; 
        $this->file_route = USER_PROJECT_DATA_PATH ; 
        
        App::import('Utility', 'Folder');
        App::import('Component','Jsontree');
        App::import('Utility', 'File');
        
        $this->TreeFile = ClassRegistry::init('TreeFile'); 
        $this->folder = new Folder();
        
        
    }
    
    
    public function create_project($project_id){
        
        $full_path = $this->base_file.$this->file_route.$project_id;
        if(!file_exists($full_path)){
            return $this->folder->create($full_path);
        } else {return false;}
        
    }
    
    
    public function create_file($data){
        $this->tree = new JsontreeComponent();
        $parent_id = $data['id'];
        $filename = $data['title'];
        $file_type = $data['type'];
        $project_id = $data['project_id'];
        $parent_path =  $this->tree->get_parent_path($parent_id);
        $full_path = $this->base_file.$this->file_route.$project_id."/".$parent_path."/".$filename ;
        
        
        //echo $full_path;
        //example app/webroot/storage/5/{files}
        //1- check if there's file having the same name 
        
        
        //##to do check this again 
        if(!file_exists($full_path)){
            //2 - if is folder create folder 

            if($file_type == "folder" || $file_type == "drive"){
                return $this->folder->create($full_path);
                
            } else {
                //3- if is file create file
                /*
                $file_handler = fopen($full_path,'w') or die("can't create file");
                fclose($file_handler);
                */
              
                $file = new File($full_path);
                return $file->create();
				//return $file->exists();
            }
        }
        else {
            return false ;
        }
    }
    
    
    public function delete_file($data){
        $this->tree = new JsontreeComponent();
        $file_id = $data['id'];
        $file_node = $this->tree->_get_node($file_id);
        $project_id = $data['project_id'];
        $file_path =  $this->tree->get_parent_path($file_id);
        $full_path = $this->base_file.$this->file_route.$project_id."/".$file_path ;
        
        //echo $full_path;
        
        if(is_dir($full_path)){
            //if is a folder 
            if(file_exists($full_path)){

                return $this->folder->delete($full_path."/");
            }else {
                //file is not there
                return false ;
            }
            
        } else {
            //is file
            if(file_exists($full_path)){
                $file = new File($full_path);
                return $file->delete();
            }else {
                return false ;
            }
        }
        
    }
    
    
    public function move_file($data){
        $this->tree = new JsontreeComponent();
        
        //node file data 'from'
        $file_id = $data['id'];
        $file_node = $this->tree->_get_node($file_id);
        $project_id = $data['project_id'];
        $file_path =  $this->tree->get_parent_path($file_id);
        $full_path = $this->base_file.$this->file_route.$project_id."/".$file_path ;
        $file_name = $this->tree->get_file_name($file_id);
        
        //node file data 'to'
        $ref_file_id = $data['ref'] ; 
        $ref_file_node = $this->tree->_get_node($ref_file_id);
        $ref_file_path = $this->tree->get_parent_path($ref_file_id);
        $ref_full_path = $this->base_file.$this->file_route.$project_id."/".$ref_file_path ;
        $ref_file_name = $this->tree->get_file_name($ref_file_id);
        
        
        //settings 
        $copy = $data['copy'];
        
        //echo $ref_file_node ;         
        
        //start 
        if(file_exists($full_path)){
            
            if(file_exists(($ref_full_path))){
                
                if(is_dir($full_path) && is_dir($ref_full_path)){
                    //echo $full_path ; 
                    //echo $ref_full_path ; 
                    /*
                    return $this->folder->copy(array(
                        'to' => $ref_full_path."\/" , 
                        'from' => $full_path."\/" , 
                        'chmod' => '755'
                    ));
                    */
                    
                    if($copy){
                        return $this->smartCopy($full_path,$ref_full_path."/");
                    } else {
                        $this->smartCopy($full_path,$ref_full_path."/");
                        return $this->folder->delete($full_path."/");
                    }
                    
                    
                    
                } else if(!is_dir($full_path) && is_dir($ref_full_path)){
                    
                    if($copy){
                        $file = new File($full_path);
                        $overwritten = file_exists($ref_full_path."/".$file_node["title"]);
                        $success = $file->copy($ref_full_path."/".$file_node["title"],true);
                        if($overwritten){
                            return false ;
                        }else {
                            return $success;
                        }
                    } else {
                        $file = new File($full_path);
                        $file->copy($ref_full_path."/".$file_node["title"],true);
                        return $file->delete();
                    }
                    
                    
                }
                
            }else {
                return false ;
            }
            
        }else {
            return false ;
        }
        
    }
    
    
    public function rename_file($data){
        
        $this->tree = new JsontreeComponent();
        
        $file_id = $data['id'];
        $file_node = $this->tree->_get_node((int)$file_id);
        $project_id = $data['project_id'];
        $file_path =  $this->tree->get_parent_path((int)$file_id);
        $full_path = $this->base_file.$this->file_route.$project_id."/".$file_path ;
        $file_new_name = $data['title'];
        
        
        
                //start 
        if(file_exists($full_path)){
                $full_path_new_name = dirname($full_path)."/".$file_new_name;
                return rename($full_path,$full_path_new_name);
        }else {
            return false ;
        }
        
        
        
    }
    
    
    public function get_file_main_route($file_id=null,$project_id = null){
        
        if($file_id == null || $file_id == "") {
            return false ; 
        } else {
            
            if($this->TreeFile->exists()){
                $this->tree = new JsontreeComponent();
                $file_parent_path = $this->tree->get_parent_path($file_id) ; 
                $file_path = $this->file_route.$project_id."/".$file_parent_path;
                return $file_path ; 
                
            }else {
                return false ; 
            }
        }
        
    }
    
    
    public function generate_public_link($file_id = null , $project_id = null){
        
        if($file_id == null || $file_id == "") {
            return false ; 
        } else {
            $loop_on = true ;
            $this->TreeFile->id = $file_id ; 
            $results = $this->TreeFile->read(null,$file_id);
            $path_array[0] = $results["TreeFile"]["title"];
            $this->TreeFile->id = $results["TreeFile"]["parent_id"];
            $count = 1 ; 
            while($this->TreeFile->exists()){
                $results = $this->TreeFile->read();
                if($results["TreeFile"]["type"] == "folder"){
                    $path_array[$count] = $results["TreeFile"]["title"];
                    $this->TreeFile->id = $results["TreeFile"]["parent_id"];
                    $count++ ;
                }else {
                    break ; 
                } 
            }
            
            $reversed_array = array_reverse($path_array);
            
            $link = implode("/",$reversed_array);
            
            return $link ;
            
        }
        
        
    }
    
    
    
    private function smartCopy($source, $dest, $options=array('folderPermission'=>0755,'filePermission'=>0755))
    {
        $result=false;
       
        if (is_file($source)) {
            if ($dest[strlen($dest)-1]=='/') {
                if (!file_exists($dest)) {
                    cmfcDirectory::makeAll($dest,$options['folderPermission'],true);
                }
                $__dest=$dest."/".basename($source);
            } else {
                $__dest=$dest;
            }
            $result=copy($source, $__dest);
            chmod($__dest,$options['filePermission']);
           
        } elseif(is_dir($source)) {
            if ($dest[strlen($dest)-1]=='/') {
                if ($source[strlen($source)-1]=='/') {
                    //Copy only contents
                } else {
                    //Change parent itself and its contents
                    $dest=$dest.basename($source);
                    @mkdir($dest);
                    chmod($dest,$options['filePermission']);
                }
            } else {
                if ($source[strlen($source)-1]=='/') {
                    //Copy parent directory with new name and all its content
                    @mkdir($dest,$options['folderPermission']);
                    chmod($dest,$options['filePermission']);
                } else {
                    //Copy parent directory with new name and all its content
                    @mkdir($dest,$options['folderPermission']);
                    chmod($dest,$options['filePermission']);
                }
            }

            $dirHandle=opendir($source);
            while($file=readdir($dirHandle))
            {
                if($file!="." && $file!="..")
                {
                     if(!is_dir($source."/".$file)) {
                        $__dest=$dest."/".$file;
                    } else {
                        $__dest=$dest."/".$file;
                    }
                    //echo "$source/$file ||| $__dest<br />";
                    $result=$this->smartCopy($source."/".$file, $__dest, $options);
                }
            }
            closedir($dirHandle);
           
        } else {
            $result=false;
        }
        return $result;
    } 
    
    
}



?>