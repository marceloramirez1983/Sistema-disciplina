<?php

  include "conexionBD.php";

  $cnn = new conexion();
  $con = $cnn->conectar();

  $database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");

  $USER_CI = $_POST['txt_ci_usuario'];
  $USER_GRADO = $_POST['id_grado'];
  $USER_ARMA = $_POST['id_arma'];
  $USER_GENERO = $_POST['rbutton_genero_usuario'];
  $USER_NAME = $_POST['txt_nombre_usuario'];
  $USER_PATERNO = $_POST['txt_paterno_usuario'];
  $USER_MATERNO = $_POST['txt_materno_usuario'];
  $USER_CELULAR = $_POST['txt_celular_usuario'];
  $USER_FECHANACIMIENTO = $_POST['calendar_nacimiento_usuario'];
  $USER_LUGARNACIMIENTO = $_POST['nacimiento'];
  $USER_EMAIL = $_POST['txt_email_usuario'];
  $USER_DOMICILO = $_POST['txt_domicilio_usuario'];
  $USER_ROL = $_POST['id_rol'];

/*echo $USER_DOMICILO."<br>";
echo $USER_EMAIL."<br>";
echo $USER_LUGARNACIMIENTO."<br>";
echo $USER_FECHANACIMIENTO."<br>";
echo $USER_CELULAR."<br>";
echo $USER_MATERNO."<br>";
echo $USER_PATERNO."<br>";
echo $USER_NAME."<br>";
echo $USER_GENERO."<br>";
echo $USER_ARMA."<br>";
echo $USER_GRADO."<br>";
echo $USER_CI."<br>";*/

$queryusuarioci="SELECT * FROM usuario WHERE id_ci=$USER_CI";

$result=mysqli_query($con, $queryusuarioci);
//$row = mysqli_fetch_array($result)
if (mysqli_num_rows($result)<1) {
  //echo "es numero 0";
  function random_password( $length = 6 ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $password = substr( str_shuffle( $chars ), 0, $length );
    return $password;
  }

$PASSWORD=random_password();
$NOMBREUSUARIO=$USER_CI;

  $INSERT_USER = "INSERT INTO
    usuario(id_ci, id_grado, id_arma, nombre, paterno, materno, sexo, fecha_nac, lugar_nac, correo, celular, direccion)
    VALUES ('$USER_CI','$USER_GRADO','$USER_ARMA','$USER_NAME','$USER_PATERNO','$USER_MATERNO','$USER_GENERO','$USER_FECHA_NACIMIENTO','$USER_NACIMIENTO','$USER_EMAIL','$USER_CELULAR','$USER_DOMICILIO')";

  $INSERT_ASIGN_USER = "INSERT INTO
    asignar_usuario(id_usuario, id_rol, id_ci, usuario_nombre, usuario_password)
    VALUES ('','$USER_ROL','$USER_CI','$NOMBREUSUARIO','$PASSWORD')";

    if (!mysqli_query($con, $INSERT_USER)) {
      die(" <br> Error al insertar USUARIO".mysql_error);
    }

    if (!mysqli_query($con, $INSERT_ASIGN_USER)) {
      die(" <br> Error al insertar ASIGN USUARIO".mysql_error);
    }
    header('Location: ../sides_user.php');
    exit;


}else {
  //echo "es numero mayor = 1";
  echo '<script language="javascript">
  alert("El numero de ci ya fue registrado");
  window.location.assign("../sides_user.php");
  </script>';
}
mysqli_close($con);
?>
