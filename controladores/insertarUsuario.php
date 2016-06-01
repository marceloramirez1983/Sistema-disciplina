<?php

  include "conexionBD.php";

  $cnn = new conexion();
  $con = $cnn->conectar();

  $database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");

  $USER_CI = $_POST['txt_ci_usuario'];
  $USER_GRADO = $_POST['cbox_grado_usuario'];
  $USER_GENERO = $_POST['rbutton_genero_usuario'];
  $USER_NAME = $_POST['txt_nombre_usuario'];
  $USER_PATERNO = $_POST['txt_paterno_usuario'];
  $USER_MATERNO = $_POST['txt_pmaterno_usuario'];
  $USER_CELULAR = $_POST['txt_celular_usuario'];
  $USER_TELEFENO = $_POST['txt_telefono_usuario'];
  $USER_NACIMIENTO = $_POST['calendar_nacimiento_usuario'];
  $USER_EMAIL = $_POST['txt_email_usuario'];
  $USER_DOMICILO = $_POST['txt_domicilio_usuario'];



  //echo $USER_CI." ".$USER_GRADO." ".$USER_GENERO." ".$USER_NAME." ".$USER_PATERNO." ".$USER_MATERNO." ".$USER_CELULAR." ".$USER_TELEFENO." ".$USER_NACIMIENTO." ".$USER_EMAIL." ".$USER_DOMICILO;












?>
