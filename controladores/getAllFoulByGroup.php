<?php
include_once("conexionBD.php");
$cnn = new conexion();
$con = $cnn->conectar();
$database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");

$queryGetAllFoultByGroup = "SELECT falta.id_falta, falta.nombre, grupo.id_grupo, grupo.grupo, grupo.puntos FROM falta, grupo WHERE falta.id_grupo = grupo.id_grupo";
$resultGetAllFoult = mysqli_query($con, $queryGetAllFoultByGroup);
$jsonArray = array();
if (mysqli_num_rows($resultGetAllFoult)) {
  # code...
  while ($row = mysqli_fetch_assoc($resultGetAllFoult)) {
    # code...
    $jsonArray['falta_info'][] = $row;
  }
} else {
  # code...
  $jsonArray['falta_info'][] = 0;
}




mysqli_close($con);
echo json_encode($jsonArray);
?>
