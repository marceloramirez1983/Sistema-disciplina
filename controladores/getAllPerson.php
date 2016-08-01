<?php
include_once("conexionBD.php");
$cnn = new conexion();
$con = $cnn->conectar();
$database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");

$queryGetAllPerson = "SELECT id_ci, codigo_secreto FROM usuario";
$resultGetAllPerson = mysqli_query($con, $queryGetAllPerson);
$jsonPerson = array();
if (mysqli_num_rows($resultGetAllPerson)) {
  # code...
  while ($row = mysqli_fetch_assoc($resultGetAllPerson)) {
    # code...
    $jsonPerson['person_info'][] = $row;
  }
} else {
  # code...
  $jsonPerson['person_info'][] = 0;
}

mysqli_close($con);
echo json_encode($jsonPerson);

?>
