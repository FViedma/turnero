<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require("../funciones/conexion.php");
    $con=mysqli_connect($db);
    if(mysqli_connect_errno()){
        echo "Fallo al conectar con la base de datos";
        exit();
    }

    mysqli_select_db($con,$db) or die("no se encuentre la base de datos");
    mysqli_set_charset($con,"utf8");
    $consulta="SELECY * FROM videos";
    $resultados=mysqli_query($con,$consulta);

    while ($file=mysqli_fetch_array($resultado));
    {
        $nombre=$fila["<center><h1>$nombre</h1><center>"];
        $url=$fila["<center><video src='$url' controls='controls' width='1000' height='720' /><center>"];

        echo("<h1>$nombre</h1>");


    }

    mysqli_close($con);


    ?>
    
</body>
</html>