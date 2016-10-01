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

    //mysqli_close($con);
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
                <h3> <?php echo $row_rol['rol']; ?> </h3>
                <ul class="nav side-menu">

                    <?php if ($row_rol['rol'] == 'Administrador'): ?>
                    <li><a><i class="fa fa-user"></i> Administrar Usuario <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="sides_user.php">Registrar Usuario</a></li>
                        <!-- <li><a href="sides_asign_user.php">Asignar Usuario</a></li> -->
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

                    <li><a><i class="fa fa-list-alt"></i> Administrar Sanciones <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="sides_sanciones.php">Boleta de sancion</a></li>
                      </ul>
                    </li>

                    <li><a><i class="fa fa-file"></i> Hoja de Vida Pesonal <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="sides_reports.php">Reporte Disciplinario</a></li>
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
                      </ul>
                    </li>

                    <li><a><i class="fa fa-list-alt"></i> Administrar Sanciones <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="sides_sanciones.php">Boleta de sancion</a></li>
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
                    <li><a><i class="fa fa-key"></i> Contraseña <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="sides_user_CambiarContrasena.php">Modificar</a></li>
                      </ul>
                    </li>
                  <?php endif; ?>

                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

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

                    <li><a href="sides_reports_cambiarContrasenaAlum.php">Cambiar contraseña</a>
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
                <h3>Registro disciplinario Individual</h3>
              </div>


            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Alumno<small> Reporte de Sanciones</small></h2>
                    <ul class="nav navbar-right panel_toolbox">

                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">

                      <div class="profile_img">

                        <!-- end of image cropping -->
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="images/placeholder_profile.jpg" alt="Avatar" title="Change the avatar">

                        </div>
                        <!-- end of image cropping -->

                      </div>
                      <h3><?php echo $row_user['nombre']." ".$row_user['paterno']; ?></h3>

                      <ul class="list-unstyled user_data">

                        <li>
                          <i class="fa fa-briefcase user-profile-icon"></i> Alumno
                        </li>

                      </ul>


                      <br />



                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <!-- start user projects -->
                        <table class="table table-striped no-margin">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Fecha</th>
                              <th>Falta</th>
                              <!-- <th>Instructor</th> -->
                              <th>Puntos</th>
                              <th>Tipo</th>
                            </tr>
                          </thead>
                          <tbody>

                            <?php
                            $query = "SELECT * FROM sancion WHERE ci_alumno = '$ID_CI'";
                            $getAll = mysqli_query($con, $query);
                            $num=0;
                            while ($row = mysqli_fetch_array($getAll, MYSQLI_ASSOC)):
                            ?>
                            <tr>
                              <td><?php $num=$num+1;echo $num ?></td>
                              <td><?php echo $row ['fecha'];?></td>
                              <td>
                                <?php
                                  if ($row['tipo']=="D") {
                                    $id_falta = $row['id_falta'];
                                    $queryFalta = "SELECT * FROM falta WHERE id_falta = '$id_falta'";
                                    $falta = mysqli_query($con, $queryFalta);
                                    $result_falta = mysqli_fetch_assoc($falta);
                                    echo $result_falta['nombre'];
                                  }
                                  else{
                                    $id_falta = $row['id_falta'];
                                    $queryFalta = "SELECT * FROM merito WHERE id_merito = '$id_falta'";
                                    $falta = mysqli_query($con, $queryFalta);
                                    $result_falta = mysqli_fetch_assoc($falta);
                                    echo $result_falta['nombre_merito'];
                                  }
                                ?>
                              </td>
                              <!-- <td><?php echo $row ['ci_instructor'];?></td> -->
                              <td><?php echo $row ['puntos'];?></td>
                              <td><?php echo $row ['tipo'];?></td>
                            </tr>
                            <?php
                              endwhile;
                            ?>
                          </tbody>
                        </table>
                        <!-- end user projects -->
                      </div>

                      <table class="table table-hover">
                        <tr>
                          <th>Total puntos acumulados</th>
                          <th style="text-align:center;"><?php echo $row_user ['total_puntos'];?></th>
                        </tr>
                        <tr>
                          <th>Total calificación final</th>
                          <th style="text-align:center;"><?php echo $row_user ['calificacion_disciplinario'];?></th>
                        </tr>

                      </table>

                    </div>
                  </div>
                  <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
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
    <!-- morris.js -->
    <script src="../vendors/raphael/raphael.min.js"></script>
    <script src="../vendors/morris.js/morris.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
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
