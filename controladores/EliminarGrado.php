<?php
require_once "conexionBD.php";
$idEliminar=$_GET['id'];
//echo $idEliminar;
$cnn= new conexion();//crea instancia de la clase conexion
$con =$cnn->conectar();//la clase conexion almacenada de cnn ejecuta la funcion conectar.

$database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");

$query="DELETE FROM grado WHERE id_grado = $idEliminar";
if(mysqli_query($con,$query)) {
  echo '<script language="javascript">
  alert("Grado eliminado correctamente");
  window.location.assign("../sides_grados.php");
  </script>';
}
mysqli_close($con);
?>
