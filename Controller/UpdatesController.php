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

		if ($this->request->is('post'))
		{
			$return = $this->Update->AutoUpdate();
			echo $this->Session->setFlash("Atualização completa! (Backup salvo em tmp)", 'layout/success');
	    }

		$command = "cd ".ROOT."/app/; git tag | tail -n 1";
		exec($command, $version);

		$this->set(compact('version', 'return'));
	}
}
