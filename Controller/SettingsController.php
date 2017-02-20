<?php
App::uses('AppController', 'Controller');

class SettingsController extends AppController {

	public function beforeFilter(){
		parent::beforeFilter();
	}

	public function index() {
		if ($this->request->is('post')) {
			$this->Setting->create();
			if(!empty($this->request->data)) {
				$this->Setting->writejson($this->request->data);
			}
		} else {
			// pr($this->Setting->readjson());
			$this->request->data = $this->Setting->readjson();
		}
	}

	public function restart($service = null){
		$this->render(false);
		if ($this->request->is('post')) {

			// $user = $this->request->data['Setting']['user'];
			// $pass = $this->request->data['Setting']['pass'];

			if ($service == "ifprint") {
				// $user="root";
				// $pass ="";

				// // remove do crontab
				// $cmd = "echo {$pass} | su - {$user} -c \"sed -i '/Command\/shell\/service/d' /etc/crontab\"";
				// exec($cmd, $result);

				// // add crontab
				// $cmd = "echo {$pass} | su - {$user} -c \"echo '*/1 * * * * root /opt/lampp/htdocs/prints/app/Console/Command/shell/service'>> /etc/crontab \"";
				// exec($cmd, $result);
				// pr($result);
				// exit;
			}

			$this->Session->setFlash('Services start', 'layout/success');
		}

		// $this->redirect($this->referer());
	}

	public function dbbackup($id = null) {

		if (!$this->statusConectionAD()) {
			throw new NotFoundException(__('Banco de dados não configurado!'));
		}
		$this->request->onlyAllow('post', 'delete');
		pr($this->request->data); exit;
		return $this->redirect(array('action' => 'index'));

	}

	public function statusConectionAD($id = null) {

        $this->layout = "ajax";
        $this->render("/Common/ajax");
		if($this->request->is("ajax")){
			if(!empty($this->request->data['Setting'])) {
				$data['Setting'] = $this->request->data['Setting'];
				$data['Setting']['AD'] = $this->request->data['AD'];
				$data['Setting']['EMAIL'] = $this->request->data['EMAIL'];
				$data['Setting']['DATA'] = $this->request->data['DATA'];
				$this->Setting->writejson($data);
			}
			if($this->Setting->testConect()){
				$this->Session->setFlash('Conectado :)', 'layout/success');
				echo "Conectado :)";
				return true;
			} else {
				$this->Session->setFlash('Não conectado', 'layout/success');
				echo "Não conectado";
			}
			return false;
        }
        $this->redirect($this->referer());
	}
}
