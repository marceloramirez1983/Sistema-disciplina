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

	// Create TABLE ROL
	$TB_ROL = "CREATE TABLE tb_rol (
		id_rol INT NOT NULL AUTO_INCREMENT,
		rol VARCHAR(50),
		descripcion VARCHAR(50),
		PRIMARY KEY(id_rol)
	)";

	if(mysqli_query($con, $TB_ROL)){
		echo "<br> - TABLA ROL CREADA - ";

		$INSERT_ROL_TEST_1 = "INSERT INTO
		tb_rol(id_rol, rol, descripcion)
		VALUES ('','Administrador','Administra todo el sistema disciplinario')";

		if (mysqli_query($con, $INSERT_ROL_TEST_1)) {
			# code...
			echo "<br> - ROL ADMINISTRADOR TEST 1 INSERTADO - ";
		}

		$INSERT_ROL_TEST_2 = "INSERT INTO
		tb_rol(id_rol, rol, descripcion)
		VALUES ('','Encargado de Disciplina','Administra faltas y los reportes disciplinarios')";

		if (mysqli_query($con, $INSERT_ROL_TEST_2)) {
			# code...
			echo "<br> - ROL ENCARGADO DE DISCIPLINA TEST 2 INSERTADO - ";
		}

		$INSERT_ROL_TEST_3 = "INSERT INTO
		tb_rol(id_rol, rol, descripcion)
		VALUES ('','Jefe de Personal','Administra Instructores')";

		if (mysqli_query($con, $INSERT_ROL_TEST_3)) {
			# code...
			echo "<br> - ROL JEFE DE PERSONAL TEST 3 INSERTADO - ";
		}

		$INSERT_ROL_TEST_4 = "INSERT INTO
		tb_rol(id_rol, rol, descripcion)
		VALUES ('','Instructor','Administra Sanciones')";

		if (mysqli_query($con, $INSERT_ROL_TEST_4)) {
			# code...
			echo "<br> - ROL INSTRUCTOR TEST 4 INSERTADO - ";
		}

		$INSERT_ROL_TEST_5 = "INSERT INTO
		tb_rol(id_rol, rol, descripcion)
		VALUES ('','Primero de Compañia','Administra Alumnos y Sanciones')";

		if (mysqli_query($con, $INSERT_ROL_TEST_5)) {
			# code...
			echo "<br> - ROL PRIMERO DE COMPAÑIA TEST 5 INSERTADO - ";
		}

		$INSERT_ROL_TEST_6 = "INSERT INTO
		tb_rol(id_rol, rol, descripcion)
		VALUES ('','Alumno','Administra Hoja de Vida Personal')";

		if (mysqli_query($con, $INSERT_ROL_TEST_6)) {
			# code...
			echo "<br> - ROL ALUMNO TEST 6 INSERTADO - ";
		}

	}

	// Create TABLE USER
	$TB_USER = "CREATE TABLE tb_usuario (
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
		tb_usuario(id_ci, id_grado, id_arma, nombre, paterno, materno, sexo, fecha_nac, lugar_nac, correo, celular, direccion, id_tutor)
		VALUES ('12','1','1','Juan','Nunez','Soto','Masculino','04/25/2016','Tiraque','juan@gmail.com','90909090','Av. Norte','1')";

		if (mysqli_query($con, $INSERT_USUARIO_TEST_1)) {
			# code...
			echo "<br> - USUARIO TEST 1 INSERTADO - ";
		}

		$INSERT_USUARIO_TEST_2 = "INSERT INTO
		tb_usuario(id_ci, id_grado, id_arma, nombre, paterno, materno, sexo, fecha_nac, lugar_nac, correo, celular, direccion, id_tutor)
		VALUES ('13','1','1','Pepe','Aguilar','Marneli','Masculino','04/25/2016','Tiraque','pepe@gmail.com','90909090','Av. Norte','1')";

		if (mysqli_query($con, $INSERT_USUARIO_TEST_2)) {
			# code...
			echo "<br> - USUARIO TEST 2 INSERTADO - ";
		}

		$INSERT_USUARIO_TEST_3 = "INSERT INTO
		tb_usuario(id_ci, id_grado, id_arma, nombre, paterno, materno, sexo, fecha_nac, lugar_nac, correo, celular, direccion, id_tutor)
		VALUES ('14','1','1','Lucas','Melo','Lopez','Masculino','04/25/2016','Tiraque','lucas@gmail.com','90909090','Av. Norte','1')";

		if (mysqli_query($con, $INSERT_USUARIO_TEST_3)) {
			# code...
			echo "<br> - USUARIO TEST 3 INSERTADO - ";
		}

		$INSERT_USUARIO_TEST_4 = "INSERT INTO
		tb_usuario(id_ci, id_grado, id_arma, nombre, paterno, materno, sexo, fecha_nac, lugar_nac, correo, celular, direccion, id_tutor)
		VALUES ('15','1','1','Martin','Judas','Toro','Masculino','04/25/2016','Tiraque','martin@gmail.com','90909090','Av. Norte','1')";

		if (mysqli_query($con, $INSERT_USUARIO_TEST_4)) {
			# code...
			echo "<br> - USUARIO TEST 4 INSERTADO - ";
		}

		$INSERT_USUARIO_TEST_5 = "INSERT INTO
		tb_usuario(id_ci, id_grado, id_arma, nombre, paterno, materno, sexo, fecha_nac, lugar_nac, correo, celular, direccion, id_tutor)
		VALUES ('16','1','1','Rodrigo','Murillo','Puerta','Masculino','04/25/2016','Tiraque','rodrigo@gmail.com','90909090','Av. Norte','1')";

		if (mysqli_query($con, $INSERT_USUARIO_TEST_5)) {
			# code...
			echo "<br> - USUARIO TEST 5 INSERTADO - ";
		}

		$INSERT_USUARIO_TEST_6 = "INSERT INTO
		tb_usuario(id_ci, id_grado, id_arma, nombre, paterno, materno, sexo, fecha_nac, lugar_nac, correo, celular, direccion, id_tutor)
		VALUES ('17','1','','Antonio','Solis','Mesa','Masculino','04/25/2016','Tiraque','antonio@gmail.com','90909090','Av. Norte','1')";

		if (mysqli_query($con, $INSERT_USUARIO_TEST_6)) {
			# code...
			echo "<br> - USUARIO TEST 6 INSERTADO - ";
		}

	}

	// Create TABLE ASIG USER
	$TB_ASIG_USER = "CREATE TABLE tb_asignar_usuario (
		id_usuario INT NOT NULL AUTO_INCREMENT,
		id_rol INT,
		id_ci INT,
		usuario_nombre VARCHAR(50),
		usuario_password VARCHAR(50),
		PRIMARY KEY(id_usuario)
	)";

	if(mysqli_query($con, $TB_ASIG_USER)){
		echo "<br> - TABLA ASIGNAR USUARIO CREADA - ";

		$INSERT_ASIG_USUARIO_TEST_1 = "INSERT INTO
		tb_asignar_usuario(id_usuario, id_rol, id_ci, usuario_nombre, usuario_password)
		VALUES ('','1','12','admin','admin')";

		if (mysqli_query($con, $INSERT_ASIG_USUARIO_TEST_1)) {
			# code...
			echo "<br> - ASIGNAR USUARIO TEST 1 INSERTADO - ";
		}

		$INSERT_ASIG_USUARIO_TEST_2 = "INSERT INTO
		tb_asignar_usuario(id_usuario, id_rol, id_ci, usuario_nombre, usuario_password)
		VALUES ('','2','13','disc','disc')";

		if (mysqli_query($con, $INSERT_ASIG_USUARIO_TEST_2)) {
			# code...
			echo "<br> - ASIGNAR USUARIO TEST 2 INSERTADO - ";
		}

		$INSERT_ASIG_USUARIO_TEST_3 = "INSERT INTO
		tb_asignar_usuario(id_usuario, id_rol, id_ci, usuario_nombre, usuario_password)
		VALUES ('','3','14','jefe','jefe')";

		if (mysqli_query($con, $INSERT_ASIG_USUARIO_TEST_3)) {
			# code...
			echo "<br> - ASIGNAR USUARIO TEST 3 INSERTADO - ";
		}

		$INSERT_ASIG_USUARIO_TEST_4 = "INSERT INTO
		tb_asignar_usuario(id_usuario, id_rol, id_ci, usuario_nombre, usuario_password)
		VALUES ('','4','15','inst','inst')";

		if (mysqli_query($con, $INSERT_ASIG_USUARIO_TEST_4)) {
			# code...
			echo "<br> - ASIGNAR USUARIO TEST 4 INSERTADO - ";
		}

		$INSERT_ASIG_USUARIO_TEST_5 = "INSERT INTO
		tb_asignar_usuario(id_usuario, id_rol, id_ci, usuario_nombre, usuario_password)
		VALUES ('','5','16','primer','primer')";

		if (mysqli_query($con, $INSERT_ASIG_USUARIO_TEST_5)) {
			# code...
			echo "<br> - ASIGNAR USUARIO TEST 5 INSERTADO - ";
		}

		$INSERT_ASIG_USUARIO_TEST_6 = "INSERT INTO
		tb_asignar_usuario(id_usuario, id_rol, id_ci, usuario_nombre, usuario_password)
		VALUES ('','6','17','alum','alum')";

		if (mysqli_query($con, $INSERT_ASIG_USUARIO_TEST_6)) {
			# code...
			echo "<br> - ASIGNAR USUARIO TEST 6 INSERTADO - ";
		}

	}

	mysqli_close($con);
}

crearBD();
crearTablas();

?>
