<?php  
    session_start();
	include("database.php");
    $usuario = $_SESSION['usuario'];
	
    if(!isset($usuario)){
        header("Location: index.php");
    }
	$uid = $_SESSION['idsecretaria'];
	
	$datetime_string = date('c',time());    
    
	if(isset($_POST['action']) or isset($_GET['view']))
	{
		if(isset($_GET['view']))
		{
			header('Content-Type: application/json');
			
			$start = mysqli_real_escape_string($connection,$_GET["start"]);
			$end = mysqli_real_escape_string($connection,$_GET["end"]);
			
			$result = mysqli_query($connection,"SELECT cita.`id`, cita.`start` ,cita.`end` ,cita.`nom_paciente` as title FROM  `cita`, `secretaria` where cita.idsecretaria=secretaria.idsecretaria and (date(start) >= '$start' AND date(start) <= '$end') and secretaria.idsecretaria='".$uid."'");
			while($row = mysqli_fetch_assoc($result))
			{
				$events[] = $row; 
			}
			echo json_encode($events); 
			exit;
			
		}
		elseif($_POST['action'] == "add")
		{  
			mysqli_query($connection,"INSERT INTO `cita` (
				
				`start` ,
				`end` ,
				`nom_paciente` ,
				`descripcion` ,
				`idsecretaria` 
				)
				VALUES (
				
				'".mysqli_real_escape_string($connection,date('Y-m-d H:i:s',strtotime($_POST["start"])))."',
				'".mysqli_real_escape_string($connection,date('Y-m-d H:i:s',strtotime($_POST["end"])))."',
				'".mysqli_real_escape_string($connection,$_POST["title"])."',
				'".mysqli_real_escape_string($connection,$_POST["descripcion"])."',
				'".mysqli_real_escape_string($connection,$uid)."'
				)");
			header('Content-Type: application/json');
			echo '{"id":"'.mysqli_insert_id($connection).'"}';
			exit;
		}
		elseif($_POST['action'] == "update")
		{
			mysqli_query($connection,"UPDATE `cita` set 
				`start` = '".mysqli_real_escape_string($connection,date('Y-m-d H:i:s',strtotime($_POST["start"])))."', 
				`end` = '".mysqli_real_escape_string($connection,date('Y-m-d H:i:s',strtotime($_POST["end"])))."' 
				where idsecretaria = '".mysqli_real_escape_string($connection,$uid)."' and id = '".mysqli_real_escape_string($connection,$_POST["id"])."'");
			exit;
		}
		elseif($_POST['action'] == "delete") 
		{
			mysqli_query($connection,"DELETE from `cita` where idsecretaria = '".mysqli_real_escape_string($connection,$uid)."' and id = '".mysqli_real_escape_string($connection,$_POST["id"])."'");
			if (mysqli_affected_rows($connection) > 0) {
				echo "1";
			}
			exit;
		}
	}
	
	
?>
<!DOCTYPE html>
<html lang="en">
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
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="index.html">Joli Admin</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="assets/images/users/avatar.jpg" alt="John Doe"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="assets/images/users/avatar.jpg" alt="John Doe"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name"><?php echo $usuario; ?></div>
                                <div class="profile-data-title">Bienvenido</div>
                            </div>
                            <div class="profile-controls">
                                <a href="pages-profile.html" class="profile-control-left"><span class="fa fa-info"></span></a>
                                <a href="pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                            </div>
                        </div>                                                                        
                    </li>
                    <li class="xn-title">Navigation</li>
                    <li>
                        <a href="principal.php"><span class="fa fa-desktop"></span> <span class="xn-text">Panel</span></a>                        
                    </li>
					<li class="xn-openable">
                        <a href="#"><span class="fa fa-group"></span> <span class="xn-text">Pacientes</span></a>
                        <ul>
                            <li><a href="paciente.php"><span class="fa fa-edit"></span> Registro</a></li>
                        </ul>
                    </li>                                   
                    <li class="xn-openable active">
                        <a href="#"><span class="fa fa-calendar"></span> <span class="xn-text">Citas</span></a>
                        <ul>
                           
                            <li class="active"><a href="cita.php"><span class="fa fa-edit"></span> Registro</a></li>
                                                 
                        </ul>
                    </li>
                    
                    <li class="xn-title">Components</li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-cogs"></span> <span class="xn-text">UI Kits</span></a>                        
                        <ul>
                            <li><a href="ui-widgets.html"><span class="fa fa-heart"></span> Widgets</a></li>                            
                            <li><a href="ui-elements.html"><span class="fa fa-cogs"></span> Elements</a></li>
                            <li><a href="ui-buttons.html"><span class="fa fa-square-o"></span> Buttons</a></li>                            
                            <li><a href="ui-panels.html"><span class="fa fa-pencil-square-o"></span> Panels</a></li>
                            <li><a href="ui-icons.html"><span class="fa fa-magic"></span> Icons</a><div class="informer informer-warning">+679</div></li>
                            <li><a href="ui-typography.html"><span class="fa fa-pencil"></span> Typography</a></li>
                            <li><a href="ui-portlet.html"><span class="fa fa-th"></span> Portlet</a></li>
                            <li><a href="ui-sliders.html"><span class="fa fa-arrows-h"></span> Sliders</a></li>
                            <li><a href="ui-alerts-popups.html"><span class="fa fa-warning"></span> Alerts & Popups</a></li>                            
                            <li><a href="ui-lists.html"><span class="fa fa-list-ul"></span> Lists</a></li>
                            <li><a href="ui-tour.html"><span class="fa fa-random"></span> Tour</a></li>
                        </ul>
                    </li>                    
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-pencil"></span> <span class="xn-text">Forms</span></a>
                        <ul>
                            <li>
                                <a href="form-layouts-two-column.html"><span class="fa fa-tasks"></span> Form Layouts</a>
                                <div class="informer informer-danger">New</div>
                                <ul>
                                    <li><a href="form-layouts-one-column.html"><span class="fa fa-align-justify"></span> One Column</a></li>
                                    <li><a href="form-layouts-two-column.html"><span class="fa fa-th-large"></span> Two Column</a></li>
                                    <li><a href="form-layouts-tabbed.html"><span class="fa fa-table"></span> Tabbed</a></li>
                                    <li><a href="form-layouts-separated.html"><span class="fa fa-th-list"></span> Separated Rows</a></li>
                                </ul> 
                            </li>
                            <li><a href="form-elements.html"><span class="fa fa-file-text-o"></span> Elements</a></li>
                            <li><a href="form-validation.html"><span class="fa fa-list-alt"></span> Validation</a></li>
                            <li><a href="form-wizards.html"><span class="fa fa-arrow-right"></span> Wizards</a></li>
                            <li><a href="form-editors.html"><span class="fa fa-text-width"></span> WYSIWYG Editors</a></li>
                            <li><a href="form-file-handling.html"><span class="fa fa-floppy-o"></span> File Handling</a></li>
                        </ul>
                    </li>
                    <li class="xn-openable">
                        <a href="tables.html"><span class="fa fa-table"></span> <span class="xn-text">Tables</span></a>
                        <ul>                            
                            <li><a href="table-basic.html"><span class="fa fa-align-justify"></span> Basic</a></li>
                            <li><a href="table-datatables.html"><span class="fa fa-sort-alpha-desc"></span> Data Tables</a></li>
                            <li><a href="table-export.html"><span class="fa fa-download"></span> Export Tables</a></li>                            
                        </ul>
                    </li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-bar-chart-o"></span> <span class="xn-text">Charts</span></a>
                        <ul>
                            <li><a href="charts-morris.html"><span class="xn-text">Morris</span></a></li>
                            <li><a href="charts-nvd3.html"><span class="xn-text">NVD3</span></a></li>
                            <li><a href="charts-rickshaw.html"><span class="xn-text">Rickshaw</span></a></li>
                            <li><a href="charts-other.html"><span class="xn-text">Other</span></a></li>
                        </ul>
                    </li>                 
                    <li>
                        <a href="maps.html"><span class="fa fa-map-marker"></span> <span class="xn-text">Maps</span></a>
                    </li>                    
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-sitemap"></span> <span class="xn-text">Navigation Levels</span></a>
                        <ul>                            
                            <li class="xn-openable">
                                <a href="#">Second Level</a>
                                <ul>
                                    <li class="xn-openable">
                                        <a href="#">Third Level</a>
                                        <ul>
                                            <li class="xn-openable">
                                                <a href="#">Fourth Level</a>
                                                <ul>
                                                    <li><a href="#">Fifth Level</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>                            
                        </ul>
                    </li>
                    
                </ul>
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
                    <li class="xn-search">
                        <form role="form">
                            <input type="text" name="search" placeholder="Search..."/>
                        </form>
                    </li>   
                    <!-- END SEARCH -->
                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        
                    </li> 
                    <!-- END SIGN OUT -->
                    <!-- MESSAGES -->
                    <li class="xn-icon-button pull-right">
                        <a href="#"><span class="fa fa-comments"></span></a>
                        <div class="informer informer-danger">4</div>
                        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="fa fa-comments"></span> Messages</h3>                                
                                <div class="pull-right">
                                    <span class="label label-danger">4 new</span>
                                </div>
                            </div>
                            <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">
                                <a href="#" class="list-group-item">
                                    <div class="list-group-status status-online"></div>
                                    <img src="assets/images/users/user2.jpg" class="pull-left" alt="John Doe"/>
                                    <span class="contacts-title">John Doe</span>
                                    <p>Praesent placerat tellus id augue condimentum</p>
                                </a>
                                <a href="#" class="list-group-item">
                                    <div class="list-group-status status-away"></div>
                                    <img src="assets/images/users/user.jpg" class="pull-left" alt="Dmitry Ivaniuk"/>
                                    <span class="contacts-title">Dmitry Ivaniuk</span>
                                    <p>Donec risus sapien, sagittis et magna quis</p>
                                </a>
                                <a href="#" class="list-group-item">
                                    <div class="list-group-status status-away"></div>
                                    <img src="assets/images/users/user3.jpg" class="pull-left" alt="Nadia Ali"/>
                                    <span class="contacts-title">Nadia Ali</span>
                                    <p>Mauris vel eros ut nunc rhoncus cursus sed</p>
                                </a>
                                <a href="#" class="list-group-item">
                                    <div class="list-group-status status-offline"></div>
                                    <img src="assets/images/users/user6.jpg" class="pull-left" alt="Darth Vader"/>
                                    <span class="contacts-title">Darth Vader</span>
                                    <p>I want my money back!</p>
                                </a>
                            </div>     
                            <div class="panel-footer text-center">
                                <a href="pages-messages.html">Show all messages</a>
                            </div>                            
                        </div>                        
                    </li>
                    <!-- END MESSAGES -->
                    <!-- TASKS -->
                    <li class="xn-icon-button pull-right">
                        <a href="#"><span class="fa fa-tasks"></span></a>
                        <div class="informer informer-warning">3</div>
                        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="fa fa-tasks"></span> Tasks</h3>                                
                                <div class="pull-right">
                                    <span class="label label-warning">3 active</span>
                                </div>
                            </div>
                            <div class="panel-body list-group scroll" style="height: 200px;">                                
                                <a class="list-group-item" href="#">
                                    <strong>Phasellus augue arcu, elementum</strong>
                                    <div class="progress progress-small progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">50%</div>
                                    </div>
                                    <small class="text-muted">John Doe, 25 Sep 2014 / 50%</small>
                                </a>
                                <a class="list-group-item" href="#">
                                    <strong>Aenean ac cursus</strong>
                                    <div class="progress progress-small progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">80%</div>
                                    </div>
                                    <small class="text-muted">Dmitry Ivaniuk, 24 Sep 2014 / 80%</small>
                                </a>
                                <a class="list-group-item" href="#">
                                    <strong>Lorem ipsum dolor</strong>
                                    <div class="progress progress-small progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%;">95%</div>
                                    </div>
                                    <small class="text-muted">John Doe, 23 Sep 2014 / 95%</small>
                                </a>
                                <a class="list-group-item" href="#">
                                    <strong>Cras suscipit ac quam at tincidunt.</strong>
                                    <div class="progress progress-small">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">100%</div>
                                    </div>
                                    <small class="text-muted">John Doe, 21 Sep 2014 /</small><small class="text-success"> Done</small>
                                </a>                                
                            </div>     
                            <div class="panel-footer text-center">
                                <a href="pages-tasks.html">Show all tasks</a>
                            </div>                            
                        </div>                        
                    </li>
                    <!-- END TASKS -->
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                    
                
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb push-down-0">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Pages</a></li>
                    <li class="active">Calendar</li>
                </ul>
                <!-- END BREADCRUMB -->                                                
                
                <!-- START CONTENT FRAME -->
                <div class="content-frame">            
                    <!-- START CONTENT FRAME TOP -->
                    <div class="content-frame-top">                        
                        <div class="page-title">                    
                            <h2><span class="fa fa-calendar"></span> Citas</h2>
                        </div>  
                        <div class="pull-right">
                            <button class="btn btn-default content-frame-left-toggle"><span class="fa fa-bars"></span></button>
                        </div>                                                                                
                    </div>
                    <!-- END CONTENT FRAME TOP -->
                    
                    <!-- START CONTENT FRAME LEFT -->
                    <div class="content-frame-left">
                        <h4>New Event</h4>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" id="new-event-text" placeholder="Event text..."/>
                                <div class="input-group-btn">
                                    <button class="btn btn-primary" id="new-event">Add</button>
                                </div>
                            </div>
                        </div>
                        
                        <h4>External Events</h4>
                        <div class="list-group border-bottom" id="external-events">                                    
                            <a class="list-group-item external-event">Lorem ipsum dolor</a>
                            <a class="list-group-item external-event">Nam a nisi et nisi</a>
                            <a class="list-group-item external-event">Donec tristique eu</a>
                            <a class="list-group-item external-event">Vestibulum cursus</a>
                            <a class="list-group-item external-event">Etiam euismod</a>                                    
                            <a class="list-group-item external-event">Sed pharetra dolor</a>
                        </div>                            
                        
                        <div class="push-up-10">
                            <label class="check">
                                <input type="checkbox" class="icheckbox" id="drop-remove"/> Remove after drop
                            </label>
                        </div>     
                        
                        <div class="panel panel-default push-up-10">
                            <div class="panel-body padding-top-0">
                                <h4>Fullcalendar</h4>
                                <p>FullCalendar is a jQuery plugin that provides a full-sized, drag & drop event calendar like the one below. It uses AJAX to fetch events on-the-fly and is easily configured to use your own feed format. It is visually customizable with a rich API.</p>
                            </div>
                        </div>
                    </div>
                    <!-- END CONTENT FRAME LEFT -->
                    
                    <!-- START CONTENT FRAME BODY -->
                    <div class="content-frame-body padding-bottom-0">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div id="alert_holder"></div>
                                <div class="calendar">                                
                                    <div id="calendar"></div>                            
                                </div>
                            </div>
                        </div>
                        
                    </div>          


				<!-- Modal -->
					<div id="createEventModal" class="modal fade" role="dialog">
					  <div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Agregar Cita</h4>
						  </div>
						  <div class="modal-body">
								<div class="control-group">
									<label class="control-label" for="inputPatient">Pacientes:</label>
									<div class="field desc">
										 <select class="form-control select"  name="title" id="title" data-live-search="true">
											<!--option value="">Elija la opción</option--->
											<?php
												$c=mysqli_query($connection,"SELECT * FROM paciente ORDER by nombre ASC  ");
												while($d=mysqli_fetch_array($c)){
													echo '<option value="'.$d['nombre']." ".$d['ape_paterno']." ".$d['ape_materno'].'">'.$d['nombre']." ".$d['ape_paterno']." ".$d['ape_materno'].'</option>';
												}
											?>
											   
										</select>
									</div>
								</div>
								
								<hr>
								<div class="control-group">
									<label class="control-label" for="inputPatient">Tipo de Cita:</label>
									<div class="field desc">
										<select class="form-control select" name="tipo_cita" id="tipo_cita">
											<option value="event-info">Consulta</option>
											<!--option value="event-success">Atencion</option-->
											<option value="event-important">Cirugia</option>
											<!--option value="event-warning">Advertencia</option>
											<option value="event-special">Especial</option-->
										</select>
									</div>
								</div>
								
								<hr>
								<div class="control-group">
									<label class="control-label" for="inputPatient">Descripción:</label>
									<div class="field desc">
										<textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion" type="text" required></textarea>
									</div>
								</div>
								<hr>
								
								
								<input type="hidden" id="startTime"/>
								<input type="hidden" id="endTime"/>
								
								
						   
							<div class="control-group">
								<label class="control-label" for="when">Horario:</label>
								<div class="controls controls-row" id="when" style="margin-top:5px;">
								</div>
							</div>
							
						  </div>
						  <div class="modal-footer">
							<button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
							<button type="submit" class="btn btn-primary" id="submitButton">Aceptar</button>
						</div>
						</div>

					  </div>
					</div>


					<div id="calendarModal" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Detalle de la Cita</h4>
							</div>
							<div id="modalBody" class="modal-body">
							<h4 id="modalTitle" class="modal-title"></h4>
							<div id="modalWhen" style="margin-top:5px;"></div>
							</div>
							<input type="hidden" id="eventID"/>
							<div class="modal-footer">
								<button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
								<button type="submit" class="btn btn-danger" id="deleteButton">Cancelar Cita</button>
							</div>
						</div>
					</div>
					</div>
					<!--Modal-->

                    <!-- END CONTENT FRAME BODY -->
                    
                </div>               
                <!-- END CONTENT FRAME -->                                
                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Cerrar <strong>sesión</strong> ?</div>
                    <div class="mb-content">
                        <p>Seguro que quieres salir ?</p>                    
                        <p>Pulse No si desea continuar trabajando. Pulse Sí para salir del usuario actual.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="cerrarSesion.php" class="btn btn-success btn-lg">Si</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-select.js"></script>
        <script type="text/javascript" src="js/plugins/moment.min.js"></script>
        <script type="text/javascript" src="js/plugins/fullcalendar/fullcalendar.min.js"></script>
		
		
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>        
        <!-- END TEMPLATE -->
		
		<script type="text/javascript" src="js/script.js"></script>
		
		<link href="pru/css/fullcalendar.css" rel="stylesheet" />
<link href="pru/css/fullcalendar.print.css" rel="stylesheet" media="print" />

<script src="pru/js/fullcalendar.js"></script>
<script src='pru/js/es.js'></script>
<script>

    $(document).ready(function() {

        $('#calendar').fullCalendar({
        });

    });

</script>
		

    <!-- END SCRIPTS -->         
    </body>
</html>

