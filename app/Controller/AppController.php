<?php

App::uses('Controller', 'Controller');


class AppController extends Controller {

/**
 * Application Controller
 *
 * @var array
 */
    public $components = array(
        'Paginator',
        'RequestHandler',
        'Security' => array(
            'csrfUseOnce' => false,
            "validatePost" => false,
            "enabled" => false,
            "csrfCheck" => false,
        ),
        'Session',
        'Auth' => array(
            'authenticate' => array(
                'Form' => array(
                    'fields' => array(
                        'username' => 'username',
                        'password' => 'password'
                    ),
                    'scope'  => array(
                        'User.status' => 1
                    )
                )
            ),
            // /*
            'authError' => 'Autenticação ou elevação de nível requerida',
            'authorize' => array('Controller'),
            'loginAction' => array(
                'plugin' => false,
                'app'=>true,
                'controller' => 'users',
                'action' => 'login'
            ),
            'loginRedirect' => array('plugin' => false, 'controller' => 'users', 'action' => 'login'),
            'logoutRedirect' => array('plugin' => false, 'controller' => 'users', 'action' => 'login'),
            // */
        )
    );

    public function beforeFilter() {
        $this->Security->validatePost = false;

        if( !empty($this->request->params['prefix']) && $this->request->params['prefix'] == 'app') {
            $this->layout = 'user';
        } else {
            $this->layout = 'admin';
        }

        if (Configure::read("Setting.force_https") && !env('HTTPS')){
            $this->Security->blackHoleCallback = 'forceSSL';
            $this->Security->requireSecure();
        }

        if($this->request->is('ajax')){
            $this->layout='reload';
        }

        
        if (Configure::read("Setting.force_https")){
            return $this->redirect('https://' . env('SERVER_NAME') . $this->here);
        }
        
        if( !Configure::read("Setting.auth")){
            $this->Auth->allow();
        }
    }

    public function forceSSL() {
        if (!env('HTTPS')){
            // return $this->redirect('https://' . env('SERVER_NAME') . $this->here);
        }
    }

    public function isAuthorized($user = null){

        if( $user['admin'] ){
            return true;
        }

        if( !empty($this->request->params['prefix'])) {
            if($this->request->params['prefix'] == 'app')
                return true;
        }
        // return true;
        return false;
    }

    public function status($id, $status = null, $action="status"){
        if($this->request->is("ajax")){
            // $id = $this->request->params['pass'][0];
            // $status = $this->request->params['pass'][1];
            // $action = $this->request->params['pass'][2];
            $model = $this->modelClass;
            $this->$model->statusAjax($id, $status, $action);
            $this->layout = "ajax";
            $this->render("/Common/ajax");
            return true;
        }
        $this->redirect($this->referer());
    }

}
