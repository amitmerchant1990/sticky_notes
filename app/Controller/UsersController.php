<?php

/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class UsersController extends AppController {

    /**
     * Controller name
     *
     * @var string
     */
    public $name = 'Users';

    /**
     * Default helper
     *
     * @var array
     */
    public $helpers = array('Form', 'Html', 'Session');
    
    /**
     * This controller does not use a model
     *
     * @var array
     */
    public $uses = array('User');

    public function beforeFilter() {
        //parent::beforeFilter();
        $this->Auth->loginError = "Login error";
        $this->Auth->authError = "Auth error";
        
        //$this->Auth->fields =array('username' => 'username', 'password' => 'password');
       
        $this->Auth->loginRedirect = array('controller' => 'sticky', 'action' => 'index');
        $this->Auth->allow('add');
        
        /* To prevent black-holed POST requests */
        $this->Security->csrfCheck = false;
        $this->Security->validatePost = false;
    }
    
    public function index() {
        echo "Index page";
    }
    
    public function add() {
        $this->layout = 'login_default';
        if (!empty($this->request->data)) {
            
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('User created!');
                $this->redirect(array('action' => 'login'));
            } else {
                $this->Session->setFlash('Please correct the errors');
            }
        }
    }

    public function login() {
        $this->layout = 'login_default';
        if ($this->Auth->login()) {
            //return $this->redirect($this->Auth->redirectUrl());
            return $this->redirect($this->Auth->redirect());
        } else {
            $this->Session->setFlash(__('Username or password is incorrect'), 'default', array(), 'auth');
        }
    }

    public function logout() {
        //$this->Session->setFlash('logout');
        $this->redirect($this->Auth->logout());
    }

}
