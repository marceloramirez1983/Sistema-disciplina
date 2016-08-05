<?php
session_start();
if ($_SESSION['loggedin']) {
  # code...
  include_once("controladores/conexionBD.php");

  $cnn= new conexion();
  $con =$cnn->conectar();

  $database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");

  $ID_ROL = $_SESSION['rol'];
  $ID_CI = $_SESSION['usuario'];
  $NICKNAME = $_SESSION['nickname'];

  $sql_user = "SELECT * FROM usuario WHERE id_ci = '$ID_CI'";
  $result_user = mysqli_query($con, $sql_user) or die ("error");
  $row_user = mysqli_fetch_assoc($result_user);

  $sql_rol = "SELECT * FROM rol WHERE id_rol = '$ID_ROL'";
  $result_rol = mysqli_query($con, $sql_rol);
  $row_rol = mysqli_fetch_assoc($result_rol);

  //mysqli_close($con);// lo comente para caragar los text
} else {
  # code...
  header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SIDES</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="css/custom.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"><img src="images/logo.png" alt="Mountain View" style="width:44px;height:44px;"> <span>SIDES</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="images/placeholder_profile.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2><?php echo $row_user['nombre']." ".$row_user['paterno']; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3><?php echo $row_rol['rol']; ?></h3>
                <ul class="nav side-menu">

                  <?php if ($row_rol['rol'] == 'Administrador'): ?>
                  <li><a><i class="fa fa-user"></i> Administrar Usuario <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="sides_user.php">Registrar Usuario</a></li>
                      <li><a href="sides_asign_user.php">Asignar Usuario</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-pencil-square-o"></i> Administrar Faltas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="sides_grupos.php">Registrar Grupos</a></li>
                      <li><a href="sides_faltas.php">Registrar Faltas</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-user-plus"></i> Administrar Instructor <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="sides_instructor.php">Registrar Instructor</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-users"></i> Administrar Alumnos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="sides_alumnos.php">Registrar Alumnos</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-newspaper-o"></i> Logs <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="sides_log_logins.php">Logs de Sesiones</a></li>
                      <li><a href="sides_log_actions.php">Logs de Acciones</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-edit"></i> Extras <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="sides_armas.php">Registrar Arma</a></li>
                      <li><a href="sides_grados.php">Registrar Grado</a></li>
                      <li><a href="sides_roles.php">Registrar Roles</a></li>
                    </ul>
                  </li>

                <?php endif; ?>

                <!-- Encargado de Disciplina -->
                <?php if ($row_rol['rol'] == 'Encargado de Disciplina'): ?>
                  <li><a><i class="fa fa-pencil-square-o"></i> Administrar Faltas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="sides_grupos.php">Registrar Grupos</a></li>
                      <li><a href="sides_faltas.php">Registrar Faltas</a></li>
                      <li><a href="sides_merito.php">Registrar Mérito</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-list-alt"></i> Administrar Sanciones <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="sides_sanciones.php">Boleta de sancion</a></li>
                      <li><a href="sides_sanciones_rs.php">Boleta de sancion con Resolución</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-list-alt"></i> Administrar Méritos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="sides_otorgar_merito.php">Boleta de mérito</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-pie-chart"></i> Administrar Reportes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php">Reportes Estadisticos </a></li>
                      <li><a href="#">Lista de Arrestados </a></li>
                    </ul>
                  </li>
                <?php endif; ?>

                <!-- Jefe De Personal -->
                <?php if ($row_rol['rol'] == 'Jefe de Personal'): ?>
                  <li><a><i class="fa fa-user-plus"></i> Administrar Instructor <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="sides_instructor.php">Registrar Instructor</a></li>
                    </ul>
                  </li>
                <?php endif; ?>

                <!-- Instructor -->
                <?php if ($row_rol['rol'] == 'Instructor'): ?>
                  <li><a><i class="fa fa-list-alt"></i> Administrar Sanciones <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="sides_sanciones.php">Boleta de sancion</a></li>
                    </ul>
                  </li>
                <?php endif; ?>

                <!-- Primera Compañia -->
                <?php if ($row_rol['rol'] == 'Primero de Compañia'): ?>
                  <li><a><i class="fa fa-users"></i> Administrar Alumnos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="sides_alumnos.php">Registrar Alumnos</a></li>
                    </ul>
                  </li>
                <?php endif; ?>

                <!-- Alumno -->
                <?php if ($row_rol['rol'] == 'Alumno'): ?>
                  <li><a><i class="fa fa-file"></i> Hoja de Vida Pesonal <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="sides_reports.php">Reporte Disciplinario</a></li>
                    </ul>
                  </li>
                <?php endif; ?>

                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">

          <div class="nav_menu">
            <nav class="" role="navigation">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/placeholder_profile.jpg" alt=""><?php echo $row_user['nombre']." ".$row_user['paterno']; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;">  Profile</a>
                    </li>

                    <li><a href="controladores/logout.php"><i class="fa fa-sign-out pull-right"></i>Cerrar Sesion</a>
                    </li>
                  </ul>
                </li>



              </ul>
            </nav>
          </div>

        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Administrar Grupos</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" >
                  <!-- style="height:600px;" -->
                  <br>
                  <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                      <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Buscar grupo</a>
                      </li>
                      <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Registrar grupo</a>
                      </li>
                      <!-- <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
                      </li> -->
                    </ul>
                    <div id="myTabContent" class="tab-content">
                      <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                        <!-- List New Users -->
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="x_panel">
                            <div class="x_title">
                              <h2>Lista de grupos registrados <small>puedes modificar o eliminar</small></h2>
                              <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                  <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                  </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                              </ul>
                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                              <table id="datatable-buttons" class="table table-hover">
                                <thead>
                                  <tr>
                                    <th>N#</th>
                                    <th>Nombre grupo </th>
                                    <th>Puntos</th>
                                    
                                  </tr>
                                </thead>
                                <tbody>

                                  <?php
                                  $getallgroup= mysqli_query($con, "SELECT * FROM grupo");
                                  $num=0;
                                  while($row = mysqli_fetch_array($getallgroup, MYSQLI_ASSOC)):?>
                                    <tr>
                                      <td><?php $num=$num+1;echo $num ?></td>
                                      <td><?php echo $row ['grupo'];?></td>
                                      <td><?php echo $row['puntos'];?></td>
                                      <td>
                                        <div class="btn-group">
                                          <button type="button" class="btn btn-danger">Opción</button>
                                          <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                          </button>
                                          <ul class="dropdown-menu" role="menu">
                                            <li><a href="sides_Editargrupo.php?id=<?php echo $row ['id_grupo'];?> ">Modificar</a>
                                            </li>
                                            <li class="divider"></li>
                                            <li><a href="controladores/Eliminargrupo.php?id=<?php echo $row ['id_grupo'];?> ">Eliminar</a>
                                            </li>
                                          </ul>
                                        </div>
                                      </td>
                                    </tr>
                                  <?php Endwhile; ?>


                                </tbody>
                              </table>

                            </div>
                          </div>
                        </div>

                      </div>
                      <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                        <!-- Form New Users -->
                        <div class="x_content">
                          <br />

                          <form id="demoform2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="controladores/insertBDgrupo.php">

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre Grupo<span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="txtnombre_grupo" name="txtnombre_grupo" required="required" class="form-control col-md-7 col-xs-12">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Puntos <span class="required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" name="CBoxselect_puntos">
                                  <option value="">Seleccione los puntos para perdidos</option>
                                  <option value="0">Sin Puntaje</option>
                                  <option value="1">1 Pto.</option>
                                  <option value="2">2 Pto.</option>
                                  <option value="3">3 Pto.</option>
                                  <option value="4">4 Pto.</option>
                                  <option value="5">5 Pto.</option>
                                </select>
                              </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="button" class="btn btn-primary" onClick="history.go(-1)">Cancelar</button>
                                <button type="button" value="Guardar" onclick="valida_envia()" class="btn btn-success" >Guardar</button>
                              </div>
                            </div>
                          </form>
                          <!--validacion de envio del formulario-->
                          <script type="text/javascript">
                          function valida_envia(){
                            selec= demoform2.CBoxselect_puntos.selectedIndex
                            if (demoform2.CBoxselect_puntos.options[selec].value==""){
                            alert ("Seleccione los puntos")
                            return false
                            }

                            valor = document.getElementById("txtnombre_grupo").value;
                            if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
                            alert ("Ingrese un nombre para el grupo")
                            return false;
                            }

                            demoform2.submit();
                          }
                          </script>
                          <!--hasta aca validacion de envio del formulario-->
                        </div>

                      </div>

                    </div>
                  </div>


                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Escuela Militar de Sargentos del Ejercito<a href="#"></a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="js/moment/moment.min.js"></script>
    <script src="js/datepicker/daterangepicker.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="js/custom.js"></script>

    <!-- bootstrap-daterangepicker -->
    <script>
      $(document).ready(function() {
        $('#birthday').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4"
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
      });
    </script>
    <!-- /bootstrap-daterangepicker -->

    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- /iCheck -->

    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();
        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        var table = $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->

  </body>
</html>
