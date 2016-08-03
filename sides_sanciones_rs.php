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


    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

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
                <h3> <?php echo $row_rol['rol']; ?>  </h3>
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

                                      <li><a><i class="fa fa-list-alt"></i> Administrar Meritos <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                          <li><a href="sides_meritos.php">Boleta de merito</a></li>
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

                                      <li><a><i class="fa fa-list-alt"></i> Administrar Sanciones <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                          <li><a href="sides_sanciones.php">Boleta de sancion</a></li>
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
                                      <li><a><i class="fa fa-list-alt"></i> Administrar Sanciones <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                          <li><a href="sides_sanciones.php">Boleta de sancion</a></li>
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
                    <!-- <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li> -->
                    <!-- <li>
                      <a href="javascript:;">Help</a>
                    </li> -->
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
                <h3>Administrar Sanciones</h3>
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
                      <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Sancionar</a>
                      </li>
                      <li role="presentation" class="hide"><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Lista de sancionados</a>
                      </li>
                      <!-- <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
                      </li> -->
                    </ul>
                    <div id="myTabContent" class="tab-content">
                      <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                        <!-- Formulario de sanciones nuevas -->
                        <div class="x_content">
                          <br />
                          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="controladores/insertarSancionResolucion.php">

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sancionador">C.I. Instructor sanciona <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input readonly type="text" id="sancionador" name="id_user" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $ID_CI; ?>">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Alumno-sancionado">C.I. Alumno sancionado <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="Alumno-sancionado" name="id_ci" required="required" class="form-control col-md-7 col-xs-12">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Grupo <span class="required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">

                                <select class="form-control grupo" name="grupo">
                                  <option>Seleccione un grupo</option>
                                  <?php
                                    $query="SELECT * FROM grupo";
                                    $result= mysqli_query($con,$query);
                                    //$getPoint = mysqli_fetch_assoc($result);
                                    while ($row=mysqli_fetch_array($result)):?>
                                    <option value = "<?php echo $row['0'];?>"><?php echo $row['1'];?></option>
                                  <?php endwhile;?>
                                </select>

                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Faltas <span class="required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control falta" name="falta">
                                  <option>Seleccione la falta</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Puntos <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12 puntos" name="puntos">
                                <input readonly type="text" class="form-control col-md-7 col-xs-12" name="puntos">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha de Sancion <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input readonly class="form-control col-md-7 col-xs-12" required="required" type="text" name="fecha" value="<?php echo date("d/m/y"); ?>">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Seleccionar Resolución <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" name="fileToUpload" id="fileToUpload">
                              </div>
                            </div>




                            <!-- <div class="form-group hide">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Subir Resolucion </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="last-name" name="apm-user" class="form-control col-md-7 col-xs-12">
                              </div>

                            </div> -->

                            <div class="ln_solid"></div>
                            <div class="form-group">
                              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">Cancelar</button>
                                <button type="submit" class="btn btn-success">Guardar</button>
                              </div>
                            </div>

                          </form>
                        </div>


                      </div>
                      <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                        <!-- List New Users -->
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="x_panel">
                            <div class="x_title">
                              <h2>Lista de Alumnos sancionados<small></small></h2>
                              <!-- <ul class="nav navbar-right panel_toolbox">
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
                              </ul> -->
                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                              <table class="table table-hover">
                                <thead>
                                  <tr>
                                    <th>Cédula Identidad</th>
                                    <th>Grado</th>
                                    <th>Nombre</th>
                                    <th>Apellido Paterno</th>
                                    <th>Sancion</th>
                                    <th>Puntos</th>
                                    <th></th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">2314324</th>
                                    <td>Markasadasasd</td>
                                    <td>Markasadasasd</td>
                                    <td>@Markasadasasd</td>
                                    <td>Markasadasasd</td>
                                    <td>Markasadasasd</td>
                                    <td>
                                      <div class="btn-group">
                                        <button type="button" class="btn btn-danger">Opción</button>
                                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                          <span class="caret"></span>
                                          <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                          <li><a href="#">Ver mas detalles</a>
                                          </li>
                                          <li><a href="#">Modificar</a>
                                          </li>
                                          <li class="divider"></li>
                                          <li><a href="#">Eliminar</a>
                                          </li>
                                        </ul>
                                      </div>
                                    </td>

                                  </tr>
                                  <tr>
                                    <th scope="row">2314324</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>
                                      <div class="btn-group">
                                        <button type="button" class="btn btn-danger">Opción</button>
                                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                          <span class="caret"></span>
                                          <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                          <li><a href="#">Ver mas detalles</a>
                                          </li>
                                          <li><a href="#">Modificar</a>
                                          </li>
                                          <li class="divider"></li>
                                          <li><a href="#">Eliminar</a>
                                          </li>
                                        </ul>
                                      </div>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <th scope="row">2314324</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>
                                      <div class="btn-group">
                                        <button type="button" class="btn btn-danger">Opción</button>
                                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                          <span class="caret"></span>
                                          <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                          <li><a href="#">Ver mas detalles</a>
                                          </li>
                                          <li><a href="#">Modificar</a>
                                          </li>
                                          <li class="divider"></li>
                                          <li><a href="#">Eliminar</a>
                                          </li>
                                        </ul>
                                      </div>
                                      </div>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>

                            </div>
                          </div>
                        </div>

                      </div>
                      <!-- <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                        <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                          booth letterpress, commodo enim craft beer mlkshk </p>
                      </div> -->
                    </div>
                  </div>

                  <!-- <div class="x_title">
                    <h2>Crear Nuevo Usuario</h2>
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

                    <br>
                    <div class="x_content">




                    </div>

                  </div> -->
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

    <!--  Choose One Group -->
    <!-- <script type="text/javascript">
      function select_falta(val) {
        $.ajax({
          type: 'post',
          url: 'controladores/select_falta.php',
          data: {
            get_optional: val
          },
          success: function(response) {
            document.getElementById("falta_select").innerHTML = response;
          }
        });
      }
    </script> -->
    <!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> -->

    <script type="text/javascript">
      $(document).ready(function(){
        $(".grupo").change(function(){
          var id=$(this).val();
          var dataString = 'id='+ id;

          $.ajax({
            type: "POST",
            url: "controladores/seleccionarFalta.php",
            data: dataString,
            cache: false,
            success: function(html){
              $(".falta").html(html);
            }
          });

        });

      });
    </script>

    <script type="text/javascript">
      $(document).ready(function(){

        $(".grupo").change(function(){
          var id=$(this).val();
          var dataString = 'id='+ id;

          $.ajax({
            type: "POST",
            url: "controladores/seleccionarPuntos.php",
            data: dataString,
            cache: false,
            success: function(html){
              $(".puntos").html(html);
            }
          });

        });

      });
    </script>
    <!--  /Choose One Group -->

    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>

  </body>
</html>
