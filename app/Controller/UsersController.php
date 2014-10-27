<?php
class UsersController extends AppController {

    public $helpers = array('Html', 'Form');
    public $components = array('Session');
    public $uses = array('User', 'Student', 'Course');

    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function search_by_course(){
        $this->set('courses', array('[SELECIONE O CURSO]') + $this->Course->find('list'));
    }

    public function search_by_year(){

    }

    public function students_course(){

        if ($this->request->is('post')) { 

                $id_busca = $this->request->data['Users']['course_id'];

                if ($id_busca == '0') {
                    $this->Session->setFlash(__('<script> alert("Selecione o curso!"); </script>',true));
                    $this->redirect(array('action' => 'search_by_course'));
                } else {
                    $course = $this->Course->find('first', 
                    array( 'conditions' => array('Course.id' => $id_busca)));
                    $course_name = $course['Course']['name'];
                    $this->set('curso', $course_name);

                    $this->set('students', $this->Student->find('all', array(
                    'conditions' => array('Student.course_id' => $id_busca)
                    )));
                }

            }else {
                $this->redirect(array('action' => 'search_by_course'));
            }
    }


    public function students_year(){
       
       if ($this->request->is('post')) { 

                $ano_conclusao = $this->request->data['User']['ano_conclusao'];              
                $students = $this->Student->find('all', array(
                'conditions' => array('Student.ano_conclusao' => $ano_conclusao)
                ));

                $contador = 0;
                foreach ($students as $key => $student) {
                  $lista_cursos[$contador] = $this->Course->find('first',array(
                  'conditions'=> array(
                    'Course.id' => $student['Student']['course_id']
                     ),
                  ));
                  $contador++;
               }
               $this->set('students', $students);
               $this->set('cursos', $lista_cursos);

               if($students == null){
                    $this->Session->setFlash(__('<script> alert("Não existem egressos deste ano cadastrados!"); </script>', true));
                    $this->redirect(array('action' => 'search_by_year'));
               }


            }else {
                $this->redirect(array('action' => 'search_by_year'));
            }
    }

    public function students_list(){
        $lista_cursos = array();

        $students = $this->Student->find('all');
        $contador = 0;
        foreach ($students as $key => $student) {
            $lista_cursos[$contador] = $this->Course->find('first',array(
                'conditions'=> array(
                   'Course.id' => $student['Student']['course_id']
                    ),
                ));
            $contador++;
        }
        $this->set('students', $students);
        $this->set('cursos',$lista_cursos);
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuário inválido!'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('<script> alert("Usuario salvo com sucesso!"); </script>', true));
                $this->redirect(array('action' => 'add'));
            } else {
               $this->Session->setFlash(__('<script> alert("O usuário não pode ser salvo."); </script>', true));
            }
        }
    }

    public function delete ($id){

        $this->User->delete($id);
        $this->redirect(array(
                            'controller' => 'users', 'action' => 'manager'));

    }

    function edit ($id){

        if (empty($this->data)) {
            $this->data = $this->User->find('first', array('conditions' => array('id' => $id)));
            
        }
        else{
                $this->User->save($this->data);
                $this->redirect('manager');
        }

    }

    public function change_pass() {
        $this->User->recursive = 0;
 
        if (!empty($this->data)) {
 
            $this->User->id = $this->Session->read('Auth.User.id');
 
            if ($this->User->save($this->data)) {
                $this->Session->setFlash(__('<script> alert("Senha alterada com sucesso!"); </script>', true));
                $this->redirect(array('controller' => 'reservations', 'action' => 'add'));
            } else {
                $this->Session->setFlash(__('<script> alert("As duas senhas não conferem! Tente novamente."); </script>', true));
            }
        }
 
        $this->data = $this->User->read(null, $this->Session->read('Auth.User.id'));
    }

    
    public function beforeFilter() {
        parent::beforeFilter();
    }


    public function login(){

        $this->layout = 'login/default';

        if ($this->Auth->login()) {
            if ($this->Auth->user('group')) {
                $this->redirect(array('controller' => 'users', 'action' => 'index'));   
            }
            else {
                $this->redirect(array('controller' => 'users', 'action' => 'index'));
            }
            
        }
        elseif (empty($this->data)) {
            return;
        } else {   
            $this->Session->setFlash(__('<script> alert("Usuário ou senha inválidos."); </script>', true));
            $this->request->data = null;
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }


}
?>
