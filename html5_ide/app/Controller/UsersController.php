<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {
    
    public $components = array('Session');
    
    public $layout = "view_files" ; 

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
    
    public function login(){
        
        if($this->request->is('post')){
             $username = $_POST["username"];
            $password = $_POST["password"];
    
            $conditions = array("User.user_email" => $username,
                "AND" => array(
                    "User.user_password" => $password
                )
            );
            $results = $this->User->find("first",array("conditions" => $conditions));
            $results_count = $this->User->find("count",array("conditions" => $conditions));
            
            
            if($results_count){
                $this->Session->write("User",$results["User"]);
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
       
        
    }
    
    public function logout(){
        if($this->Session->valid()){
            $this->Session->destroy();
            $this->redirect("/main/index");
        }
    }
    
    public function signup() {
		if ($this->request->is('post')) {
			$username = $_POST["username"];
            $password = $_POST["password"];
            $name = $_POST["name_acc"];
            $re_password = $_POST["re_password"];
            
            $conditions = array("User.user_email" => $username);
            
            $results_count = $this->User->find("count",array("conditions" => $conditions));
            
            if($results_count){
                 header("HTTP/1.0 200 OK");
               	header('Content-type: application/json; charset=utf-8');
               	header("Cache-Control: no-cache, must-revalidate");
               	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
               	header("Pragma: no-cache");
                
                 echo "{ \"status\" : 0}";
            }else {
                $this->User->create();
                $this->User->save(array(
                    "user_email" => $username,
                    "user_first_name" => $name,
                    "user_account_type" => "Normal",
                    "user_password" => $password
                ));
                
                header("HTTP/1.0 200 OK");
               	header('Content-type: application/json; charset=utf-8');
               	header("Cache-Control: no-cache, must-revalidate");
               	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
               	header("Pragma: no-cache");
                
                 echo "{ \"status\" : 1}";
                
            }
			
		}
	}
}
