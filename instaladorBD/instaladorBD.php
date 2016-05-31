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
	)";//creamos la tabla FALTA

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

	// Create TABLE USUARIO cambie ---------OJO
	$TB_USER = "CREATE TABLE usuario (
		id_ci INT,
		id_grado INT,
		id_arma INT,
		nombre VARCHAR(50),
		paterno VARCHAR(50),
		materno VARCHAR(50),
		sexo VARCHAR(15),
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
		usuario(
			id_ci, id_grado, id_arma, nombre, paterno, materno, sexo, fecha_nac, lugar_nac, correo, celular, direccion, id_tutor)
		VALUES
			('12','1','1','Juan','Nunez','Soto','Masculino','04/25/2016','Tiraque','juan@gmail.com','90909090','Av. Norte','1')";

		if (mysqli_query($con, $INSERT_USUARIO_TEST_1)) {
			# code...
			echo "<br> - USUARIO TEST 1 INSERTADO - ";
			}
	}

	// Create TABLE ASIG USER
	$sqlarma="CREATE TABLE arma(
	id_arma INT NOT NULL AUTO_INCREMENT,
	arma VARCHAR(30),
	descripcion VARCHAR(50),
	PRIMARY KEY(id_arma)
	)";//creamos la tabla

	if(mysqli_query($con,$sqlarma)){
		echo "<br>tabla arma creada";
	}
//-----------------------------TABLA GRADO-------------------------------------------------
	$sqlgrado="CREATE TABLE grado(
	id_grado INT NOT NULL AUTO_INCREMENT,
	grado VARCHAR(30),
	descripcion VARCHAR(50),
	PRIMARY KEY(id_grado)
	)";//creamos la tabla

	if(mysqli_query($con,$sqlgrado)){
		echo "<br>tabla grado creada";
	}

//-----------------------------FIN TABLA GRADO -------------------------------------------------





 /* preguntar id_ciusuario  debe star tabla tutor*/
	$sqltutor="CREATE TABLE tutor(
	id_tutor INT NOT NULL AUTO_INCREMENT,
	id_ciusuario INT,
	nombre VARCHAR(80),
	telefono INT,
	direccion VARCHAR(80),
	PRIMARY KEY(id_tutor)
	)";//creamos la tabla

	if(mysqli_query($con,$sqltutor)){
		echo "<br>tabla tutor creada";
	}

	$sqlasignar_usuario="CREATE TABLE asignar_usuario(
	id_asig_usuario INT NOT NULL AUTO_INCREMENT,
	id_rol INT,
	id_ci INT,
	user_name VARCHAR(50),
	password  VARCHAR(20),
	PRIMARY KEY(id_asig_usuario)
	)";//creamos la tabla

	if(mysqli_query($con,$sqlasignar_usuario)){
		echo "<br>tabla asignar usuario creada";
	}

	$sqlsancion="CREATE TABLE sancion(
	id_sancion INT NOT NULL AUTO_INCREMENT,
	id_asig_usuario INT,
	ci_instructor INT,
	id_cialumno INT,
	id_falta INT,
	id_grupo INT,
	puntos INT,
	fecha DATE,
	resolucion MEDIUMBLOB,
	PRIMARY KEY(id_sancion)
	)";//creamos la tabla

	if(mysqli_query($con,$sqlsancion)){
		echo "<br>tabla sancion creada";
	}
	mysqli_close($con);
}

function insertarGRADOS()
{
	$cnn= new conexion();//crea instancia de la clase conexion
	$con =$cnn->conectar();//la clase conexion almacenada de cnn ejecuta la funcion conectar.
	mysqli_select_db($con,"sides");//mysqli_select_db(variableconexion,nombreBD)

	$INSERTARGRADO = "INSERT INTO grado(id_grado,grado,descripcion) VALUES (' ','GRAL.','OFICIAL GENERAL'),(' ','CNL.','CORONEL'),(' ','TCNL.','TENIENTECORONEL'),(' ','MY.','MAYOR'),
																																				 (' ','CAP.','CAPITAN'),(' ','TTE.','TENIENTE'),(' ','SBTTE.','OFICIAL SUBALTERNO'),(' ','SOF. MY.','SUBOFICIAL MAYOR'),
																																				 (' ','SOF. 1RO','SUBOFICIAL PRIMERO'),(' ','SOF. 2DO','SUBOFICIAL SEGUNDO'),(' ','SOF. INCL.','SUBOFICIAL INICIAL'),(' ','SGTO. 1RO','SARGENTO PRIMERO'),
																																				 (' ','SGTO. 2DO','SARGENTO SEGUNDO'),(' ','SGTO. INCL.','SARGENTO INICIAL')";

	if (mysqli_query($con,$INSERTARGRADO)) {
		echo "<br> - GRADOS INSERTADO - ";
	}
		mysqli_close($con);
	}

	function insertarARMAS()
	{
		$cnn= new conexion();//crea instancia de la clase conexion
		$con =$cnn->conectar();//la clase conexion almacenada de cnn ejecuta la funcion conectar.
		mysqli_select_db($con,"sides");//mysqli_select_db(variableconexion,nombreBD)

		$INSERTARARMAS = "INSERT INTO arma(id_arma,arma,descripcion) VALUES (' ','INF.','INFANTERIA'),(' ','CAB.','CABALLERIA'),(' ','ART.','ARTILLERIA'),(' ','ING.','INGENIERIA'),
																																					 (' ','COM.','COMUNICACIONES'),(' ','MAT. BEL.','MATERIAL BELICO'),(' ','INT.','INTENDENCIA'),(' ','MOT','MOTORES'),
																																					 (' ','SAN.','SANIDAD'),(' ','AV. EJTO.','AVIACION DE EJERCITO')";

		if (mysqli_query($con,$INSERTARARMAS)) {
			echo "<br> - ARMAS INSERTADO - ";
		}
			mysqli_close($con);
	}


//crearBD();
//crearTablas();
//insertarGRADOS();
//insertarARMAS();


?>
