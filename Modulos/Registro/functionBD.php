<?php
include "conexion.php";

$options = array();
$establecimientos = "SELECT t_EstabGest.codmunicip as codmunicip, codestabl,t_municipio.nommunicip as nombmunicip, nomestabl FROM t_provincia inner join t_municipio on t_provincia.codprovi = t_municipio.codprovi inner join t_EstabGest on t_municipio.codmunicip = t_EstabGest.codmunicip WHERE coddepto = 3 and idgestion = 2022 ORDER BY nomestabl ASC";
$executed = sqlsrv_query($sqlsrvconn, $establecimientos);
if ($executed === false) {
    die(print_r(sqlsrv_errors(), true));
}
while ($d = sqlsrv_fetch_array($executed, SQLSRV_FETCH_ASSOC)) {
    $codmuni = $d['codmunicip'];
    $codestabl = $d['codestabl'];
    $nomemunicip = mb_convert_encoding(rtrim($d['nombmunicip']), "UTF-8", "UTF-8");
    $nomestabl = mb_convert_encoding(rtrim($d['nomestabl']), "UTF-8", "UTF-8");
    $temp = array($codmuni, $codestabl, $nomemunicip, $nomestabl);
    array_push($options, $temp);
}


$json = json_encode($options);
if ($json) {
    echo $json;
} else {
    echo json_last_error_msg();
}

