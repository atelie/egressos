<?php
App::uses('AuthComponent', 'Controller/Component');
class Student extends AppModel {
    public $name = 'Student';
 
      
    public $validate = array(
        'name' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Digite o nome!'
            )
        ),
        'email' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Digite o email!'
            )
        ),
        'data_nasc' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Digite a data de aniversário!'
            ),
        ),
        'rua' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Digite a rua!'
            ),
        ),
        'numero' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Digite o número!'
            ),
        ),
        'bairro' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Digite o bairro!'
            ),
        ),
        'cidade' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Digite a cidade!'
            ),
        ),
        'estado' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Digite o Estado!'
            ),
        ),
        'pais' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Digite o país!'
            ),
        ),
        'complemento',

        'curso' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Escolha o curso!'
            ),
        ),
        'ano_conclusao' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Digite o ano de conclusão!'
            ),
        ),
        'empresa_atual' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Digite a empresa em que trabalha atualmente!'
            ),
        ),
        'cargo' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Digite o cargo na empresa!'
            ),
        ),
        'observacoes',   
    );

    public function beforeSave($options = array()){
        parent::beforeSave();
        $this->data['Student']['data_nasc'] = implode('-', array_reverse(explode('/', $this->data['Student']['data_nasc'])));
        return true;
    }

}
?>