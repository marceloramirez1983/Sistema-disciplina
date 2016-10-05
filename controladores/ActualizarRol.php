<?php
include "conexionBD.php";
$id_rol=$_POST['txtid_rol'];
$nombre_rol= strtoupper($_POST['txtnombre_rol']);
$descripcion_rol = strtoupper($_POST['txtdescripcion_rol']);


$cnn= new conexion();//crea instancia de la clase conexion
$con =$cnn->conectar();//la clase conexion almacenada de cnn ejecuta la funcion conectar.

$database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");//mysqli_select_db(variableconexion,nombreBD)

$insertar="UPDATE rol SET rol = '$nombre_rol',descripcion= '$descripcion_rol'  WHERE id_rol = '$id_rol'";

if (!mysqli_query($con,$insertar)) { die ("Error al insertar". mysqli_error);
}else {
  echo '<script language="javascript">
  alert("Modificaciones  realizadas correctamente");
  window.location.assign("../sides_roles.php");

  </script>';
}

mysqli_close($con);
 ?>
