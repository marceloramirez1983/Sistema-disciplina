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

  /*echo $DOMICILIO."<br>";
  echo $EMAIL."<br>";
  echo $NAC."<br>";
  echo $FECHA_NAC."<br>";
  echo $CELULAR."<br>";
  echo $MATERNO."<br>";
  echo $PATERNO."<br>";
  echo $NOMBRE."<br>";
  echo $GENERO."<br>";
  echo $ID_ARMA."<br>";
  echo $ID_GRADO."<br>";
  echo $CI."<br>";*/

  $queryusuarioci="SELECT * FROM usuario WHERE id_ci=$CI";
  $result=mysqli_query($con, $queryusuarioci);
//***********************************
if (mysqli_num_rows($result)<1) {
  $CONST_ID_ROL = 4;
  //echo $CONST_ID_ROL;
  function random_password( $length = 6 ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
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
      die(" <br> Error al insertar USUARIO ".mysql_error);
    }

    if (!mysqli_query($con, $INSERT_ASIGN_USER)) {
      die(" <br> Error al insertar ASIGN USUARIO ".mysql_error);
    }
    //Enviar Email de Credencial
              $MENSAJE = "Bienvenido al Sistema Disciplinario de la EMSE \n su cuenta de usuario o Username = ".$CI."\n Password: ". $CONST_PASSWORD;
              $to = $EMAIL;
              $subject = 'Credencial de Acceso al Sistema ...';
              $header = 'From: sidesemse@gmail.com'.
                  'MIME-Version: 1.0'.'\r\n'.
                  'Content-type: text/html; charset=utf-8';
              if (mail($to,$subject,$MENSAJE,$header)) {
                  //echo "email enviado!";
              } else {
                  echo '<script language="javascript">
                  alert("error al enviar email!");
                  window.location.assign("../sides_instructor.php");
                  </script>';
              }
    //fin Enviar Email de Credencial
    echo '<script language="javascript">
    alert("Instructor registrado correctamente y Email de registro enviado");
    window.location.assign("../sides_instructor.php");
    </script>';

    //header('Location: ../sides_instructor.php');
    exit;

}else {
  //echo "es numero mayor = 1";
  echo '<script language="javascript">
  alert("El numero de ci ya fue registrado");
  window.location.assign("../sides_instructor.php");
  </script>';
}
    mysqli_close($con);

?>
