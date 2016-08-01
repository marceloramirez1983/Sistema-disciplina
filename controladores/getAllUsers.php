<?php
include_once("conexionBD.php");
$cnn = new conexion();
$con = $cnn->conectar();
$database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");

$queryGetAllUsers = "SELECT * FROM asignar_usuario";
$resultGetAllUsers = mysqli_query($con, $queryGetAllUsers);
$jsonUsers = array();
if (mysqli_num_rows($resultGetAllUsers)) {
  # code...
  while ($row = mysqli_fetch_assoc($resultGetAllUsers)) {
    # code...
    $jsonUsers['users_info'][] = $row;
  }
} else {
  # code...
  $jsonUsers['users_info'][] = 0;
}

mysqli_close($con);
echo json_encode($jsonUsers);

?>
