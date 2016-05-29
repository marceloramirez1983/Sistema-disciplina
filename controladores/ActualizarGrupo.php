<?php
include "conexionBD.php";
$idgrupo=$_POST['txtid_grupo'];
$nomb_grupo= strtoupper($_POST['txtnombre_grupo']);
$puntos_grupo=$_POST['CBoxselect_puntos'];

//echo $idgrupo;
//echo $nomb_grupo;
//echo $puntos_grupo;

//echo $nomb_grupo. $puntos_grupo;
$cnn= new conexion();//crea instancia de la clase conexion
$con =$cnn->conectar();//la clase conexion almacenada de cnn ejecuta la funcion conectar.

$database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");//mysqli_select_db(variableconexion,nombreBD)

$insertar="UPDATE grupo SET grupo = '$nomb_grupo',puntos= '$puntos_grupo'  WHERE id_grupo = '$idgrupo'";

if (!mysqli_query($con,$insertar)) { die ("Error al insertar". mysqli_error);
}
header('Location: ../sides_grupos.php');
exit;
//echo " dato Insertado ";
mysqli_close($con);

 ?>
