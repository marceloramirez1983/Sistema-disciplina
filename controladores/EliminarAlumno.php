<?php
require_once "conexionBD.php";

$idEliminar=$_GET['id'];

//echo $idEliminar;

$cnn= new conexion();//crea instancia de la clase conexion
$con =$cnn->conectar();//la clase conexion almacenada de cnn ejecuta la funcion conectar.
$database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");

$queryBuscatutor="SELECT * FROM usuario WHERE id_ci=$idEliminar";
$citutor = mysqli_query($con, $queryBuscatutor) or die ("error obtener ci tutor");
$result_tutor = mysqli_fetch_assoc($citutor);
$ci_tutorbuscado=$result_tutor['ci_tutor'];
//echo $ci_tutorbuscado;

$queryeliminaUsuario="DELETE FROM usuario WHERE id_ci= $idEliminar";
$queryAsignarUsuario="DELETE FROM asignar_usuario WHERE id_ci=$idEliminar";
$queryEliminaTutor="DELETE FROM tutor WHERE ci_tutor=$ci_tutorbuscado";

$querytutorrepetido="SELECT * FROM usuario WHERE ci_tutor=$ci_tutorbuscado";
$result=mysqli_query($con,$querytutorrepetido);
if (mysqli_num_rows($result)==1) {
  if (mysqli_query($con,$queryAsignarUsuario)) {
    if (mysqli_query($con,$queryeliminaUsuario)) {
      if (mysqli_query($con,$queryEliminaTutor)) {
        echo '<script language="javascript">
        alert("Alumno eliminado");
        window.location.assign("../sides_alumnos.php");
        </script>';
      }
    }
  }
} else {
  if (mysqli_query($con,$queryAsignarUsuario)) {
    if (mysqli_query($con,$queryeliminaUsuario)) {
        echo '<script language="javascript">
        alert("Alumno eliminado correctamente");
        window.location.assign("../sides_alumnos.php");
        </script>';
    }
  }
}

mysqli_close($con);
?>
