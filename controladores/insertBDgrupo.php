<?php
include "conexionBD.php";
$nomb_grupo= strtoupper($_POST['txtnombre_grupo']);
$puntos_grupo=$_POST['CBoxselect_puntos'];


//echo $nomb_grupo. $puntos_grupo;

$cnn= new conexion();//crea instancia de la clase conexion
$con =$cnn->conectar();//la clase conexion almacenada de cnn ejecuta la funcion conectar.

$database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");//mysqli_select_db(variableconexion,nombreBD)

$insertar="INSERT INTO grupo (id_grupo,grupo,puntos) VALUES ('','$nomb_grupo','$puntos_grupo')";
if (!mysqli_query($con,$insertar)) {
  die("Error al insertar". mysql_error);
}

header('Location: ../sides_grupos.php');
exit;
echo " dato Insertado ";

mysqli_close($con);


 ?>
