<!DOCTYPE html>
<html lang="en">

<head>
    <!-- META SECTION -->
    <title>REIMPRESION DE FORMULARIOS</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="shortcut icon" href="css/favicon.png">
    <!-- END META SECTION -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css" />
    <!-- EOF CSS INCLUDE -->
</head>

<body>
    <!-- START PAGE CONTAINER -->
    <div class="page-container">

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

        </ul>
        <!-- END X-NAVIGATION VERTICAL -->

        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">
            <!-- START WIDGETS -->
        </div>
        <!-- END WIDGETS -->
        <div class="row">
            <div class="col-md-8 col-md-offset-2" align="center">
                <form id="reimp_form" name="reimp_form" target="_blank" method="POST" onsubmit="getAction(this);">
                    <input type="hidden" name="reimpresion" id="reimpresion">
                    <!-- START SALES BLOCK -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           
                            <div class="col-md-12"><br>
                                <label class="col-md-12 col-xs-12" align="center">
                                    <h2><strong>REIMPRESION DE FORMULARIOS</strong></h3>
                                </label>
                            </div><br><br>
                        </div>
                        <br><br>
                        <label class="col-md-15 col-xs-12" align="center"><strong>IDENTIFICACION DEL PACIENTE</strong></label>
                        <div class="col-md-12"><br>
                            <div class="col-md-12">
                                <label class="col-md-2 col-xs-12" align="left"><strong>FECHA:</strong></label>
                                <div class="col-md-3">
                                    <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" class="form-control" type="date" id="fecha_formulario" name="fecha_formulario" value="<?php echo date('Y-m-d'); ?>">
                                </div>
                                <label class="col-md-1 col-xs-12" align="left"><strong>CI:</strong></label>
                                <div class="col-md-3">
                                    <input style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" type="number" placeholder="1234567" class="form-control" id="ci" name="ci" required />
                                </div>
                            </div>

                        </div>
                        <br><br><br>
                        <div class="col-md-12"><br>
                            <label class="col-md-15 col-xs-12" align="center"><strong>SELECCION DE FORMULARIO</strong></label>
                            <div class="col-md-12">
                                <label class="col-md-2 col-xs-12" align="left"><strong>SELECCIONE EL FORMULARIO:</strong></label>
                                <div class="col-md-2">
                                    <select style="background-color: #E8EAEA; border: 1px solid #3AB0FD;" class="form-control" placeholder="--Escoger--" id="tipo_form" name="tipo_form" required />
                                    <option value="1">Contrareferencia</option>
                                    <option value="2">Transferencia</option>
                                    <option value="3">Referencia</option>
                                    </select>
                                </div>
                            </div>
                        </div><br>
                        <div id="mensaje" name="mensaje" class="col-md-12">

                        </div>
                    </div>
                    <div class="col-md-12"><br>
                        <h4 align="left"><strong>VERIFICAR FORMULARIO EXISTENTE</strong></h4>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <button id="btn_verif" name="btn_verif" class="btn btn-default btn-flat" data-dismiss="form" aria-hidden="true"><i class="fa fa-check" aria-hidden="true"></i><strong>Verificar</strong></button>
                                </div>
                                <div class="col-md-4">
                                    <a href="/index.php" title="" class="btn btn-primary" data-original-title="Nuvo Paciente" style="padding: 4px 60px;"><span class="icon_profile"><i class="fa fa-reply-all" aria-hidden="true"></i></span><strong>ATRAS </strong></a>
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" id="btn_imprimir" name="btn_imprimir" class="btn btn-success btn-flat" disabled> IMPRIMIR FORMULARIO</button>
                                </div>
                            </div>
                        </div><br>
                    </div><br>
                </form>
            </div>
            <div class="col-md-12"><br>
                <h4 align="left"><strong>.</strong></h4>
                <br>
            </div>
            <!-- </form> -->
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
