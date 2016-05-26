<?php
include "../controladores/conexionBD.php";

function crearBD(){
	$cnn= new conexion();//crea instancia de la clase conexion
	$con =$cnn->conectar();//la clase conexion almacenada de cnn ejecuta la funcion conectar.
	$sql="CREATE DATABASE sides";//comando sql crea BD
	mysqli_query($con,$sql);//mysql_query(conexion,consulta);
	mysqli_close($con);
}

function crearTablas(){
	$cnn= new conexion();//crea instancia de la clase conexion
	$con =$cnn->conectar();//la clase conexion almacenada de cnn ejecuta la funcion conectar.
	mysqli_select_db($con,"sides");//mysqli_select_db(variableconexion,nombreBD)
	
	$sqlfalta="CREATE TABLE falta(
	id_falta INT NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(150),
	id_grupo INT,
	PRIMARY KEY(id_falta)
	)";//creamos la tabla

	$sqlgrupo="CREATE TABLE grupo(
	id_grupo INT NOT NULL AUTO_INCREMENT,
	grupo VARCHAR(60),
	puntos INT,
	PRIMARY KEY(id_grupo)
	)";//creamos la tabla
	
	if(mysqli_query($con,$sqlfalta)){
		echo "tabla falta creada";
	}
	if(mysqli_query($con,$sqlgrupo)){
		echo "tabla grupo creada";
	}
	

	mysqli_close($con);
}

crearBD();
crearTablas();

?>