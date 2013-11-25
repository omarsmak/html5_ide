<?php
App::uses('AppController', 'Controller');
/**
 * IdeFiles Controller
 *
 * @property IdeFile $IdeFile
 */
class IdeFilesController extends AppController {

    public $helpers = array("Js", "html", "form");

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->IdeFile->recursive = 0;
		$this->set('ideFiles', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->IdeFile->id = $id;
		if (!$this->IdeFile->exists()) {
			throw new NotFoundException(__('Invalid ide file'));
		}
		$this->set('ideFile', $this->IdeFile->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->IdeFile->create();
			if ($this->IdeFile->save($this->request->data)) {
				$this->Session->setFlash(__('The ide file has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ide file could not be saved. Please, try again.'));
			}
		}
		$projects = $this->IdeFile->Project->find('list');
		$this->set(compact('projects'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->IdeFile->id = $id;
		if (!$this->IdeFile->exists()) {
			throw new NotFoundException(__('Invalid ide file'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->IdeFile->save($this->request->data)) {
				$this->Session->setFlash(__('The ide file has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ide file could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->IdeFile->read(null, $id);
		}
		$projects = $this->IdeFile->Project->find('list');
		$this->set(compact('projects'));
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
		$this->IdeFile->id = $id;
		if (!$this->IdeFile->exists()) {
			throw new NotFoundException(__('Invalid ide file'));
		}
		if ($this->IdeFile->delete()) {
			$this->Session->setFlash(__('Ide file deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Ide file was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
    
    
/**REST OPERATIONS**/

//TODO : SECURE THE API
    
    
    private function shift_array_file($array){
        $newArray = array();
        $count = 0 ;
        foreach($array as $elem){
            $newArray[$count] = $elem["IdeFile"];
            $newArray[$count]["isHasChild"] = $this->isHasChild($newArray[$count]["file_id"]);
            $count++;
        }
        return $newArray;
    }
    
    
    public function get_files_list($project_id = null , $file_parent_id = null){
        
        //secure the API later
        
            $this->IdeFile->recursive = 0;
            $condition = array("IdeFile.project_id " => $project_id , "IdeFile.file_parent_id " => $file_parent_id );
            $results =  $this->IdeFile->find("all",array('conditions' => $condition));
            $this->set('ideFiles',$this->shift_array_file($results) );
    }
    
    
    private function isHasChild($file_id = null){
        
        //find all the child files of the current file_id
        $query = "select * from ide_files where file_parent_id = $file_id";
        $resuls = $this->IdeFile->query($query);
        
        return count($resuls);
        
    }
    
    
    
    
}
