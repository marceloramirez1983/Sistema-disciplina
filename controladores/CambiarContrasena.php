<?php
include "conexionBD.php";

$ci=$_POST['txt_ci_usuario'];
$PassActual=$_POST['txt_contrasena'];
$PassActualRepetida=$_POST['txt_contrasenaRepetida'];
$passNueva=$_POST['txt_Nuevacontrasena'];


$cnn= new conexion();//crea instancia de la clase conexion
$con =$cnn->conectar();//la clase conexion almacenada de cnn ejecuta la funcion conectar.
$database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");//mysqli_select_db(variableconexion,nombreBD)

$buscar="SELECT * from asignar_usuario WHERE id_ci='$ci' and usuario_password='$PassActual'";
$result_busqueda=mysqli_query($con,$buscar);
$row = mysqli_fetch_assoc($result_busqueda);

$rol=$row['id_rol'];

if($row['usuario_password']==$PassActual){

  $insertar="UPDATE asignar_usuario SET usuario_password ='$passNueva'  WHERE id_ci =$ci";

  if (!mysqli_query($con,$insertar)) { die ("Error al insertar". mysqli_error);
  }
  else {
  //if ($rol==1) {
    echo '<script language="javascript">
    alert("Contraseña modificada correctamente");
    window.location.assign("../sides_user_CambiarContrasena.php");
    </script>';
  }

}else {

    echo '<script language="javascript">
    alert("Error contraseña actual incorrecta");
    window.location.assign("../sides_user_CambiarContrasena.php");
    </script>';

}

//header('Location: ../sides_grados.php');
exit;
mysqli_close($con);
 ?>
