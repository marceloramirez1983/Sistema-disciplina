<?php
include "controladores/conexionBD.php";
//echo $nomb_grupo. $puntos_grupo;

$cnn= new conexion();//crea instancia de la clase conexion
$con =$cnn->conectar();//la clase conexion almacenada de cnn ejecuta la funcion conectar.

$database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");//mysqli_select_db(variableconexion,nombreBD)
//$link = mysqli_connect("localhost", "root", "", "sides");
$getallgroup= mysqli_query($con, "SELECT * FROM grupo");
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
              <a href="index.html" class="site_title"><img src="images/logo.png" alt="Mountain View" style="width:44px;height:44px;"> <span>SIDES</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2>Marcelo Ramirez</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3> Administrador </h3>
                <ul class="nav side-menu">

                  <li><a><i class="fa fa-user"></i> Administrar Usuario <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="sides_user.html">Registrar Usuario</a></li>
                      <li><a href="sides_asign_user.html">Asignar Usuario</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-edit"></i> Administrar Faltas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="sides_grupos.php">Registrar Grupos</a></li>
                      <li><a href="sides_faltas.php">Registrar Faltas</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-edit"></i> Administrar Instructor <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="sides_instructor.html">Registrar Instructor</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-edit"></i> Administrar Alumnos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="sides_alumnos.html">Registrar Alumnos</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-edit"></i> Administrar Sanciones <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="sides_sanciones.html">Boleta de sancion</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-edit"></i> Hoja de Vida Pesonal <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="sides_reports.html">Reporte Disciplinario</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-edit"></i> Logs <span class="fa fa-chevron-down"></span></a>
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
                    <img src="images/img.jpg" alt="">Marcelo Ramirez
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;">  Profile</a>
                    </li>

                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
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
                      <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Modificar grupo</a>
                      </li>
                      <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Crear grupo</a>
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

                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                              <table class="table table-hover">
                                <thead>
                                  <tr>
                                    <th>N#</th>
                                    <th>Nombre grupo </th>
                                    <th>Puntos</th>
                                  </tr>
                                </thead>
                                <tbody>

                                  <?php
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
                                <button type="button" class="btn btn-primary" onClick="history.go(-1)" >Cancelar</button>
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

    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>

  </body>
</html>
