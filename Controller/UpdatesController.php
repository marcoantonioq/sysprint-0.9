<?php
App::uses('AppController', 'Controller');
/**
 * Jobs Controller
 *
 * @property Job $Job
 * @property PaginatorComponent $Paginator
 */
class UpdatesController extends AppController {

	public function beforeFilter(){
		parent::beforeFilter();
		$this->set('title_for_layout', __(ucfirst('Update')));
	}

	public function index() {	    
	    $command = "cd ".ROOT."/app/; git tag ";
		exec($command, $version);
		$this->set(compact('version'));
	}

	public function sync() {
		if ($this->request->is('post')) {

			$this->Update->AutoUpdate();

			echo $this->Session->setFlash("Atualização completa!(Backup salvo em $patch)", 'layout/success');
			return $this->redirect(array('action' => 'index'));
	    }

	}

}
