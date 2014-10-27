<?php
class CoursesController extends AppController {

    public $helpers = array('Html', 'Form');
    public $components = array('Session');
    public $uses = array('Course');

    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }   

    public function add() {
        if ($this->request->is('post')) {
            $this->Course->create();
            if ($this->Course->save($this->request->data)) {
                $this->Session->setFlash(__('<script> alert("Curso salvo com sucesso!"); </script>', true));
                $this->redirect(array('controller'=>'users','action' => 'index'));
            } else {
               $this->Session->setFlash(__('<script> alert("O curso não pode ser salvo."); </script>', true));
            }
        }
    }
}