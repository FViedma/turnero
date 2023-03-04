<?php
include "conexion.php";

if(isset($_POST['llenar_diag'])) {
    buscarDiag($sqlsrvconn2);
}

if(isset($_POST['cie'])) {
   
}

function buscarDiag($sqlsrvconn2) {
    $options = array();
    $diagnosticos = "SELECT CIE_CODIGO, CIE_ALFA, CIE_DESCRIPCION FROM SE_CIE10";
    $executed = sqlsrv_query($sqlsrvconn2, $diagnosticos);
    if ($executed === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    while ($d = sqlsrv_fetch_array($executed, SQLSRV_FETCH_ASSOC)) {

        $codigo = $d['CIE_CODIGO'];
        $alfa = $d['CIE_ALFA'];
        $descripcion = rtrim($d['CIE_DESCRIPCION']);
        $temp = array($codigo, $alfa, $descripcion);
        array_push($options, $temp);
    }

    $json = json_encode($options);
    if ($json){ 
        echo $json;
    }
    else {
       echo json_last_error_msg();
    }
}
