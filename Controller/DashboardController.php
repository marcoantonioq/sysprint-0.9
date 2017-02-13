<?php
App::uses('AppController', 'Controller');
/**
 * Archives Controller
 *
 * @property Archive $Archive
 * @property PaginatorComponent $Paginator
 */
class DashboardController extends AppController {

	public function beforeFilter(){
		parent::beforeFilter();
	}

	public function index() {
		$infoSystem = $this->Dashboard->info();
		$this->set(compact('infoSystem'));
	}
}
