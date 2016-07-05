<?php
include_once "conexionBD.php";
$grado_abreviacion =strtoupper($_POST['Abreviacion_Grado']);// la abreviacion debe ir mayuscula minuscula
$grado_nombre =strtoupper($_POST['NombreGrado']);//El nombre del arma lo almaceno en pura mayuscula.

$cnn= new conexion();//crea instancia de la clase conexion
$con =$cnn->conectar();//la clase conexion almacenada de cnn ejecuta la funcion conectar.

$database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");//mysqli_select_db(variableconexion,nombreBD)
$query="SELECT * FROM grado WHERE descripcion='$grado_nombre'";
$result=mysqli_query($con,$query);


if (mysqli_num_rows($result)<1){
//echo "no existe";
$insertar="INSERT INTO grado (id_grado,grado,descripcion) VALUES ('','$grado_abreviacion','$grado_nombre')";

if (!mysqli_query($con,$insertar)) {
  die("Error al insertar".mysql_error);
}
mysqli_close($con);
echo '<script language="javascript">
alert("Grado registrado correctamente");
window.location="http://localhost/sides/sides_grados.php";
</script>';
//header('Location: ../sides_grados.php');
exit;

}else {
  mysqli_close($con);
  echo '<script language="javascript">
  alert("Grado ya fue registrado");
  window.location="http://localhost/sides/sides_armas.php";
  </script>';
}



/*if(mysqli_num_rows($result)<1){
  $insertar="INSERT INTO arma (id_arma,arma,descripcion) VALUES ('','$arma_abreviacion','$arma_nombre')";
  if (!mysqli_query($con,$insertar)){
    die("Error al insertar".mysql_error);
  }
  header('Location: ../sides_armas.php');
  exit;

}else{
  echo '<script language="javascript">
  alert("Arma ya fue registrada");
  window.location="http://localhost/sides/sides_armas.php";
  </script>';
}*/


//echo " dato Insertado ";
mysqli_close($con);
?>
