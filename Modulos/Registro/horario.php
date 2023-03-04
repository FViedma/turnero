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



/*------------------instar horario de medico------------------------*/ 

if (isset($_POST['registro_horario']) && $id_usuario=$_SESSION['usuario']){
$dia=$_POST['lunes'];
$id_medico=$_GET['id_medico'];
$id_usuario=$_SESSION['id'];
$ini_lm=$_POST['ini_lm'];
$fin_lm=$_POST['fin_lm'];
$tic_lm=$_POST['tic_lm'];
$ini_lt=$_POST['ini_lt'];
$fin_lt=$_POST['fin_lt'];
$tic_lt=$_POST['tic_lt']; // variables de dia lunes

$dia1=$_POST['martes'];
$ini_mm=$_POST['ini_mm'];
$fin_mm=$_POST['fin_mm'];
$tic_mm=$_POST['tic_mm'];
$ini_mt=$_POST['ini_mt'];
$fin_mt=$_POST['fin_mt'];
$tic_mt=$_POST['tic_mt'];

$dia2=$_POST['miercoles'];
$ini_mim=$_POST['ini_mim'];
$fin_mim=$_POST['fin_mim'];
$tic_mim=$_POST['tic_mim'];
$ini_mit=$_POST['ini_mit'];
$fin_mit=$_POST['fin_mit'];
$tic_mit=$_POST['tic_mit'];

$dia3=$_POST['jueves'];
$ini_jm=$_POST['ini_jm'];
$fin_jm=$_POST['fin_jm'];
$tic_jm=$_POST['tic_jm'];
$ini_jt=$_POST['ini_jt'];
$fin_jt=$_POST['fin_jt'];
$tic_jt=$_POST['tic_jt'];

$dia4=$_POST['viernes'];
$ini_vm=$_POST['ini_vm'];
$fin_vm=$_POST['fin_vm'];
$tic_vm=$_POST['tic_vm'];
$ini_vt=$_POST['ini_vt'];
$fin_vt=$_POST['fin_vt'];
$tic_vt=$_POST['tic_vt'];

$dia5=$_POST['sabado'];
$ini_sm=$_POST['ini_sm'];
$fin_sm=$_POST['fin_sm'];
$tic_sm=$_POST['tic_sm'];
$ini_st=$_POST['ini_st'];
$fin_st=$_POST['fin_st'];
$tic_st=$_POST['tic_st'];

$dia6=$_POST['domingo'];
$ini_dm=$_POST['ini_dm'];
$fin_dm=$_POST['fin_dm'];
$tic_dm=$_POST['tic_dm'];
$ini_dt=$_POST['ini_dt'];
$fin_dt=$_POST['fin_dt'];
$tic_dt=$_POST['tic_dt'];

    $sql = "INSERT INTO `horario_medico`(`id_dia_horario`,`id_medico`, `ini_m`, `fin_m`, `ticket_m`, `ini_t`, `fin_t`, `ticket_t`, `usuario`)
        VALUES('$dia', '$id_medico', '$ini_lm', '$fin_lm', '$tic_lm', '$ini_lt', '$fin_lt', '$tic_lt', '$id_usuario')";
           $result = mysql_query($sql,$conexion) or die(mysql_error());
    //$correcto_mensaje = '"Funcionario Registrado!!", "Actividad Registrada Exitosamente!", "success"';

    $sql1 = "INSERT INTO `horario_medico`(`id_dia_horario`,`id_medico`, `ini_m`, `fin_m`, `ticket_m`, `ini_t`, `fin_t`, `ticket_t`, `usuario`)
        VALUES('$dia1', '$id_medico', '$ini_mm', '$fin_mm', '$tic_mm', '$ini_mt', '$fin_mt', '$tic_mt', '$id_usuario')";
           $result1 = mysql_query($sql1,$conexion) or die(mysql_error());
    //$correcto_mensaje = '"Funcionario Registrado!!", "Actividad Registrada Exitosamente!", "success"'

    $sql2 = "INSERT INTO `horario_medico`(`id_dia_horario`,`id_medico`, `ini_m`, `fin_m`, `ticket_m`, `ini_t`, `fin_t`, `ticket_t`, `usuario`)
        VALUES('$dia2', '$id_medico', '$ini_mim', '$fin_mim', '$tic_mim', '$ini_mit', '$fin_mit', '$tic_mit', '$id_usuario')";
           $result2 = mysql_query($sql2,$conexion) or die(mysql_error());
    //$correcto_mensaje = '"Funcionario Registrado!!", "Actividad Registrada Exitosamente!", "success"'


    $sql3 = "INSERT INTO `horario_medico`(`id_dia_horario`,`id_medico`, `ini_m`, `fin_m`, `ticket_m`, `ini_t`, `fin_t`, `ticket_t`, `usuario`)
        VALUES('$dia3', '$id_medico', '$ini_jm', '$fin_jm', '$tic_jm', '$ini_jt', '$fin_jt', '$tic_jt', '$id_usuario')";
           $result3 = mysql_query($sql3,$conexion) or die(mysql_error());
    //$correcto_mensaje = '"Funcionario Registrado!!", "Actividad Registrada Exitosamente!", "success"'
    
    $sql4 = "INSERT INTO `horario_medico`(`id_dia_horario`,`id_medico`, `ini_m`, `fin_m`, `ticket_m`, `ini_t`, `fin_t`, `ticket_t`, `usuario`)
        VALUES('$dia4', '$id_medico', '$ini_vm', '$fin_vm', '$tic_vm', '$ini_vt', '$fin_vt', '$tic_vt', '$id_usuario')";
           $result4 = mysql_query($sql4,$conexion) or die(mysql_error());
    //$correcto_mensaje = '"Funcionario Registrado!!", "Actividad Registrada Exitosamente!", "success"'


    $sql5 = "INSERT INTO `horario_medico`(`id_dia_horario`,`id_medico`, `ini_m`, `fin_m`, `ticket_m`, `ini_t`, `fin_t`, `ticket_t`, `usuario`)
        VALUES('$dia5', '$id_medico', '$ini_sm', '$fin_sm', '$tic_sm', '$ini_st', '$fin_st', '$tic_st', '$id_usuario')";
           $result5 = mysql_query($sql5,$conexion) or die(mysql_error());
    //$correcto_mensaje = '"Funcionario Registrado!!", "Actividad Registrada Exitosamente!", "success"'

    $sql6 = "INSERT INTO `horario_medico`(`id_dia_horario`,`id_medico`, `ini_m`, `fin_m`, `ticket_m`, `ini_t`, `fin_t`, `ticket_t`, `usuario`)
        VALUES('$dia6', '$id_medico', '$ini_dm', '$fin_dm', '$tic_dm', '$ini_dt', '$fin_dt', '$tic_dt', '$id_usuario')";
           $result6 = mysql_query($sql6,$conexion) or die(mysql_error());
    //$correcto_mensaje = '"Funcionario Registrado!!", "Actividad Registrada Exitosamente!", "success"'
}

if(!empty($_GET['i'])){
            $id_medico=get($_GET['i'],'medico','id_medico');
            mysql_query("SELECT id_medico FROM medico WHERE id_medico='$id_medico'");
            header('Location: horario.php?id_medico='.$id_medico);
}

//identificador de tipo de usuario
$id_medico=$_GET['id_medico'];
$id_usuario=$_SESSION['id'];
$ss = mysql_query("SELECT id_medico, nombre_medico, id_usuario, nombre, tipo_usuario,habilitado, usuario FROM medico, usuario, tipo_usuario WHERE usuario.tipo_usuario=tipo_usuario.id_tipo_usuario and usuario.id_usuario=$id_usuario AND medico.id_medico= $id_medico");
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
                           
                            <li><a href="doctor.php"><span class="fa fa-edit"></span> Registro Medico</a></li>
                            <li class="active"><a ><i class="fa fa-clock-o" aria-hidden="true"></i> Horario Medico</a></li>
                                                 
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
                    <li class="active">horario Medico</li>
                </ul>
                <!-- END BREADCRUMB -->
                
                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><strong><i class="fa fa-user-md" aria-hidden="true"></i>  Horarios</strong></h2>
                </div>
                <!-- END PAGE TITLE -->
                <section> 

                            <div class="col-md-12 col-lg-12">               
                                <div class="col-md-6">
                                    <div class="col-md-6">
                                     &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img class="" src="img/doctor2.png" alt="" align="center" style="border: 4px solid #fff;"><br><br>
                                     <h3><strong>Dr. &nbsp;<?php echo $rr['nombre_medico']; ?> </strong></h3>
                                </div>

                                                            </div>
           
                                <div class="col-md-6">
                                    <div class="col-md-12 col-lg-12">  
                                        <h3><strong>&nbsp; &nbsp;&nbsp; &nbsp;Fichas para Dispensador SIS</strong></h3>
                                            <table class="egt" style="border: #fff 5px solid; margin: 15px;">
                                                <tr>

                                                    <td width="" ="50" height="50"><strong>Fichas Mañana:</strong></td>
                                                    <td width="" ="50" height="50"><div class="col-lg-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-list-ol" aria-hidden="true"></i></span>
                                                            <input class="form-control" id="name_med" name="name_med" type="number" required />                                           
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td width="" ="50" height="50"><strong>Fichas Tarde</strong></td>
                                                    <td width="" ="50" height="50"><div class="col-lg-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-list-ol" aria-hidden="true"></i></span>
                                                            <input class="form-control" id="name_med" name="name_med" type="number" required />                                           
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                    <div class="btn-group pull-right">
                                                    <button href="#add" title="" data-placement="left" data-toggle="modal" class="btn btn-info" type="button" data-original-title="Nuvo Paciente"><span class="icon_profile"><i class="fa fa-check-square-o" aria-hidden="true"></i></span><strong>GUARDAR FICHAS</strong></button>
                                                    </div>
                                                </td>

                                                </tr>
                                            </table>              
                                        </div>
                            </div>
                        </section>
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    
                    
                    <div class="row">
                        <div class="col-md-12">
                            
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Horario Asignado al Medico</h3>

                                <div class="panel-body">
                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <form name="form-data" class="form-horizontal" method="POST" id="signupForm" action="" accept-charset="utf-8">
                                        <tbody>
                                        <!-- lunes -->
                                        <style type="text/css">
                                                            input[type="number"] {
                                                              width: 100%;
                                                            }
                                                            input + span {
                                                              padding-right: 30%;
                                                            }
                                                            input:invalid+span:after {
                                                              position: right;
                                                              content: '✖';
                                                              padding-left: 5px;
                                                            }
                                                            input:valid+span:after {
                                                              position: absolute;
                                                              content: '✓';
                                                              padding-left: 5px;
                                                            }
                                                            input:invalid {
                                                                border: 1px solid red;
                                                            }
                                                            input:valid {
                                                                border: 1px solid #3AB0FD;
                                                            }
                                                        </style>
                                            <tr>


                                               
                                                 <td width="10%" heigth="10%">
                                                    <div class="col-md-12">
                                                        <select class="form-control select2" name="lunes" style="width: 100%;">
                                                        <?php
                                                            $c=mysql_query("SELECT * FROM dia_horario WHERE  id_dia_horario=1");
                                                            while($d=mysql_fetch_array($c)){
                                                                echo '"<b>".<option value="'.$d['id_dia_horario'].'">'.$d['dia'].'</option>."</b>"';
                                                            }
                                                        ?>
                                                    </select></div></td>

                                                 <td width="15%" heigth="8%">
                                                    <div class="col-md-3">
                                                        Inicio: 
                                                    </div>
                                                    <div class="col-md-9">
                                                        <?php
                                                        $ss1 = mysql_query("SELECT * FROM horario_medico, dia_horario WHERE horario_medico.id_dia_horario = dia_horario.id_dia_horario and horario_medico.id_medico ='$id_medico' and horario_medico.id_dia_horario=1");
                                                            while($rr1=mysql_fetch_array($ss1)){
                                                               
                                                        ?>
                                                            
                                                            <input id="ini_lm" class="form-control" type="time" name="ini_lm" min="08:00" max="12:00" value="<?php echo $rr1['ini_m']; ?>"><span class="validity"></span>
                                                    </div>
                                                    <?php } ?>
                                                </td>
                                                    <td width="15%" heigth="10%">
                                                    <div class="col-md-3">
                                                        Fin: 
                                                    </div>
                                                    <div class="col-md-9">
                                                            <input id="fin_lm" class="form-control" type="time" name="fin_lm" min="08:00" max="12:00" ><span class="validity"></span>                                   
                                                    </div></td>
                                                    <td width="15%" heigth="10%"><div class="col-md-4">
                                                        Tickets: 
                                                    </div>
                                                    <div class="col-md-8">
                                                            <input id="tic_lm" class="form-control" type="number" name="tic_lm" min="0" max="20" ><span class="validity"></span>                                   
                                                    </div></td>

                                                    <td width="15%" heigth="10%">
                                                    <div class="col-md-3">
                                                        Inicio: 
                                                    </div>
                                                    <div class="col-md-9">
                                                            <input id="ini_lt" class="form-control" type="time" name="ini_lt" min="13:00" max="18:00" ><span class="validity"></span>                                   
                                                    </div></td>
                                                    <td width="15%" heigth="10%">
                                                    <div class="col-md-3">
                                                        Fin: 
                                                    </div>
                                                    <div class="col-md-9">
                                                            <input id="fin_lt" class="form-control" type="time" name="fin_lt" min="13:00" max="18:00" ><span class="validity"></span>                                   
                                                    </div></td>
                                                    <td width="10%" heigth="10%"><div class="col-md-4">
                                                        Tickets: 
                                                    </div>
                                                   <div class="col-md-8">
                                                            <input id="tic_lt" class="form-control" type="number" name="tic_lt" min="0" max="20" ><span class="validity"></span>                                   
                                                    </div></td>
                                             </tr>
                                            <!-- martes -->
                                            <tr>
                                                 <td width="10%" heigth="10%">
                                                    <div class="col-md-12">
                                                        <select class="form-control select2" name="martes" style="width: 100%;">
                                                        <?php
                                                            $c=mysql_query("SELECT * FROM dia_horario WHERE  id_dia_horario=2");
                                                            while($d=mysql_fetch_array($c)){
                                                                echo '"<b>".<option value="'.$d['id_dia_horario'].'">'.$d['dia'].'</option>."</b>"';
                                                            }
                                                        ?>
                                                    </select></div></td>

                                                 <td width="15%" heigth="10%">
                                                    <div class="col-md-3">
                                                        Inicio: 
                                                    </div>
                                                     <div class="col-md-9">
                                                            <input id="ini_mm" class="form-control" type="time" name="ini_mm" min="08:00" max="12:00" ><span class="validity"></span>                                   
                                                    </div></td>
                                                    <td width="15%" heigth="10%">
                                                    <div class="col-md-3">
                                                        Fin: 
                                                    </div>
                                                     <div class="col-md-9">
                                                            <input id="fin_mm" class="form-control" type="time" name="fin_mm" min="08:00" max="12:00" ><span class="validity"></span>                                   
                                                    </div></td>
                                                    <td width="13%" heigth="10%"><div class="col-md-4">
                                                        Tickets: 
                                                    </div>
                                                     <div class="col-md-8">
                                                            <input id="tic_mm" class="form-control" type="number" name="tic_mm" min="0" max="20" ><span class="validity"></span>                                   
                                                    </div></td>

                                                    <td width="15%" heigth="10%">
                                                    <div class="col-md-3">
                                                        Inicio: 
                                                    </div>
                                                     <div class="col-md-9">
                                                            <input id="ini_mt" class="form-control" type="time" name="ini_mt" min="13:00" max="18:00" ><span class="validity"></span>                                   
                                                    </div></td>
                                                    <td width="15%" heigth="10%">
                                                    <div class="col-md-3">
                                                        Fin: 
                                                    </div>
                                                     <div class="col-md-9">
                                                            <input id="fin_mt" class="form-control" type="time" name="fin_mt" min="13:00" max="18:00" ><span class="validity"></span>                                   
                                                    </div></td>
                                                    <td width="13%" heigth="10%"><div class="col-md-4">
                                                        Tickets: 
                                                    </div>
                                                     <div class="col-md-8">
                                                            <input id="tic_mt" class="form-control" type="number" name="tic_mt" min="0" max="20" ><span class="validity"></span>                                   
                                                    </div></td>
                                             </tr>
                                            
                                            <!-- miercoles -->
                                            <tr>
                                                <td width="10%" heigth="10%">
                                                    <div class="col-md-12">
                                                        <select class="form-control select2" name="miercoles" style="width: 100%;">
                                                        <?php
                                                            $c=mysql_query("SELECT * FROM dia_horario WHERE  id_dia_horario=3");
                                                            while($d=mysql_fetch_array($c)){
                                                                echo '"<b>".<option value="'.$d['id_dia_horario'].'">'.$d['dia'].'</option>."</b>"';
                                                            }
                                                        ?>
                                                    </select></div></td>

                                                 <td width="15%" heigth="10%">
                                                    <div class="col-md-3">
                                                        Inicio: 
                                                    </div>
                                                    <div class="col-md-9">
                                                            <input id="ini_mim" class="form-control" type="time" name="ini_mim" min="08:00" max="12:00" ><span class="validity"></span>                                   
                                                    </div></td>
                                                    <td width="15%" heigth="10%">
                                                    <div class="col-md-3">
                                                        Fin: 
                                                    </div>
                                                    <div class="col-md-9">
                                                            <input id="fin_mim" class="form-control" type="time" name="fin_mim" min="08:00" max="12:00" ><span class="validity"></span>                                   
                                                    </div></td>
                                                    <td width="13%" heigth="10%"><div class="col-md-4">
                                                        Tickets: 
                                                    </div>
                                                    <div class="col-md-8">
                                                            <input id="tic_mim" class="form-control" type="number" name="tic_mim" min="0" max="20" ><span class="validity"></span>                                   
                                                    </div></td>

                                                    <td width="15%" heigth="10%">
                                                    <div class="col-md-3">
                                                        Inicio: 
                                                    </div>
                                                   <div class="col-md-9">
                                                            <input id="ini_mit" class="form-control" type="time" name="ini_mit" min="13:00" max="18:00" ><span class="validity"></span>                                   
                                                    </div></td>
                                                    <td width="15%" heigth="10%">
                                                    <div class="col-md-3">
                                                        Fin: 
                                                    </div>
                                                    <div class="col-md-9">
                                                            <input id="fin_mit" class="form-control" type="time" name="fin_mit" min="13:00" max="18:00" ><span class="validity"></span>                                   
                                                    </div></td>
                                                    <td width="13%" heigth="10%"><div class="col-md-4">
                                                        Tickets: 
                                                    </div>
                                                    <div class="col-md-8">
                                                            <input id="tic_mit" class="form-control" type="number" name="tic_mit" min="0" max="20"><span class="validity"></span>                                   
                                                    </div></td>
                                             </tr>

                                             <!-- jueves -->
                                            <tr>
                                                <td width="10%" heigth="10%">
                                                    <div class="col-md-12">
                                                        <select class="form-control select2" name="jueves" style="width: 100%;">
                                                        <?php
                                                            $c=mysql_query("SELECT * FROM dia_horario WHERE  id_dia_horario=4");
                                                            while($d=mysql_fetch_array($c)){
                                                                echo '"<b>".<option value="'.$d['id_dia_horario'].'">'.$d['dia'].'</option>."</b>"';
                                                            }
                                                        ?>
                                                    </select></div></td>

                                                 <td width="15%" heigth="10%">
                                                    <div class="col-md-3">
                                                        Inicio: 
                                                    </div>
                                                   <div class="col-md-9">
                                                            <input id="ini_jm" class="form-control" type="time" name="ini_jm" min="08:00" max="12:00"><span class="validity"></span>                                   
                                                    </div></td>
                                                    <td width="15%" heigth="10%">
                                                    <div class="col-md-3">
                                                        Fin: 
                                                    </div>
                                                    <div class="col-md-9">
                                                            <input id="fin_jm" class="form-control" type="time" name="fin_jm" min="08:00" max="12:00"><span class="validity"></span>                                   
                                                    </div></td>
                                                    <td width="13%" heigth="10%"><div class="col-md-4">
                                                        Tickets: 
                                                    </div>
                                                   <div class="col-md-8">
                                                            <input id="tic_jm" class="form-control" type="number" name="tic_jm" min="0" max="20"><span class="validity"></span>                                   
                                                    </div></td>

                                                    <td width="15%" heigth="10%">
                                                    <div class="col-md-3">
                                                        Inicio: 
                                                    </div>
                                                    <div class="col-md-9">
                                                            <input id="ini_jt" class="form-control" type="time" name="ini_jt" min="13:00" max="18:00" ><span class="validity"></span>                                   
                                                    </div></td>
                                                    <td width="15%" heigth="10%">
                                                    <div class="col-md-3">
                                                        Fin: 
                                                    </div>
                                                    <div class="col-md-9">
                                                            <input id="fin_jt" class="form-control" type="time" name="fin_jt" min="13:00" max="18:00"><span class="validity"></span>                                   
                                                    </div></td>
                                                    <td width="13%" heigth="10%"><div class="col-md-4">
                                                        Tickets: 
                                                    </div>
                                                    <div class="col-md-8">
                                                            <input id="tic_jt" class="form-control" type="number" name="tic_jt" min="0" max="20" ><span class="validity"></span>                                   
                                                    </div></td>
                                             </tr>

                                             <!-- viernes -->
                                            <tr>
                                                 <td width="10%" heigth="10%">
                                                    <div class="col-md-12">
                                                        <select class="form-control select2" name="viernes" style="width: 100%;">
                                                        <?php
                                                            $c=mysql_query("SELECT * FROM dia_horario WHERE  id_dia_horario=5");
                                                            while($d=mysql_fetch_array($c)){
                                                                echo '"<b>".<option value="'.$d['id_dia_horario'].'">'.$d['dia'].'</option>."</b>"';
                                                            }
                                                        ?>
                                                    </select></div></td>

                                                 <td width="15%" heigth="10%">
                                                    <div class="col-md-3">
                                                        Inicio: 
                                                    </div>
                                                    <div class="col-md-9">
                                                            <input id="ini_vm" class="form-control" type="time" name="ini_vm" min="08:00" max="12:00" ><span class="validity"></span>                                   
                                                    </div></td>
                                                    <td width="15%" heigth="10%">
                                                    <div class="col-md-3">
                                                        Fin: 
                                                    </div>
                                                    <div class="col-md-9">
                                                            <input id="fin_vm" class="form-control" type="time" name="fin_vm" min="08:00" max="12:00"><span class="validity"></span>                                   
                                                    </div></td>
                                                    <td width="13%" heigth="10%"><div class="col-md-4">
                                                        Tickets: 
                                                    </div>
                                                    <div class="col-md-8">
                                                            <input id="tic_vm" class="form-control" type="number" name="tic_vm" min="0" max="20"><span class="validity"></span>                                   
                                                    </div></td>

                                                    <td width="15%" heigth="10%">
                                                    <div class="col-md-3">
                                                        Inicio: 
                                                    </div>
                                                    <div class="col-md-9">
                                                            <input id="ini_vt" class="form-control" type="time" name="ini_vt" min="13:00" max="18:00"><span class="validity"></span>                                   
                                                    </div></td>
                                                    <td width="15%" heigth="10%">
                                                    <div class="col-md-3">
                                                        Fin: 
                                                    </div>
                                                    <div class="col-md-9">
                                                            <input id="fin_vt" class="form-control" type="time" name="fin_vt" min="13:00" max="18:00"><span class="validity"></span>                                   
                                                    </div></td>
                                                    <td width="13%" heigth="10%"><div class="col-md-4">
                                                        Tickets: 
                                                    </div>
                                                    <div class="col-md-8">
                                                            <input id="tic_vt" class="form-control" type="number" name="tic_vt" min="0" max="20"><span class="validity"></span>                                   
                                                    </div></td>
                                             </tr>

                                             <!-- sabado -->
                                            <tr>
                                                 <td width="10%" heigth="10%">
                                                    <div class="col-md-12">
                                                        <select class="form-control select2" name="sabado" style="width: 100%;">
                                                        <?php
                                                            $c=mysql_query("SELECT * FROM dia_horario WHERE  id_dia_horario=6");
                                                            while($d=mysql_fetch_array($c)){
                                                                echo '"<b>".<option value="'.$d['id_dia_horario'].'">'.$d['dia'].'</option>."</b>"';
                                                            }
                                                        ?>
                                                    </select></div></td>

                                                 <td width="15%" heigth="10%">
                                                    <div class="col-md-3">
                                                        Inicio: 
                                                    </div>
                                                    <div class="col-md-9">
                                                            <input id="ini_sm" class="form-control" type="time" name="ini_sm" min="08:00" max="12:00"><span class="validity"></span>                                   
                                                    </div></td>
                                                    <td width="15%" heigth="10%">
                                                    <div class="col-md-3">
                                                        Fin: 
                                                    </div>
                                                    <div class="col-md-9">
                                                            <input id="fin_sm" class="form-control" type="time" name="fin_sm" min="08:00" max="12:00"><span class="validity"></span>                                   
                                                    </div></td>
                                                    <td width="13%" heigth="10%"><div class="col-md-4">
                                                        Tickets: 
                                                    </div>
                                                    <div class="col-md-8">
                                                            <input id="tic_sm" class="form-control" type="number" name="tic_sm" min="0" max="20"><span class="validity"></span>                                   
                                                    </div></td>

                                                    <td width="15%" heigth="10%">
                                                    <div class="col-md-3">
                                                        Inicio: 
                                                    </div>
                                                    <div class="col-md-9">
                                                            <input id="ini_st" class="form-control" type="time" name="ini_st" min="13:00" max="18:00"><span class="validity"></span>                                   
                                                    </div></td>
                                                    <td width="15%" heigth="10%">
                                                    <div class="col-md-3">
                                                        Fin: 
                                                    </div>
                                                    <div class="col-md-9">
                                                            <input id="fin_st" class="form-control" type="time" name="fin_st" min="13:00" max="18:00"><span class="validity"></span>                                   
                                                    </div></td>
                                                    <td width="13%" heigth="10%"><div class="col-md-4">
                                                        Tickets: 
                                                    </div>
                                                    <div class="col-md-8">
                                                            <input id="tic_st" class="form-control" type="number" name="tic_st" min="0" max="20"><span class="validity"></span>                                   
                                                    </div></td>
                                             </tr>

                                             <!-- domingo -->
                                            <tr>
                                                <td width="10%" heigth="10%">
                                                    <div class="col-md-12">
                                                        <select class="form-control select2" name="domingo" style="width: 100%;">
                                                        <?php
                                                            $c=mysql_query("SELECT * FROM dia_horario WHERE  id_dia_horario=7");
                                                            while($d=mysql_fetch_array($c)){
                                                                echo '"<b>".<option value="'.$d['id_dia_horario'].'">'.$d['dia'].'</option>."</b>"';
                                                            }
                                                        ?>
                                                    </select></div></td>

                                                 <td width="15%" heigth="10%">
                                                    <div class="col-md-3">
                                                        Inicio: 
                                                    </div>
                                                    <div class="col-md-9">
                                                            <input id="ini_dm" class="form-control" type="time" name="ini_dm" min="08:00" max="12:00"><span class="validity"></span>                                   
                                                    </div></td>
                                                    <td width="15%" heigth="10%">
                                                    <div class="col-md-3">
                                                        Fin: 
                                                    </div>
                                                    <div class="col-md-9">
                                                            <input id="fin_dm" class="form-control" type="time" name="fin_dm" min="08:00" max="12:00"><span class="validity"></span>                                   
                                                    </div></td>
                                                    <td width="13%" heigth="10%"><div class="col-md-4">
                                                        Tickets: 
                                                    </div>
                                                    <div class="col-md-8">
                                                            <input id="tic_dm" class="form-control" type="number" name="tic_dm" min="0" max="20"><span class="validity"></span>                                   
                                                    </div></td>

                                                    <td width="15%" heigth="10%">
                                                    <div class="col-md-3">
                                                        Inicio: 
                                                    </div>
                                                    <div class="col-md-9">
                                                            <input id="ini_dt" class="form-control" type="time" name="ini_dt" min="13:00" max="18:00"><span class="validity"></span>                                   
                                                    </div></td>
                                                    <td width="15%" heigth="10%">
                                                    <div class="col-md-3">
                                                        Fin: 
                                                    </div>
                                                    <div class="col-md-9">
                                                            <input id="fin_dt" class="form-control" type="time" name="fin_dt" min="13:00" max="18:00"><span class="validity"></span>                                   
                                                    </div></td>
                                                    <td width="13%" heigth="10%"><div class="col-md-4">
                                                        Tickets:
                                                        </div> 
                                                    <div class="col-md-8">
                                                            <input id="tic_dt" class="form-control" type="number" name="tic_dt" min="0" max="20"><span class="validity"></span>                                   
                                                    </div></td>
                                             </tr>


                                            </tbody>
                                          
                                        
                                    </table> 
                                    </div>

                                    <div class="col-md-6">
                                        <button name="registro_horario" type="submit" class="btn btn-primary"><strong>Registrar</strong></button>
                                    </div><br><br><br>
                                    <div class="col-md-6">
                                        <a href="medico.php" title="" class="btn btn-primary" data-original-title="Nuvo Paciente" style="padding: 4px 60px;"><span class="icon_profile"><i class="fa fa-reply-all" aria-hidden="true"></i></span><strong>ATRAS </strong></a>
                                    </div>
                                    </form>
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
