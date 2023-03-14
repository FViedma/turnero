<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejemplo</title>
</head>
<body>

<?php

require ("../funciones/conexion.php");
//$conexion= mysqli_connect($db_host, $db_usuario,$db_contraseña);
if(mysqli_connect_errno()){
    echo "Fallo al conectar con labase de datos";
    exit();
}

$consulta="SELECT * FROM videos";
$resultado=mysqli_query($con,$consulta);

//while($fila=mysqli_fetch_array($resultado));
//{
    //echo $fila;
    //$nombre=$fila['nombre'];
    //$sinopsis=$fila['sinopsis'];
    //$url=$fila['url'];

    //echo("<h1>$nombre</h1>");
    //echo("<h1>$sinopsis</h1>");
    //echo("<video src= '$url' controls= 'controls' width='450' heigth='450/>'");

//}

print_r(mysqli_fetch_array($resultado));
mysqli_close($con);

?>  

</body>
</html>