<?php
App::uses('AppController', 'Controller');
/**
 * PostalCodes Controller
 *
 * @property PostalCode $PostalCode
 * @property PaginatorComponent $Paginator
 */
class PostalCodesController extends AppController {

/**
 *  Layout
 *
 * @var string
 */
	public $layout = 'bootstrap';

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('TwitterBootstrap.BootstrapHtml', 'TwitterBootstrap.BootstrapForm', 'TwitterBootstrap.BootstrapPaginator');
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->PostalCode->recursive = 0;
		$this->set('postalCodes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->PostalCode->id = $id;
		if (!$this->PostalCode->exists()) {
			throw new NotFoundException(__('Invalid %s', __('postal code')));
		}
		$this->set('postalCode', $this->PostalCode->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PostalCode->create();
			if ($this->PostalCode->save($this->request->data)) {
				$this->Session->setFlash(
					__('The %s has been saved', __('postal code')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-success'
					)
				);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(
					__('The %s could not be saved. Please, try again.', __('postal code')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-error'
					)
				);
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
		$this->PostalCode->id = $id;
		if (!$this->PostalCode->exists()) {
			throw new NotFoundException(__('Invalid %s', __('postal code')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PostalCode->save($this->request->data)) {
				$this->Session->setFlash(
					__('The %s has been saved', __('postal code')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-success'
					)
				);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(
					__('The %s could not be saved. Please, try again.', __('postal code')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-error'
					)
				);
			}
		} else {
			$this->request->data = $this->PostalCode->read(null, $id);
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
		$this->PostalCode->id = $id;
		if (!$this->PostalCode->exists()) {
			throw new NotFoundException(__('Invalid %s', __('postal code')));
		}
		if ($this->PostalCode->delete()) {
			$this->Session->setFlash(
				__('The %s deleted', __('postal code')),
				'alert',
				array(
					'plugin' => 'TwitterBootstrap',
					'class' => 'alert-success'
				)
			);
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(
			__('The %s was not deleted', __('postal code')),
			'alert',
			array(
				'plugin' => 'TwitterBootstrap',
				'class' => 'alert-error'
			)
		);
		$this->redirect(array('action' => 'index'));
	}
	public function search(){
		$zipcode = $this->request->data['User']['zipcode'];
		$options = array('conditions'=>array('zipcode'=>$zipcode));
		if(!$result = $this->PostalCode->find('all',$options)){
			$this->set("ヒットしませんでした");
		}else{
			$this->set(compact('result'));
		}    
	}
	public function beforeFilter() {
	                    parent::beforeFilter();
		                            $this->Auth->allow();
		        }
	
}
