<?php
    
    $Salvar = array(
    'label' => 'Salvar',
    'class' => 'btn btn-primary '
    );
?>

                                <div class="box-header">
                                    <h1>Cadastrar estagiário</h1>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <?php echo $this->Form->create('User');?>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <?php 
                                                  echo $this->Form->input('name', array(
                                                  'label' => 'Nome:',
                                                  'class'=>'form-control'));
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <?php 
                                                  echo $this->Form->input('username', array(
                                                  'label' => 'Login:',
                                                  'class'=>'form-control'));
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <?php 
                                                  echo $this->Form->input('password', array(
                                                  'label'=>'Senha', 'type' => 'password',
                                                  'class'=>'form-control'));
                                            ?>
                                        </div>
                                       <div class="form-group">
                                            <?php 
                                                  echo $this->Form->input('confirm_password', 
                                                  array('label'=>'Confirmação da senha',
                                                  'type' => 'password',
                                                  'class'=>'form-control'));
                                            ?>
                                        </div>
                                         <div class="form-group">
                                            <?php 
                                                  echo $this->Form->input('email', array(
                                                  'label' => 'E-mail:',
                                                  'class'=>'form-control'));
                                            ?>
                                        </div>

                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                    <?php echo $this->Form->end($Salvar);?> 
                                   </div>
                             