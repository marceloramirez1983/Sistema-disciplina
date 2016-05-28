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

	// Create TABLE USER
	$TB_USER = "CREATE TABLE tb_user (
		id_ci INT,
		id_grado INT,
		id_arma INT,
		nombre VARCHAR(50),
		paterno VARCHAR(50),
		materno VARCHAR(50),
		sexo VARCHAR(50),
		fecha_nac VARCHAR(50),
		lugar_nac VARCHAR(50),
		correo VARCHAR(50),
		celular INT,
		direccion VARCHAR(50),
		codigo_secreto VARCHAR(8),
		id_tutor INT,
		PRIMARY KEY(id_ci)
	)";

	if(mysqli_query($con, $TB_USER)){
		echo "<br> - TABLA USUARIO CREADA - ";

		$INSERT_USUARIO_TEST_1 = "INSERT INTO
		tb_user(
			id_ci, id_grado, id_arma, nombre, paterno, materno, sexo, fecha_nac, lugar_nac, correo, celular, direccion, id_tutor)
		VALUES
			('12','1','1','Juan','Nunez','Soto','Masculino','04/25/2016','Tiraque','juan@gmail.com','90909090','Av. Norte','1')";

		if (mysqli_query($con, $INSERT_USUARIO_TEST_1)) {
			# code...
			echo "<br> - USUARIO TEST 1 INSERTADO - ";
		}
	}
	// Create TABLE ASIG USER

	mysqli_close($con);
}

crearBD();
crearTablas();

?>
