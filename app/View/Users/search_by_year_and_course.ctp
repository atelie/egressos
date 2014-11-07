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
			<h1>Busca por Curso e Ano de Conclusão</h1>
			
			<?php

			echo $this->Form->create('User', array('action' => 'students_course_year'));
			
			echo $this->Form->input('course_id', $selecionaCursos);
			
			echo $this->Form->input('ano_conclusao', 
				 array('label' => 'Ano de Conclusão: ',
				 	   'class'=>'form-control'
		    ));
			?>
		</div>
		<div align="center" class="botao-espaco">
			<?php
				echo $this->Form->end($continuar);
			?>
		</div>

	</div>