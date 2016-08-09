<?php

include_once "conexionBD.php";

$id_grupo=$_POST['idgrupo'];
$falta=strtoupper($_POST['txtfalta']);

$cnn= new conexion();//crea instancia de la clase conexion
$con =$cnn->conectar();//la clase conexion almacenada de cnn ejecuta la funcion conectar.

$database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");//mysqli_select_db(variableconexion,nombreBD)

$query="SELECT * FROM falta WHERE nombre ='$falta'";
$result=mysqli_query($con,$query);


if (mysqli_num_rows($result)<1){
//echo "no existe";
$insertar="INSERT INTO falta (id_falta,nombre,id_grupo) VALUES ('','$falta','$id_grupo')";

if (!mysqli_query($con,$insertar)) {
  die("Error al insertar".mysql_error);
}
mysqli_close($con);
echo '<script language="javascript">
alert("Falta registrada correctamente");
window.location="http://localhost/sides/sides_faltas.php";
</script>';
//header('Location: ../sides_armas.php');
exit;

}else {
  mysqli_close($con);
  echo '<script language="javascript">
  alert("La falta ya fue registrada");
  window.location="http://localhost/sides/sides_faltas.php";
  </script>';
}

?>
