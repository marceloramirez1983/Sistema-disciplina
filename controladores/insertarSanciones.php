<?php
  include_once("conexionBD.php");

  $cnn= new conexion();
  $con =$cnn->conectar();

  $database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");

  $CI_USER = $_POST['id_user'];
  $CI_ALUM = $_POST['id_ci'];
  $ID_GROUP = $_POST['grupo'];
  $ID_FALTA = $_POST['falta'];
  $PUNTOS = $_POST['puntos'];
  $FECHA = $_POST['fecha'];
  $CODIGO = $_POST['cod_ci'];

  $sql = "SELECT * FROM usuario WHERE id_ci = '$CI_ALUM' AND codigo_secreto = '$CODIGO'";

  $result = mysqli_query($con, $sql);

  $count = mysqli_num_rows($result);


  if ($count == 1) {
    # code...
    $INSERT_SANCION = "INSERT INTO
    sancion(id_sancion,ci_instructor,ci_alumno,id_falta,id_grupo,puntos,fecha)
    VALUES ('','$CI_USER','$CI_ALUM','$ID_FALTA','$ID_GROUP','$PUNTOS','$FECHA')";

    if (!mysqli_query($con, $INSERT_SANCION)) {
      # code...
      echo "Error al Insertar sancion";
    }
    header("location: ../sides_sanciones.php?success");
  } else {
    # code...
    header("location: ../sides_sanciones.php?error");
  }

  mysqli_close($con);
?>
