<?php
include_once("conexionBD.php");
$cnn= new conexion();
$con =$cnn->conectar();
$database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");

$USER = $_POST['username'];
$PASSWORD = $_POST['password'];

$sql = "SELECT * FROM usuario WHERE id_ci = '$USER' AND codigo_secreto = '$PASSWORD'";

$result = mysqli_query($con, $sql);

$count = mysqli_num_rows($result);

$jsonArray = array();

if ($count == 1) {

  $jsonArray["success"][] = 1;
  # code...
  // $INSERT_SANCION = "INSERT INTO
  // sancion(id_sancion,ci_instructor,ci_alumno,id_falta,id_grupo,puntos,fecha)
  // VALUES ('','15','$CI_ALUM','$ID_FALTA','$ID_GROUP','$PUNTOS','$FECHA')";
  //
  // if (!mysqli_query($con, $INSERT_SANCION)) {
  //   # code...
  //   echo "Error al Insertar sancion";
  // }

} else {
  # code...
  $jsonArray["success"][] = 0;
}




mysqli_close($con);
echo json_encode($jsonArray);
?>
