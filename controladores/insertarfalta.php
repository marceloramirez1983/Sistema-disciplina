<?php
include_once "conexionBD.php";
$id_grupo=$_POST['idgrupo'];
$falta=strtoupper($_POST['txtfalta']);

//echo $nomb_grupo. $puntos_grupo;
$cnn= new conexion();//crea instancia de la clase conexion
$con =$cnn->conectar();//la clase conexion almacenada de cnn ejecuta la funcion conectar.

$database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");//mysqli_select_db(variableconexion,nombreBD)

$insertar="INSERT INTO falta (id_falta,nombre,id_grupo) VALUES ('','$falta','$id_grupo')";

if (!mysqli_query($con,$insertar)) {
  die("Error al insertar".mysql_error);
}
header('Location: ../sides_faltas.php');
exit;
//echo " dato Insertado ";
mysqli_close($con);
?>
