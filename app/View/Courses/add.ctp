<?php
    
    $Salvar = array(
    'label' => 'Salvar',
    'class' => 'btn btn-primary '
    );
?>

                                <div class="box-header">
                                    <h1>Cadastrar Curso</h1>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <?php echo $this->Form->create('Course');?>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <?php 
                                                  echo $this->Form->input('name', array(
                                                  'label' => 'Nome:',
                                                  'class'=>'form-control'));
                                            ?>
                                        </div>
                                  

                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                    <?php echo $this->Form->end($Salvar);?> 
                                   </div>
                             