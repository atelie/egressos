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

    public function search_by_year_and_course(){
        $this->set('courses', array('[SELECIONE O CURSO]') + $this->Course->find('list'));
    }

    public function students_course(){

        if ($this->request->is('post')) { 

                $id_busca = $this->request->data['User']['course_id'];

                if ($id_busca == '0') {
                    $this->Session->setFlash(__('<script> alert("Selecione o curso!"); </script>',true));
                    $this->redirect(array('action' => 'search_by_course'));
                } else {
                    $course = $this->Course->find('first', 
                    array( 'conditions' => array('Course.id' => $id_busca)));
                    $course_name = $course['Course']['name'];
                    $this->set('curso', $course_name);

                    $this->set('students', $this->Student->find('all', array(
                    'conditions' => array('Student.course_id' => $id_busca),
                    'order' => array('Student.nome asc')

                    )));
                }

            }else {
                $this->redirect(array('action' => 'search_by_course'));
            }
    }

    public function students_course_year(){

        if ($this->request->is('post')) { 

                $id_busca = $this->request->data['User']['course_id'];
                $ano_conclusao = $this->request->data['User']['ano_conclusao'];

                if ($id_busca == '0' OR $ano_conclusao == null) {
                    $this->Session->setFlash(__('<script> alert("Selecione o curso e/ou ano!"); </script>',true));
                    $this->redirect(array('action' => 'search_by_year_and_course'));
                } else {
                    $course = $this->Course->find('first', 
                    array( 'conditions' => array('Course.id' => $id_busca)));
                    $course_name = $course['Course']['name'];
                    $this->set('curso', $course_name);

                    $students = $this->Student->find('all', array(
                    'conditions' => array(
                        'Student.course_id' => $id_busca,
                        'AND' =>array('Student.ano_conclusao' => $ano_conclusao)
                        ),
                    'order' => array('Student.nome asc')
                    ));

                    if($students == null){
                        $this->Session->setFlash(__('<script> alert("Não existem egressos deste ano e curso cadastrados!"); </script>', true));
                        $this->redirect(array('action' => 'search_by_year_and_course'));
                    }

                    $this->set('students', $students);

                }

            }else {
                $this->Session->setFlash(__('<script> alert("Não existem egressos deste ano e curso cadastrados!"); </script>', true));
                $this->redirect(array('action' => 'search_by_year_and_course'));
            }
    }


    public function students_year(){
       
       if ($this->request->is('post')) { 

                $ano_conclusao = $this->request->data['User']['ano_conclusao'];              
                $students = $this->Student->find('all', array(
                'conditions' => array('Student.ano_conclusao' => $ano_conclusao),
                'order' => array('Student.nome asc')
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

        $students = $this->Student->find('all',array(
            'order' => array('Student.nome asc')));
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

    public function add_adm() {
        if ($this->request->is('post')) {
            $this->User->create();
            $this->request->data['User']['group'] = 1;
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('<script> alert("Usuario salvo com sucesso!"); </script>', true));
                $this->redirect(array('action' => 'index'));
            } else {
               $this->Session->setFlash(__('<script> alert("O usuário não pode ser salvo."); </script>', true));
            }
        }
    }

    public function add_est() {
        if ($this->request->is('post')) {
            $this->User->create();
            $this->request->data['User']['group'] = 0;
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('<script> alert("Usuario salvo com sucesso!"); </script>', true));
                $this->redirect(array('action' => 'index'));
            } else {
               $this->Session->setFlash(__('<script> alert("O usuário não pode ser salvo."); </script>', true));
            }
        }
    }

    public function manager() {

        $usuarios = $this->User->find('all',array(
            'order' => array('User.name asc')));
       
        $this->set('usuarios', $usuarios);
    }

    public function delete ($id){

        $this->User->delete($id);
        $this->Session->setFlash(__('<script> alert("O usuário foi excluído com sucesso!"); </script>', true));
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
