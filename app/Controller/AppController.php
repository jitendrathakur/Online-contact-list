<?php
class AppController extends Controller {
    public $components = array(
        'Acl',
        'Auth' => array(
            'authorize' => array(
                'Actions' => array('actionPath' => 'controllers')
            )
        ),
        'Session'
    );
    public $helpers = array('Html', 'Form', 'Session');

    public function beforeFilter() {
        //Configure AuthComponent
        if ($this->Auth->user('id')) {
          $this->Auth->allow(array('*'));
        } else {
          $this->Auth->allow(array('login','logout', 'register'));
        }
        //$this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
        //$this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
        $this->Auth->loginRedirect = array('controller' => 'homes', 'action' => 'index');
       
        $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');

        $this->Auth->autoRedirect = false;
    }
}
