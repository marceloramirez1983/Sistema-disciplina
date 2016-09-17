<?php
require ("conexionBD.php");
$cnn= new conexion();
$con =$cnn->conectar();

$database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");

$id= $_GET['id'];
$qry = "SELECT tipo, contenido FROM resoluciones WHERE id_resolucion=$id";
$res = mysqli_query($con,$qry);
$tipo=mysqli_fetch_assoc($res);

 header("Content-type: {$tipo['tipo']}");
 print $tipo['contenido'];
?>
