<?php
  include_once("conexionBD.php");

  $cnn= new conexion();
  $con =$cnn->conectar();

  $database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");

  $USER_NAME = $_POST['username'];
  $PASSWORD = $_POST['password'];

  $sql = "SELECT * FROM tb_asignar_usuario WHERE usuario_nombre = '$USER_NAME' AND usuario_password = '$PASSWORD'";

  $result = mysqli_query($con, $sql);

  $count = mysqli_num_rows($result);

  if ($count == 1) {
    # code...
    session_start();
    $row = mysqli_fetch_assoc($result);

    //echo "usuario : ".$row['id_rol'];
    //session_register("user_");

    $_SESSION['rol'] = $row['id_rol'];
    $_SESSION['usuario'] = $row['id_ci'];
    $_SESSION['nickname'] = $row['usuario_nombre'];
    $_SESSION['loggedin'] = true;
    header("location: ../index.php");
  } else {
    # code...
    header("location: ../login.php");
  }

  mysqli_close($con);
?>
