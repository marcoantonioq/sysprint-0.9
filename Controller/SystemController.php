<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class SystemController extends AppController {

	var $uses = false;

/**
 * index method
 *
 * @return void
 */
	public function index() {
		// exit;
		echo "<pre>".shell_exec("ls -l; pwd")."</pre>";
		$page_log = file("/tmp/Teste.txt");
		foreach ($page_log as $key => $log) {
			echo $log;
		}
		exit;

	}
}
