<?php
include "conexionBD.php";
$idfalta=$_POST['txtid_falta'];
$nomb_falta= strtoupper($_POST['txtnombre_falta']);


//echo $idgrupo;
//echo $nomb_grupo;
//echo $puntos_grupo;

//echo $nomb_grupo. $puntos_grupo;
$cnn= new conexion();//crea instancia de la clase conexion
$con =$cnn->conectar();//la clase conexion almacenada de cnn ejecuta la funcion conectar.

$database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");//mysqli_select_db(variableconexion,nombreBD)

$insertar="UPDATE falta SET nombre = '$nomb_falta' WHERE id_falta = '$idfalta'";

if (!mysqli_query($con,$insertar)) { die ("Error al insertar". mysqli_error);
}else {
  echo '<script language="javascript">
  alert("Modificaciones  realizadas correctamente");
  window.location.assign("../sides_faltas.php");
  </script>';
}
//header('Location: ../sides_faltas.php');
exit;
//echo " dato Insertado ";
mysqli_close($con);

 ?>
