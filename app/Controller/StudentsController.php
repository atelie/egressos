<?php
class StudentsController extends AppController {
    public $helpers = array('Html', 'Form');
    public $components = array('Session');
    public $uses = array('Student','Course');

    public function index() {
        $this->Student->recursive = 0;
        $this->set('students', $this->paginate());
    }

    public function view($id = null) {
        $this->Student->id = $id;

        if (!$this->Student->exists()) {
            throw new NotFoundException(__('Egresso inválido!'));
        }

        $aluno = $this->Student->find('first',array(
        'conditions'=> array(
           'Student.id' => $id
            ),
        ));

        $nome_curso = $this->Course->find('first',array(
        'conditions'=> array(
           'Course.id' => $aluno['Student']['course_id']
            ),
        ));

        $this->set('nome_curso', $nome_curso);
        $this->set('student', $this->Student->read(null, $id));
    }

    public function add() {
        $this->set('courses', array('[Selecione]') + $this->Student->Course->find('list'));
        
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

    public function delete ($id){
        $this->Student->delete($id);
        $this->redirect(array(
            'controller' => 'users', 
            'action' => 'students_list'));
    }

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add');
        }
    }


    
    

    


?>
