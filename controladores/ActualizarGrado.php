<?php
include "conexionBD.php";
$id_grado=$_POST['txtid_grado'];
$abrev_grado= strtoupper($_POST['txtabreviacion_grado']);
$nomb_grado= strtoupper($_POST['txtnombre_grado']);


$cnn= new conexion();//crea instancia de la clase conexion
$con =$cnn->conectar();//la clase conexion almacenada de cnn ejecuta la funcion conectar.

$database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");//mysqli_select_db(variableconexion,nombreBD)

$insertar="UPDATE grado SET grado = '$abrev_grado',descripcion= '$nomb_grado'  WHERE id_grado = '$id_grado'";

if (!mysqli_query($con,$insertar)) { die ("Error al insertar". mysqli_error);
}else {
  echo '<script language="javascript">
  alert("Modificaciones  realizadas correctamente");
  window.location.assign("../sides_grados.php");
  </script>';
}

//header('Location: ../sides_grados.php');
exit;
//echo " dato Insertado ";
mysqli_close($con);
 ?>
