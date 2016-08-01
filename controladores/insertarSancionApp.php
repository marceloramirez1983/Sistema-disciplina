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


  //$sql = "SELECT * FROM usuario WHERE id_ci = '$CI_ALUM' AND codigo_secreto = '$CODIGO'";

  $INSERT_SANCION = "INSERT INTO
  sancion(id_sancion,ci_instructor,ci_alumno,id_falta,id_grupo,puntos,fecha)
  VALUES ('','$CI_USER','$CI_ALUM','$ID_FALTA','$ID_GROUP','$PUNTOS','$FECHA')";

  $jsonArray = array();

  if (!mysqli_query($con, $INSERT_SANCION)) {
    # code...
    $jsonArray["success"][] = 0;

  } else {
  # code...
    $jsonArray["success"][] = 1;
  }


  mysqli_close($con);
  echo json_encode($jsonArray);
?>
