<?php
  session_start();

  if ($_SESSION['loggedin']) {
    # code...
    include_once("controladores/conexionBD.php");

    $idEditar=$_GET['id'];//VARIABLE DEL ID DEL ALUMNO QUE SE DESEA MODIFICAR

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

                  <!-- <li><a><i class="fa fa-list-alt"></i> Administrar Sanciones <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="sides_sanciones.php">Boleta de sancion</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-file"></i> Hoja de Vida Pesonal <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="sides_reports.php">Reporte Disciplinario</a></li>
                    </ul>
                  </li> -->

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

                  <li><a><i class="fa fa-list-alt"></i> Administrar Sanciones <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="sides_sanciones.php">Boleta de sancion</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-key"></i> Contraseña <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="sides_user_CambiarContrasena.php">Modificar</a></li>
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
                    <!-- <li><a href="javascript:;">  Profile</a>
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
                <h3>Detalle de Alumnos</h3>
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
                      <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Detalle de alumnos</a>
                      </li>
                      <!-- <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Registrar</a>
                      </li> -->
                      <!-- <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
                      </li> -->
                    </ul>
                    <div id="myTabContent" class="tab-content">
                      <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                        <!-- List New Users -->
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="x_panel">
                            <div class="x_title">
                              <h2>EDITAR LOS ALUMNOS <small>Informacion individual</small></h2>

                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                              <!-- formulario mostrar detalle de alumnos -->
                              <form id="demoform2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="controladores/ActualizarAlumno.php">

                                <?php
                                $query=mysqli_query($con,"SELECT * FROM usuario INNER JOIN tutor ON usuario.ci_tutor=tutor.ci_tutor WHERE usuario.id_ci= $idEditar");
                                while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)):?>

                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Cédula Identidad <span class="required" >*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input readonly type="text" id="ci_alumno" name="ci_alumno" required="required" class="form-control col-md-7 col-xs-12" onkeypress="return SoloNumeros(event);" value="<?php echo $row['id_ci']?>">
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Grado <span class="required">*</span></label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">

                                    <select class="form-control" name="id_grado">
                                      <option value="">Seleccione el grado</option>
                                      <?php
                                      $query2="SELECT * FROM grado";
                                      $result2= mysqli_query($con,$query2);
                                      while ($row2=mysqli_fetch_array($result2)):?>
                                        <option <?php if($row2['0']==$row['id_grado']):?> selected="selected"<?php endif;?>value="<?php echo $row['id_grado']?>"><?php echo $row2['1']?></option>
                                      <?php endwhile?> ;

                                    </select>

                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nombre <span class="required" >*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="nombre" name="nombre" required="required" class="form-control col-md-7 col-xs-12" onkeypress="SoloLetras()" onKeyUp="this.value = this.value.toUpperCase();" value="<?php echo $row['nombre']?>">
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Apellido Paterno <span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="paterno" name="paterno" required="required" class="form-control col-md-7 col-xs-12" onkeypress="SoloLetras()" onKeyUp="this.value = this.value.toUpperCase();" value="<?php echo $row['paterno']?>">
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Apellido Materno <span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="materno" name="materno" required="required" class="form-control col-md-7 col-xs-12" onkeypress="SoloLetras()" onKeyUp="this.value = this.value.toUpperCase();" value="<?php echo $row['materno']?>">
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Genero <span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="radio">
                                      <label>
                                        <input type="radio" class="flat" name="sexo" <?php if( $row['sexo'] == "MASCULINO" ) { ?>checked="checked"<?php } ?> value="MASCULINO" > Masculino
                                      </label>
                                    </div>
                                    <div class="radio">
                                      <label>
                                        <input type="radio" class="flat" name="sexo" <?php if( $row['sexo'] == "FEMENINO" ) { ?>checked="checked"<?php } ?> value="FEMENINO" > Femenino
                                      </label>
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha de Nacimiento <span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name="fecha_nac" value="<?php echo $row['fecha_nac']?>">
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lugar">Lugar de nacimiento <span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="lugar" name="lugar" required="required" class="form-control col-md-7 col-xs-12" onkeypress="SoloLetras()" onKeyUp="this.value = this.value.toUpperCase();" value="<?php echo $row['lugar_nac']?>">
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Correo electrónico <span class="required">*</span></label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="email" name="email" class="form-control col-md-7 col-xs-12" value="<?php echo $row['correo']?>">
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Celular </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="cel" name="cel" class="form-control col-md-7 col-xs-12" onkeypress="return SoloNumeros(event);" value="<?php echo $row['celular']?>">
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Domicilio </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="domicilio" name="domicilio" class="form-control col-md-7 col-xs-12" onKeyUp="this.value = this.value.toUpperCase();" value="<?php echo $row['direccion']?>">
                                  </div>
                                </div>

                                <div class="divider-dashed"></div>

                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Cédula Identidad del Tutor <span class="required">*</span></label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="ci_tutor" name="ci_tutor" class="form-control col-md-7 col-xs-12"  onkeypress="return SoloNumeros(event);" value="<?php echo $row['ci_tutor']?>">
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nombre del Tutor <span class="required">*</span></label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="nombre_tutor" name="nombre_tutor" class="form-control col-md-7 col-xs-12"  onkeypress="SoloLetras()" onKeyUp="this.value = this.value.toUpperCase();"value="<?php echo $row['nombre_tutor']?>">
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Telefono del Tutor <span class="required">*</span></label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="telefono_tutor" name="telefono_tutor" class="form-control col-md-7 col-xs-12" onkeypress="return SoloNumeros(event);"value="<?php echo $row['telefono_tutor']?>">
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Direccion del Tutor <span class="required">*</span></label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="direccion_tutor" name="direccion_tutor" class="form-control col-md-7 col-xs-12" onKeyUp="this.value = this.value.toUpperCase();" value="<?php echo $row['direccion_tutor']?>">
                                  </div>
                                </div>

                                  <?php Endwhile; ?>

                                <div class="ln_solid"></div>

                                <div class="form-group">
                                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="reset" class="btn btn-primary">Cancelar</button>
                                    <button type="button" class="btn btn-success" onclick="valida_envia()">Guardar</button>

                                  </div>
                                </div>
                              </form>
                              <!-- final del  formulario mostrar detalle de alumnos -->

                            </div>
                          </div>
                        </div>


                      </div>
                      <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                        <!-- Form New Users -->
                        <div class="x_content">
                          <br />


                          <script type="text/javascript">
                          function SoloLetras() {
                            if ((event.keyCode != 32) && (event.keyCode < 65) || (event.keyCode > 90) && (event.keyCode < 97) || (event.keyCode > 122))event.returnValue = false;
                          }


                          //Se utiliza para que el campo de texto solo acepte numeros
                          function SoloNumeros(evt){
                           if(window.event){//asignamos el valor de la tecla a keynum
                            keynum = evt.keyCode; //IE
                           }
                           else{
                            keynum = evt.which; //FF
                           }
                           //comprobamos si se encuentra en el rango numérico y que teclas no recibirá.
                           if((keynum > 47 && keynum < 58) || keynum == 8 || keynum == 13 || keynum == 6 ){
                            return true;
                           }
                           else{
                            return false;
                           }
                          }
// validaciones vacio----------------------------------------------
                          function valida_envia(){
                            valor = document.getElementById("ci_alumno").value;
                            if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
                            alert ("Ingrese la cedula de identidad del alumno")
                            demoform2.ci_alumno.focus()
                            return false;
                            }

                            selec= demoform2.id_grado.selectedIndex
                            if (demoform2.id_grado.options[selec].value==""){
                            alert ("Seleccione el grado del alumno")
                            return false
                            }

                            valor = document.getElementById("nombre").value;
                            if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
                            alert ("Ingrese el nombre del alumno")
                            demoform2.nombre.focus()
                            return false;
                            }

                            valor = document.getElementById("paterno").value;
                            if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
                            alert ("Ingrese el apellido paterno del alumno")
                            demoform2.paterno.focus()
                            return false;
                            }

                            valor = document.getElementById("materno").value;
                            if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
                            alert ("Ingrese el apellido materno del alumno")
                            demoform2.materno.focus()
                            return false;
                            }

                            valor = document.getElementById("birthday").value;
                            if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
                            alert ("Ingrese la fecha de nacimiento")
                            demoform2.birthday.focus()
                            return false;
                            }

                            valor = document.getElementById("lugar").value;
                            if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
                            alert ("Ingrese el lugar de nacimiento")
                            demoform2.lugar.focus()
                            return false;
                            }


                            valor = document.getElementById("email").value;
                            expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                            if ( !expr.test(valor)){
                              alert("Error: La dirección de correo "+ valor +" es incorrecta.");
                              demoform2.email.focus()
                              return false;
                            }



                            valor = document.getElementById("cel").value;
                            if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
                            alert ("Ingrese el numero de celular")
                            demoform2.cel.focus()
                            return false;
                            }

                            valor = document.getElementById("domicilio").value;
                            if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
                            alert ("Ingrese el direccion del domicilio")
                            demoform2.domicilio.focus()
                            return false;
                            }

                            valor = document.getElementById("ci_tutor").value;
                            if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
                            alert ("Ingrese la cedula de identidad del tutor")
                            demoform2.ci_tutor.focus()
                            return false;
                            }

                            valor = document.getElementById("nombre_tutor").value;
                            if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
                            alert ("Ingrese el nombre y apellidos del tutor")
                            demoform2.nombre_tutor.focus()
                            return false;
                            }

                            valor = document.getElementById("telefono_tutor").value;
                            if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
                            alert ("Ingrese el telefono del tutor")
                            demoform2.telefono_tutor.focus()
                            return false;
                            }

                            valor = document.getElementById("direccion_tutor").value;
                            if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
                            alert ("Ingrese la direccion del tutor")
                            demoform2.direccion_tutor.focus()
                            return false;
                            }
                            demoform2.submit();
                          }
//hasta aca validaciones vacio----------------------------------------------
                          </script>


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
    <!-- jQuery Smart Wizard -->
    <script src="../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="js/moment/moment.min.js"></script>
    <script src="js/datepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="js/custom.js"></script>

    <!-- jQuery Smart Wizard -->
    <script>
      $(document).ready(function() {
        $('#wizard').smartWizard();

        $('#wizard_verticle').smartWizard({
          transitionEffect: 'slide'
        });

        $('.buttonNext').addClass('btn btn-success');
        $('.buttonPrevious').addClass('btn btn-primary');
        $('.buttonFinish').addClass('btn btn-default');
      });
    </script>
    <!-- /jQuery Smart Wizard -->

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

  </body>
</html>
