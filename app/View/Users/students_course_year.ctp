
<table class="table table-striped">
	<thead>
		<tr>
			<th class="text-info"> <i class="fa fa-barcode"></i> 
				Nome
			</th>
			<th class="text-info"> <i class="fa fa-user"></i>
				Email
			</th>
			<th class="text-info"> <i class="fa fa-envelope"></i>
				Empresa
			</th>
			<th class="text-info"> <i class="fa fa-tty"></i> Curso</th>
			<th>Opções</th>


		</tr>
	</thead>

	<tbody>
		<?php foreach ($students as $student): ?>		
			<tr>

				<td><?php echo $student['Student']['nome']; ?></td>
				<td><?php echo $student['Student']['email']; ?></td>
				<td>
					<?php echo $student['Student']['empresa']; ?>
				</td>
				<td><?php echo $curso; ?></td>
				<td>
					<div class="btn-toolbar">
						<div>

							<a href="../students/view/<?php echo $student['Student']['id'];?>" data-original-title="Visualizar" rel="tooltip" data-toggle="modal" data-placement="top" class="btn btn-primary btn-circle"><i class="fa fa-eye"></i></a>



							<a href="../students/delete/<?php echo $student['Student']['id'];?>" data-original-title="Excluir" rel="tooltip" data-toggle="excluir" data-placement="top" class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a>


						</div>	
					</div>



				</td>



			</tr>   
		<?php endforeach; ?>	
	</tbody>
</table>



