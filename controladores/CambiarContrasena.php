<?php
include "conexionBD.php";

$ci=$_POST['txt_ci_usuario'];
$PassActual=$_POST['txt_contrasena'];
$PassActualRepetida=$_POST['txt_contrasenaRepetida'];
$passNueva=$_POST['txt_Nuevacontrasena'];


$cnn= new conexion();//crea instancia de la clase conexion
$con =$cnn->conectar();//la clase conexion almacenada de cnn ejecuta la funcion conectar.


echo $ci;
echo $PassActual;
echo $PassActualRepetida;
echo $passNueva;

// $database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");//mysqli_select_db(variableconexion,nombreBD)
//
// $insertar="UPDATE merito SET nombre_merito = '$nombre_merito',puntos = '$puntos'  WHERE id_merito = '$id_merito'";
//
// if (!mysqli_query($con,$insertar)) { die ("Error al insertar". mysqli_error);
// }else {
//   echo '<script language="javascript">
//   alert("Modificaciones  realizadas correctamente");
//   window.location="http://localhost/sides/sides_merito.php";
//   </script>';
// }
//
// //header('Location: ../sides_grados.php');
// exit;
// //echo " dato Insertado ";
mysqli_close($con);
 ?>
