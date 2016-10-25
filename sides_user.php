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
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- PNotify -->
    <link href="../vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="css/custom.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="" class="site_title"><img src="images/logo.png" alt="Mountain View" style="width:44px;height:44px;"> <span>SIDES</span></a>
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
                <h3> <?php echo $row_rol['rol']; ?></h3>
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
                <?php endif; ?>


                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <!-- <div class="sidebar-footer hidden-small">
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
            </div> -->
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
                    <!-- <li><a href="sides_user_CambiarContrasena.php">Cambiar contraseña</a>
                    </li> -->
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
                <h3>Administrar Usuario</h3>
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
                      <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Buscar</a>
                      </li>
                      <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Registrar</a>
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
                              <h2>Lista de Usuarios <small>puedes modificar o eliminar</small></h2>

                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                              <table  id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                  <tr>
                                    <th>N#</th>
                                    <th>Nombre y Apellidos</th>
                                    <th>Cedula Identidad</th>
                                    <th>Rol</th>
                                    <th>Celular</th>
                                    <th>Opciones</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    $queryUsuarios = "SELECT * from asignar_usuario INNER JOIN usuario ON usuario.id_ci=asignar_usuario.id_ci where (id_rol<>4 AND id_rol<>6);";
                                    $getAll = mysqli_query($con, $queryUsuarios);
                                    $numeracion=0;
                                    while ($row = mysqli_fetch_array($getAll, MYSQLI_ASSOC)):
                                    $numeracion=$numeracion+1;
                                  ?>
                                <tr>
                                  <th><?php echo $numeracion?></th>
                                  <th scope="row"><?php echo $row ['nombre']." ".$row ['paterno']." ".$row ['materno']; ?></th>
                                  <td><?php echo $row ['id_ci']; ?></td>


                                  <?php
                                  $idrol=$row['id_rol'];
                                  $queryrol = "SELECT * from rol  where id_rol='$idrol';";
                                  $getAllrol = mysqli_query($con, $queryrol);
                                  $row2 = mysqli_fetch_array($getAllrol, MYSQLI_ASSOC)?>

                                  <td><?php echo $row2 ['rol']; ?></td>
                                  <td><?php echo $row ['celular']; ?></td>
                                  <td>
                                    <div class="btn-group">
                                      <button type="button" class="btn btn-primary">Opción</button>
                                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                      </button>
                                      <ul class="dropdown-menu" role="menu">
                                        <li><a href="sides_DetalleUsuario.php?id=<?php echo $row ['id_ci'];?>">Ver mas detalles</a>
                                        </li>
                                        <li><a href="sides_EditarUsuario.php?id=<?php echo $row ['id_ci'];?>">Modificar</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="controladores\EliminarUsuario.php?id=<?php echo $row ['id_ci'];?>">Eliminar</a>
                                        </li>
                                      </ul>
                                    </div>
                                  </td>
                                </tr>
                                <?php endwhile; ?>
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
                          <form id="demoform2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="controladores/insertarUsuario.php">

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Cédula Identidad <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="txt_ci_usuario" name="txt_ci_usuario" required="required" class="form-control col-md-7 col-xs-12" onKeyPress="return soloNumeros(event)">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Grado <span class="required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" name="id_grado" >
                                  <option value="">Seleccione su grado</option>
                                  <?php
                                  $query="SELECT * FROM grado";
                                  $result= mysqli_query($con,$query);
                                  while ($row=mysqli_fetch_array($result)):?>
                                    <option value = "<?php echo $row['0'];?>"><?php echo $row['1'];?></option>
                                  <?php endwhile; ?>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Arma <span class="required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" name="id_arma">
                                  <option value="">Seleccione su arma</option>
                                  <?php
                                  $query2="SELECT * FROM arma";
                                  $result= mysqli_query($con,$query2);
                                  while ($row=mysqli_fetch_array($result)):?>
                                    <option value = "<?php echo $row['0'];?>"><?php echo $row['1'];?></option>
                                  <?php endwhile;
                                  //mysqli_close($con);
                                  ?>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Genero <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="radio">
                                  <label>
                                    <input type="radio" class="flat" checked name="rbutton_genero_usuario" value="MASCULINO"> Masculino
                                  </label>
                                </div>
                                <div class="radio">
                                  <label>
                                    <input type="radio" class="flat" name="rbutton_genero_usuario" value="FEMENINO"> Femenino
                                  </label>
                                </div>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nombre <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="nombre" name="txt_nombre_usuario" required="required" class="form-control col-md-7 col-xs-12" onKeyPress="SoloLetras()" onKeyUp="this.value = this.value.toUpperCase();">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Apellido Paterno <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="paterno" name="txt_paterno_usuario" required="required" class="form-control col-md-7 col-xs-12" onKeyPress="SoloLetras()" onKeyUp="this.value = this.value.toUpperCase();">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Apellido Materno <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="materno" name="txt_materno_usuario" required="required" class="form-control col-md-7 col-xs-12" onKeyPress="SoloLetras()" onKeyUp="this.value = this.value.toUpperCase();">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Celular </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="cel" name="txt_celular_usuario" class="form-control col-md-7 col-xs-12" onKeyPress="return soloNumeros(event)">
                              </div>
                            </div>

                            <!--div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Teléfono </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="last-name" name="txt_telefono_usuario" class="form-control col-md-7 col-xs-12">
                              </div>
                            </div-->

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha de Nacimiento <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name="calendar_nacimiento_usuario">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lugar">Lugar de nacimiento <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="nacimiento" name="nacimiento" required="required" class="form-control col-md-7 col-xs-12" onKeyPress="SoloLetras()" onKeyUp="this.value = this.value.toUpperCase();">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Correo electrónico <span class="required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="txt_email_usuario" name="txt_email_usuario" class="form-control col-md-7 col-xs-12">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Domicilio </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="txt_domicilio_usuario" name="txt_domicilio_usuario" class="form-control col-md-7 col-xs-12"  onKeyUp="this.value = this.value.toUpperCase();">
                              </div>
                            </div>

                            <!-- DESDE ACA LOS CAMBIOS PARA SUPRIMIR REGISTRAR USUARIO-->

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Rol <span class="required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" name="id_rol" id="id_rol">
                                  <option value="">Seleccione un Rol</option>
                                  <?php
                                  $queryrol="SELECT * FROM rol";
                                  $result= mysqli_query($con,$queryrol);
                                  while ($row=mysqli_fetch_array($result)):?>
                                    <?php
                                    $rol1=$row['0'];
                                    if ($rol1!='4'&&$rol1!='6'): ?>
                                    <option value = "<?php echo $row['0'];?>"><?php echo $row['1'];?></option>
                                    <?php endif; ?>

                                  <?php endwhile;
                                  //mysqli_close($con);
                                  ?>
                                </select>
                              </div>
                            </div>


                            <!-- HASTA ACA LOS CAMBIOS PARA SUPRIMIR REGISTRAR USUARIO-->




                            <div class="ln_solid"></div>
                            <div class="form-group">
                              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="button" class="btn btn-primary" onClick="history.go(-1)">Cancelar</button>
                                <button type="button" class="btn btn-success" onclick="valida_envia()">Guardar</button>
                              </div>
                            </div>

                          </form>
                        </div>

                        <script type="text/javascript">

                        // Solo permite ingresar numeros.
                        function soloNumeros(e){
                          var key = window.Event ? e.which : e.keyCode
                          return (key >= 48 && key <= 57)
                        }

                        function SoloLetras() {
                          if ((event.keyCode != 32) && (event.keyCode < 65) || (event.keyCode > 90) && (event.keyCode < 97) || (event.keyCode > 122))event.returnValue = false;
                        }

                        function valida_envia(){

                          valor = document.getElementById("txt_ci_usuario").value;
                          if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
                          alert ("Ingrese la cedula de identidad")
                          demoform2.txt_ci_usuario.focus()
                          return false;
                          }

                          selec= demoform2.id_grado.selectedIndex
                          if (demoform2.id_grado.options[selec].value==""){
                          alert ("Seleccione el grado del usuario")
                          return false
                          }

                          selec= demoform2.id_arma.selectedIndex
                          if (demoform2.id_arma.options[selec].value==""){
                          alert ("Seleccione el arma del usuario")
                          return false
                          }

                          valor = document.getElementById("nombre").value;
                          if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
                          alert ("Ingrese el nombre del usuario")
                          demoform2.nombre.focus()
                          return false;
                          }
                          valor = document.getElementById("paterno").value;
                          if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
                          alert ("Ingrese el apellido paterno del usuario")
                          demoform2.paterno.focus()
                          return false;
                          }
                          valor = document.getElementById("materno").value;
                          if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
                          alert ("Ingrese el apellido materno del usuario")
                          demoform2.materno.focus()
                          return false;
                          }

                          valor = document.getElementById("cel").value;
                          if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
                          alert ("Ingrese el numero de celular")
                          demoform2.cel.focus()
                          return false;
                          }

                          valor = document.getElementById("birthday").value;
                          if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
                          alert ("Ingrese la fecha de nacimiento")
                          demoform2.birthday.focus()
                          return false;
                          }

                          valor = document.getElementById("nacimiento").value;
                          if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
                          alert ("Ingrese el lugar de nacimiento")
                          demoform2.lugar.focus()
                          return false;
                          }

                          valor = document.getElementById("txt_email_usuario").value;
                          expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                          if ( !expr.test(valor)){
                            alert("Error: La dirección de correo "+ valor +" es incorrecta.");
                            demoform2.txt_email_usuario.focus()
                            return false;
                          }



                          valor = document.getElementById("txt_domicilio_usuario").value;
                          if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
                          alert ("Ingrese el direccion del domicilio")
                          demoform2.txt_domicilio_usuario.focus()
                          return false;
                          }

                          selec= demoform2.id_rol.selectedIndex
                          if (demoform2.id_rol.options[selec].value==""){
                          alert ("Seleccione el rol del usuario")
                          return false
                          }

                          demoform2.submit();
                        }
                        </script>


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
          Escuela Militar de Sargentos del Ejercito <a href="#"></a>
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
    <!-- /bootstrap-daterangepicker -->

    <!-- PNotify -->
    <script>
      $(document).ready(function() {
        new PNotify({
          title: "PNotify",
          type: "info",
          text: "Welcome. Try hovering over me. You can click things behind me, because I'm non-blocking.",
          nonblock: {
              nonblock: true
          },
          addclass: 'dark',
          styling: 'bootstrap3',
          hide: false,
          before_close: function(PNotify) {
            PNotify.update({
              title: PNotify.options.title + " - Enjoy your Stay",
              before_close: null
            });

            PNotify.queueRemove();

            return false;
          }
        });

      });
    </script>
    <!-- /PNotify -->

    <!-- Custom Notification -->
    <script>
      $(document).ready(function() {
        var cnt = 10;

        TabbedNotification = function(options) {
          var message = "<div id='ntf" + cnt + "' class='text alert-" + options.type + "' style='display:none'><h2><i class='fa fa-bell'></i> " + options.title +
            "</h2><div class='close'><a href='javascript:;' class='notification_close'><i class='fa fa-close'></i></a></div><p>" + options.text + "</p></div>";

          if (!document.getElementById('custom_notifications')) {
            alert('doesnt exists');
          } else {
            $('#custom_notifications ul.notifications').append("<li><a id='ntlink" + cnt + "' class='alert-" + options.type + "' href='#ntf" + cnt + "'><i class='fa fa-bell animated shake'></i></a></li>");
            $('#custom_notifications #notif-group').append(message);
            cnt++;
            CustomTabs(options);
          }
        };

        CustomTabs = function(options) {
          $('.tabbed_notifications > div').hide();
          $('.tabbed_notifications > div:first-of-type').show();
          $('#custom_notifications').removeClass('dsp_none');
          $('.notifications a').click(function(e) {
            e.preventDefault();
            var $this = $(this),
              tabbed_notifications = '#' + $this.parents('.notifications').data('tabbed_notifications'),
              others = $this.closest('li').siblings().children('a'),
              target = $this.attr('href');
            others.removeClass('active');
            $this.addClass('active');
            $(tabbed_notifications).children('div').hide();
            $(target).show();
          });
        };

        CustomTabs();

        var tabid = idname = '';

        $(document).on('click', '.notification_close', function(e) {
          idname = $(this).parent().parent().attr("id");
          tabid = idname.substr(-2);
          $('#ntf' + tabid).remove();
          $('#ntlink' + tabid).parent().remove();
          $('.notifications a').first().addClass('active');
          $('#notif-group div').first().css('display', 'block');
        });
      });


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




    </script>
    <!-- /Custom Notification -->

    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>

  </body>
</html>
