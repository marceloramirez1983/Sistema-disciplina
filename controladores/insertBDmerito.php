<?php
include_once "conexionBD.php";

$nomb_merito= strtoupper($_POST['txtnombre_grupo']);
$puntos_merito=$_POST['CBoxselect_puntos'];

$cnn= new conexion();//crea instancia de la clase conexion
$con =$cnn->conectar();//la clase conexion almacenada de cnn ejecuta la funcion conectar.

$database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");//mysqli_select_db(variableconexion,nombreBD)
$query="SELECT * FROM merito WHERE nombre_merito='$nomb_merito'";
$result=mysqli_query($con,$query);


if (mysqli_num_rows($result)<1){
//echo "no existe";
$insertar="INSERT INTO merito (id_merito,nombre_merito,puntos) VALUES ('','$nomb_merito','$puntos_merito')";

if (!mysqli_query($con,$insertar)) {
  die("Error al insertar".mysql_error);
}
mysqli_close($con);
echo '<script language="javascript">
alert("Merito registrado correctamente");
window.location.assign("../sides_merito.php");
</script>';
//header('Location: ../sides_armas.php');
exit;

}else {
  mysqli_close($con);
  echo '<script language="javascript">
  alert("Merito ya fue registrado");
  window.location.assign("../sides_merito.php");
  </script>';
}
?>
