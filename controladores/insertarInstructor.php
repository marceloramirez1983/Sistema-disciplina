<?php
  include_once("conexionBD.php");

  $cnn= new conexion();
  $con =$cnn->conectar();

  $database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");

  $CI = $_POST['ci_instructor'];
  $ID_GRADO = $_POST['id_grado'];
  $ID_ARMA = $_POST['id_arma'];
  $NOMBRE = $_POST['nombre'];
  $PATERNO = $_POST['paterno'];
  $MATERNO = $_POST['materno'];
  $GENERO = $_POST['sexo'];
  $FECHA_NAC = $_POST['fecha_nac'];
  $NAC = $_POST['nacimiento'];
  $EMAIL = $_POST['email'];
  $CELULAR = $_POST['celular'];
  $DOMICILIO = $_POST['domicilio'];

  $CONST_ID_ROL = 4;

  function random_password( $length = 6 ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
    $password = substr( str_shuffle( $chars ), 0, $length );
    return $password;
  }

  $CONST_PASSWORD = random_password();

  $INSERT_USER = "INSERT INTO
    usuario(id_ci, id_grado, id_arma, nombre, paterno, materno, sexo, fecha_nac, lugar_nac, correo, celular, direccion)
    VALUES ('$CI','$ID_GRADO','$ID_ARMA','$NOMBRE','$PATERNO','$MATERNO','$GENERO','$FECHA_NAC','$NAC','$EMAIL','$CELULAR','$DOMICILIO')";

  $INSERT_ASIGN_USER = "INSERT INTO
    asignar_usuario(id_usuario, id_rol, id_ci, usuario_nombre, usuario_password)
    VALUES ('','$CONST_ID_ROL','$CI','$CI','$CONST_PASSWORD')";

    if (!mysqli_query($con, $INSERT_USER)) {
      die(" <br> Error al insertar USUARIO".mysql_error);
    }

    if (!mysqli_query($con, $INSERT_ASIGN_USER)) {
      die(" <br> Error al insertar ASIGN USUARIO".mysql_error);
    }

    header('Location: ../sides_instructor.php');
    exit;

    mysqli_close($con);


?>
