<?php
include "conexion.php";
mysqli_query($conexion, "DELETE FROM contraref1");
//include('conexion/verificar_gestion.php');
if (isset($_POST['a_nuevo'])) {
  $fecha_registro = $_POST['fecha_registro'];
  $establecimiento_salud = $_POST['establecimiento_salud'];
  $Servicio = $_POST['Servicio'];
  $municipio = $_POST['municipio'];
  $red_salud = $_POST['red_salud'];
  $telefono_contacto = $_POST['telefono_contacto'];
  $nivel_eess_c1 = $_POST['nivel_eess_c1'];
  $paciente = $_POST['paciente'];
  $ci = $_POST['ci'];
  $domicilio = $_POST['domicilio'];
  $tel_cel = $_POST['tel_cel'];
  $edad = $_POST['edad'];
  $sexo = $_POST['sexo'];
  $per_disc = $_POST['per_disc'];
  $tipo_disc = $_POST['tipo_disc'];
  $grado_disc = $_POST['grado_disc'];
  $dias_inter = $_POST['dias_inter'];
  $peso = $_POST['peso'];
  $imc = $_POST['imc'];
  $temperatura = $_POST['temperatura'];
  $presion_arterial = $_POST['presion_arterial'];
  $frecuencia_cardiaca = $_POST['frecuencia_cardiaca'];
  $frecuencia_respiratoria = $_POST['frecuencia_respiratoria'];
  $saturación_de_oxígeno = $_POST['saturación_de_oxígeno'];
  $diagnostico_ingr1 = $_POST['diagnostico_ingr1'];
  $cie1 = $_POST['cie1'];
  $diagnostico_ingr2 = $_POST['diagnostico_ingr2'];
  $cie2 = $_POST['cie2'];
  $diagnostico_ingr3 = $_POST['diagnostico_ingr3'];
  $cie3 = $_POST['cie3'];
  $diagnostico_ingr4 = $_POST['diagnostico_ingr4'];
  $cie4 = $_POST['cie4'];
  $diagnostico_egr1 = $_POST['diagnostico_egr1'];
  $cie5 = $_POST['cie5'];
  $diagnostico_egr2 = $_POST['diagnostico_egr2'];
  $cie6 = $_POST['cie6'];
  $diagnostico_egr3 = $_POST['diagnostico_egr3'];
  $cie7 = $_POST['cie7'];
  $diagnostico_egr4 = $_POST['diagnostico_egr4'];
  $cie8 = $_POST['cie8'];
  $evolu_compli = $_POST['evolu_compli'];
  $exam_comple = $_POST['exam_comple'];
  $otros_exam_iter = $_POST['otros_exam_iter'];
  $tratamiento_rea = $_POST['tratamiento_rea'];
  $recom_pac = $_POST['recom_pac'];
  $otros_anexos = $_POST['otros_anexos'];
  $obs_recom = $_POST['obs_recom'];
  $estable_salud = $_POST['estable_salud'];
  $municipio2 = $_POST['municipio2'];
  $nivel_eess2 = $_POST['nivel_eess2'];
  $red_salud2 = $_POST['red_salud2'];
  $secontac = $_POST['secontac'];
  $telesalud = $_POST['telesalud'];
  $contacto_estable = $_POST['contacto_estable'];
  $nombre_acompa = $_POST['nombre_acompa'];
  $nombre_medico=$_POST['nombre_medico'];
  $sql = "INSERT INTO `contraref`(`fecha_registro`, `establecimiento_salud`, `Servicio`, 
      `municipio`, `red_salud`, `telefono_contacto`, `nivel_eess_c1`, `paciente`, `ci`, `domicilio`, 
      `tel_cel`, `edad`, `sexo`, `per_disc`, `tipo_disc`, `grado_disc`, `dias_inter`, `peso`, `imc`, 
      `temperatura`, `presion_arterial`, `frecuencia_cardiaca`, `frecuencia_respiratoria`, `saturación_de_oxígeno`,
       `diagnostico_ingr1`, `cie1`, `diagnostico_ingr2`, `cie2`, `diagnostico_ingr3`,`cie3`, `diagnostico_ingr4`, `cie4`,
       `diagnostico_egr1`,`cie5`, `diagnostico_egr2`,`cie6`, `diagnostico_egr3`, `cie7`,`diagnostico_egr4`,`cie8`, `evolu_compli`, 
       `exam_comple`, `otros_exam_iter`, `tratamiento_rea`, `recom_pac`, `otros_anexos`, `obs_recom`, 
       `estable_salud`, `municipio2`, `nivel_eess2`, `red_salud2`, `secontac`, `telesalud`, `contacto_estable`,
        `nombre_acompa`,`nombre_medico`) VALUES ('$fecha_registro','$establecimiento_salud','$Servicio','$municipio','$red_salud','$telefono_contacto','$nivel_eess_c1', '$paciente', '$ci', '$domicilio', 
        '$tel_cel','$edad', '$sexo', '$per_disc', '$tipo_disc', '$grado_disc', '$dias_inter', '$peso', '$imc',
         '$temperatura', '$presion_arterial', '$frecuencia_cardiaca', '$frecuencia_respiratoria', '$saturación_de_oxígeno',
         '$diagnostico_ingr1', '$cie1', '$diagnostico_ingr2', '$cie2', '$diagnostico_ingr3', '$cie3','$diagnostico_ingr4','$cie4', '$diagnostico_egr1','$cie5', '$diagnostico_egr2','$cie6', 
         '$diagnostico_egr3','$cie7', '$diagnostico_egr4','$cie8', '$evolu_compli', '$exam_comple', '$otros_exam_iter',
           '$tratamiento_rea', '$recom_pac','$otros_anexos', '$obs_recom', '$estable_salud', 
           '$municipio2', '$nivel_eess2', '$red_salud2', '$secontac', '$telesalud',
            '$contacto_estable', '$nombre_acompa', '$nombre_medico')";
  $result = mysqli_query($conexion, $sql) or die(mysqli_error());


  $sql = "INSERT INTO `contraref1`(`fecha_registro`, `establecimiento_salud`, `Servicio`, 
           `municipio`, `red_salud`, `telefono_contacto`, `nivel_eess_c1`, `paciente`, `ci`, `domicilio`, 
           `tel_cel`, `edad`, `sexo`, `per_disc`, `tipo_disc`, `grado_disc`, `dias_inter`, `peso`, `imc`, 
           `temperatura`, `presion_arterial`, `frecuencia_cardiaca`, `frecuencia_respiratoria`, `saturación_de_oxígeno`,
            `diagnostico_ingr1`, `cie1`, `diagnostico_ingr2`, `cie2`, `diagnostico_ingr3`,`cie3`, `diagnostico_ingr4`,`cie4`, 
            `diagnostico_egr1`,`cie5`, `diagnostico_egr2`, `cie6`,`diagnostico_egr3`,`cie7`, `diagnostico_egr4`,`cie8`, `evolu_compli`, 
            `exam_comple`, `otros_exam_iter`, `tratamiento_rea`, `recom_pac`, `otros_anexos`, `obs_recom`, 
            `estable_salud`, `municipio2`, `nivel_eess2`, `red_salud2`, `secontac`, `telesalud`, `contacto_estable`,
             `nombre_acompa`,`nombre_medico`) VALUES ('$fecha_registro','$establecimiento_salud','$Servicio','$municipio','$red_salud','$telefono_contacto','$nivel_eess_c1', '$paciente', '$ci', '$domicilio', 
             '$tel_cel','$edad', '$sexo', '$per_disc', '$tipo_disc', '$grado_disc', '$dias_inter', '$peso', '$imc',
              '$temperatura', '$presion_arterial', '$frecuencia_cardiaca', '$frecuencia_respiratoria', '$saturación_de_oxígeno',
              '$diagnostico_ingr1', '$cie1', '$diagnostico_ingr2', '$cie2', '$diagnostico_ingr3','$cie3', '$diagnostico_ingr4','$cie4', '$diagnostico_egr1','$cie5', '$diagnostico_egr2', '$cie6',
              '$diagnostico_egr3','$cie7', '$diagnostico_egr4','$cie8', '$evolu_compli', '$exam_comple', '$otros_exam_iter',
                '$tratamiento_rea', '$recom_pac','$otros_anexos', '$obs_recom', '$estable_salud', 
                '$municipio2', '$nivel_eess2', '$red_salud2', '$secontac', '$telesalud',
                 '$contacto_estable', '$nombre_acompa', '$nombre_medico')";
  $result = mysqli_query($conexion, $sql) or die(mysqli_error());
  header("Location:reporte_formulario.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- META SECTION -->
  <title>FORMULARIO CONTRAREFERENCIA D7a.</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="shortcut icon" href="css/favicon.png">
  <!-- END META SECTION -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- CSS INCLUDE -->
  <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css" />
  <!-- EOF CSS INCLUDE -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>
  <!-- START PAGE CONTAINER -->
  <div class="page-container">

    <!-- START PAGE SIDEBAR -->


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

      <!-- END SEARCH -->
      <!-- SIGN OUT -->

      <!-- END SIGN OUT -->





    </ul>
    <!-- END X-NAVIGATION VERTICAL -->

    <!-- START BREADCRUMB -->

    <!-- END BREADCRUMB -->

    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
      <!-- START WIDGETS -->
    </div>
    <!-- END WIDGETS -->
    <div class="row">
      <div class="col-md-8 col-md-offset-2" align="center">
        <!-- START SALES BLOCK -->
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="panel-title-box" align="center">
              <div class="col-md-4  " align="right">
                <ul class="panel-controls panel-controls-title">
                  <li><a href="#" class="panel-fullscreen rounded"><span class="fa fa-expand"></span></a></li>
                </ul>
              </div>
              <form name="form1" action="#" method="post" id="Regcom" enctype="multipart/form-data" target="_blank">
            </div>
            <div class="col-md-12"><br>
              <label class="col-md-12 col-xs-12" align="center">
                <h2><strong>FORMULARIO CONTRAREFERENCIA D7a.</strong></h3>
              </label>
            </div><br><br>
            <div class="col-md-12" align="right">
              <div class="col-md-12">
                <label class="col-md-9 col-xs-12 control-label" align="right">FECHA:</label>
                <div class="col-md-3">
                  <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" class="form-control" type="date" name="fecha_registro" value="<?php echo date('Y-m-d'); ?>">
                </div>
              </div>
            </div>
            <label class="col-md-15 col-xs-12" align="center"><strong>DATOS DEL ESTABLECIMIENTO DE SALUD AL QUE SE CONTRAREFIERE(C1)</strong></label>
            <div class="col-md-12">
              <label class="col-md-2 col-xs-12" align="left"><strong>ESTABLECIMIENTO DE SALUD<span style="color:red">*</span>:</strong></label>
              <div class="col-md-4">
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD; color: #555;" class="form-control" type="text" id="establecimiento_salud" name="establecimiento_salud" value="HOSPITAL CLINICO VIEDMA" required>
            </div>
            <label class="col-md-2 col-xs-12" align="left"><strong>SERVICIO<span style="color:red">*</span>:</strong></label>
            <div class="col-md-4">
              <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD; color: #555;" class="form-control" type="text" id="Servicio" name="Servicio" required>
              </div>
            </div>
            <div class="col-md-12">
              <label class="col-md-2 col-xs-12" align="left"><strong>MUNICIPIO<span style="color:red">*</span>:</strong></label>
              <div class="col-md-4">
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD; color: #555;" class="form-control" type="text" id="municipio" name="municipio" value="CERCADO" required>
              </div>
              <label class="col-md-2 col-xs-12" align="left"><strong>RED DE SALUD<span style="color:red">*</span>:</strong></label>
              <div class="col-md-4">
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD; color: #555;" type="text" class="form-control" id="red_salud" name="red_salud" value="RED 1" required/>

              </div>
              <br><br>
              <label class="col-md-2 col-xs-12" align="left"><strong>TELEFONO DE CONTACTO:</strong></label>
              <div class="col-md-4">
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="telefono_contacto" name="telefono_contacto"/>
              </div>
              <label class="col-md-2 col-xs-12" align="left"><strong>NIVEL DE EESS<span style="color:red">*</span>:</strong></label>
              <div class="col-md-4">
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD; color: #555;" type="text" class="form-control" id="nivel_eess_c1" name="nivel_eess_c1" value="3" required />
              </div>

            </div>
          </div>
          <br><br>
          <label class="col-md-15 col-xs-12" align="center"><strong>IDENTIFICACION DEL PACIENTE(C2)</strong></label>
          <div class="col-md-12"><br>
            <div class="col-md-12">
              <label class="col-md-1 col-xs-12" align="left"><strong>CI<span style="color:red">*</span>:</strong></label>
              <div class="col-md-3">
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="ci" name="ci" required />
              </div>
              <div class="col-md-3">
                <button id="btn-verificar" name="btn-verificar" class="btn btn-success btn-flat"> Verificar</button>
              </div>
            </div>
            <br><br><br>
            <label class="col-md-2 col-xs-12" align="left"><strong>NOMBRES Y APELLIDOS<span style="color:red">*</span>:</strong></label>
            <div class="col-md-10">
              <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="paciente" name="paciente" required />
            </div><br><br>
            <br><br>
            <label class="col-md-1 col-xs-12" align="left"><strong>HISTORIA CLINICA<span style="color:red">*</span>:</strong></label>
            <div class="col-md-3">
              <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="histclini" name="histclini" required />
            </div>
            <label class="col-md-1 col-xs-12" align="left"><strong>DOMICILIO:</label>
            <div class="col-md-7">
              <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="domicilio" name="domicilio"/>
            </div><br><br>
            <label class="col-md-1 col-xs-12" align="left"><strong>TEL/CEL<span style="color:red">*</span>:</strong></label>
            <div class="col-md-4">
              <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control phone" id="tel_cel" name="tel_cel" required />
            </div>
            <label class="col-md-1 col-xs-12" align="left"><strong>EDAD<span style="color:red">*</span>:</strong></label>
            <div class="col-md-2">
              <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="edad" name="edad" required />
            </div>
            <label class="col-md-1 col-xs-12" align="left"><strong>SEXO<span style="color:red">*</span>:</strong></label>
            <div class="col-md-2">
              <select style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" class="form-control" id="sexo" name="sexo" required />
              <option value="v">-- Escoger --</option>
              <option value="Masculino"> Masculino</option>
              <option value="Femenino"> Femenino</option>
              </select>
            </div><br><br>
            <label class="col-md-1 col-xs-12" align="left"><strong>PERSONA CON DISCAPACIDAD:</strong></label>
            <div class="col-md-2">
              <select style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" class="form-control" id="per_disc" name="per_disc" required/>
              <option value="No"> No</option>
              <option value="Si"> Si</option>
              </select>
            </div>
            <label class="col-md-2 col-xs-12" align="left"><strong id="tipo_disc_label" name="tipo_disc_label">TIPO DE DISCAPACIDAD:</strong></label>
            <div class="col-md-2">
              <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="tipo_disc" name="tipo_disc" />

            </div>
            <label class="col-md-2 col-xs-12" align="left"><strong id="grad_disc_label" name="grad_disc_label">GRADO DE DISCAPACIDAD:</strong></label>
            <div class="col-md-2">
              <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="grado_disc" name="grado_disc" />
            </div>
          </div>
          <br><br><br>
          <label class="col-md-15 col-xs-12" align="center"><strong>DATOS CLINICOS DE ALTA(C3)</strong></label>
          <div class="col-md-12"><br>
            <label class="col-md-2 col-xs-12" align="left"><strong>DIAS DE INTERNACION<span style="color:red">*</span>:</strong></label>
            <div class="col-md-1">
              <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="dias_inter" name="dias_inter" required />
            </div>
            <label class="col-md-1 col-xs-12" align="left"><strong>PESO:</strong></label>
            <div class="col-md-1">
              <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="peso" name="peso"/>
            </div>
            <label class="col-md-1 col-xs-12" align="left"><strong>I.M.C:</strong></label>
            <div class="col-md-1">
              <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="imc" name="imc"/>
            </div>
            <label class="col-md-2 col-xs-12" align="left"><strong>TEMPERATURA<span style="color:red">*</span>:</strong></label>
            <div class="col-md-1">
              <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="temperatura" name="temperatura" required />
            </div>
          </div>
          <div class="col-md-12"><br>
            <label class="col-md-2 col-xs-12" align="left"><strong>PRESION ARTERIAL<span style="color:red">*</span>:</strong></label>
            <div class="col-md-1">
              <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="presion_arterial" name="presion_arterial" required />
            </div>
            <label class="col-md-2 col-xs-12" align="left"><strong>FRECUENCIA CARDIACA<span style="color:red">*</span>:</strong></label>
            <div class="col-md-1">
              <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="frecuencia_cardiaca" name="frecuencia_cardiaca" required />
            </div>

            <label class="col-md-2 col-xs-12" align="left"><strong>FRECUENCIA RESPIRATORIA<span style="color:red">*</span>:</strong></label>
            <div class="col-md-1">
              <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="frecuencia_respiratoria" name="frecuencia_respiratoria" required />
            </div>
          </div>
          <br>
          <div class="col-md-12"><br>
            <label class="col-md-2 col-xs-12" align="left"><strong>SATURACION DE OXIGENO<span style="color:red">*</span>:</strong></label>
            <div class="col-md-1">
              <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="saturación_de_oxígeno" name="saturación_de_oxígeno" required />
            </div>
          </div>
          <div class="col-md-12"><br>
            <label class="col-md-15 col-xs-12" align="center"><strong>DIAGNOSTICO (S) DE INGRESO: (C4)</strong></label>
            <br><br><br>
            <label class="col-md-1 col-xs-12">1<span style="color:red">*</span>:</label>
            <div class="col-md-6">
              <input type="hidden" id="diagnostico_ingr1" name="diagnostico_ingr1" />
              <select style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" class="form-control diagnostico" id="diag_ingr1" name="diag_ingr1" required />
              </select>
            </div>
            <label class="col-md-1 col-xs-12" align="left">CIE-10<span style="color:red">*</span>:</label>
            <div class="col-md-4">
              <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="cie1" name="cie1" required/>
            </div>
            <br><br><br>
            <label class="col-md-1 col-xs-12">2:</label>
            <div class="col-md-6">
              <input type="hidden" id="diagnostico_ingr2" name="diagnostico_ingr2" />
              <select style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" class="form-control diagnostico" id="diag_ingr2" name="diag_ingr2" />
              </select>
            </div>
            <label class="col-md-1 col-xs-12" align="left">CIE-10:</label>
            <div class="col-md-4">
              <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="cie2" name="cie2" />
            </div>
            <br><br><br>
            <label class="col-md-1 col-xs-12">3:</label>
            <div class="col-md-6">
              <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="diagnostico_ingr3" name="diagnostico_ingr3" />
            </div>
            <label class="col-md-1 col-xs-12" align="left">CIE-10:</label>
            <div class="col-md-4">
              <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="cie3" name="cie3" />
            </div>
            <br><br><br>
            <label class="col-md-1 col-xs-12">4:</label>
            <div class="col-md-6">
              <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="diagnostico_ingr4" name="diagnostico_ingr4" />
            </div>
            <label class="col-md-1 col-xs-12" align="left">CIE-10:</label>
            <div class="col-md-4">
              <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="cie4" name="cie4" />
            </div>
          </div><br>
          <div class="col-md-12"><br>
            <label class="col-md-15 col-xs-12" align="center"><strong>DIAGNOSTICO (S) DE EGRESO SEGUN CIE-10: (C5)</strong></label>
            <br><br><br>
            <label class="col-md-1 col-xs-12">1<span style="color:red">*</span>:</label>
            <div class="col-md-6">
              <input type="hidden" id="diagnostico_egr1" name="diagnostico_egr1" />
              <select style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" class="form-control diagnostico" id="diag_egr1" name="diag_egr1" required />
              </select>
            </div>
            <label class="col-md-1 col-xs-12" align="left">CIE-10<span style="color:red">*</span>:</label>
            <div class="col-md-4">
              <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="cie5" name="cie5" />
            </div>
            <br><br><br>
            <label class="col-md-1 col-xs-12">2:</label>
            <div class="col-md-6">
              <input type="hidden" id="diagnostico_egr2" name="diagnostico_egr2" />
              <select style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" class="form-control diagnostico" id="diag_egr2" name="diag_egr2" />
              </select>
            </div>
            <label class="col-md-1 col-xs-12" align="left">CIE-10:</label>
            <div class="col-md-4">
              <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="cie6" name="cie6" />
            </div>
            <br><br><br>
            <label class="col-md-1 col-xs-12">3:</label>
            <div class="col-md-6">
              <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="diagnostico_egr3" name="diagnostico_egr3" />
            </div>
            <label class="col-md-1 col-xs-12" align="left">CIE-10:</label>
            <div class="col-md-4">
              <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="cie7" name="cie7" />
            </div>
            <br><br><br>
            <label class="col-md-1 col-xs-12">4:</label>
            <div class="col-md-6">
              <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="diagnostico_egr4" name="diagnostico_egr4" />
            </div>
            <label class="col-md-1 col-xs-12" align="left">CIE-10:</label>
            <div class="col-md-4">
              <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="cie8" name="cie8" />
            </div>
          </div><br>
          <div class="col-md-12"><br>
            <label class="col-md-15 col-xs-12" align="center"><strong>EVOLUCION, COMPLICACIONES<span style="color:red">*</span>:(C6)</strong></label>
            <div class="col-md-12">
              <textarea style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="evolu_compli" name="evolu_compli" rows="8" cols="40" required /></textarea>
            </div><br>
          </div><br>
          <div class="col-md-12"><br>
            <label class="col-md-15 col-xs-12" align="center"><strong> EXAMENES COMPLEMENTARIOS DE DIAGNOSTICO<span style="color:red">*</span>:(C7)</strong></label>
            <div class="col-md-12">
              <textarea style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="exam_comple" name="exam_comple" rows="8" cols="40" required /></textarea>
            </div><br>
          </div><br>
          <div class="col-md-12"><br>
            <label class="col-md-15 col-xs-12" align="center"><strong> OTROS EXAMENES E INTERCONSULTAS<span style="color:red">*</span>:(C8)</strong></label>
            <div class="col-md-12">
              <textarea style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="otros_exam_iter" name="otros_exam_iter" rows="8" cols="40" required/></textarea>
            </div><br>
          </div><br>
          <div class="col-md-12"><br>
            <label class="col-md-15 col-xs-12" align="center"><strong> TRATAMIENTOS REALIZADOS<span style="color:red">*</span>:(C9)</strong></label>
            <div class="col-md-12">
              <textarea style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="tratamiento_rea" name="tratamiento_rea" rows="8" cols="40" required /></textarea>
            </div><br>
          </div><br>
          <div class="col-md-12"><br>
            <label class="col-md-15 col-xs-12" align="center"><strong> RECOMENDACIONES PARA EL PACIENTE<span style="color:red">*</span>:(C10)</strong></label>
            <div class="col-md-12">
              <textarea style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="recom_pac" name="recom_pac" rows="8" cols="40" required/></textarea>
            </div>
            <br>
            <div class="col-md-12"><br>
              <label class="col-md-15 col-xs-12" align="center"><strong> OTROS ANEXOS O ESTUDIO PENDIENTES<span style="color:red">*</span>:(C11)</strong></label>
              <div class="col-md-12">
                <textarea style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="otros_anexos" name="otros_anexos" rows="8" cols="40" required/></textarea>
              </div>
              <br>
              <div class="col-md-12"><br>
                <label class="col-md-15 col-xs-12" align="center"><strong> OBSERVACIONES/RECOMENDACIONES A LA CONTRAREFERENCIA<span style="color:red">*</span>:(C12)</strong></label>
                <div class="col-md-12">
                  <textarea style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="obs_recom" name="obs_recom" rows="8" cols="40" required/></textarea>
                </div>
                <br>
              </div><br>
              <label class="col-md-15 col-xs-12" align="center"><strong>ESTABLECIMIENTOS DE SALUD AL QUE SE REALIZA LA CONTRAREFERENCIA(C13)</strong></label>
              <div class="col-md-12">
                <label class="col-md-2 col-xs-12" align="left"><strong>ESTABLECIMIENTO DE SALUD<span style="color:red">*</span>:</strong></label>
                <div class="col-md-4">
                  <input type="hidden" id="estable_salud" name="estable_salud">
                  <select style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" class="form-control establecimiento" id="estable_salud_b" name="estable_salud_b" required />
                  <option value="v">-- Escoger Establecimiento de Salud--</option>
                  </select>
                </div>
                <label class="col-md-2 col-xs-12" align="left"><strong>MUNICIPIO<span style="color:red">*</span>:</strong></label>
                <div class="col-md-4">
                  <input type="hidden" id="municipio2" name="municipio2">
                  <select style="background-color: #E8EAEA; border: 1px solid #3AB0FD; color: #555;" class="form-control municipio" id="municipio_name_b" name="municipio_name_b" required disabled />
                  <option value="v">-- Escoger Municipio--</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <label class="col-md-2 col-xs-12" align="left"><strong>NIVEL DE EESS:</strong></label>
                <div class="col-md-4">
                  <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="nivel_eess2" name="nivel_eess2" />
                </div>

                <label class="col-md-2 col-xs-12" align="left"><strong>RED DE SALUD:</strong></label>
                <div class="col-md-4">
                  <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="red_salud2" name="red_salud2" />
                </div>
                <br><br>
                <label class="col-md-2 col-xs-12" align="left"><strong>SE CONTACTO AL ESTABLECIMIENTO:</strong></label>
                <div class="col-md-4">
                  <select style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" class="form-control" id="secontac" name="secontac" />
                  <option value="">-- Escoger Servicio--</option>
                  <option value="Si">Si</option>
                  <option value="No">No</option>
                  </select>
                </div>
                <label class="col-md-2 col-xs-12" align="left"><strong>POR TELESALUD:</strong></label>
                <div class="col-md-4">
                  <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="telesalud" name="telesalud" />
                </div>
              </div>
              <div class="col-md-12">
                <label class="col-md-3 col-xs-12" align="left"><strong>CONTACTO DEL ESTABLECIMIENTO QUE RECIBE LA CONTRAREFERENCIA:</strong></label>
                <div class="col-md-8">
                  <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="contacto_estable" name="contacto_estable" />
                </div>
              </div><br><br>
              <div class="col-md-12">
                <label class="col-md-3 col-xs-12" align="left"><strong>NOMBRE DE ACOMPAÑANTE, FAMILIAR Y OTROS:</strong></label>
                <div class="col-md-8">
                  <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="nombre_acompa" name="nombre_acompa" />
                </div>
              </div>
              <div class="col-md-12">
                <label class="col-md-3 col-xs-12" align="left"><strong>NOMBRE DE MEDICO QUE CONTRAREFIERE<span style="color:red">*</span>:</strong></label>
                <div class="col-md-8">
                  <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="nombre_medico" name="nombre_medico" required/>
                </div>
              </div>
            </div><br>
            <div class="col-md-12"><br>
              <h4 align="left"><strong>ASEGURESE DE LLENAR TODOS LOS CAMPOS</strong></h4>
              <div class="col-md-12">
                <a href="/index.php" title="" class="btn btn-primary" data-original-title="Nuvo Paciente" style="padding: 4px 60px;"><span class="icon_profile"><i class="fa fa-reply-all" aria-hidden="true"></i></span><strong>ATRAS </strong></a>
                <button type="reset" class="btn bg-defaultd  btn-flat" data-dismiss="form" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i><strong>&nbsp; &nbsp;RESTABLECER</strong></button>
                <button name="a_nuevo" type="submit" class="btn btn-success btn-flat"> REGISTRAR FORMULARIO E IMPRIMIR </button>
              </div><br>
            </div><br>

            <div class="col-md-12"><br>
              <br>
            </div>
            </form>
          </div>

        </div>

      </div>





      <div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
          <ul class="list-inline item-details">
            <li><a href="http://themifycloud.com/downloads/janux-premium-responsive-bootstrap-admin-dashboard-template/">Admin templates</a></li>
            <li><a href="http://themescloud.org">Bootstrap themes</a></li>
          </ul>
        </div>
      </div>
    </div>


  </div>
  <!-- END PAGE CONTENT WRAPPER -->
  </div>
  <!-- END PAGE CONTENT -->
  </div>
  <!-- END PAGE CONTAINER -->

  <!-- MESSAGE BOX-->

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
  <script type="text/javascript" src="js/plugins/scrolltotop/scrolltopcontrol.js"></script>

  <script type="text/javascript" src="js/plugins/morris/raphael-min.js"></script>
  <script type="text/javascript" src="js/plugins/morris/morris.min.js"></script>
  <script type="text/javascript" src="js/plugins/rickshaw/d3.v3.js"></script>
  <script type="text/javascript" src="js/plugins/rickshaw/rickshaw.min.js"></script>
  <script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
  <script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>
  <script type='text/javascript' src='js/plugins/bootstrap/bootstrap-datepicker.js'></script>
  <script type="text/javascript" src="js/plugins/owl/owl.carousel.min.js"></script>

  <script type="text/javascript" src="js/plugins/moment.min.js"></script>
  <script type="text/javascript" src="js/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- END THIS PAGE PLUGINS-->

  <!-- START TEMPLATE -->
  <script type="text/javascript" src="js/settings.js"></script>

  <script type="text/javascript" src="js/plugins.js"></script>
  <script type="text/javascript" src="js/actions.js"></script>
  <script type="text/javascript" src="js/formularios.js"></script>


  <!-- END TEMPLATE -->

  <script src="js/dataTables/jquery.dataTables.js"></script>
  <script src="js/dataTables/dataTables.bootstrap.js"></script>
  <script>
    $(document).ready(function() {
      $('#dataTables-example').dataTable();
    });
  </script>
  <!-- END SCRIPTS -->

</body>

</html>
