<?php
    
    $Enviar = array(
    'label' => 'Enviar',
    'class' => 'btn-block btn-primary'
    );
?>

                                <div class="box-header">
                                    <h1>Cadastro de Egresso</h1>
                                </div><!-- /.box-header -->

                                <div class="right">
                                  <p>
                                      Campos marcados com * são obrigatórios.
                                  </p>
                                </div>
                                <!-- form start -->
                                <?php echo $this->Form->create('Student');?>
                                    <div class="box-body">

                                    <div class="form-group">
                                            <?php 
                                                  echo $this->Form->input('nome', array(
                                                  'label' => 'Nome completo: *',
                                                  'class'=>'form-control'));
                                            ?>
                                        </div>
                                     
                                        <div class="form-group">
                                            <?php 
                                                  echo $this->Form->input('data_nasc', array(
                                                  'type' => 'text',
                                                  'label' => 'Data Nascimento: *',
                                                  'placeholder' => 'dd/mm/aaaa',
                                                  'class'=>'form-control'));
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <?php 
                                                  echo $this->Form->input('rua', array(
                                                  'label' => 'Rua: *',
                                                  'class'=>'form-control'));
                                            ?>
                                        </div>
                                         <div class="form-group">
                                            <?php 
                                                  echo $this->Form->input('numero', array(
                                                  'label' => 'Numero: *',
                                                  'class'=>'form-control'));
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <?php 
                                                  echo $this->Form->input('bairro', array(
                                                  'label' => 'Bairro: *',
                                                  'class'=>'form-control'));
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <?php 
                                                  echo $this->Form->input('cidade', array(
                                                  'label' => 'Cidade: *',
                                                  'class'=>'form-control'));
                                            ?>
                                        </div>
                                            <div class="form-group">
                                            <?php 
                                                  echo $this->Form->input('estado', array(
                                                  'label' => 'Estado: *',
                                                  'class'=>'form-control'));
                                            ?>
                                        </div>
                                            <div class="form-group">
                                            <?php 
                                                  echo $this->Form->input('pais', array(
                                                  'label' => 'Pais: *',
                                                  'class'=>'form-control'));
                                            ?>
                                        </div>
                                        </div>
                                            <div class="form-group">
                                            <?php 
                                                  echo $this->Form->input('complemento', array(
                                                  'label' => 'Complemento:',
                                                  'class'=>'form-control'));
                                            ?>
                                        </div>
                                            <div class="form-group">
                                            <?php 
                                                  echo $this->Form->input('telefone', array(
                                                  'label' => 'Telefone:',
                                                  'class'=>'form-control'));
                                            ?>
                                        </div>
                                                  <div class="form-group">
                                            <?php 
                                                  echo $this->Form->input('celular', array(
                                                  'label' => 'Celular: *',
                                                  'class'=>'form-control'));
                                            ?>
                                        </div>
                                         <div class="form-group">
                                            <?php 
                                                  echo $this->Form->input('email', array(
                                                  'label' => 'E-mail: *',
                                                  'class'=>'form-control'));
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <?php 
                                                  echo $this->Form->input('curso', array(
                                                  'label' => 'Curso: *',
                                                  'class'=>'form-control'));
                                            ?>
                                        </div>
                                       <div class="form-group">
                                            <?php 
                                                  echo $this->Form->input('ano_conclusao', array(
                                                  'label' => 'Ano de Conclusão: *',
                                                  'class'=>'form-control'));
                                            ?>
                                        </div>
                                             <div class="form-group">
                                            <?php 
                                                  echo $this->Form->input('posgrad', array(
                                                  'label' => 'Pós Graduação:',
                                                  'class'=>'form-control'));
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <?php 
                                                  echo $this->Form->input('empresa', array(
                                                  'label' => 'Empresa: *',
                                                  'class'=>'form-control'));
                                            ?>
                                        </div>
                                       <div class="form-group">
                                            <?php 
                                                  echo $this->Form->input('cargo', array(
                                                  'label' => 'Cargo: *',
                                                  'class'=>'form-control'));
                                            ?>
                                        </div>
                                       <div class="form-group">
                                            <?php 
                                                  echo $this->Form->input('observacoes', array(
                                                  'label' => 'Observações:',
                                                  'class'=>'form-control'));
                                            ?>
                                        </div>
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                    <?php echo $this->Form->end($Enviar);?> 
                                   </div>
                             