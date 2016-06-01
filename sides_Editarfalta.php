<?php
/*include "controladores/conexionBD.php";


$cnn= new conexion();//crea instancia de la clase conexion
$con =$cnn->conectar();//la clase conexion almacenada de cnn ejecuta la funcion conectar.

$database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");//mysqli_select_db(variableconexion,nombreBD)*/

session_start();

if ($_SESSION['loggedin']) {
  # code...
  include_once("controladores/conexionBD.php");
  $idEditar=$_GET['id'];// variable para realizar la modificacion
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
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
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
                    <img src="images/img.jpg" alt=""><?php echo $row_user['nombre']." ".$row_user['paterno']; ?>
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
                <h3>EDITAR FALTAS</h3>
              </div>

              <div class="title_right">
                <!--div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                              <button class="btn btn-default" type="button">Go!</button>
                          </span>
                  </div-->
                </div>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="height:600px;">
                  <div class="x_title">
                    <h2>Editar nombre de las faltas</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <!--li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li-->


                    </ul>
                    <div class="clearfix"></div>

                    <form id="demoform2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="controladores/Actualizarfalta.php">

                      <?php
                      $query=mysqli_query($con,"SELECT * FROM falta WHERE id_falta= $idEditar");
                      while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)):?>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Id falta
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txtid_falta" name="txtid_falta" readonly required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $row['id_falta'] ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre Falta<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txtnombre_falta" name="txtnombre_falta" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $row['nombre'] ?>">
                        </div>
                      </div>

                      <!--div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Puntos <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="CBoxselect_puntos">
                            <option value="">Seleccione los puntos para perdidos</option>
                            <option <?//php if($row['puntos']==0):?> selected="selected" <?php //endif;?>value="0">Sin Puntaje</option>
                            <option <?//php if($row['puntos']==1):?> selected="selected" <?php //endif;?>value="1">1 Pto.</option>
                            <option <?//php if($row['puntos']==2):?> selected="selected" <?php //endif;?>value="2">2 Pto.</option>
                            <option <?//php if($row['puntos']==3):?> selected="selected" <?php //endif;?>value="3">3 Pto.</option>
                            <option <?//php if($row['puntos']==4):?> selected="selected" <?php //endif;?>value="4">4 Pto.</option>
                            <option <?//php if($row['puntos']==5):?> selected="selected" <?php //endif;?>value="5">5 Pto.</option>
                          </select>
                        </div>
                      </div-->

                      <?php Endwhile; ?>


                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="button" class="btn btn-primary" onClick="history.go(-1)">Cancelar</button>
                          <button type="button" value="Guardar" onclick="valida_envia()" class="btn btn-success" >Actualizar</button>
                        </div>
                      </div>
                    </form>
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
            Escuela Militar de Sargentos del Ejercito<a href="####"></a>
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

    <!-- Custom Theme Scripts -->
    <script src="js/custom.js"></script>

    <script type="text/javascript">
    function valida_envia(){
    /*  selec= demoform2.CBoxselect_puntos.selectedIndex
      if (demoform2.CBoxselect_puntos.options[selec].value==""){
      alert ("Seleccione los puntos")
      return false
    }*/

      valor = document.getElementById("txtnombre_falta").value;
      if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
      alert ("Ingrese el nuevo nombre de la falta")
      return false;
      }

      demoform2.submit();
    }
    </script>
  </body>
</html>
