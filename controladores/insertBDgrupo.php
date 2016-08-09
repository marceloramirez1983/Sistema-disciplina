<?php
include_once "conexionBD.php";
$nomb_grupo= strtoupper($_POST['txtnombre_grupo']);
$puntos_grupo=$_POST['CBoxselect_puntos'];

$cnn= new conexion();//crea instancia de la clase conexion
$con =$cnn->conectar();//la clase conexion almacenada de cnn ejecuta la funcion conectar.

$database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");//mysqli_select_db(variableconexion,nombreBD)

$query="SELECT * FROM grupo WHERE grupo='$nomb_grupo'";

$result=mysqli_query($con,$query);


if (mysqli_num_rows($result)<1){
//echo "no existe";

$insertar="INSERT INTO grupo (id_grupo,grupo,puntos) VALUES ('','$nomb_grupo','$puntos_grupo')";

if (!mysqli_query($con,$insertar)) {
  die("Error al insertar".mysql_error);
}
mysqli_close($con);
echo '<script language="javascript">
alert("Grupo registrado correctamente");
window.location="http://localhost/sides/sides_grupos.php";
</script>';
//header('Location: ../sides_armas.php');
exit;

}else {
  mysqli_close($con);
  echo '<script language="javascript">
  alert("Grupo ya fue registrado");
  window.location="http://localhost/sides/sides_grupos.php";
  </script>';
}


?>
