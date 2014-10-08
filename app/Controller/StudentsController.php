<?php
class StudentsController extends AppController {

    public function index() {
        $this->Student->recursive = 0;
        $this->set('students', $this->paginate());
    }


    public function add() {
        $this->layout = 'students/default';
        if ($this->request->is('post')) {
            $this->Student->create();
            if ($this->Student->save($this->request->data)) {
                $this->Session->setFlash(__('<script> alert("Usuario salvo com sucesso!"); </script>', true));
                $this->redirect(array('action' => 'add'));
            } else {
               $this->Session->setFlash(__('<script> alert("O usuário não pode ser salvo."); </script>', true));
            }
        }
    }



   public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add');
        }
    }


    
    

    


?>
