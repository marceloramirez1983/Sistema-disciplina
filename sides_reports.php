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

    mysqli_close($con);
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
                        <li><a href="sides_log_logins.html">Logs de Sesiones</a></li>
                        <li><a href="sides_log_actions.html">Logs de Acciones</a></li>
                      </ul>
                    </li>

                    <li><a><i class="fa fa-edit"></i> Extras <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="sides_armas.html">Registrar Arma</a></li>
                        <li><a href="sides_grados.html">Registrar Grado</a></li>
                        <li><a href="sides_roles.html">Registrar Roles</a></li>
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
                          <img class="img-responsive avatar-view" src="images/cadete.jpg" alt="Avatar" title="Change the avatar">

                          <!-- Cropping modal -->
                          <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <form class="avatar-form" action="crop.php" enctype="multipart/form-data" method="post">
                                  <div class="modal-header">
                                    <button class="close" data-dismiss="modal" type="button">&times;</button>
                                    <h4 class="modal-title" id="avatar-modal-label">Change Avatar</h4>
                                  </div>
                                  <div class="modal-body">
                                    <div class="avatar-body">

                                      <!-- Upload image and data -->
                                      <div class="avatar-upload">
                                        <input class="avatar-src" name="avatar_src" type="hidden">
                                        <input class="avatar-data" name="avatar_data" type="hidden">
                                        <label for="avatarInput">Local upload</label>
                                        <input class="avatar-input" id="avatarInput" name="avatar_file" type="file">
                                      </div>

                                      <!-- Crop and preview -->
                                      <div class="row">
                                        <div class="col-md-9">
                                          <div class="avatar-wrapper"></div>
                                        </div>
                                        <div class="col-md-3">
                                          <div class="avatar-preview preview-lg"></div>
                                          <div class="avatar-preview preview-md"></div>
                                          <div class="avatar-preview preview-sm"></div>
                                        </div>
                                      </div>

                                      <div class="row avatar-btns">
                                        <div class="col-md-9">
                                          <div class="btn-group">
                                            <button class="btn btn-primary" data-method="rotate" data-option="-90" type="button" title="Rotate -90 degrees">Rotate Left</button>
                                            <button class="btn btn-primary" data-method="rotate" data-option="-15" type="button">-15deg</button>
                                            <button class="btn btn-primary" data-method="rotate" data-option="-30" type="button">-30deg</button>
                                            <button class="btn btn-primary" data-method="rotate" data-option="-45" type="button">-45deg</button>
                                          </div>
                                          <div class="btn-group">
                                            <button class="btn btn-primary" data-method="rotate" data-option="90" type="button" title="Rotate 90 degrees">Rotate Right</button>
                                            <button class="btn btn-primary" data-method="rotate" data-option="15" type="button">15deg</button>
                                            <button class="btn btn-primary" data-method="rotate" data-option="30" type="button">30deg</button>
                                            <button class="btn btn-primary" data-method="rotate" data-option="45" type="button">45deg</button>
                                          </div>
                                        </div>
                                        <div class="col-md-3">
                                          <button class="btn btn-primary btn-block avatar-save" type="submit">Done</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- <div class="modal-footer">
                                                    <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
                                                  </div> -->
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- /.modal -->

                          <!-- Loading state -->
                          <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
                        </div>
                        <!-- end of image cropping -->

                      </div>
                      <h3><?php echo $row_user['nombre']." ".$row_user['paterno']; ?></h3>

                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker user-profile-icon"></i> Cochabamba,Tarata,BOLIVIA
                        </li>

                        <li>
                          <i class="fa fa-briefcase user-profile-icon"></i> Alumno
                        </li>

                        <!-- <li class="m-top-xs">
                          <i class="fa fa-external-link user-profile-icon"></i>
                          <a href="http://www.kimlabs.com/profile/" target="_blank">www.kimlabs.com</a>
                        </li> -->
                      </ul>

                      <!-- <a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a> -->
                      <br />

                      <!-- start skills -->
                      <!-- <h4>Skills</h4>
                      <ul class="list-unstyled user_data">
                        <li>
                          <p>Web Applications</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                          </div>
                        </li>
                        <li>
                          <p>Website Design</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70"></div>
                          </div>
                        </li>
                        <li>
                          <p>Automation & Testing</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30"></div>
                          </div>
                        </li>
                        <li>
                          <p>UI / UX</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                          </div>
                        </li>
                      </ul> -->
                      <!-- end of skills -->

                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                      <!-- <div class="profile_title">
                        <div class="col-md-6">
                          <h2>User Activity Report</h2>
                        </div>
                        <div class="col-md-6">
                          <div id="reportrange" class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                            <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                          </div>
                        </div>
                      </div> -->
                      <!-- start of user-activity-graph -->
                      <!-- <div id="graph_bar" style="width:100%; height:280px;"></div> -->
                      <!-- end of user-activity-graph -->

                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <!-- start user projects -->
                        <table class="data table table-striped no-margin">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Fecha</th>
                              <th>Falta</th>
                              <th>Instructor</th>
                              <th>Puntos</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>1</td>
                              <td>02/03/16</td>
                              <td>Curabitur blandit tempus porttitor.</td>
                              <td>Cap. Inf. Ramirez</td>
                              <td>3</td>
                            </tr>
                            <tr>
                              <td>2</td>
                              <td>02/03/16</td>
                              <td>Curabitur blandit tempus porttitor.</td>
                              <td>Cap. Inf. Ramirez</td>
                              <td>2</td>
                            </tr>
                            <tr>
                              <td>3</td>
                              <td>02/03/16</td>
                              <td>Curabitur blandit tempus porttitor.</td>
                              <td>Cap. Inf. Ramirez</td>
                              <td>4</td>
                            </tr>
                            <tr>
                              <td>4</td>
                              <td>02/03/16</td>
                              <td>Curabitur blandit tempus porttitor.</td>
                              <td>Cap. Inf. Ramirez</td>
                              <td>1</td>
                            </tr>
                          </tbody>
                        </table>
                        <!-- end user projects -->
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
    <!-- morris.js -->
    <script src="../vendors/raphael/raphael.min.js"></script>
    <script src="../vendors/morris.js/morris.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="js/moment/moment.min.js"></script>
    <script src="js/datepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="js/custom.js"></script>

    <script>
      $(function() {
        Morris.Bar({
          element: 'graph_bar',
          data: [
            { "period": "Jan", "Hours worked": 80 },
            { "period": "Feb", "Hours worked": 125 },
            { "period": "Mar", "Hours worked": 176 },
            { "period": "Apr", "Hours worked": 224 },
            { "period": "May", "Hours worked": 265 },
            { "period": "Jun", "Hours worked": 314 },
            { "period": "Jul", "Hours worked": 347 },
            { "period": "Aug", "Hours worked": 287 },
            { "period": "Sep", "Hours worked": 240 },
            { "period": "Oct", "Hours worked": 211 }
          ],
          xkey: 'period',
          hideHover: 'auto',
          barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
          ykeys: ['Hours worked', 'sorned'],
          labels: ['Hours worked', 'SORN'],
          xLabelAngle: 60,
          resize: true
        });

        $MENU_TOGGLE.on('click', function() {
          $(window).resize();
        });
      });
    </script>

    <!-- datepicker -->
    <script type="text/javascript">
      $(document).ready(function() {

        var cb = function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
          //alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
        }

        var optionSet1 = {
          startDate: moment().subtract(29, 'days'),
          endDate: moment(),
          minDate: '01/01/2012',
          maxDate: '12/31/2015',
          dateLimit: {
            days: 60
          },
          showDropdowns: true,
          showWeekNumbers: true,
          timePicker: false,
          timePickerIncrement: 1,
          timePicker12Hour: true,
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          opens: 'left',
          buttonClasses: ['btn btn-default'],
          applyClass: 'btn-small btn-primary',
          cancelClass: 'btn-small',
          format: 'MM/DD/YYYY',
          separator: ' to ',
          locale: {
            applyLabel: 'Submit',
            cancelLabel: 'Clear',
            fromLabel: 'From',
            toLabel: 'To',
            customRangeLabel: 'Custom',
            daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
            monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            firstDay: 1
          }
        };
        $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
        $('#reportrange').daterangepicker(optionSet1, cb);
        $('#reportrange').on('show.daterangepicker', function() {
          console.log("show event fired");
        });
        $('#reportrange').on('hide.daterangepicker', function() {
          console.log("hide event fired");
        });
        $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
          console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
        });
        $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
          console.log("cancel event fired");
        });
        $('#options1').click(function() {
          $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
        });
        $('#options2').click(function() {
          $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
        });
        $('#destroy').click(function() {
          $('#reportrange').data('daterangepicker').remove();
        });
      });
    </script>
    <!-- /datepicker -->
  </body>
</html>
