<?php
include "../controladores/conexion.php";

function crearBD(){
	$cnn= new conexion();//crea instancia de la clase conexion
	$con =$cnn->conectar();//la clase conexion almacenada de cnn ejecuta la funcion conectar.
	$sql="CREATE DATABASE proyectoemse";//comando sql crea BD
	mysqli_query($con,$sql);//mysql_query(conexion,consulta);
	mysqli_close($con);
}

function crearTablas(){
	$cnn= new conexion();//crea instancia de la clase conexion
	$con =$cnn->conectar();//la clase conexion almacenada de cnn ejecuta la funcion conectar.
	mysqli_select_db($con,"proyectoemse");//mysqli_select_db(variableconexion,nombreBD)
	
	$sql="CREATE TABLE usuarios(
	id INT(11) NOT NULL AUTO_INCREMENT,
	usuario VARCHAR(10),
	password VARCHAR(10),
	PRIMARY KEY(id)
	)";//creamos la tabla
	
	if(mysqli_query($con,$sql)){
		echo "tabla creada";
	}
	mysqli_close($con);
}

crearBD();
crearTablas();

?>