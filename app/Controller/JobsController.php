<?php
App::uses('AppController', 'Controller');
/**
 * Jobs Controller
 *
 * @property Job $Job
 * @property PaginatorComponent $Paginator
 */
class JobsController extends AppController {

	public function beforeFilter(){
		parent::beforeFilter();
		$this->set('title_for_layout', __(ucfirst('jobs')));
	}


	public function index() {
		if ($this->request->is('post')) {
	      	$this->Paginator->settings = $this->Job->action($this->request->data); // FormBehavior
	  		echo $this->Session->setFlash('Filtro definido!', 'layout/success');
	    } else {
			$this->Paginator->settings = array_merge($this->Paginator->settings, array(
				"conditions" => array("MONTH(Job.date)" => date("m"))
			));
	    }
		
		$this->Job->recursive = 1;
		$jobs = $this->Paginator->paginate();

		// pr($this->Paginator->settings); exit;

		$filter = array_merge($this->Paginator->settings, array(
			// 'recursive' => -1,
		    'fields' => array('MONTH(Job.date) AS month, SUM(Job.copies * Job.pages) AS total_pages'),
		    'group' => array("MONTH(Job.date)"),
		    'order' => "Job.date",
		));
		$charts_anual = $this->Job->find('all', $filter);

		// pr($filter); exit;

		$filter = array_merge($this->Paginator->settings, array(
		    'fields' => array('Printer.name, SUM(Job.copies * Job.pages) AS total_pages'),
		    'group' => array('Job.printer_id'),
		    'order' => array("total_pages"=>"DESC"),
		));
		$charts_printer = $this->Job->find('all', $filter);
	
		$filter = array_merge($this->Paginator->settings, array(
		    'fields' => array('User.name, SUM(Job.copies * Job.pages) AS total_pages'),
		    'group' => array('User.id'),
		    'order' => array("total_pages"=>"DESC"),
		));
		$charts_users = $this->Job->find('all', $filter);


		$this->set(compact('jobs','charts_anual','charts_printer', 'charts_users'));
	}

	public function users() {
		if ($this->request->is('post')) {
	      	$this->Paginator->settings = $this->Job->action($this->request->data);
	  		echo $this->Session->setFlash('Filtro definido!', 'layout/success');
	    }
		$this->Job->recursive = 1;
		$jobs = $this->Paginator->paginate();
		
		$filter = array_merge($this->Paginator->settings, array(
		    'fields' => array('User.username, User.name, MONTH(Job.date) AS month, SUM(Job.copies * Job.pages) AS total_pages'),
		    'group' => array("User.id, MONTH(Job.date)"),
		    'order' => "Job.date",
		));
		$charts_anual = $this->Job->find('all', $filter);

		$filter = array_merge($this->Paginator->settings, array(
		    'fields' => array('User.username, User.name, Printer.name, SUM(Job.copies * Job.pages) AS total_pages'),
		    'group' => array('User.id, Job.printer_id'),
		    'order' => "Printer.name",
		));
		$chart_print = $this->Job->find('all', $filter);

		$this->set(compact('jobs','charts_anual','chart_print'));
	}

	public function app_index() {
		if ($this->request->is('post')) {
      $this->Paginator->settings = $this->Job->action($this->request->data);
      echo $this->Session->setFlash('Filtro definido!', 'layout/success');
    }
		$this->Paginator->settings['conditions']['AND'] = array(
			'User.id' => $this->Session->read("Auth.User.id")
		);
		$this->Job->recursive = 0;
		$jobs = $this->Paginator->paginate();
		$this->set(compact('jobs'));
	}

	public function sync(){
		$this->render(false);
		$this->Job->recursive = -1;
		$jobs = $this->Job->find("all");
		$this->Job->sync($jobs);
		$this->redirect($this->referer());
	}

	public function view($id = null) {
		if (!$this->Job->exists($id)) {
			throw new NotFoundException(__('Inválido job'));
		}
		$options = array('conditions' => array('Job.' . $this->Job->primaryKey => $id));
		$this->set('job', $this->Job->find('first', $options));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Job->create();
			// pr($this->request->data); exit;
			if ($this->Job->save($this->request->data)) {
				$this->Session->setFlash(__('Trabalho de cópia salvo.'), 'layout/success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Não pôde ser salvo. Por favor, tente novamente.'), 'layout/error');
			}
		}
		$users = $this->Job->User->find('list');
		$printers = $this->Job->Printer->find('list');
		$this->set(compact('users', 'printers'));
	}

	public function edit($id = null) {
		if (!$this->Job->exists($id)) {
			throw new NotFoundException(__('Inválido job'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Job->save($this->request->data)) {
				$this->Session->setFlash(__('Foi salvo.'), 'layout/success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Não pôde ser salvo. Por favor, tente novamente.'), 'layout/error');
			}
		} else {
			$options = array('conditions' => array('Job.' . $this->Job->primaryKey => $id));
			$this->request->data = $this->Job->find('first', $options);
		}
		$users = $this->Job->User->find('list');
		$printers = $this->Job->Printer->find('list');
		$this->set(compact('users', 'printers'));
	}

	public function delete($id = null) {
		$this->Job->id = $id;
		if (!$this->Job->exists()) {
			throw new NotFoundException(__('Inválido job'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Job->delete()) {

			$this->Session->setFlash(__('Foi excluído.'), 'layout/success');
		} else {
			$this->Session->setFlash(__('Não foi excluído. Por favor, tente novamente.'), 'layout/error');
		}
		return $this->redirect(array('action' => 'index'));
	}
/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function deleteall($id = null) {
		$message = 'Foi excluído.';
		foreach ($this->request->data['row'] as $id => $value) {
			if ($value) {
				$this->Job->id = $id;
				$this->request->onlyAllow('post', 'delete');
				if (!$this->Job->delete()) {
					$message = 'Não foi excluído. Por favor, tente novamente.';
				}
				$this->Session->setFlash(__($message), 'layout/warning');
			}
		}
		return $this->redirect(array('action' => 'index'));
	}
}
