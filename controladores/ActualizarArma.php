<?php
include "conexionBD.php";
$id_arma=$_POST['txtid_arma'];
$abrev_arma= strtoupper($_POST['txtabreviacion_arma']);
$nomb_arma= strtoupper($_POST['txtnombre_arma']);


$cnn= new conexion();//crea instancia de la clase conexion
$con =$cnn->conectar();//la clase conexion almacenada de cnn ejecuta la funcion conectar.

$database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");//mysqli_select_db(variableconexion,nombreBD)

$insertar="UPDATE arma SET arma = '$abrev_arma',descripcion= '$nomb_arma'  WHERE id_arma = '$id_arma'";

if (!mysqli_query($con,$insertar)) { die ("Error al insertar". mysqli_error);
}else {
  echo '<script language="javascript">
  alert("Modificaciones  realizadas correctamente");
  window.location="http://localhost/sides/sides_armas.php";
  </script>';
}

exit;
//echo " dato Insertado ";
mysqli_close($con);
 ?>
