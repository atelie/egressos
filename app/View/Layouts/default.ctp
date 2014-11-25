<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Egressos - Unifae</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <?php
            echo $this->Html->css('jquery-ui.css');
    		echo $this->Html->css('/development-bundle/themes/smoothness/jquery-ui.css');
    		echo $this->Html->css('bootstrap.min');
            echo $this->Html->css('font-awesome.min');
    		echo $this->Html->css('AdminLTE');
    		echo $this->Html->css('ionicons.min');
            echo $this->Html->css('application/home');

    		echo $this->Html->script('jquery-1.9.1.js');
    		echo $this->Html->script('jquery-ui.js');
    		echo $this->Html->script('bootstrap.min.js');
            echo $this->Html->script('AdminLTE/app.js');
            echo $this->Html->script('application/home.js');
            echo $this->Html->script('jquery.validate.min.js');
            echo $this->Html->script('jquery.maskedinput.js');


        ?>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">       
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <?php 
                $url = Router::url('/', true); 
                $tipo = 'users/index';
            ?>
            <a href="<?php echo $url.$tipo; ?>" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                   <img alt="sgp" src="<?php echo Router::url('/', true);?>img/sgp100.png" class="img-responsive" style="margin:0 auto; width:65px;" >     
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
              
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                      
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span> <?php echo $nomeUser; ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                              
                                
                                <!-- Menu Footer-->
                              
                                <li class="user-footer">
                                    <div class="pull-left">
                                    	<?php
					                      echo $this->Html->link(
					                         '<i class="fa fa-key"></i> Alterar senha',
					                          array(
					                              'controller'=>'users',
					                              'action'=>'change_pass',
					                          ),
					                          array(
					                              'escape'=>false,
					                               'class'=>'btn btn-default btn-flat'
					                          )
					                      );
					                    ?>

                                    </div>
                                    <div class="pull-right">
                                    	<?php
					                      echo $this->Html->link(
					                         '<i class="fa fa-power-off"></i> Sair',
					                          array(
					                              'controller'=>'users',
					                              'action'=>'logout',
					                          ),
					                          array(
					                              'escape'=>false,
					                              'class'=>'btn btn-default btn-flat'
					                          )
					                      );
					                    ?>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Right side column. Contains the navbar and content of the page -->

            <aside class="left-side sidebar-offcanvas">                
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="text-center info">
                            <p><?php echo $nomeUser; ?></p>
                        </div>
                    </div>
                    
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                   <!-- 
                     <li class="treeview">
                         <a href="#">
                             <i class="fa fa-user"></i>
                             <span> Usuário </span>
                             <i class="fa fa-angle-left pull-right"></i>
                         </a>
                         
                         <ul class="treeview-menu">            
                                
                                <li><a href="" class="fa fa-eye"></i> Visualizar meus dados</a></li>                               
                                <li><a href=""><i class="fa fa-edit"></i> Editar meus dados</a></li>
                                
                                <li><a href=""><i class="fa  fa-list"></i> Listar</a></li> 
                                
                                <li><a href=""><i class="fa fa-list"></i> Listagem de usuario</a></li>
                                
                        </ul>
                     </li>  
                     -->

                     <li class="treeview">
                         <a href="#">
                             <i class="fa fa-users"></i>
                             <span> Usuários </span>
                             <i class="fa fa-angle-left pull-right"></i>
                         </a>
                         
                         <ul class="treeview-menu">
                             <li>
                                <?php
                                  echo $this->Html->link(
                                     '<i class="fa fa-plus"></i> Cadastrar administrador',
                                      array(
                                          'controller'=>'users',
                                          'action'=>'add_adm',
                                      ),
                                      array(
                                          'escape'=>false 
                                      )
                                  );
                                ?>
                              </li>
                              <li>
                                <?php
                                  echo $this->Html->link(
                                     '<i class="fa fa-plus"></i> Cadastrar estagiário',
                                      array(
                                          'controller'=>'users',
                                          'action'=>'add_est',
                                      ),
                                      array(
                                          'escape'=>false 
                                      )
                                  );
                                ?>
                              </li>
                              <li>
                                <?php
                                  echo $this->Html->link(
                                     '<i class="fa fa-plus"></i> Gerenciar usuários',
                                      array(
                                          'controller'=>'users',
                                          'action'=>'manager',
                                      ),
                                      array(
                                          'escape'=>false 
                                      )
                                  );
                                ?>
                              </li>
                          </ul>
                      </li>


                     <li class="treeview">
                         <a href="#">
                             <i class="fa fa-user"></i>
                             <span> Egressos </span>
                             <i class="fa fa-angle-left pull-right"></i>
                         </a>
                         
                         <ul class="treeview-menu">            
                                <!--
                                <li><a href="" class="fa fa-eye"></i> Visualizar meus dados</a></li>                               
                                <li><a href=""><i class="fa fa-edit"></i> Editar meus dados</a></li>
                                
                                <li><a href=""><i class="fa  fa-list"></i> Listar</a></li> -->

                                <li>
                                <?php
                                  echo $this->Html->link(
                                     '<i class="fa fa-list"></i> Listagem todos',
                                      array(
                                          'controller'=>'users',
                                          'action'=>'students_list',
                                      ),
                                      array(
                                          'escape'=>false 
                                      )
                                  );
                                ?>
                                </li>

                                <li>
                                <?php
                                  echo $this->Html->link(
                                     '<i class="fa fa-list"></i> Listar por curso',
                                      array(
                                          'controller'=>'users',
                                          'action'=>'search_by_course',
                                      ),
                                      array(
                                          'escape'=>false 
                                      )
                                  );
                                ?>
                                </li>

                                <li>
                                <?php
                                  echo $this->Html->link(
                                     '<i class="fa fa-list"></i> Listar por ano de conclusão',
                                      array(
                                          'controller'=>'users',
                                          'action'=>'search_by_year',
                                      ),
                                      array(
                                          'escape'=>false 
                                      )
                                  );
                                ?>
                                </li>

                                <li>
                                <?php
                                  echo $this->Html->link(
                                     '<i class="fa fa-list"></i> Listar por ano e curso',
                                      array(
                                          'controller'=>'users',
                                          'action'=>'search_by_year_and_course',
                                      ),
                                      array(
                                          'escape'=>false 
                                      )
                                  );
                                ?>
                                </li>


                                
                        </ul>
                     </li>  

                      <li class="treeview">
                         <a href="#">
                             <i class="fa fa-mortar-board"></i>
                             <span> Cursos </span>
                             <i class="fa fa-angle-left pull-right"></i>
                         </a>
                         
                         <ul class="treeview-menu">
                             <li>
                                <?php
                                  echo $this->Html->link(
                                     '<i class="fa fa-plus"></i> Cadastrar curso',
                                      array(
                                          'controller'=>'courses',
                                          'action'=>'add',
                                      ),
                                      array(
                                          'escape'=>false 
                                      )
                                  );
                                ?>
                              </li>
                          </ul>
                      </li>


                    <li class="treeview">
                          <a href="#">
                              <i class="fa fa-desktop"></i>
                              <span>Desenvolvido por:</span>
                              <i class="fa fa-angle-left pull-right"></i>
                          </a>
                          <ul class="treeview-menu">                                           
                                 <li><div class="desenvolvimento"><a target="_blank" href="#"> </a></div></li> 
                                 <li align="center">
                                  Ateliê de Software - UNIFAE/Webgoal
                                 </li>                           
                          </ul>
                      </li>     

                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Main content -->
                <section class="content">
                    <div>
                        <?php echo $this->Session->flash(); ?>
						<?php echo $this->fetch('content'); ?>
                    </div>
                    
                </section><!-- /.content -->
            </aside>
        </div><!-- ./wrapper -->

    </body>
</html>


