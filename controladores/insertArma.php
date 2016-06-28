<?php
include_once "conexionBD.php";

$arma_abreviacion =strtoupper($_POST['nombre_arma']);// la abreviacion debe ir mayuscula minuscula
$arma_nombre =strtoupper($_POST['arma_descripcion']);//El nombre del arma lo almaceno en pura mayuscula.

//echo $arma_nombre;
//echo $arma_abreviacion;

$cnn= new conexion();//crea instancia de la clase conexion
$con =$cnn->conectar();//la clase conexion almacenada de cnn ejecuta la funcion conectar.

$database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");//mysqli_select_db(variableconexion,nombreBD)
$query="SELECT * FROM arma WHERE descripcion='$arma_nombre'";
$result=mysqli_query($con,$query);


if (mysqli_num_rows($result)<1){
//echo "no existe";
$insertar="INSERT INTO arma (id_arma,arma,descripcion) VALUES ('','$arma_abreviacion','$arma_nombre')";

if (!mysqli_query($con,$insertar)) {
  die("Error al insertar".mysql_error);
}
mysqli_close($con);
echo '<script language="javascript">
alert("Arma registrada correctamente");
window.location="http://localhost/sides/sides_armas.php";
</script>';
header('Location: ../sides_armas.php');
exit;

}else {
  mysqli_close($con);
  echo '<script language="javascript">
  alert("Arma ya fue registrada");
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
