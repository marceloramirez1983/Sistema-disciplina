<?php
  include_once("conexionBD.php");
  $cnn= new conexion();
  $con =$cnn->conectar();
  $database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");

  
  echo "hello";


  mysqli_close($con);

?>
