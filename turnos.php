<!doctype html>
<html>
	<head>
	
    	<meta charset="utf-8">
	
    	<title>Turnos</title>
    
        <link rel="stylesheet" type="text/css" href="css/generales.css">
        <link rel="stylesheet" type="text/css" href="css/turnos.css">
        <link rel="stylesheet" type="text/css" href="css/responsivo-turnos.css">
    
    </head>
	<body>
    	
        <div class="contenedor-principal">
        	
            <header>

                <div class="marco-tablaTurnos">
        
                    <div class="contenedor-tablaTurnos">
                    <div class="columna-tablaTurnos">
                            <div class="tabla-turnosArriba">Tipo</div>
                            <div class="tabla-turnosAbajo" id="verTipo">G</div>

                        </div>
                        <div class="columna-tablaTurnos">
                            <div class="tabla-turnosArriba">Turno</div>
                            <div class="tabla-turnosAbajo" id="verTurno">000</div>

                        </div>
                        <div class="columna-tablaTurnos">
                            <div class="tabla-turnosArriba">Caja</div>  
                            <div class="tabla-turnosAbajo" id="verCaja">0</div>
                        </div>
                        
                    </div>

            
            </header>

            <section class="contenido">
                        
                <div class="contenido-izquierda">

                    <?php 
                        require_once('funciones/conexion.php');
                        require_once('funciones/funciones.php');
                        
                        //datos de la empresa
                        $sqlE = "select * from info_empresa";
                        $errorE = "Error al cargar datos de la empresa ";
                        $buscarE = consulta($con,$sqlE,$errorE);
                            
                        $info = mysqli_fetch_assoc($buscarE); 
                    ?>

                    <header class="contenedor-logo">

                        <div class="logo-empresa">
                        
                            <img src="<?php echo $info['logo'];?>">
                        
                        </div>
                        
                        <h1 class="nombre-empresa"><?php echo $info['nombre'];?> Bienvenido</h1>

                    </header>

                    <div class="contenedor-video">
                        
                        <div class="contenedor-reproductor">
                        
                            <iframe  src="https://www.youtube.com/embed/zw9-xodidNA?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        
                        </div>
                    
                    </div>

                </div>
                
                <div class="contenido-derecha">

                    <div class="contenedor-turnos">
                    
                         <table class="tabla-turnos" id="tabla-turnos">
                            <tr><th>Turno</th><th colspan="2">Caja</th></tr>
                        </table>
                    
                    </div><!--contenedor turnos-->

                </div>
        		
            </section><!--contenido-->
            
            <footer class="footer">
                
                <marquee class="noticias">Precio del dolar: 20.00MN - solicita tu targeta de credito - Compra en linea tus marcas favoritas sin dar tus datos - Realiza tus operaciones sin acudir a tu sucursal</marquee>

            </footer>
        
        </div><!--contenedor principal-->
        
        <audio src="tonos/hangouts_message.ogg" id="tono"></audio>
		
        <script src="js/funcionesGenerales.js"></script>
		<script src="js/websocket.js"></script>
		<!--<script src="js/turnos.js"></script>-->
 
    </body>

</html>
