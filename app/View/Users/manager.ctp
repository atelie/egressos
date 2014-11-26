
<table class="table table-striped">
  <thead>
    <tr>
      <th class="text-info"> <i class="fa fa-barcode"></i> 
        Nome
      </th>
      <th class="text-info"> <i class="fa fa-user"></i>
        Login
      </th>
      <th class="text-info"> <i class="fa fa-user"></i>
        Email
      </th>
      <th class="text-info"> <i class="fa fa-envelope"></i>
        Nível
      </th>
      <th>Opções</th>


    </tr>
  </thead>

  <tbody>
    <?php foreach ($usuarios as $usu): ?>   
      <tr>

        <td><?php echo $usu['User']['name']; ?></td>
        <td><?php echo $usu['User']['username']; ?></td>
        <td><?php echo $usu['User']['email']; ?></td>
        <td>
           <?php 
              echo ($usu['User']['group'] == 1)? "Administrador":"EStagiário"; 
             ?>
        </td>
        <td>
          <div class="btn-toolbar">
            <div>

              <a href="../users/delete/<?php echo $usu['User']['id'];?>" data-original-title="Excluir" rel="tooltip" data-toggle="excluir" data-placement="top" class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a>
            </div>  
          </div>
        </td>
      </tr>   
    <?php endforeach; ?>  
  </tbody>
</table>



