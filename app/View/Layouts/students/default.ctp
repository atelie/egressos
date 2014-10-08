<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Unifae - SGP</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <?php
            echo $this->Html->css('jquery-ui.css');
            echo $this->Html->css('/development-bundle/themes/smoothness/jquery-ui.css');
            echo $this->Html->css('bootstrap.min');
            echo $this->Html->css('font-awesome.min');
            echo $this->Html->css('AdminLTE');
            echo $this->Html->css('ionicons.min');

            echo $this->Html->script('jquery-1.9.1.js');
            echo $this->Html->script('jquery-ui.js');
            echo $this->Html->script('bootstrap.min.js');
        ?>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">       
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Right side column. Contains the navbar and content of the page -->
                <!-- Main content -->
                <section class="content">
                    <div class="well">
                        <?php echo $this->Session->flash(); ?>
                        <?php echo $this->fetch('content'); ?>
                    </div>
                    
                </section><!-- /.content -->
        </div><!-- ./wrapper -->

    </body>
</html>


