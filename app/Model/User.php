<?php
App::uses('AuthComponent', 'Controller/Component');
class User extends AppModel {
    public $name = 'User';
 
      
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Digite o registro!'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Digite a senha!'
            )
        ),
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
        'confirm_password' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Campo obrigatório',
                'required' => false,
            ),
            'Match passwords'=>array(
                'rule' => 'matchPasswords',
                'message' => 'Senha/Confirmação da Senha não são iguais'
            )
        ),
       
    );

    public function beforeSave($options = array()) {
    
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
    }



    public function matchPasswords() {
        $senhas = $this->data['User'];
        return ($senhas['password'] == $senhas['confirm_password']);
    }
}
?>