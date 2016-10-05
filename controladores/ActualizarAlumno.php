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

$database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");//mysqli_select_db(variableconexion,nombreBD)

$insertaralum="UPDATE usuario SET id_grado = '$ID_GRADO',nombre= '$NOMBRE',paterno='$PATERNO',materno='$MATERNO',sexo='$GENERO',fecha_nac='$FECHA_NAC',lugar_nac='$NAC',correo='$EMAIL',celular='$CELULAR',direccion='$DOMICILIO' WHERE id_ci = '$CI'";
$insertartutor="UPDATE tutor SET nombre_tutor = '$NOMBRE_TUTOR',telefono_tutor= '$TELEFONO_TUTOR',direccion_tutor='$DIRECCION_TUTOR'WHERE ci_tutor = '$CI_TUTOR'";

if (!mysqli_query($con,$insertaralum)) { die ("Error al insertar". mysqli_error);
}else {
  if (!mysqli_query($con,$insertartutor)) { die ("Error al insertar". mysqli_error);
  }else {
  echo '<script language="javascript">
  alert("Modificaciones realizadas correctamente");
  window.location.assign("../sides_alumnos.php");
  </script>';
  }

}
mysqli_close($con);
 ?>
