<?php
// App::uses('ShellDispatcher', 'Console');
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

	public $components = array('Paginator');

	public function beforeFilter(){
		parent::beforeFilter();
		$this->set('title_for_layout', __(ucfirst('users')));
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		if ($this->request->is('post')) {
	        $this->Paginator->settings = $this->User->action($this->request->data);
	        echo $this->Session->setFlash('Filtro definido!', 'layout/success');
    	}
		$this->User->recursive = 1;
		$groups = $this->User->Group->find('list');
		$users = $this->Paginator->paginate();
		$this->set(compact('groups', 'users'));
	}

	public function syc() {
		$this->render(false);
		$this->User->recursive = 0;
		$this->User->recursive = -1;
		$users = $this->User->find("all");
		$users = $this->User->sycAD($users);
		$this->redirect($this->referer());
	}

	public function app_login() {
		$this->forceSSL();
	    $this->layout = "login";
        if ($this->request->is('post')) {
        	$this->User->AuthAD($this->request->data); // login AD
            if ($this->Auth->login()) {
                $this->Session->setFlash('Logado com sucesso.', 'layout/success');
                return $this->redirect(array('controller' => 'printers', 'action'=>'index'));
            } else {
                $this->Session->setFlash('Senha incorreta ou usuário bloqueado!');
            }

        }
    }

    function app_logout() {
        $this->Session->setFlash('Até logo!', 'layout/success');
    	$this->redirect($this->Auth->logout());
    }

	public function printerCount($id) {
		$this->layout = "ajax";
		$this->render("/Users/ajax");

		if($this->request->is("ajax")){
			$jobs = $this->User->Job->find("all",array(
				// "recursive"=>-1,
				"conditions"=>array(
					"Job.user_id"=>$id
				)
			));
			echo (isset($jobs['Results']['total']))?$jobs['Results']['total']:0;
            return true;
        }
        $this->redirect($this->referer());

	}

	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Inválido user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$user = $this->User->find('first', $options);

		$prints = $this->User->Job->Printer->find('list');

		$this->set(compact('user', 'prints'));
	}

	public function app_index($id = null) {
		$id = $this->Session->read('Auth.User.id');
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Inválido user'));
		}

		$options = array('conditions' => array('User.id' => $id));
		$user = $this->User->find('first', $options);

		$prints = $this->User->Job->Printer->find('list');

		$this->set(compact('user', 'prints'));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			// pr($this->request->data);
			// exit;

			if ($this->User->save($this->request->data)) {
				$user = $this->User->find("first", array(
					'recursive' => -1,
					'conditions'=>array('User.username'=> $this->request->data['User']['username'])
				));
				$user = $this->User->sycAD(array('0'=>$user));

				$this->Session->setFlash(__('Foi salvo.'), 'layout/success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Não pôde ser salvo. Por favor, tente novamente.'), 'layout/error');
			}
		}
		$printers = $this->User->Printer->find('list');
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups', 'printers'));
	}


	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Inválido user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Foi salvo.'), 'layout/success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Não pôde ser salvo. Por favor, tente novamente.'), 'layout/error');
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$groups = $this->User->Group->find('list');
		$printers = $this->User->Printer->find('list');
		$this->set(compact('groups', 'printers'));
	}

	public function password($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException('Usuário inválido!');
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Foi salvo.'), 'layout/success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Não pôde ser salvo. Por favor, tente novamente.'), 'layout/error');
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}

	}

	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Inválido user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {

			$this->Session->setFlash(__('Foi excluído.'), 'layout/success');
		} else {
			$this->Session->setFlash(__('Não foi excluído. Por favor, tente novamente.'), 'layout/error');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
