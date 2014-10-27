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
			<h1>Busca por Ano</h1>
			
			<?php
			echo $this->Form->create('User', array('action' => 'students_year'));
			
			echo $this->Form->input('ano_conclusao', 
				 array('label' => 'Ano de Conclusão: ',
				 	   'class'=>'form-control'
		    ));
			
			echo $this->Form->end($continuar);
			?>
		</div>
	</div>