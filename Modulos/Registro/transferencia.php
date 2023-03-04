<?php
include "conexion.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
mysqli_query($conexion, "DELETE FROM transferen1");
date_default_timezone_set("America/La_Paz");
//include('conexion/verificar_gestion.php');
if (isset($_POST['a_nuevo'])) {
  $establecimiento_salud = $_POST['establecimiento_salud'];
  $nivel_eess_c1 = $_POST['nivel_eess_c1'];
  $red_salud = $_POST['red_salud'];
  $municipio = $_POST['municipio2'];
  $fecha = $_POST['fecha'];
  $hora = $_POST['hora'];
  $fecha_envio = $_POST['fecha_envio'];
  $hora_envio = $_POST['hora_envio'];
  $tel_eess = $_POST['tel_eess'];
  $paciente = $_POST['paciente'];
  $fecha_nacimiento = $_POST['fecha_nacimiento'];
  $ci = $_POST['ci'];
  $domicilio = $_POST['domicilio'];
  $tel_cel = $_POST['tel_cel'];
  $nro_hist_clini = $_POST['histclini'];
  $procedencia = $_POST['procedencia'];
  $edad = $_POST['edad'];
  $sexo = $_POST['sexo'];
  $per_disc = $_POST['per_disc'];
  $tipo_disc = $_POST['tipo_disc'];
  $grado_disc = $_POST['grado_disc'];
  $nombre_acompa = $_POST['nombre_acompa'];
  $parentesco = $_POST['parentesco'];
  $tel_paren = $_POST['tel_paren'];
  $frecuencia_cardiaca = $_POST['frecuencia_cardiaca'];
  $frecuencia_respiratoria = $_POST['frecuencia_respiratoria'];
  $presion_arterial = $_POST['presion_arterial'];
  $temperatura = $_POST['temperatura'];
  $peso = $_POST['peso'];
  $talla = $_POST['talla'];
  $glasgow = $_POST['glasgow'];
  $spo2 = $_POST['spo2'];
  $imc = $_POST['imc'];
  $internado = $_POST['internado'];
  $dias_inter = $_POST['dias_inter'];
  $fecha_ingreso = $_POST['fecha_ingreso'];
  $o_tros = $_POST['o_tros'];
  $rayosx = $_POST['rayosx'];
  $laboratorio = $_POST['laboratorio'];
  $ecografia = $_POST['ecografia'];
  $tomografia = $_POST['tomografia'];
  $otros = $_POST['otros'];
  $diagnostico_pres1 = $_POST['diagnostico_egr1'];
  $cie1 = $_POST['cie5'];
  $diagnostico_pres2 = $_POST['diagnostico_egr2'];
  $cie2 = $_POST['cie6'];
  $diagnostico_pres3 = $_POST['diagnostico_pres3'];
  $cie3 = $_POST['cie3'];
  $diagnostico_pres4 = $_POST['diagnostico_pres4'];
  $cie4 = $_POST['cie4'];
  $tratamiento1 = $_POST['tratamiento1'];
  $tratamiento2 = $_POST['tratamiento2'];
  $tratamiento3 = $_POST['tratamiento3'];
  $tratamiento4 = $_POST['tratamiento4'];
  $tratamiento5 = $_POST['tratamiento5'];
  $otros_anexos = $_POST['otros_anexos'];
  $cuales = $_POST['cuales'];
  $observaciones1 = $_POST['observaciones1'];
  $observaciones2 = $_POST['observaciones2'];
  $observaciones3 = $_POST['observaciones3'];
  $observaciones4 = $_POST['observaciones4'];
  $observaciones5 = $_POST['observaciones5'];
  $motivo_transferencia = $_POST['motivo_transferencia'];
  $nombre_medico = $_POST['nombre_medico'];
  $cargo_med = $_POST['cargo_med'];
  $nro_tel_med = $_POST['nro_tel_med'];
  $nombre_personal = $_POST['nombre_personal'];
  $motivo_transde = $_POST['motivo_transde'];
  $serv_espe = $_POST['serv_espe'];
  $telesalud = $_POST['telesalud'];
  $estable_salud = $_POST['estable_salud'];
  $nivel2 = $_POST['nivel2'];
  $subsector = $_POST['subsector'];
  $nombre_contact = $_POST['nombre_contact'];
  $medio_comunicacion = $_POST['medio_comunicacion'];
  $reportado_cces = $_POST['reportado_cces'];
  $nombre_resc_paci = $_POST['nombre_resc_paci'];
  $fecha_recep = $_POST['fecha_recep'];
  $hora_recep = $_POST['hora_recep'];
  $medico_respon = $_POST['medico_respon'];
  $paciente_admit = $_POST['paciente_admit'];
  $motivo = $_POST['motivo'];
  $sql = "INSERT INTO `transferen` (`establecimiento_salud`, `nivel_eess_c1`, `red_salud`, 
  `municipio`, `fecha`, `hora`, `fecha_envio`, `hora_envio`, `tel_eess`, `paciente`, `fecha_nacimiento`, `ci`,
   `domicilio`, `tel_cel`, `nro_hist_clini`, `procedencia`, `edad`, `sexo`, `per_disc`, `tipo_disc`, `grado_disc`,
    `nombre_acompa`, `parentesco`, `tel_paren`, `frecuencia_cardiaca`, `frecuencia_respiratoria`, `presion_arterial`,
     `temperatura`, `peso`, `talla`, `glasgow`, `spo2`, `imc`,`internado`, `dias_inter`,`fecha_ingreso`,
        `o_tros`, `rayosx`, `laboratorio`, `ecografia`, `tomografia`, `otros`, `diagnostico_pres1`, `cie1`,
         `diagnostico_pres2`, `cie2`, `diagnostico_pres3`, `cie3`,`diagnostico_pres4`, `cie4`, `tratamiento1`,`tratamiento2`,`tratamiento3`,`tratamiento4`,`tratamiento5`, `otros_anexos`, `cuales`,
          `observaciones1`,`observaciones2`,`observaciones3`,`observaciones4`,`observaciones5`,`motivo_transferencia`,
           `nombre_medico`, `cargo_med`, `nro_tel_med`, `nombre_personal`, `motivo_transde`, `serv_espe`,
            `telesalud`, `estable_salud`, `nivel2`, `subsector`, `nombre_contact`, `medio_comunicacion`,
             `reportado_cces`, `nombre_resc_paci`, `fecha_recep`, `hora_recep`, `medico_respon`, `paciente_admit`,
              `motivo`) VALUES ('$establecimiento_salud', '$nivel_eess_c1', '$red_salud', '$municipio', '$fecha', 
              '$hora', '$fecha_envio', '$hora_envio', '$tel_eess', '$paciente', '$fecha_nacimiento', '$ci', '$domicilio', 
              '$tel_cel', '$nro_hist_clini', '$procedencia', '$edad', '$sexo', '$per_disc', '$tipo_disc', '$grado_disc', '$nombre_acompa', '$parentesco', '$tel_paren', '$frecuencia_cardiaca',
               '$frecuencia_respiratoria', '$presion_arterial', '$temperatura', '$peso', '$talla', '$glasgow', '$spo2', '$imc','$internado', '$dias_inter','$fecha_ingreso', '$o_tros', '$rayosx', '$laboratorio', '$ecografia', '$tomografia', 
               '$otros', '$diagnostico_pres1', '$cie1', '$diagnostico_pres2', '$cie2', '$diagnostico_pres3', '$cie3','$diagnostico_pres4', '$cie4', '$tratamiento1','$tratamiento2','$tratamiento3','$tratamiento4','$tratamiento5', '$otros_anexos',
                '$cuales', '$observaciones1','$observaciones2','$observaciones3','$observaciones4','$observaciones5','$motivo_transferencia', '$nombre_medico', '$cargo_med',
                 '$nro_tel_med', '$nombre_personal', '$motivo_transde', '$serv_espe', '$telesalud', '$estable_salud', '$nivel2', '$subsector', '$nombre_contact', '$medio_comunicacion', '$reportado_cces',
                  '$nombre_resc_paci', '$fecha_recep', '$hora_recep', '$medico_respon', '$paciente_admit', '$motivo')";
  $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));


  $sql = "INSERT INTO `transferen1` (`establecimiento_salud`, `nivel_eess_c1`, `red_salud`, 
  `municipio`, `fecha`, `hora`, `fecha_envio`, `hora_envio`, `tel_eess`, `paciente`, `fecha_nacimiento`, `ci`,
   `domicilio`, `tel_cel`, `nro_hist_clini`, `procedencia`, `edad`, `sexo`, `per_disc`, `tipo_disc`, `grado_disc`,
    `nombre_acompa`, `parentesco`, `tel_paren`, `frecuencia_cardiaca`, `frecuencia_respiratoria`, `presion_arterial`,
     `temperatura`, `peso`, `talla`, `glasgow`, `spo2`, `imc`,`internado`, `dias_inter`,`fecha_ingreso`,
        `o_tros`, `rayosx`, `laboratorio`, `ecografia`, `tomografia`, `otros`, `diagnostico_pres1`, `cie1`,
         `diagnostico_pres2`, `cie2`, `diagnostico_pres3`, `cie3`,`diagnostico_pres4`, `cie4`, `tratamiento1`,`tratamiento2`,`tratamiento3`,`tratamiento4`,`tratamiento5`, `otros_anexos`, `cuales`,
         `observaciones1`,`observaciones2`,`observaciones3`,`observaciones4`,`observaciones5`,`motivo_transferencia`,
           `nombre_medico`, `cargo_med`, `nro_tel_med`, `nombre_personal`, `motivo_transde`, `serv_espe`,
            `telesalud`, `estable_salud`, `nivel2`, `subsector`, `nombre_contact`, `medio_comunicacion`,
             `reportado_cces`, `nombre_resc_paci`, `fecha_recep`, `hora_recep`, `medico_respon`, `paciente_admit`,
              `motivo`) VALUES ('$establecimiento_salud', '$nivel_eess_c1', '$red_salud', '$municipio', '$fecha', 
              '$hora', '$fecha_envio', '$hora_envio', '$tel_eess', '$paciente', '$fecha_nacimiento', '$ci', '$domicilio', 
              '$tel_cel', '$nro_hist_clini', '$procedencia', '$edad', '$sexo', '$per_disc', '$tipo_disc', '$grado_disc', '$nombre_acompa', '$parentesco', '$tel_paren', '$frecuencia_cardiaca',
               '$frecuencia_respiratoria', '$presion_arterial', '$temperatura', '$peso', '$talla', '$glasgow', '$spo2', '$imc','$internado', '$dias_inter','$fecha_ingreso','$o_tros', '$rayosx', '$laboratorio', '$ecografia', '$tomografia', 
               '$otros', '$diagnostico_pres1', '$cie1', '$diagnostico_pres2', '$cie2', '$diagnostico_pres3', '$cie3','$diagnostico_pres4', '$cie4', '$tratamiento1','$tratamiento2','$tratamiento3','$tratamiento4','$tratamiento5', '$otros_anexos',
                '$cuales', '$observaciones1','$observaciones2','$observaciones3','$observaciones4','$observaciones5','$motivo_transferencia', '$nombre_medico', '$cargo_med',
                 '$nro_tel_med', '$nombre_personal', '$motivo_transde', '$serv_espe', '$telesalud', '$estable_salud', '$nivel2', '$subsector', '$nombre_contact', '$medio_comunicacion', '$reportado_cces',
                  '$nombre_resc_paci', '$fecha_recep', '$hora_recep', '$medico_respon', '$paciente_admit', '$motivo')";
  $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
  header("Location:reporte_transfe.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- META SECTION -->
  <title>FORMULARIO TRANSFERENCIA D7b.</title>
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

      <!-- MESSAGES -->

      <!-- END MESSAGES -->



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
              <form name="form1" method="post" id="Regcom" enctype="multipart/form-data" target="_blank">
            </div>
            <div class="col-md-12"><br>
              <label class="col-md-12 col-xs-12" align="center">
                <h2><strong>FORMULARIO TRANSFERENCIA D7b.</strong></h3>
              </label>
            </div><br><br>

            <label class="col-md-14 col-xs-12" align="center"><strong>DATOS DEL ESTABLECIMIENTO DE SALUD QUE TRANSFIERE(C1)</strong></label>
            <div class="col-md-12">
              <label class="col-md-2 col-xs-12" align="left"><strong>ESTABLECIMIENTO DE SALUD<span style="color:red">*</span>:</strong></label>
              <div class="col-md-4">
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD; color: #555;" class="form-control" type="text" id="establecimiento_salud" name="establecimiento_salud" value="HOSPITAL CLINICO VIEDMA" required>
              </div>
              <label class="col-md-2 col-xs-12" align="left"><strong>NIVEL DE EESS<span style="color:red">*</span>:</strong></label>
              <div class="col-md-4">
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD; color: #555;" type="text" class="form-control" id="nivel_eess_c1" name="nivel_eess_c1" value="3" required />
              </div>
              <div>
              </div>

              <div class="col-md-12">
                <label class="col-md-2 col-xs-12" align="left"><strong>RED DE SALUD<span style="color:red">*</span>:</strong></label>
                <div class="col-md-4">
                  <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD; color: #555;" type="text" class="form-control" id="red_salud" name="red_salud" value="RED 1" required />

                </div>
                <label class="col-md-2 col-xs-12" align="left"><strong>MUNICIPIO<span style="color:red">*</span>:</strong></label>
                <div class="col-md-4">
                  <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD; color: #555;" class="form-control" type="text" id="municipio2" name="municipio2" value="CERCADO" required>
                </div>
                <br><br>
                <label class="col-md-2 col-xs-12" align="left"><strong>FECHA:</strong></label>
                <div class="col-md-3">
                  <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" class="form-control" type="date" name="fecha" value="<?php echo date('Y-m-d'); ?>">
                </div>
                <label class="col-md-2 col-xs-12" align="left"><strong>HORA:</strong></label>
                <div class="col-md-3">
                  <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" class="form-control" type="time" name="hora" value="<?php echo date('H:i'); ?>">
                </div>
              </div>
              <label class="col-md-2 col-xs-12" align="left"><strong>FECHA DE ENVIO:</strong></label>
              <div class="col-md-3">
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" class="form-control" type="date" name="fecha_envio" value="<?php echo date('Y-m-d'); ?>">
              </div>
              <label class="col-md-2 col-xs-12" align="left"><strong>HORA DE ENVIO:</strong></label>
              <div class="col-md-3">
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" class="form-control" type="time" name="hora_envio" value="<?php echo date('H:i'); ?>">
              </div>
            </div>
            <div class="col-md-12">
              <label class="col-md-2 col-xs-12" align="left"><strong>TELEFONO DE CONTACTO:</strong></label>
              <div class="col-md-4">
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="tel_eess" name="tel_eess" />
              </div>
            </div>
          </div>
          <br><br>
          <label class="col-md-15 col-xs-12" align="center"><strong>IDENTIFICACION DEL PACIENTE(C2)</strong></label>
          <div class="col-md-12"><br>
            <div class="col-md-12">
              <label class="col-md-2 col-xs-12" align="left"><strong>FECHA NAC.<span style="color:red">*</span>:</strong></label>
              <div class="col-md-3">
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" class="form-control" type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo date('Y-m-d'); ?>" required>
              </div>
              <label class="col-md-1 col-xs-12" align="left"><strong>CI<span style="color:red">*</span>:</strong></label>
              <div class="col-md-3">
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="ci" name="ci" required />
              </div>
              <button id="btn-verificar" name="btn-verificar" class="btn btn-success btn-flat"> Verificar</button>
            </div>
            <label class="col-md-2 col-xs-12" align="left"><strong>NOMBRES Y APELLIDOS<span style="color:red">*</span>:</strong></label>
            <div class="col-md-10">
              <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="paciente" name="paciente" required />
            </div>
            <div class="col-md-12">
              <label class="col-md-2 col-xs-12" align="left"><strong>DOMICILIO:</strong></label>
              <div class="col-md-4">
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="domicilio" name="domicilio" />
              </div>
              <label class="col-md-1 col-xs-12" align="left"><strong>TEL/CEL<span style="color:red">*</span>:</strong></label>
              <div class="col-md-4">
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control phone" id="tel_cel" name="tel_cel" required />
              </div>
            </div>

            <div class="col-md-12">
              <label class="col-md-2 col-xs-12" align="left"><strong>Nº de H.C<span style="color:red">*</span>:</strong></label>
              <div class="col-md-2">
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="histclini" name="histclini" required />
              </div>
              <label class="col-md-2 col-xs-12" align="left"><strong>PROCEDENCIA<span style="color:red">*</span>:</strong></label>
              <div class="col-md-3">
                <select style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" class="form-control" id="procedencia" name="procedencia" required />
                <option value="Boliviano"> Boliviano/a</option>
                <option value="Extranjero"> Extranjero</option>
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <label class="col-md-2 col-xs-12" align="left"><strong>EDAD<span style="color:red">*</span>:</strong></label>
              <div class="col-md-2">
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="edad" name="edad" required />
              </div>
              <label class="col-md-1 col-xs-12" align="left"><strong>SEXO<span style="color:red">*</span>:</strong></label>
              <div class="col-md-2">
                <select style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" class="form-control" id="sexo" name="sexo" required />
                <option value="">-- Escoger --</option>
                <option value="Masculino"> Masculino</option>
                <option value="Femenino"> Femenino</option>
                </select>
              </div>
              <label class="col-md-2 col-xs-12" align="left"><strong>PERSONA CON DISCAPACIDAD<span style="color:red">*</span>:</strong></label>
              <div class="col-md-2">
                <select style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" class="form-control" id="per_disc" name="per_disc" required />
                <option value="No"> No</option>
                <option value="Si"> Si</option>
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <label class="col-md-2 col-xs-12" align="left"><strong id="tipo_disc_label" name="tipo_disc_label">TIPO DE DISCAPACIDAD:</strong></label>
              <div class="col-md-2">
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="tipo_disc" name="tipo_disc" />

              </div>
              <label class="col-md-2 col-xs-12" align="left"><strong id="grad_disc_label" name="grad_disc_label">GRADO DE DISCAPACIDAD:</strong></label>
              <div class="col-md-2">
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="grado_disc" name="grado_disc" />
              </div>
            </div>
            <div class="col-md-12">
              <label class="col-md-2 col-xs-12" align="left"><strong>NOMBRE DEL ACOMPAÑANTE<span style="color:red">*</span>:</strong></label>
              <div class="col-md-10">
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="nombre_acompa" name="nombre_acompa" required />
              </div>
            </div>
            <div class="col-md-12">
              <label class="col-md-2 col-xs-12" align="left"><strong>PARENTESCO<span style="color:red">*</span>:</strong></label>
              <div class="col-md-3">
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="parentesco" name="parentesco" required />
              </div>
              <label class="col-md-2 col-xs-12" align="left"><strong>TEL/CEL ACOMP<span style="color:red">*</span>:</strong></label>
              <div class="col-md-4">
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control phone" id="tel_paren" name="tel_paren" required />
              </div>
            </div>
          </div>
          <br><br><br>
          <label class="col-md-15 col-xs-12" align="center"><strong>DATOS CLINICOS Y SIGNOS VITALES(C3)</strong></label>

          <div class="col-md-12"><br>
            <label class="col-md-2 col-xs-12" align="left"><strong>FRECUENCIA CARDIACA<span style="color:red">*</span>:</strong></label>
            <div class="col-md-1">
              <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="frecuencia_cardiaca" name="frecuencia_cardiaca" required />
            </div>

            <label class="col-md-2 col-xs-12" align="left"><strong>FRECUENCIA RESPIRATORIA<span style="color:red">*</span>:</strong></label>
            <div class="col-md-1">
              <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="frecuencia_respiratoria" name="frecuencia_respiratoria" required />
            </div>
            <label class="col-md-2 col-xs-12" align="left"><strong>PRESION ARTERIAL<span style="color:red">*</span>:</strong></label>
            <div class="col-md-1">
              <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="presion_arterial" name="presion_arterial" required />
            </div>
            <label class="col-md-2 col-xs-12" align="left"><strong>TEMPERATURA<span style="color:red">*</span>:</strong></label>
            <div class="col-md-1">
              <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="temperatura" name="temperatura" required />
            </div>
          </div>
          <div class="col-md-12"><br>
            <label class="col-md-1 col-xs-12" align="left"><strong>PESO:</strong></label>
            <div class="col-md-1">
              <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="peso" name="peso" />
            </div>
            <label class="col-md-1 col-xs-12" align="left"><strong>TALLA:</strong></label>
            <div class="col-md-1">
              <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="talla" name="talla" />
            </div>
            <label class="col-md-1 col-xs-12" align="left"><strong>GLASGOW<span style="color:red">*</span>:</strong></label>
            <div class="col-md-2">
              <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="glasgow" name="glasgow" required />
            </div>
            <label class="col-md-1 col-xs-12" align="left"><strong>SPO2<span style="color:red">*</span>:</strong></label>
            <div class="col-md-1">
              <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="spo2" name="spo2" required />
            </div>
            <label class="col-md-1 col-xs-12" align="left"><strong>IMC:</strong></label>
            <div class="col-md-1">
              <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="imc" name="imc" />
            </div>


          </div>
          <br>
          <div class="col-md-12"><br>
            <label class="col-md-15 col-xs-12" align="center"><strong>RESUMEN DE ANAMNESIS Y EXAMEN FISICO (C4)</strong></label>
            <div class="col-md-12">
              <label class="col-md-2 col-xs-12" align="left"><strong>ESTUVO INTERNADO<span style="color:red">*</span>:</strong></label>
              <div class="col-md-2">
                <select style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" class="form-control" id="internado" name="internado" required />
                <option value="No"> No</option>
                <option value="Si"> Si</option>
                </select>
              </div>
              <label class="col-md-2 col-xs-12" align="left"><strong id="dias_inter_label" name="dias_inter_label">DIAS DE INTERNACION:</strong></label>
              <div class="col-md-1">
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="dias_inter" name="dias_inter" />
              </div>
              <label class="col-md-2 col-xs-12" align="left"><strong id="fecha_ingr_label" name="fecha_ingr_label">FECHA DE INGRESO:</strong></label>
              <div class="col-md-3">
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso" />
              </div>
              <div class="col-md-12">
                <textarea style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="o_tros" name="o_tros" rows="8" cols="40" placeholder="Evolucion del paciente..." /></textarea>
              </div>

            </div>

          </div><br>
          <div class="col-md-12"><br>
            <label class="col-md-15 col-xs-12" align="center"><strong>REALIZO EXAMENES COMPLEMENTARIOS DE DIAGNOSTICO (C5)</strong></label>
            <div class="col-md-12">
              <label class="col-md-2 col-xs-12" align="left">EXAMEN COMPL</label>
              <label class="col-md-5 col-xs-12" align="right">DESCRIPCION DE HALLAGOS LLAMATIVOS</label>
            </div>
            <div class="col-md-12">
              <label class="col-md-2 col-xs-12" align="left"><strong>RAYOS X:</strong></label>
              <div class="col-md-10">
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="rayosx" name="rayosx" />
              </div>
              <label class="col-md-2 col-xs-12" align="left"><strong>LABORATORIO:</strong></label>
              <div class="col-md-10">
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="laboratorio" name="laboratorio" />
              </div>
              <label class="col-md-2 col-xs-12" align="left"><strong>ECOGRAFIA:</strong></label>
              <div class="col-md-10">
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="ecografia" name="ecografia" />
              </div>
              <label class="col-md-2 col-xs-12" align="left"><strong>TOMOGRAFIA:</strong></label>
              <div class="col-md-10">
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="tomografia" name="tomografia" />
              </div>
              <label class="col-md-2 col-xs-12" align="left"><strong>OTROS (especifique):</strong></label>
              <div class="col-md-10">
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="otros" name="otros" />
              </div>
            </div>
            <br>
            <div class="col-md-12"><br>
              <label class="col-md-15 col-xs-12" align="center"><strong> DIAGNOSTICOS:(C5)</strong></label>
              <label class="col-md-1 col-xs-12">A<span style="color:red">*</span>:</label>
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
              <label class="col-md-1 col-xs-12">B:</label>
              <div class="col-md-6">
                <input type="hidden" id="diagnostico_egr2" name="diagnostico_egr2" />
                <select style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" class="form-control diagnostico" id="diag_egr2" name="diag_egr2" />
                </select>
              </div>
              <label class="col-md-1 col-xs-12" align="left">CIE-10:</label>
              <div class="col-md-4">
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="cie6" name="cie6" />
              </div>

              <label class="col-md-1 col-xs-12">C:</label>
              <div class="col-md-6">
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="diagnostico_pres3" name="diagnostico_pres3" />
              </div>
              <label class="col-md-1 col-xs-12" align="left">CIE-10:</label>
              <div class="col-md-4">
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="cie3" name="cie3" />
              </div>

              <label class="col-md-1 col-xs-12">D:</label>
              <div class="col-md-6">
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="diagnostico_pres4" name="diagnostico_pres4" />
              </div>
              <label class="col-md-1 col-xs-12" align="left">CIE-10:</label>
              <div class="col-md-4">
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="cie4" name="cie4" />
              </div>
            </div>
            <div class="col-md-12"><br>
              <label class="col-md-15 col-xs-12" align="center"><strong> TRATAMIENTO<span style="color:red">*</span>:(C6)</strong></label>
              <div class="col-md-12">
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="tratamiento1" name="tratamiento1" required />
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="tratamiento2" name="tratamiento2" />
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="tratamiento3" name="tratamiento3" />
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="tratamiento4" name="tratamiento4" />
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="tratamiento5" name="tratamiento5" />

              </div>
              <label class="col-md-1 col-xs-12" align="left"><strong>OTROS ANEXOS:</strong></label>
              <div class="col-md-2">
                <select style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" class="form-control" id="otros_anexos" name="otros_anexos" />
                <option value="No"> No</option>
                <option value="Si"> Si</option>
                </select>
              </div>
              <label class="col-md-1 col-xs-12" align="left"><strong id="cuales_label" name="cuales_label">CUALES:</strong></label>
              <div class="col-md-8">
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="cuales" name="cuales" />
              </div>
              <br>
            </div>



            <div class="col-md-12"><br>
              <label class="col-md-15 col-xs-12" align="center"><strong> OBSERVACIONES:(C7)</strong></label>
              <div class="col-md-12">
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="observaciones1" name="observaciones1" />
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="observaciones2" name="observaciones2" />
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="observaciones3" name="observaciones3" />
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="observaciones4" name="observaciones4" />
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="observaciones5" name="observaciones5" />
              </div>
              <label class="col-md-2 col-xs-12" align="left"><strong>MOTIVO DE TRANSFERENCIA<span style="color:red">*</span>:</strong></label>
              <div class="col-md-10">
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="motivo_transferencia" name="motivo_transferencia" required />
              </div>
              <br>
            </div><br>
            <div class="col-md-12"><br>
              <label class="col-md-15 col-xs-12" align="center"><strong>NOMBRE Y CARGO DE QUIEN ENVIA AL PACIENTE O RESPONSABLE DEL ESTABLECIMIENTO DE SALUD QUE TRANSFIERE(C9)</strong></label>
              <label class="col-md-1 col-xs-12" align="left"><strong>NOMBRE<span style="color:red">*</span>:</strong></label>
              <div class="col-md-5">
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="nombre_medico" name="nombre_medico" required />
              </div>
              <label class="col-md-1 col-xs-12" align="left"><strong>CARGO<span style="color:red">*</span>:</strong></label>
              <div class="col-md-5">
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="cargo_med" name="cargo_med" required />
              </div>
            </div>
            <div class="col-md-12"><br>
              <label class="col-md-3 col-xs-12" align="left"><strong>NRO. DE TEL/CEL DEL MEDICO QUE ENVIO:</strong></label>
              <div class="col-md-5">
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="nro_tel_med" name="nro_tel_med" />
              </div>
            </div>
            <div class="col-md-12"><br>
              <label class="col-md-3 col-xs-12" align="left"><strong>NOMBRE DEL PERSONAL DE SALUD QUE ACOMPAÑA<span style="color:red">*</span>:</strong></label>
              <div class="col-md-5">
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="nombre_personal" name="nombre_personal" required />
              </div>
            </div>
            <br>
          </div>
          <div class="col-md-12"><br>

            <label class="col-md-15 col-xs-12" align="center"><strong> MOTIVO DE TRANSFERENCIA(C11) SOLO MARQUE UNO(10)<span style="color:red">*</span></strong></label>
            <div class="col-md-2">
              <select style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" class="form-control" id="motivo_transde" name="motivo_transde" required />
              <option value="">-- Escoger --</option>
              <option value="EMERGENCIA"> EMERGENCIA</option>
              <option value="INTERCONSULTA"> INTERCONSULTA</option>
              </select>
            </div>
            <label class="col-md-2 col-xs-12" align="left"><strong>SERVICIOS/ ESPECIALIDAD<span style="color:red">*</span>:</strong></label>
            <div class="col-md-3">
              <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="serv_espe" name="serv_espe" required />
            </div>
            <label class="col-md-2 col-xs-12" align="left"><strong>POR TELESALUD:</strong></label>
            <div class="col-md-3">
              <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="telesalud" name="telesalud" />
            </div>
            <br>
          </div><br>
          <label class="col-md-15 col-xs-12" align="center"><strong>ESTABLECIMIENTOS DE SALUD RECEPTOR(C11)</strong></label>
          <div class="col-md-12">
            <div class="col-md-12">
              <label class="col-md-2 col-xs-12" align="left"><strong>NOMBRE DEL ESTABLECIMIENTO<span style="color:red">*</span>:</strong></label>
              <div class="col-md-4">
                <select style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" class="form-control establecimiento" id="estable_salud" name="estable_salud" required />
                <option value="">-- Escoger Establecimiento de Salud--</option>
                </select>
              </div>
              <label class="col-md-2 col-xs-12" align="left"><strong>NIVEL:</strong></label>
              <div class="col-md-4">
                <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="text" class="form-control" id="nivel2" name="nivel2" />
              </div>
            </div>
            <div class="col-md-12">
              <label class="col-md-2 col-xs-12" align="left"><strong>SUBSECTOR<span style="color:red">*</span>:</strong></label>
              <div class="col-md-2">
                <select style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" class="form-control" id="subsector" name="subsector" required />
                <option value="">-- Escoger --</option>
                <option value="Publico">Publico</option>
                <option value="Seguridad Social">Seguridad Social</option>
                <option value="Seguridad Social">Privado</option>
                <option value="Seguridad Social">Otro</option>
                </select>
              </div>
            </div><br>
          </div>
          <div class="col-md-12"><br>
            <h4 align="center"><strong>ASEGURESE DE LLENAR TODOS LOS CAMPOS</strong></h4>
            <div class="col-md-12">
              <a href="/index.php" title="" class="btn btn-primary" data-original-title="Nuvo Paciente" style="padding: 4px 60px;"><span class="icon_profile"><i class="fa fa-reply-all" aria-hidden="true"></i></span><strong>ATRAS </strong></a>
              <button type="reset" class="btn bg-defaultd  btn-flat" data-dismiss="form" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i><strong>&nbsp; &nbsp;RESTABLECER</strong></button>
              <a href="reporte_transfe.php"><button name="a_nuevo" type="submit" class="btn btn-success btn-flat"> REGISTRAR FORMULARIO E IMPRIMIR</button></a>
            </div><br>
          </div><br>
          <br>
          <div class="col-md-12"><br>
            <br>
          </div>
        </div>
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
