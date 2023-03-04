<?php 
    session_start();
    if(isset($_SESSION['usuario'])){
        header("Location: principal.php");
    }
?>
<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>Joli Admin - Responsive Bootstrap Admin Template</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->                                     
    </head>
    <body>
        
        <div class="login-container lightmode">
        
            <div class="login-box animated fadeInDown">
                <!--div class="login-logo"></div-->
                <div class="login-body">
                    <div class="login-title"><strong>Inicia Sesión</strong> a tu cuenta</div>
					<form id="miFormulario" action="login.php" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
							<input type="text" class="form-control" name="usuario" id="usuario" placeholder="usuario" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
							<input type="password" name="contra" id="contra" class="form-control" placeholder="contraseña" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <div class="profile-image">
						<img src="assets/images/user.png"/>
                    </div>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-info btn-block" type="submit">Ingresar</button>
                        </div>
                    </div>
					
				
                   
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2017
                    </div>
                   
                </div>
            </div>
            
        </div>
        
    </body>
</html>






