
<?php 

	$continuar = array(
		'label' => 'Continuar',
		'class' => 'btn btn-primary'
		);

	$selecionaCursos = array(
		'label' => '',
		'class' => 'form-control',
		'id' => 'course_id'
		);

	?>


	<div class="wrap">
		<?php echo $this->Session->flash(); ?>

		<div align="center">			
			<h1>Busca por Curso</h1>
			
			<?php
			echo $this->Form->create('Users', array('action' => 'students_course'));
			
			echo $this->Form->input('course_id', $selecionaCursos);
			
			echo $this->Form->end($continuar);
			?>
		</div>
	</div>