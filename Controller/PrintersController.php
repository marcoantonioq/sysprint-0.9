<?php
App::uses('AppController', 'Controller');
/**
 * Printers Controller
 *
 * @property Printer $Printer
 * @property PaginatorComponent $Paginator
 */
class PrintersController extends AppController {

	public function beforeFilter(){
		parent::beforeFilter();
		$this->set('title_for_layout', __(ucfirst('printers')));
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
		$this->Printer->recursive = -1;
		$printers = $this->Printer->find('all');
		$this->set(compact('printers'));
		// $this->render('app_index');
	}

	public function indexedit() {
		$this->Printer->recursive = -1;
		$printers = $this->Printer->find('all');
		$this->set(compact('printers'));
		// $this->render('app_index');
	}

	public function app_index() {

		$users_printers = $this->Printer->UsersPrinter->find("all", array(
			'conditions'=>array('UsersPrinter.user_id'=>$this->Session->read("Auth.User.id"))
		));

		$options_users_printers = array();

		$options_users_printers = array("Printer.allow" => true);

		foreach ($users_printers as $users_printer) {
			$options_users_printers[] = array('Printer.id' => $users_printer['UsersPrinter']['printer_id']);
		}

		$options = array(
			'recursive' => -1,
			'conditions'=>array(
				"OR" => $options_users_printers
			),
		);

		$printers = $this->Printer->find('all', $options);
		$this->set(compact('printers'));
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$printer = $this->Printer->getConfigPrinter('list');
		pr($printer);
		$this->set(compact('printer'));
	}

	public function printStatus($id = null) {
		if (!$this->Printer->exists($id)) {
			throw new NotFoundException(__('Inválido printer'));
		}

		$options = array('conditions' => array('Printer.' . $this->Printer->primaryKey => $id));
		$this->Printer->recursive = -1;
		$printer = $this->Printer->find('first', $options);



		echo ($printer['Printer']['status']) ? 1 : 0;

		$this->layout = "ajax";
        $this->render("/Common/ajax");

	}

	public function app_view($id = null) {
		if (!$this->Printer->exists($id)) {
			throw new NotFoundException(__('Inválido printer'));
		}

		$options = array('conditions' => array('Printer.' . $this->Printer->primaryKey => $id));
		$printer = $this->Printer->find('first', $options);

		$this->set(compact('printer'));
	}


/**
 * add method
 *
 * @return void
 */
	// public function add() {
	// 	if ($this->request->is('post')) {
	// 		$this->Printer->create();
	// 		if ($this->Printer->save($this->request->data)) {
	// 			$this->Session->setFlash(__('Foi salvo.'), 'layout/success');
	// 			return $this->redirect(array('action' => 'index'));
	// 		} else {
	// 			$this->Session->setFlash(__('Não pôde ser salvo. Por favor, tente novamente.'), 'layout/error');
	// 		}
	// 	}
	// 	$users = $this->Printer->User->find('list');
	// 	$this->set(compact('users'));
	// }


/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Printer->exists($id)) {
			throw new NotFoundException(__('Inválido printer'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Printer->save($this->request->data)) {
				$this->Session->setFlash(__('Foi salvo.'), 'layout/success');
				return $this->redirect(array('action' => 'indexedit'));
			} else {
				$this->Session->setFlash(__('Não pôde ser salvo. Por favor, tente novamente.'), 'layout/error');
			}
		} else {
			$options = array('conditions' => array('Printer.' . $this->Printer->primaryKey => $id));
			$this->request->data = $this->Printer->find('first', $options);
		}
		$users = $this->Printer->User->find('list');
		$this->set(compact('users'));
	}

	public function quota($id = null) {
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Printer->saveAll($this->request->data)) {
				$this->Session->setFlash(__('Novas regras foram salvas.'), 'layout/success');
			} else {
				$this->Session->setFlash(__('Não pôde ser salvo. Por favor, tente novamente.'), 'layout/error');
			}
		}
		$printers = $this->Printer->find('all');
		$this->set(compact('users','printers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Printer->id = $id;
		if (!$this->Printer->exists()) {
			throw new NotFoundException(__('Inválido printer'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Printer->delete()) {

			$this->Session->setFlash(__('Foi excluído.'), 'layout/success');
		} else {
			$this->Session->setFlash(__('Não foi excluído. Por favor, tente novamente.'), 'layout/error');
		}
		return $this->redirect(array('action' => 'index'));
	}}
