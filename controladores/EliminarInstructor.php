<?php
require_once "conexionBD.php";

$idEliminar=$_GET['id'];
echo $idEliminar;

$cnn= new conexion();//crea instancia de la clase conexion
$con =$cnn->conectar();//la clase conexion almacenada de cnn ejecuta la funcion conectar.

$database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");

$query_asig_eliminar="SELECT * FROM asignar_usuario WHERE id_ci=$idEliminar";
$result=mysqli_query($con, $query_asig_eliminar);
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)):
  echo $row ['id_ci']."<br>";
  echo $row ['id_usuario'];
Endwhile;

$query="DELETE FROM usuario WHERE id_ci = $idEliminar";
$query2="DELETE FROM asignar_usuario WHERE id_usuario= $row ['id_usuario'];"
;

if(mysqli_query($con,$query)) {
  if(mysqli_query($con,$query2)) {
  echo '<script language="javascript">
  alert("Usuario eliminado correctamente");
  window.location.assign("../sides_instructor.php");

  </script>';
//header('Location: ../sides_grados.php');
}
}
mysqli_close($con);
?>
