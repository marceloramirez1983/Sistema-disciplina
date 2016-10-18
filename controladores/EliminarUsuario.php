<?php
require_once "conexionBD.php";

$idEliminar=$_GET['id'];
echo $idEliminar;
$cnn= new conexion();//crea instancia de la clase conexion
$con =$cnn->conectar();//la clase conexion almacenada de cnn ejecuta la funcion conectar.
$database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");

$queryeliminaUsuario="DELETE FROM usuario WHERE id_ci= $idEliminar";
$queryAsignarUsuario="DELETE FROM asignar_usuario WHERE id_ci=$idEliminar";

  if (mysqli_query($con,$queryAsignarUsuario)) {
    if (mysqli_query($con,$queryeliminaUsuario)) {
        echo '<script language="javascript">
        alert("Usuario eliminado correctamente");
        window.location.assign("../sides_user.php");
        </script>';
    }
  }

mysqli_close($con);
?>
