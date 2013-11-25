<?php
App::uses('AppController', 'Controller');
/**
 * CodeBits Controller
 *
 * @property CodeBit $CodeBit
 */
class CodeBitsController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
	

/**
 * index method
 *
 * @return void
 */
	public function index() {
	   
	   if(!$this->Session->read("User.user_id") || $this->Session->read("User.user_account_type") == "Normal"  ){
            
            $this->redirect("/main/index");
        }
		$this->CodeBit->recursive = 0;
		$this->set('codeBits', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
	   
        if(!$this->Session->read("User.user_id") || $this->Session->read("User.user_account_type") == "Normal"  ){
            
            $this->redirect("/main/index");
        }
       
		$this->CodeBit->id = $id;
		if (!$this->CodeBit->exists()) {
			throw new NotFoundException(__('Invalid code bit'));
		}
		$this->set('codeBit', $this->CodeBit->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
	   
        if(!$this->Session->read("User.user_id") || $this->Session->read("User.user_account_type") == "Normal"  ){
            
            $this->redirect("/main/index");
        }
       
		if ($this->request->is('post')) {
			$this->CodeBit->create();
            print_r($this->request->data);
			if ($this->CodeBit->save($this->request->data)) {
				$this->Session->setFlash(__('The code bit has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The code bit could not be saved. Please, try again.'));
			}
		}
		$codeBitCategories = $this->CodeBit->CodeBitCategory->find('list',array('fields' => array('CodeBitCategory.id')));
        //print_r($codeBitCategories);
        //$this->CodeBitCategory = ClassRegistry::init('CodeBitCategory');
		$this->set(compact('codeBitCategories'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
	   
        if(!$this->Session->read("User.user_id") || $this->Session->read("User.user_account_type") == "Normal"  ){
            
            $this->redirect("/main/index");
        }
       
		$this->CodeBit->id = $id;
		if (!$this->CodeBit->exists()) {
			throw new NotFoundException(__('Invalid code bit'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CodeBit->save($this->request->data)) {
				$this->Session->setFlash(__('The code bit has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The code bit could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->CodeBit->read(null, $id);
		}
	$codeBitCategories = $this->CodeBit->CodeBitCategory->find('list',array('fields' => array('CodeBitCategory.id')));
        //print_r($codeBitCategories);
        //$this->CodeBitCategory = ClassRegistry::init('CodeBitCategory');
		$this->set(compact('codeBitCategories'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
	   
        if(!$this->Session->read("User.user_id") || $this->Session->read("User.user_account_type") == "Normal"  ){
            
            $this->redirect("/main/index");
        }
       
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->CodeBit->id = $id;
		if (!$this->CodeBit->exists()) {
			throw new NotFoundException(__('Invalid code bit'));
		}
		if ($this->CodeBit->delete()) {
			$this->Session->setFlash(__('Code bit deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Code bit was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->CodeBit->recursive = 0;
		$this->set('codeBits', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->CodeBit->id = $id;
		if (!$this->CodeBit->exists()) {
			throw new NotFoundException(__('Invalid code bit'));
		}
		$this->set('codeBit', $this->CodeBit->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->CodeBit->create();
			if ($this->CodeBit->save($this->request->data)) {
				$this->Session->setFlash(__('The code bit has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The code bit could not be saved. Please, try again.'));
			}
		}
		$codeBitCategories = $this->CodeBit->CodeBitCategory->find('list');
		$this->set(compact('codeBitCategories'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->CodeBit->id = $id;
		if (!$this->CodeBit->exists()) {
			throw new NotFoundException(__('Invalid code bit'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CodeBit->save($this->request->data)) {
				$this->Session->setFlash(__('The code bit has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The code bit could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->CodeBit->read(null, $id);
		}
		$codeBitCategories = $this->CodeBit->CodeBitCategory->find('list');
		$this->set(compact('codeBitCategories'));
	}

/**
 * admin_delete method
 *
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->CodeBit->id = $id;
		if (!$this->CodeBit->exists()) {
			throw new NotFoundException(__('Invalid code bit'));
		}
		if ($this->CodeBit->delete()) {
			$this->Session->setFlash(__('Code bit deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Code bit was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
