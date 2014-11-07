<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package     app.Controller
 * @link        http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    
    public $components = array(
        'Session',

        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'users', 
                'action' => 'index'),

            'logoutRedirect' => array(
                'controller' => 'users', 
                'action' => 'login'),
        )
    );

    var $permissoes = array(
        'users' => array('logout' => true, 'change_pass' => true,'index' => true, 'students_list' => true, 'students_course' => true, 'search_by_course' => true, 'students_year' => true, 'search_by_year' => true, 'search_by_year_and_course' => true, 'students_course_year' => true),
        'students' => array('add' => true, 'view' => true, 'delete' => true),
        'courses' =>array('add'=>true)
    );
    
    public function beforeFilter() {
        parent::beforeFilter();
        $estaNaLogin = ($this->request->params['controller'] == 'users' AND $this->request->params['action'] == 'login');
        $eAdmin = $this->Auth->user('group');
        $this->set('eAdmin', $eAdmin);

        $professorTemPermissao = isset($this->permissoes[$this->request->params['controller']][$this->request->params['action']]);

        $userName = $this->Auth->user('nome');
        $this->set('nomeUser', $userName);

        if (!$estaNaLogin AND !$eAdmin AND !$professorTemPermissao) {
            $this->Session->setFlash(__('<script> alert("Permissão negada."); </script>', true));
            $this->redirect(array('controller' => 'users', 'action' => 'login'));
        }
    }
    
    

}