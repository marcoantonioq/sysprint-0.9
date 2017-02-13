<?php
App::uses('AppController', 'Controller');
/**
 * Jobs Controller
 *
 * @property Job $Job
 * @property PaginatorComponent $Paginator
 */
class UpdateController extends AppController {

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
			
			// Backup
			$command = "mkdir ".ROOT."/app/tmp/backup_`date +%Y-%m-%d_%H`; cp -rf ".ROOT."/app/{Config,Controller,Vendor,Model,View,Console,webroot} ".ROOT."/app/tmp/backup_`date +%Y-%m-%d_%H`";
			exec($command, $result, $error);

			// Repositorio gitHub
			exec( "cd ".ROOT."/app/ && git reset --hard HEAD && git pull" );

			echo $this->Session->setFlash('Atualização completa!', 'layout/success');
			return $this->redirect(array('action' => 'index'));
	    }

	}

}
