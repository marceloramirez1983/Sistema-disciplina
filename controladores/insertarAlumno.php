<?php
  include_once("conexionBD.php");

  $cnn= new conexion();
  $con =$cnn->conectar();

  $database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");

  $CI = $_POST['ci_alumno'];
  $ID_GRADO = $_POST['id_grado'];
  $NOMBRE = $_POST['nombre'];
  $PATERNO = $_POST['paterno'];
  $MATERNO = $_POST['materno'];
  $GENERO = $_POST['sexo'];
  $FECHA_NAC = $_POST['fecha_nac'];
  $NAC = $_POST['nacimiento'];
  $EMAIL = $_POST['email'];
  $CELULAR = $_POST['celular'];
  $DOMICILIO = $_POST['domicilio'];

  $CI_TUTOR = $_POST['ci_tutor'];
  $NOMBRE_TUTOR = $_POST['nombre_tutor'];
  $TELEFONO_TUTOR = $_POST['telefono_tutor'];
  $DIRECCION_TUTOR = $_POST['direccion_tutor'];

  function random_password( $length = 6 ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $password = substr( str_shuffle( $chars ), 0, $length );
    return $password;
  }

  function random_codigo( $length = 4 ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $password = substr( str_shuffle( $chars ), 0, $length );
    return $password;
  }

  $CONST_ID_ROL = 6;
  $CONST_PASSWORD = random_password();
  $CONST_CODIGO = random_codigo();

  $INSERT_TUTOR = "INSERT INTO
  tutor(ci_tutor,nombre,telefono,direccion)
  VALUES ('$CI_TUTOR','$NOMBRE_TUTOR','$TELEFONO_TUTOR','$DIRECCION_TUTOR')";

  $INSERT_USER = "INSERT INTO
    usuario(id_ci, id_grado,nombre, paterno, materno, sexo, fecha_nac, lugar_nac, correo, celular, direccion, codigo_secreto, ci_tutor)
    VALUES ('$CI','$ID_GRADO','$NOMBRE','$PATERNO','$MATERNO','$GENERO','$FECHA_NAC','$NAC','$EMAIL','$CELULAR','$DOMICILIO','$CONST_CODIGO','$CI_TUTOR')";

  $INSERT_ASIGN_USER = "INSERT INTO
    asignar_usuario(id_usuario, id_rol, id_ci, usuario_nombre, usuario_password)
    VALUES ('','$CONST_ID_ROL','$CI','$CI','$CONST_PASSWORD')";

    if (!mysqli_query($con, $INSERT_TUTOR)) {
      die(" <br> Error al insertar TUTOR");
    }



    if (!mysqli_query($con, $INSERT_USER)) {
      die(" <br> Error al insertar USUARIO");
    }

    if (!mysqli_query($con, $INSERT_ASIGN_USER)) {
      die(" <br> Error al insertar ASIGN USUARIO".mysql_error);
    }

    header('Location: ../sides_alumnos.php');
    exit;

    mysqli_close($con);

?>
