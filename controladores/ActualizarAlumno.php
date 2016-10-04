<?php
include "conexionBD.php";
include_once("conexionBD.php");

$cnn= new conexion();
$con =$cnn->conectar();

$database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");

$CI = $_POST['ci_alumno'];
$ID_GRADO = $_POST['id_grado'];
$NOMBRE = $_POST['nombre'];
$PATERNO = $_POST['paterno'];
$MATERNO = $_POST['materno'];
$GENERO = $_POST['sexo'];
$FECHA_NAC = $_POST['fecha_nac'];
$NAC = $_POST['lugar'];
$EMAIL = $_POST['email'];
$CELULAR = $_POST['cel'];
$DOMICILIO = $_POST['domicilio'];

$CI_TUTOR = $_POST['ci_tutor'];
$NOMBRE_TUTOR = $_POST['nombre_tutor'];
$TELEFONO_TUTOR = $_POST['telefono_tutor'];
$DIRECCION_TUTOR = $_POST['direccion_tutor'];

echo $CI;
echo $ID_GRADO;
echo $GENERO;
echo $DIRECCION_TUTOR;


$database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");//mysqli_select_db(variableconexion,nombreBD)

$insertar="UPDATE usuario SET arma = '$abrev_arma',descripcion= '$nomb_arma'  WHERE id_ci = '$CI'";

$INSERT_USER = "INSERT INTO
  usuario(id_ci, id_grado,nombre, paterno, materno, sexo, fecha_nac, lugar_nac, correo, celular, direccion, codigo_secreto, ci_tutor)
  VALUES ('$CI','$ID_GRADO','$NOMBRE','$PATERNO','$MATERNO','$GENERO','$FECHA_NAC','$NAC','$EMAIL','$CELULAR','$DOMICILIO','$CONST_CODIGO','$CI_TUTOR')";


// if (!mysqli_query($con,$insertar)) { die ("Error al insertar". mysqli_error);
// }else {
//   echo '<script language="javascript">
//   alert("Modificaciones  realizadas correctamente");
//   window.location="http://localhost/sides/sides_armas.php";
//   </script>';
// }
//
// exit;
// //echo " dato Insertado ";
mysqli_close($con);
 ?>
