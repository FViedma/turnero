<?php

use LDAP\Result;

include "conexion.php";

if (isset($_POST['value'])) {
    $idestabl = $_POST['value'];
    $establecimientos = "SELECT t_EstabGest.codmunicip as codmunicip FROM t_provincia inner join t_municipio on t_provincia.codprovi = t_municipio.codprovi inner join t_EstabGest on t_municipio.codmunicip = t_EstabGest.codmunicip WHERE coddepto = 3 and idgestion = 2022 AND codestabl = " . $idestabl . " ORDER BY nomestabl ASC";
    $executed = sqlsrv_query($sqlsrvconn, $establecimientos);
    if ($executed === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    $municipio = sqlsrv_fetch_array($executed, SQLSRV_FETCH_ASSOC);

    $json = json_encode(rtrim($municipio['codmunicip']));
    if ($json) {
        echo $json;
    } else {
        echo json_last_error_msg();
    }
}

if (isset($_POST['verif'])) {
    $ci = $_POST['ci'];
    $fecha = $_POST['fecha'];
    $form = "";
    $verificar_formularios = "";
    switch ($_POST['form']) {
        case 1:
            $form = "contraref ";
            $verificar_formularios = sprintf("SELECT * FROM ".$form." WHERE ci=%d AND fecha_registro='%s'", $ci,$fecha) ;
            break;
        case 2:
            $form = "transferen";
            $verificar_formularios = sprintf("SELECT * FROM ".$form." WHERE ci=%d AND fecha='%s'", $ci, $fecha);
            break;
        case 3:
            $form = "referen";
            $verificar_formularios = sprintf("SELECT * FROM ".$form." WHERE ci=%d AND fecha='%s'", $ci, $fecha);
            break;
    }
    $executed = mysqli_query($conexion, $verificar_formularios);
    if($executed == false) {
        die(print_r((mysqli_error($conexion)), true));
    } else if (mysqli_num_rows($executed) > 0) {
        $json=json_encode($executed);
    }else {
        $json = "";
    }
    echo $json;
    // echo $verificar_formularios;
}

if (isset($_POST['verificar'])) {
    $result= array();
    $ci = $_POST['ci'];
    $paciente = sprintf("SELECT HCL_CODIGO, HCL_NOMBRE, HCL_APPAT, HCL_APMAT,HCL_DIRECC,HCL_TELDOM,HCL_SEXO,HCL_FECNAC FROM SE_HC WHERE HCL_NUMCI = '%s'",$ci);
    $executed = sqlsrv_query($sqlsrvconn2, $paciente);
    if ($executed === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    while ($pacienteReg = sqlsrv_fetch_array($executed, SQLSRV_FETCH_ASSOC)) {
        $nombre = mb_convert_encoding($pacienteReg['HCL_NOMBRE']." ".$pacienteReg['HCL_APPAT']." ".$pacienteReg['HCL_APMAT'],"UTF-8", "UTF-8");
        $now = new DateTime(date("Y-m-d"));
        $fecha_nacimiento = date_format($pacienteReg['HCL_FECNAC'], 'Y-m-d');
        $fechaNac = new DateTime($fecha_nacimiento);
        $diff = date_diff($now, $fechaNac);
        $result = array('HCL_CODIGO'=>$pacienteReg['HCL_CODIGO'], 'HCL_NOMBRE'=>$nombre,'HCL_DIRECC'=>$pacienteReg['HCL_DIRECC'],'HCL_TELDOM'=>$pacienteReg['HCL_TELDOM'],'HCL_SEXO'=>$pacienteReg['HCL_SEXO'],'EDAD'=>$diff->format("%y"),'HCL_FECNAC'=>$fecha_nacimiento);
    }
    $json = json_encode($result);
    if ($json) {
        echo $json;
    } else {
        echo json_last_error_msg();
    }
}
