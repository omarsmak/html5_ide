<?php
App::uses('AppController', 'Controller');
/**
 * CodeBitCategories Controller
 *
 * @property CodeBitCategory $CodeBitCategory
 */
class CodeBitCategoriesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
	   
        if(!$this->Session->read("User.user_id") || $this->Session->read("User.user_account_type") == "Normal"  ){
            
            $this->redirect("/main/index");
        }
       
		$this->CodeBitCategory->recursive = 0;
		$this->set('codeBitCategories', $this->paginate());
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
       
		$this->CodeBitCategory->id = $id;
		if (!$this->CodeBitCategory->exists()) {
			throw new NotFoundException(__('Invalid code bit category'));
		}
		$this->set('codeBitCategory', $this->CodeBitCategory->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
		  
          
           if(!$this->Session->read("User.user_id") || $this->Session->read("User.user_account_type") == "Normal"  ){
            
            $this->redirect("/main/index");
        }
          
			$this->CodeBitCategory->create();
			if ($this->CodeBitCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The code bit category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The code bit category could not be saved. Please, try again.'));
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
	   
       
        if(!$this->Session->read("User.user_id") || $this->Session->read("User.user_account_type") == "Normal"  ){
            
            $this->redirect("/main/index");
        }
       
		$this->CodeBitCategory->id = $id;
		if (!$this->CodeBitCategory->exists()) {
			throw new NotFoundException(__('Invalid code bit category'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CodeBitCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The code bit category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The code bit category could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->CodeBitCategory->read(null, $id);
		}
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
		$this->CodeBitCategory->id = $id;
		if (!$this->CodeBitCategory->exists()) {
			throw new NotFoundException(__('Invalid code bit category'));
		}
		if ($this->CodeBitCategory->delete()) {
			$this->Session->setFlash(__('Code bit category deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Code bit category was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->CodeBitCategory->recursive = 0;
		$this->set('codeBitCategories', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->CodeBitCategory->id = $id;
		if (!$this->CodeBitCategory->exists()) {
			throw new NotFoundException(__('Invalid code bit category'));
		}
		$this->set('codeBitCategory', $this->CodeBitCategory->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->CodeBitCategory->create();
			if ($this->CodeBitCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The code bit category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The code bit category could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->CodeBitCategory->id = $id;
		if (!$this->CodeBitCategory->exists()) {
			throw new NotFoundException(__('Invalid code bit category'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CodeBitCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The code bit category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The code bit category could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->CodeBitCategory->read(null, $id);
		}
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
		$this->CodeBitCategory->id = $id;
		if (!$this->CodeBitCategory->exists()) {
			throw new NotFoundException(__('Invalid code bit category'));
		}
		if ($this->CodeBitCategory->delete()) {
			$this->Session->setFlash(__('Code bit category deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Code bit category was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
