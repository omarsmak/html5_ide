<?php
App::uses('AppController', 'Controller');
/**
 * TreeFiles Controller
 *
 * @property TreeFile $TreeFile
 */
class TreeFilesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TreeFile->recursive = 0;
		$this->set('treeFiles', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->TreeFile->id = $id;
		if (!$this->TreeFile->exists()) {
			throw new NotFoundException(__('Invalid tree file'));
		}
		$this->set('treeFile', $this->TreeFile->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		//if ($this->request->is('post')) {
			$this->TreeFile->create();
			if ($this->TreeFile->save($this->request->data)) {
				$this->Session->setFlash(__('The tree file has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tree file could not be saved. Please, try again.'));
			}
		//}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->TreeFile->id = $id;
		if (!$this->TreeFile->exists()) {
			throw new NotFoundException(__('Invalid tree file'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TreeFile->save($this->request->data)) {
				$this->Session->setFlash(__('The tree file has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tree file could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->TreeFile->read(null, $id);
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
		$this->TreeFile->id = $id;
		if (!$this->TreeFile->exists()) {
			throw new NotFoundException(__('Invalid tree file'));
		}
		if ($this->TreeFile->delete()) {
			$this->Session->setFlash(__('Tree file deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Tree file was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
