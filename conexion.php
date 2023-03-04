<?php
    $host = "localhost";
    $user = "root";
    $clave = "q9^c6MgV6F*5";
    $bd = "contrareferencia";
    $conexion = mysqli_connect($host,$user,$clave,$bd);
    if (mysqli_connect_errno()){
        echo "No se pudo conectar a la base de datos";
        exit();
    }
    mysqli_select_db($conexion,$bd) or die("No se encuentra la base de datos");
    mysqli_set_charset($conexion,"utf8");


    $serverName      = '192.168.0.19\serverviedma';
    $DB_NAME2      = 'BDSNIS';
    $DB_USERNAME2  = 'fichas';
    $DB_PASSWORD2  = 'fichas2021';

    $connectionInfo = array( "Database"=>$DB_NAME2, "UID"=>$DB_USERNAME2, "PWD"=>$DB_PASSWORD2);
    $sqlsrvconn = sqlsrv_connect($serverName, $connectionInfo);
?>
