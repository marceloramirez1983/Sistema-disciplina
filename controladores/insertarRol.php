<?php
include_once "conexionBD.php";
$descripcionRol =strtoupper($_POST['descripcionRol']);// la descripcion ddel rol
$NombreRol=strtoupper($_POST['Nombre_Rol']);//El nombre del rol lo almaceno en pura mayuscula.

$cnn= new conexion();//crea instancia de la clase conexion
$con =$cnn->conectar();//la clase conexion almacenada de cnn ejecuta la funcion conectar.

$database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");//mysqli_select_db(variableconexion,nombreBD)

$query="SELECT * FROM rol WHERE rol='$NombreRol'";
$result=mysqli_query($con,$query);


if (mysqli_num_rows($result)<1){
//echo "no existe";
$insertar="INSERT INTO rol (id_rol,rol,descripcion) VALUES ('','$NombreRol','$descripcionRol')";

if (!mysqli_query($con,$insertar)) {
  die("Error al insertar".mysql_error);
}
mysqli_close($con);
echo '<script language="javascript">
alert("Rol registrado correctamente");
window.location="http://localhost/sides/sides_roles.php";
</script>';
//header('Location: ../sides_grados.php');
exit;

}else {
  mysqli_close($con);
  echo '<script language="javascript">
  alert("Rol ya fue registrado");
  window.location="http://localhost/sides/sides_roles.php";
  </script>';
}

mysqli_close($con);
?>
