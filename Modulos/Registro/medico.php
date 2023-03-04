<?php

include "Modulos/conexion.php";
//include('conexion/verificar_gestion.php');
session_start();
/*------------------verificar que sea administrador------------------------*/
$tipousuario = $_SESSION['tipo'];

if(isset($_SESSION['usuario']) && $_SESSION['tipo']!=2)
{/*SI EL QUE INGRESO A NUESTRA PAGINA ES CONSULTOR DE CUALQUIER TIPO*/
        $home="";
        switch  ($_SESSION['tipo']){
                case (4) :
                    $home="Modulos/cliente/principal_cliente.php";
                        break;
                case (3) :
                    $home="Modulos/Dispensacion/principal_dispensacion.php";
                        break;
                case (1) :
                    $home="Modulos/superusuario/principal_sudo.php";
                        break;  
                                                                            
              }   
        echo "<script> window.Location: .$home </script>";
}
elseif(!isset($_SESSION['usuario'])){
    header("Location: /sistema_clinica/index.php");
}
/*------------------fin verificador administrador------------------------*/ 
       

if(isset ($_POST['a_nuevo_medico'])){
$name=trim($_POST['name_med']);
$estado_medico = $_POST['estadomedico'];
$especialidad = $_POST['especialidad'];
$fecha_reg_med=$_POST['fecha_registro_medico'];
//$con=claves($pass);    
    

    $consulta_medico = mysql_query("SELECT * from medico 
                             where nombre_medico='$name'",$conexion)
                             or die("Could not execute the select query.");                         

    $resultado_medico = mysql_fetch_assoc($consulta_medico);
    $error=false;
    
if(is_array($resultado_medico) && !empty($resultado_medico))//ya existe usuario
        {     
              if (strcmp($resultado_medico['nombre_medico'],$name)==0) { 
                      $error_med="El medico con este nomrbe ya existe";
                      $error=true;
               }   
      
         }


 if(!$error){
    $sql = "INSERT INTO `medico`(`nombre_medico`,`id_estado_med`,`id_especialidad_med`,`fecha_registro_med`)
        VALUES('$name','$estado_medico','$especialidad','$fecha_reg_med')";
           $result = mysql_query($sql,$conexion) or die(mysql_error());
    //$correcto_mensaje = '"Funcionario Registrado!!", "Actividad Registrada Exitosamente!", "success"';
     
}
}
else{
        $name=NULL;
    }


//registrar Permisos medico


//identificador de tipo de usuario
$id_usuario=$_SESSION['id'];
$ss = mysql_query("SELECT id_usuario, nombre, usuario, password,tipo_usuario, tipo_usuario.descripcion as pru,habilitado FROM usuario, estado_usuario, tipo_usuario WHERE usuario.tipo_usuario=tipo_usuario.id_tipo_usuario and usuario.habilitado= estado_usuario.estado and usuario.id_usuario=$id_usuario");
$rr = mysql_fetch_array($ss)    
?>
<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Sistema Fichaje HCV</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="shortcut icon" href="css/favicon.png">
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->  

        <script language="JavaScript">
        function edad(Fecha){
        fecha = new Date(Fecha)
        hoy = new Date()
        ed = parseInt((hoy -fecha)/365/24/60/60/1000)
        document.getElementById('pepe').value = ed 
        }
    </script>
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="index.html">HCV</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="assets/images/users/avatar2.jpg" alt="John Doe"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="assets/images/users/avatar2.jpg" alt="John Doe"/>
                            </div>
                             <div class="profile-data">
                                <div class="profile-data-name"><?php echo $rr['usuario'];?></div><td></td>
                                <div class="profile-data-title"><?php echo $rr['nombre']; ?></div>
                                <div class="profile-data-title">Bienvenido</div>
                            </div>
                        </div>                                                                        
                    </li>
                                      
                    <li>
                        <a href="principal_admin.php"><span class="fa fa-desktop"></span> <span class="xn-text">Panel de control</span></a>
                    </li>
                                    
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-user"></span> <span class="xn-text">Usuarios</span></a>
                        <ul>                            
                            <li><a href="usuario.php"><span class="fa fa-edit"></span> Registro usuario</a></li>                     
                        </ul>
                    </li>

                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-cubes"></span> <span class="xn-text">Especialidades</span></a>
                        <ul>                            
                            <li><a href="especialidad.php"><span class="fa fa-edit"></span> Registro Especialidad</a></li>                     
                        </ul>
                    </li>

                    <li class="xn-openable active">
                        <a href="#"><i class="fa fa-user-md" aria-hidden="true"></i> <span class="xn-text">Medicos</span></a>
                        <ul>
                           
                            <li class="active"><a href="medico.php"><span class="fa fa-edit"></span> Registro Medico</a></li>
                            <li><a ><i class="fa fa-clock-o" aria-hidden="true"></i> Horario Medico</a></li>                    
                        </ul>
                    </li> 
                    
                              
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                    <!-- SEARCH -->
                    <li class="xn-search">
                        <form role="form">
                            <input type="text" name="search" placeholder="Search..."/>
                        </form>
                    </li>   
                    <!-- END SEARCH -->
                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                       <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        
                    </li> 
                    <!-- END SIGN OUT -->
      
                 <!-- MESSAGES -->
                    <li class="xn-icon-button pull-right">
                        <a href="#"><i class="fa fa-user" aria-hidden="true"></i></a>
                        <div class="informer informer-danger"></div>
                        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="fa fa-user"></span> Datos de Sesion Usuario</h3>                                
                                <div class="pull-right">
                                    <span class="label label-info">Hospital Clinico Viedma</span>
                                </div>
                            </div>
                            <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">

                                <a href="#" class="list-group-item">
                                    <div class="list-group-status status-online"></div>
                                    <img src="assets/images/users/no-image.jpg" class="pull-left" alt="John Doe"/>
                                    <span class="contacts-title"> Usuario:  <?php echo $rr['usuario'];?></span>
                                </a><br><br>
                                
                                    <h3><span class="contacts-title"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rr['nombre'];?></span></h3><br>
                                    <h5>&nbsp;&nbsp;&nbsp;Bienvenido al Sistema de informacion WEB H.C.V.!!! </h5>


                            </div>                             
                        </div>                        
                    </li>
                    <!-- END MESSAGES -->  
                    
                
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                     
                
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="principal.php">Panel de control</a></li>
            
                    <li class="active">Medicos</li>
                </ul>
                <!-- END BREADCRUMB -->
                
                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><strong><i class="fa fa-user-md" aria-hidden="true"></i>  Lista de Medicos</strong></h2>
                </div>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    
                    
                    <div class="row">
                        <div class="col-md-12">
                            
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Datos de registro de Medicos</h3>
                                    <div class="btn-group pull-right">
                                        <button href="#add" title="" data-placement="left" data-toggle="modal" class="btn btn-info" type="button" data-original-title="Nuvo Paciente"><span class="icon_profile"><i class="fa fa-plus"></i></span> AGREGAR NUEVO 
                                        MEDICO</button>
                                    </div>


                                <div id="add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <form class="form-validate form-horizontal" name="form2" action="" method="post" enctype="multipart/form-data"> 
                    
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h3 id="myModalLabel" align="center"><strong>Registrar Informacion del Medico</strong></h3>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">

                                        <div class="col-lg-10">
                                        
                                        <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Nombre del Medico:</label>
                                        <div class="col-lg-9">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user-md" aria-hidden="true"></i></span>
                                                  <input class="form-control" id="name_med" name="name_med" type="text" required />                                           
                                            </div>
                                        </div>
        
                                    </div>
                                        
                                        <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Estado Medico:</label>
                                        <div class="col-md-9 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-caret-down"></span></span>
                                                <select class="form-control" id="estadomedico" name="estadomedico" required/>
                                                <?php
                                                    $c=mysql_query("SELECT * FROM estado_medico");
                                                    while($d=mysql_fetch_array($c)){
                                                    echo '<option value="'.$d['id_estado_med'].'">'.$d['estado_med'].'</option>';
                                                    }
                                                ?>
                                                </select>
                                            </div>                                            
                                            
                                        </div>
                                    </div>
                                          


                                            <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Especialidad:</label>
                                        <div class="col-md-9 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-caret-down"></span></span>
                                                <select class="form-control" id="especialidad" name="especialidad" required/>
                                                <?php
                                                    $c=mysql_query("SELECT * FROM especialidad_med");
                                                    while($d=mysql_fetch_array($c)){
                                                    echo '<option value="'.$d['id_especialidad_med'].'">'.$d['nombre_especialidad'].'</option>';
                                                    }
                                                ?>
                                                </select>
                                            </div>                                            
                                            
                                        </div>
                                    </div>
                                            
                                            
                                            <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Fecha registro:</label>
                                        <div class="col-lg-9">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                                   <input class="form-control" type="date" readonly name="fecha_registro_medico" autocomplete="off"  value="<?php echo date('Y-m-d'); ?>">                                          
                                            </div>
                                        </div>
        
                                    </div>
                                                
                                        </div>
                                        </div>
                                    
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-default" data-dismiss="modal" aria-hidden="true"><strong>Cerrar</strong></button>
                                        <button name="a_nuevo_medico" type="submit" class="btn btn-primary"><strong>Registrar</strong></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                                    
                                    
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                         <thead>
                                            <tr>
                                              <th>ID</th>
                                              <th>Nombre Medico</th> 
                                               <th>Estado</th> 
                                              <th>Especialidad</th>
                                              <th>Fecha Registro</th>
                                              <th>Acciones</th>
                                              <th>Horario</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $ss = mysql_query("SELECT * FROM medico,especialidad_med, estado_medico WHERE medico.id_especialidad_med = especialidad_med.id_especialidad_med and medico.id_estado_med= estado_medico.id_estado_med");
                            while($rr=mysql_fetch_array($ss)){


                        ?>
                                            <tr>
                                                 <td><?php echo $rr['id_medico']; ?></td>
                                                <td><?php echo $rr['nombre_medico']; ?></td>
                                                <td><?php echo $rr['estado_med']; ?></td>
                                                <td><?php echo $rr['nombre_especialidad']; ?></td>
                                                <td><?php echo $rr['fecha_registro_med']; ?></td>
                                                <td>
                                                    <span data-placement="left" data-toggle="tooltip" title="Editar">
                                                        <a href="#a<?php echo $rr['id_medico']; ?>" class="btn btn-primary btn-rounded" data-toggle="modal"><i class="fa fa-pencil-square-o"></i></a>
                                                    </span>
                                                    <span data-placement="right" data-toggle="tooltip" title="Permisos Medico">
                                                        <a href="#b<?php echo $rr['id_medico']; ?>" class="btn btn-info btn-rounded" data-toggle="modal"><i class="fa fa-calendar"></i></a>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span data-placement="left" data-toggle="tooltip">
                                                        <a href="horario.php?id_medico=<?php echo $rr['id_medico']; ?>" class="btn btn-info btn-rounded" data-toggle="tooltip" data-placement="right" title="Ver Horario"><i class="fa fa-clock-o" aria-hidden="true"></i></a>
                                                    </span>

                                                    
                                                </td>
                                            </tr>
                                            
                                            </tbody>
                    <!-- codigo para editar medico-->
                    <div id="a<?php echo $rr['id_medico']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <form class="form-validate form-horizontal" name="form2" action="editar_recursos.php" method="post">
                        <input type="hidden" name="id_medico" value="<?php echo $rr['id_medico']; ?>">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h3 id="myModalLabel" align="center">Cambiar Informacion del Medico</h3>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-12">

                                        <div class="col-lg-12">
                                        
                                        <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Nombre del Medico:</label>
                                        <div class="col-md-9 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user-md" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" id="name_med" name="name_med" value="<?php echo $rr['nombre_medico']; ?>" required/>
                                            </div>                                            
                                  
                                        </div>
                                        </div>
                                    </div><br><br><br>
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Estado Medico:</label>
                                        <div class="col-md-9 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-caret-down"></span></span>
                                                <select class="form-control" id="estadomedico" name="estadomedico" required/>
                                                <?php
                                                    $c=mysql_query("SELECT * FROM estado_medico");
                                                    while($d=mysql_fetch_array($c)){
                                                    echo '<option value="'.$d['id_estado_med'].'">'.$d['estado_med'].'</option>';
                                                    }
                                                ?>
                                                </select>
                                            </div>                                            
                                            </div>
                                        </div>
                                    </div><br><br><br>
                                          

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Especialidad:</label>
                                        <div class="col-md-9 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-caret-down"></span></span>
                                                <select class="form-control" id="especialidad" name="especialidad" required/>
                                                <?php
                                                    $c=mysql_query("SELECT * FROM especialidad_med");
                                                    while($d=mysql_fetch_array($c)){
                                                    echo '<option value="'.$d['id_especialidad_med'].'">'.$d['nombre_especialidad'].'</option>';
                                                    }
                                                ?>
                                                </select>
                                            </div>                                            
                                            </div>
                                        </div>
                                    </div>
                                        <br><br><br>
                                    <div class="col-lg-12">

                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Fecha de Actualizacion:</label>
                                        <div class="col-lg-9">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                                   <input class="form-control" type="date" readonly name="fecha_registro_medico" autocomplete="off"  value="<?php echo date('Y-m-d'); ?>">                                          
                                            </div>
                                        </div>
                                    </div>
        
                                    </div>
                                        </div>
                                        </div>
                                    
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-default" data-dismiss="modal" aria-hidden="true"><strong>Cerrar</strong></button>
                                        <button name="editar_medico" type="submit" class="btn btn-primary"><strong>Editar</strong></button>
                                    </div>
                                </div>
                            </div>
                            </form>
                </div>


                <!-- codigo para permisos de medico-->
                <div id="b<?php echo $rr['id_medico']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <form class="form-validate form-horizontal" name="form2" action="editar_recursos.php" method="post">
                        <input type="hidden" name="id_medico" value="<?php echo $rr['id_medico']; ?>">
                                <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h3 id="myModalLabel" align="center">Permisos Laborales Medico</h3>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                        <div class="col-lg-12">
                                        <div class="col-lg-12">
                                        <div class="form-group">
                                        <label class="col-md-6 control-label"><h3>Dr. <?php echo $rr['nombre_medico']; ?>:</h3></label>
                                        </div>
                                        <div>
                                            <h4 style="left: ">Registro de Permisos</h4>
                                        </div>
                                    </div><br><br><br>
                                    <div class="col-md-6">
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Fecha Inicio:</label>
                                        <div class="col-md-9 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                  <input class="form-control" placeholder="Ingrese su Nombre"  id="date" name="date" type="date" required />
                                            </div>                                            
                                            </div>
                                        </div>
                                    </div><br><br><br>
                                          

                                          <div class="col-lg-12">
                                       <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Fecha Fin:</label>
                                        <div class="col-md-9 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                  <input class="form-control" placeholder="Ingrese su Nombre"  id="date1" name="date1" type="date" required />
                                            </div>                                            
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    
                                    hola
                                </div>
                                        <br><br><br>
                                        </div>
                                        </div>
                                    
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-default" data-dismiss="modal" aria-hidden="true"><strong>Cerrar</strong></button>
                                        <button name="registro_permiso" type="submit" class="btn btn-primary"><strong>Registrar</strong></button>
                                    </div>
                                </div>
                            </div>
                            </form>
                </div>
                                            
                                            
                                        <?php }?>
                                        
                                        
                                    </table> 
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- END DATATABLE EXPORT -->                            


                        </div>
                    </div>

                </div>         
                <!-- END PAGE CONTENT WRAPPER -->
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->    

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-remove-row">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-times"></span> Remove <strong>Data</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to remove this row?</p>                    
                        <p>Press Yes if you sure.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <button class="btn btn-success btn-lg mb-control-yes">Yes</button>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->        
        
        <!-- MESSAGE BOX-->
         <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
               <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Cerrar <strong>sesión</strong> ?</div>
                    <div class="mb-content">
                        <p>Seguro que quieres salir ?</p>                    
                        <p>Pulse No si desea continuar trabajando. Pulse Sí para salir del usuario actual.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="cerrarSesion.php" class="btn btn-success btn-lg">Si</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                      

    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>        
        <!-- END PLUGINS -->
        
        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-select.js"></script>
    
        <script type="text/javascript" src="js/plugins/tableexport/tableExport.js"></script>
    <script type="text/javascript" src="js/plugins/tableexport/jquery.base64.js"></script>
    <script type="text/javascript" src="js/plugins/tableexport/html2canvas.js"></script>
    <script type="text/javascript" src="js/plugins/tableexport/jspdf/libs/sprintf.js"></script>
    <script type="text/javascript" src="js/plugins/tableexport/jspdf/jspdf.js"></script>
    <script type="text/javascript" src="js/plugins/tableexport/jspdf/libs/base64.js"></script>        
        <!-- END THIS PAGE PLUGINS-->  
        
        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>        
        <!-- END TEMPLATE -->
        
         <!-- PAGE LEVEL SCRIPTS -->
    <script src="js/dataTables/jquery.dataTables.js"></script>
    <script src="js/dataTables/dataTables.bootstrap.js"></script>
     <script>
         $(document).ready(function () {
             $('#dataTables-example').dataTable();
         });
    </script>
    
     <script type="text/javascript" language="javascript">
     function cambiar(){
       var year = document.getElementById('year').value;
       var year_serv = <?php echo date('Y')?>;
 
       var edad = year_serv-year-1;
 
       if(document.getElementById('mes').value==<?php echo date('m')?>){
         if(document.getElementById('dia').value<=<?php echo date('d')?>){
           edad += 1;
          }
       }else if(document.getElementById('mes').value<=<?php echo date('m')?>){
         edad += 1;
       }
 
       document.getElementById('edad').value = edad;
     }
   </script>
    
    
        
    <!-- END SCRIPTS -->                 
    </body>
</html>
