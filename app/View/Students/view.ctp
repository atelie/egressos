
<div class="col-md-12">
	<!-- Warning box -->
	<div class="box box-solid box-success">
		<div class="box-header">
			<h3 class="box-title">Dados do egresso <?php echo $student['Student']['nome']; ?></h3>
		</div>
		<div class="box-body">
			<div class="row center-block">
				<div>
					<p><strong>Dados pessoais</strong></p>
					<div class="col-lg-6 col-md-6 col-sm-6"> 
						<p>
							<strong>Nome:</strong>
							<?php echo $student['Student']['nome']; ?>
						</p>  
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6"> 
						<p>
							<strong>Data de nascimento:</strong>
							<?php echo $student['Student']['data_nasc']; ?>
						</p>  
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6"> 
						<p>
							<strong>Telefone:</strong>
							<?php echo $student['Student']['telefone']; ?>
						</p>  
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6"> 
						<p>
							<strong>Celular:</strong>
							<?php echo $student['Student']['celular']; ?>
						</p>  
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12"> 
						<p>
							<strong>E-mail:</strong>
							<?php echo $student['Student']['email']; ?>
						</p>  


					</div>
				
				<p><strong>Endereço</strong></p>
				<div class="col-lg-6 col-md-6 col-sm-6"> 
					<p>
						<strong>Rua:</strong>
						<?php echo $student['Student']['rua']; ?>
					</p>  
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6"> 
					<p>
						<strong>Número:</strong>
						<?php echo $student['Student']['numero']; ?>
					</p>  
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6"> 
					<p>
						<strong>Bairro:</strong>
						<?php echo $student['Student']['bairro']; ?>
					</p>  
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6"> 
					<p>
						<strong>Cidade:</strong>
						<?php echo $student['Student']['cidade']; ?>
					</p>  
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6"> 
					<p>
						<strong>Estado:</strong>
						<?php echo $student['Student']['estado']; ?>
					</p>  
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6"> 
					<p>
						<strong>País:</strong>
						<?php echo $student['Student']['pais']; ?>
					</p>  
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12"> 
					<p>
						<strong>Complemento:</strong>
						<?php echo $student['Student']['complemento']; ?>
					</p>  
				</div>

				<p><strong>Informações Profissionais</strong></p>
				<div class="col-lg-6 col-md-6 col-sm-6"> 
					<p>
						<strong>Curso:</strong>
						<?php echo $student['Student']['curso']; ?>
					</p>  
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6"> 
					<p>
						<strong>Ano de conclusão:</strong>
						<?php echo $student['Student']['ano_conclusao']; ?>
					</p>  
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6"> 
					<p>
						<strong>Pós graduação:</strong>
						<?php echo $student['Student']['posgrad']; ?>
					</p>  
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6"> 
					<p>
						<strong>Empresa:</strong>
						<?php echo $student['Student']['empresa']; ?>
					</p>  
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6"> 
					<p>
						<strong>Cargo:</strong>
						<?php echo $student['Student']['cargo']; ?>
					</p>  
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6"> 
					<p>
						<strong>Observação:</strong>
						<?php echo $student['Student']['observacoes']; ?>
					</p>  
				</div>
			</div>




		</div><!-- /.box-body -->
	</div><!-- /.box -->

</div>


</div>

