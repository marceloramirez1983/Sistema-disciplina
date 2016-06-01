<?php
  include_once("conexionBD.php");

  $cnn= new conexion();
  $con =$cnn->conectar();

  $database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");

  $USER_NAME = $_POST['username'];
  $PASSWORD = $_POST['password'];

  $sql = "SELECT * FROM asignar_usuario WHERE usuario_nombre = '$USER_NAME' AND usuario_password = '$PASSWORD'";

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

    switch ($row['id_rol']) {
      case '1':
        # administrador
        header("location: ../sides_user.php");
        break;

      case '2':
        # disciplina
        header("location: ../index.php");
        break;

      case '3':
        # cjefe de personal
        header("location: ../sides_instructor.php");
        break;

      case '4':
        # instructor
        header("location: ../sides_sanciones.php");
        break;

      case '5':
        # primero de compania
        header("location: ../sides_alumnos.php");
        break;

      case '6':
        # alumnos
        header("location: ../sides_reports.php");
        break;

      // default:
      //   # code...
      //   break;
    }
    //header("location: ../index.php");
  } else {
    # code...
    header("location: ../login.php");
  }

  mysqli_close($con);
?>
