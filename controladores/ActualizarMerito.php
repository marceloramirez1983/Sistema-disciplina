<?php
include "conexionBD.php";
$id_merito=$_POST['txtid_rol'];
$nombre_merito= strtoupper($_POST['txtnombre_rol']);
$puntos = strtoupper($_POST['CBoxselect_puntos']);

$cnn= new conexion();//crea instancia de la clase conexion
$con =$cnn->conectar();//la clase conexion almacenada de cnn ejecuta la funcion conectar.

$database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");//mysqli_select_db(variableconexion,nombreBD)

$insertar="UPDATE merito SET nombre_merito = '$nombre_merito',puntos = '$puntos'  WHERE id_merito = '$id_merito'";

if (!mysqli_query($con,$insertar)) { die ("Error al insertar". mysqli_error);
}else {
  echo '<script language="javascript">
  alert("Modificaciones  realizadas correctamente");
  window.location.assign("../sides_merito.php");
  </script>';
}
exit;
mysqli_close($con);
 ?>
