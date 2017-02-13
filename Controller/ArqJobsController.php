<?php
App::uses('AppController', 'Controller');
/**
 * ArqJobs Controller
 *
 * @property ArqJob $ArqJob
 * @property PaginatorComponent $Paginator
 */
class ArqJobsController extends AppController {

	public function beforeFilter(){
		parent::beforeFilter();
		$this->set('title_for_layout', __(ucfirst('arqjobs')));
	}

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
		if ($this->request->is('post')) {
            $this->Paginator->settings = $this->ArqJob->action($this->request->data);
            echo $this->Session->setFlash('Filtro definido!', 'layout/success');
        }
		$this->ArqJob->recursive = 0;
		$this->set('arqJobs', $this->Paginator->paginate());
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ArqJob->exists($id)) {
			throw new NotFoundException(__('Inválido arq job'));
		}
		$options = array('conditions' => array('ArqJob.' . $this->ArqJob->primaryKey => $id));
		$this->set('arqJob', $this->ArqJob->find('first', $options));
	}


/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ArqJob->create();
			if ($this->ArqJob->save($this->request->data)) {
				$this->Session->setFlash(__('Foi salvo.'), 'layout/success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Não pôde ser salvo. Por favor, tente novamente.'), 'layout/error');
			}
		}
	}


/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ArqJob->exists($id)) {
			throw new NotFoundException(__('Inválido arq job'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ArqJob->save($this->request->data)) {
				$this->Session->setFlash(__('Foi salvo.'), 'layout/success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Não pôde ser salvo. Por favor, tente novamente.'), 'layout/error');
			}
		} else {
			$options = array('conditions' => array('ArqJob.' . $this->ArqJob->primaryKey => $id));
			$this->request->data = $this->ArqJob->find('first', $options);
		}
	}
	

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ArqJob->id = $id;
		if (!$this->ArqJob->exists()) {
			throw new NotFoundException(__('Inválido arq job'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ArqJob->delete()) {
	
			$this->Session->setFlash(__('Foi excluído.'), 'layout/success');
		} else {
			$this->Session->setFlash(__('Não foi excluído. Por favor, tente novamente.'), 'layout/error');
		}
		return $this->redirect(array('action' => 'index'));
	}}
