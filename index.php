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
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- jVectorMap -->
    <link href="css/maps/jquery-jvectormap-2.0.3.css" rel="stylesheet"/>
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
            <!-- $row_user['nombre']." ".$row_user['paterno']; -->
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
                      <li><a href="sides_user.html">Registrar Usuario</a></li>
                      <li><a href="sides_asign_user.html">Asignar Usuario</a></li>
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
                      <li><a href="sides_instructor.html">Registrar Instructor</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-users"></i> Administrar Alumnos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="sides_alumnos.html">Registrar Alumnos</a></li>
                    </ul>
                  </li>

                  <li class="hide"><a><i class="fa fa-list-alt"></i> Administrar Sanciones <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="sides_sanciones.php">Boleta de sancion</a></li>
                    </ul>
                  </li>

                  <li class="hide"><a><i class="fa fa-file"></i> Hoja de Vida Pesonal <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="sides_reports.html">Reporte Disciplinario</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-newspaper-o"></i> Logs <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="sides_log_logins.html">Logs de Sesiones</a></li>
                      <li><a href="sides_log_actions.html">Logs de Acciones</a></li>
                    </ul>
                  </li>

                  <li class="hide"><a><i class="fa fa-edit"></i> Extras <span class="fa fa-chevron-down"></span></a>
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
                      <li><a href="sides_merito.php">Registrar Mérito</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-list-alt"></i> Administrar Sanciones <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="sides_sanciones.php">Boleta de sancion</a></li>
                      <li><a href="sides_sanciones_rs.php">Boleta de sancion con Resolución</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-list-alt"></i> Administrar Meritos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="sides_otorgar_merito.php">Boleta de merito</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-pie-chart"></i> Administrar Reportes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php">Reportes Estadisticos </a></li>
                      <li><a href="sides_reporte_arrestados.php">Lista de Arrestados </a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-key"></i> Contraseña <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="sides_user_CambiarContrasena.php">Modificar</a></li>
                    </ul>
                  </li>
                <?php endif; ?>

                <!-- Jefe De Personal -->
                <?php if ($row_rol['rol'] == 'Jefe de Personal'): ?>
                  <li><a><i class="fa fa-user-plus"></i> Administrar Instructor <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="sides_instructor.html">Registrar Instructor</a></li>
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
                      <li><a href="sides_alumnos.html">Registrar Alumnos</a></li>
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
                    <!-- <li><a href="javascript:;">  Profile</a>
                    </li> -->
                    <li><a href="controladores/logout.php"><i class="fa fa-sign-out pull-right"></i> Cerrar sesión</a>
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

          <!-- top tiles -->
          <div class="row top_tiles">
            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-user"></i>
                </div>
                <?php
                  $GET_MAX_INST = "SELECT sancion.ci_instructor, usuario.id_ci, usuario.nombre, usuario.paterno, usuario.materno , COUNT(*) AS total FROM sancion,usuario WHERE sancion.ci_instructor = usuario.id_ci GROUP BY sancion.ci_instructor ORDER BY total DESC LIMIT 1";
                  $QUERY_MAX_INST = mysqli_query($con, $GET_MAX_INST);
                  $RESULT_MAX_INST = mysqli_fetch_assoc($QUERY_MAX_INST);
                  echo '<div class="count">'.$RESULT_MAX_INST['total'].'</div>';

                  echo '<h3>'.$RESULT_MAX_INST['nombre']." ".$RESULT_MAX_INST['paterno']." ".$RESULT_MAX_INST['materno'].'</h3>';
                ?>
                <p>Instructor mas sancionador.</p>
              </div>
            </div>
            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-user"></i>
                </div>
                <?php
                  $GET_MAX_INST = "SELECT * FROM usuario ORDER BY total_puntos DESC LIMIT 1";
                  $QUERY_MAX_INST = mysqli_query($con, $GET_MAX_INST);
                  $RESULT_MAX_INST = mysqli_fetch_assoc($QUERY_MAX_INST);
                  echo '<div class="count">'.$RESULT_MAX_INST['total_puntos'].'</div>';
                  echo '<h3>'.$RESULT_MAX_INST['nombre']." ".$RESULT_MAX_INST['paterno']." ".$RESULT_MAX_INST['materno'].'</h3>';

                ?>
                <p>Alumno mas sancionado.</p>
              </div>
            </div>
            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-sort-amount-desc"></i>
                </div>
                <?php
                  $GET_MAX_INST = "SELECT sancion.id_falta, falta.id_falta, falta.nombre, COUNT(*) AS total FROM sancion,falta WHERE sancion.id_falta = falta.id_falta GROUP BY sancion.id_falta ORDER BY total DESC LIMIT 1";
                  $QUERY_MAX_INST = mysqli_query($con, $GET_MAX_INST);
                  $RESULT_MAX_INST = mysqli_fetch_assoc($QUERY_MAX_INST);
                  echo '<div class="count">'.$RESULT_MAX_INST['total'].'</div>';

                  echo '<h3>'.$RESULT_MAX_INST['nombre'].'</h3>';
                  mysqli_close($con);
                ?>
                <p>Falta mas recurrente.</p>

              </div>
            </div>
          </div>
          <!-- /top tiles -->

          <br />

          <div class="row">

            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_340 overflow_hidden">
                <div class="x_title">
                  <h2>Primer Año Militar</h2>

                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table class="" style="width:100%">
                    <tr>
                      <th style="width:37%;">
                        <p>Estadisticas de arrestos</p>
                      </th>
                    </tr>
                    <tr>
                      <td style="text-align:center;">
                        <canvas id="canvas1" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </td>
                    </tr>
                    <td>
                      <table class="tile_info">
                        <tr>
                          <?php
                          include_once("controladores/conexionBD.php");

                          $cnn= new conexion();
                          $con =$cnn->conectar();

                          $database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");

                          $query = mysqli_query($con,"SELECT COUNT(*) AS total_alumnos FROM usuario WHERE id_grado = 15");
                          $count_total = mysqli_fetch_assoc($query);

                          $query_get_sanctions = mysqli_query($con, "SELECT COUNT(*) AS total FROM sancion,usuario WHERE sancion.ci_alumno = usuario.id_ci AND usuario.id_grado = 15 GROUP BY usuario.id_ci");
                          $count_total_sanction = mysqli_num_rows($query_get_sanctions);

                          $sancionados_total_one = ($count_total_sanction * 100) / $count_total['total_alumnos'];

                          $no_sancionados_one = 100 - $sancionados_total_one;
                          mysqli_close($con);
                          ?>
                          <td>
                            <p><i class="fa fa-square blue"></i>No Sancionados </p>
                          </td>
                          <td><?php echo $no_sancionados_one; ?>%</td>
                        </tr>
                        <tr>
                          <td>
                            <p><i class="fa fa-square red"></i>Sancionados </p>
                          </td>
                          <td><?php echo $sancionados_total_one; ?>%</td>
                        </tr>
                      </table>
                    </td>
                  </table>
                </div>
              </div>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_340 overflow_hidden">
                <div class="x_title">
                  <h2>Segundo Año Militar</h2>

                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table class="" style="width:100%">
                    <tr>
                      <th style="width:37%;">
                        <p>Estadisticas de arrestos</p>

                      </th>

                    </tr>
                    <tr>
                      <td style="text-align:center;">
                        <canvas id="canvas2" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </td>
                    </tr>
                    <td>
                      <table class="tile_info">
                        <tr>
                          <td>
                            <p><i class="fa fa-square green"></i>No Sancionados </p>
                          </td>
                          <?php
                          include_once("controladores/conexionBD.php");

                          $cnn= new conexion();
                          $con =$cnn->conectar();

                          $database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");

                          $query = mysqli_query($con,"SELECT COUNT(*) AS total_alumnos FROM usuario WHERE id_grado = 16");
                          $count_total = mysqli_fetch_assoc($query);

                          $query_get_sanctions = mysqli_query($con, "SELECT COUNT(*) AS total FROM sancion,usuario WHERE sancion.ci_alumno = usuario.id_ci AND usuario.id_grado = 16 GROUP BY usuario.id_ci");
                          $count_total_sanction = mysqli_num_rows($query_get_sanctions);

                          $sancionados_total = ($count_total_sanction * 100) / $count_total['total_alumnos'];

                          $no_sancionados = 100 - $sancionados_total;
                          mysqli_close($con);
                          ?>
                          <td><?php echo $no_sancionados ?>%</td>
                        </tr>
                        <tr>
                          <td>
                            <p><i class="fa fa-square red"></i>Sancionados </p>
                          </td>
                          <td><?php echo $sancionados_total ?>%</td>
                        </tr>
                      </table>
                    </td>
                  </table>
                </div>
              </div>
            </div>

                <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="x_panel tile fixed_height_340 overflow_hidden">
                    <div class="x_title">
                      <h2>Tercer Año Militar</h2>

                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <table class="" style="width:100%">
                        <tr>
                          <th style="width:37%;">
                            <p>Estadisticas de arrestos</p>
                          </th>
                        </tr>
                        <tr>
                          <td style="text-align:center;">
                            <canvas id="canvas3" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                          </td>
                        </tr>
                        <td>
                          <table class="tile_info">
                            <tr>
                              <?php
                              include_once("controladores/conexionBD.php");

                              $cnn= new conexion();
                              $con =$cnn->conectar();

                              $database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");

                              $query = mysqli_query($con,"SELECT COUNT(*) AS total_alumnos FROM usuario WHERE id_grado = 17");
                              $count_total = mysqli_fetch_assoc($query);

                              $query_get_sanctions = mysqli_query($con, "SELECT COUNT(*) AS total FROM sancion,usuario WHERE sancion.ci_alumno = usuario.id_ci AND usuario.id_grado = 17 GROUP BY usuario.id_ci");
                              $count_total_sanction = mysqli_num_rows($query_get_sanctions);

                              $sancionados_total_two = ($count_total_sanction * 100) / $count_total['total_alumnos'];

                              $no_sancionados_two = 100 - $sancionados_total_two;
                              mysqli_close($con);
                              ?>
                              <td>
                                <p><i class="fa fa-square purple"></i>No Sancionados </p>
                              </td>
                              <td><?php echo $no_sancionados_two; ?>%</td>
                            </tr>
                            <tr>
                              <td>
                                <p><i class="fa fa-square red"></i>Sancionados </p>
                              </td>
                              <td><?php echo $sancionados_total_two; ?>%</td>
                            </tr>
                          </table>
                        </td>
                      </table>
                    </div>
                  </div>
                </div>

              </div>


              <div class="row">


              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Escuela Militar de Sargentos del Ejercito<a href=""></a>
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
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/bernii/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="js/flot/jquery.flot.orderBars.js"></script>
    <script src="js/flot/date.js"></script>
    <script src="js/flot/jquery.flot.spline.js"></script>
    <script src="js/flot/curvedLines.js"></script>
    <!-- jVectorMap -->
    <script src="js/maps/jquery-jvectormap-2.0.3.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="js/moment/moment.min.js"></script>
    <script src="js/datepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="js/custom.js"></script>

    <!-- la cantidad de arrestados por 100 divido por la cantidad de alumnos-->

    <!-- Doughnut Chart 1 -->
    <script>
      $(document).ready(function(){
        var options = {
          legend: false,
          responsive: false
        };

        var s = <?php
        include_once("controladores/conexionBD.php");

        $cnn= new conexion();
        $con =$cnn->conectar();

        $database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");

        $query = mysqli_query($con,"SELECT COUNT(*) AS total_alumnos FROM usuario WHERE id_grado = 15");
        $count_total = mysqli_fetch_assoc($query);

        $query_get_sanctions = mysqli_query($con, "SELECT COUNT(*) AS total FROM sancion,usuario WHERE sancion.ci_alumno = usuario.id_ci AND usuario.id_grado = 15 GROUP BY usuario.id_ci");
        $count_total_sanction = mysqli_num_rows($query_get_sanctions);

        $sancionados_total = ($count_total_sanction * 100) / $count_total['total_alumnos'];

        echo $sancionados_total ?>;
        var n = <?php
        include_once("controladores/conexionBD.php");

        $cnn= new conexion();
        $con =$cnn->conectar();

        $database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");

        $query = mysqli_query($con,"SELECT COUNT(*) AS total_alumnos FROM usuario WHERE id_grado = 15");
        $count_total = mysqli_fetch_assoc($query);

        $query_get_sanctions = mysqli_query($con, "SELECT COUNT(*) AS total FROM sancion,usuario WHERE sancion.ci_alumno = usuario.id_ci AND usuario.id_grado = 15 GROUP BY usuario.id_ci");
        $count_total_sanction = mysqli_num_rows($query_get_sanctions);

        $sancionados_total = ($count_total_sanction * 100) / $count_total['total_alumnos'];

        $no_sancionados = 100 - $sancionados_total;
        echo $no_sancionados ?>;

        new Chart(document.getElementById("canvas1"), {
          type: 'doughnut',
          tooltipFillColor: "rgba(51, 51, 51, 0.55)",
          data: {
            labels: [
              "Sancionados",
              "No Sancionados",
            ],
            datasets: [{
              data: [s, n],
              backgroundColor: [
                "#E74C3C",
                "#3498DB"
              ],
              hoverBackgroundColor: [
                "#E95E4F",
                "#49A9EA"
              ]
            }]
          },
          options: options
        });
      });
    </script>
    <!-- /Doughnut Chart 1 -->

    <!-- Doughnut Chart 2 -->
    <script>
      $(document).ready(function(){
        var options = {
          legend: false,
          responsive: false
        };

        var s = <?php
        include_once("controladores/conexionBD.php");

        $cnn= new conexion();
        $con =$cnn->conectar();

        $database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");

        $query = mysqli_query($con,"SELECT COUNT(*) AS total_alumnos FROM usuario WHERE id_grado = 16");
        $count_total = mysqli_fetch_assoc($query);

        $query_get_sanctions = mysqli_query($con, "SELECT COUNT(*) AS total FROM sancion,usuario WHERE sancion.ci_alumno = usuario.id_ci AND usuario.id_grado = 16 GROUP BY usuario.id_ci");
        $count_total_sanction = mysqli_num_rows($query_get_sanctions);

        $sancionados_total = ($count_total_sanction * 100) / $count_total['total_alumnos'];

        echo $sancionados_total ?>;
        var n = <?php
        include_once("controladores/conexionBD.php");

        $cnn= new conexion();
        $con =$cnn->conectar();

        $database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");

        $query = mysqli_query($con,"SELECT COUNT(*) AS total_alumnos FROM usuario WHERE id_grado = 16");
        $count_total = mysqli_fetch_assoc($query);

        $query_get_sanctions = mysqli_query($con, "SELECT COUNT(*) AS total FROM sancion,usuario WHERE sancion.ci_alumno = usuario.id_ci AND usuario.id_grado = 16 GROUP BY usuario.id_ci");
        $count_total_sanction = mysqli_num_rows($query_get_sanctions);

        $sancionados_total = ($count_total_sanction * 100) / $count_total['total_alumnos'];

        $no_sancionados = 100 - $sancionados_total;
        echo $no_sancionados ?>;

        new Chart(document.getElementById("canvas2"), {
          type: 'doughnut',
          tooltipFillColor: "rgba(51, 51, 51, 0.55)",
          data: {
            labels: [
              "Sancionados",
              "No Sancionados",
            ],
            datasets: [{
              data: [s, n],
              backgroundColor: [
                "#E74C3C",
                "#26B99A"
              ],
              hoverBackgroundColor: [
                "#E95E4F",
                "#36CAAB"
              ]
            }]
          },
          options: options
        });
      });
    </script>
    <!-- /Doughnut Chart 2 -->

    <!-- Doughnut Chart 3 -->
    <script>
      $(document).ready(function(){
        var options = {
          legend: false,
          responsive: false
        };

        var s = <?php
        include_once("controladores/conexionBD.php");

        $cnn= new conexion();
        $con =$cnn->conectar();

        $database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");

        $query = mysqli_query($con,"SELECT COUNT(*) AS total_alumnos FROM usuario WHERE id_grado = 16");
        $count_total = mysqli_fetch_assoc($query);

        $query_get_sanctions = mysqli_query($con, "SELECT COUNT(*) AS total FROM sancion,usuario WHERE sancion.ci_alumno = usuario.id_ci AND usuario.id_grado = 16 GROUP BY usuario.id_ci");
        $count_total_sanction = mysqli_num_rows($query_get_sanctions);

        $sancionados_total = ($count_total_sanction * 100) / $count_total['total_alumnos'];

        echo $sancionados_total ?>;
        var n = <?php
        include_once("controladores/conexionBD.php");

        $cnn= new conexion();
        $con =$cnn->conectar();

        $database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");

        $query = mysqli_query($con,"SELECT COUNT(*) AS total_alumnos FROM usuario WHERE id_grado = 17");
        $count_total = mysqli_fetch_assoc($query);

        $query_get_sanctions = mysqli_query($con, "SELECT COUNT(*) AS total FROM sancion,usuario WHERE sancion.ci_alumno = usuario.id_ci AND usuario.id_grado = 17 GROUP BY usuario.id_ci");
        $count_total_sanction = mysqli_num_rows($query_get_sanctions);

        $sancionados_total = ($count_total_sanction * 100) / $count_total['total_alumnos'];

        $no_sancionados = 100 - $sancionados_total;
        echo $no_sancionados ?>;

        new Chart(document.getElementById("canvas3"), {
          type: 'doughnut',
          tooltipFillColor: "rgba(51, 51, 51, 0.55)",
          data: {
            labels: [

              "Sancionados",
              "No Sancionados"


            ],
            datasets: [{
              data: [s, n],
              backgroundColor: [
                "#E74C3C",
                "#9B59B6"


              ],
              hoverBackgroundColor: [
                "#E95E4F",
                "#B370CF"
              ]
            }]
          },
          options: options
        });
      });
    </script>
    <!-- /Doughnut Chart 3 -->

  </body>
</html>
