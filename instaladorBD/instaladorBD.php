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

	$sqlfalta="CREATE TABLE falta (
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

//-------------------------------TABLE ROL------------------------------------
	$TB_ROL = "CREATE TABLE rol (
		id_rol INT NOT NULL AUTO_INCREMENT,
		rol VARCHAR(50),
		descripcion VARCHAR(50),
		PRIMARY KEY(id_rol)
	)";

	if(mysqli_query($con, $TB_ROL)){
		echo "<br> - TABLA ROL CREADA - ";

		$INSERT_ROLES_TESTS = "INSERT INTO
			rol(id_rol, rol, descripcion)
				VALUES ('','Administrador','Administra todo el sistema disciplinario'),
							 ('','Encargado de Disciplina','Administra faltas y los reportes disciplinarios'),
							 ('','Jefe de Personal','Administra Instructores'),
							 ('','Instructor','Administra Sanciones'),
							 ('','Primero de Compañia','Administra Alumnos y Sanciones'),
							 ('','Alumno','Administra Hoja de Vida Personal')";

		if (mysqli_query($con, $INSERT_ROLES_TESTS)) {
			# code...
			echo "<br> - ROLES TESTS INSERTADOS - ";
		}

	}

//------------------------------TABLE USUARIO---------------------------------
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

		$INSERT_USUARIOS_TESTS = "INSERT INTO
			usuario(id_ci, id_grado, id_arma, nombre, paterno, materno, sexo, fecha_nac, lugar_nac, correo, celular, direccion, id_tutor)
				VALUES ('12','1','1','Juan','Nunez','Soto','Masculino','04/25/2016','Tiraque','juan@gmail.com','90909090','Av. Norte','1'),
							 ('13','1','1','Pepe','Aguilar','Marneli','Masculino','04/25/2016','Tiraque','pepe@gmail.com','90909090','Av. Norte','1'),
							 ('14','1','1','Lucas','Melo','Lopez','Masculino','04/25/2016','Tiraque','lucas@gmail.com','90909090','Av. Norte','1'),
							 ('15','1','1','Martin','Judas','Toro','Masculino','04/25/2016','Tiraque','martin@gmail.com','90909090','Av. Norte','1'),
							 ('16','1','1','Rodrigo','Murillo','Puerta','Masculino','04/25/2016','Tiraque','rodrigo@gmail.com','90909090','Av. Norte','1'),
							 ('17','1','','Antonio','Solis','Mesa','Masculino','04/25/2016','Tiraque','antonio@gmail.com','90909090','Av. Norte','1')";

		if (mysqli_query($con, $INSERT_USUARIOS_TESTS)) {
			# code...
			echo "<br> - USUARIOS TESTS INSERTADOS - ";
		}

	}

//-----------------------TABLE ASIGNAR USUARIO--------------------------------
	$TB_ASIG_USER = "CREATE TABLE asignar_usuario (
		id_usuario INT NOT NULL AUTO_INCREMENT,
		id_rol INT,
		id_ci INT,
		usuario_nombre VARCHAR(50),
		usuario_password VARCHAR(50),
		PRIMARY KEY(id_usuario)
	)";

	if(mysqli_query($con, $TB_ASIG_USER)){
		echo "<br> - TABLA ASIGNAR USUARIO CREADA - ";

		$INSERT_ASIG_USUARIOS_TESTS = "INSERT INTO
			asignar_usuario(id_usuario, id_rol, id_ci, usuario_nombre, usuario_password)
				VALUES ('','1','12','admin','admin'),
						 	 ('','2','13','disc','disc'),
						 	 ('','3','14','jefe','jefe'),
							 ('','4','15','inst','inst'),
							 ('','5','16','primer','primer'),
							 ('','6','17','alum','alum')";

		if (mysqli_query($con, $INSERT_ASIG_USUARIOS_TESTS)) {
			# code...
			echo "<br> - ASIGNAR USUARIOS TESTS INSERTADOS - ";
		}

	}

//-----------------------------TABLE ARMA-------------------------------------
	$sqlarma = "CREATE TABLE arma (
	id_arma INT NOT NULL AUTO_INCREMENT,
	arma VARCHAR(30),
	descripcion VARCHAR(50),
	PRIMARY KEY(id_arma)
	)";

	if(mysqli_query($con, $sqlarma)){
		echo "<br> - TABLA ARMA CREADA -";

		$INSERT_ARMAS_TEST = "INSERT INTO
			arma(id_arma,arma,descripcion)
				VALUES ('','INF.','INFANTERIA'),
							 ('','CAB.','CABALLERIA'),
							 ('','ART.','ARTILLERIA'),
							 ('','ING.','INGENIERIA'),
							 ('','COM.','COMUNICACIONES'),
							 ('','MAT. BEL.','MATERIAL BELICO'),
							 ('','INT.','INTENDENCIA'),
							 ('','MOT','MOTORES'),
							 ('','SAN.','SANIDAD'),
							 ('','AV. EJTO.','AVIACION DE EJERCITO')";

		if (mysqli_query($con, $INSERT_ARMAS_TEST)) {
			echo "<br> - ARMAS TESTS INSERTADOS - ";
		}

	}

//-----------------------------TABLA GRADO------------------------------------
	$sqlgrado="CREATE TABLE grado (
	id_grado INT NOT NULL AUTO_INCREMENT,
	grado VARCHAR(30),
	descripcion VARCHAR(50),
	PRIMARY KEY(id_grado)
	)";

	if(mysqli_query($con,$sqlgrado)){
		echo "<br> - TABLA GRADO CREADA -";

		$INSERT_GRADOS_TEST = "INSERT INTO
			grado (id_grado,grado,descripcion)
				VALUES ('','GRAL.','OFICIAL GENERAL'),
							 ('','CNL.','CORONEL'),
							 ('','TCNL.','TENIENTECORONEL'),
							 ('','MY.','MAYOR'),
							 ('','CAP.','CAPITAN'),
							 ('','TTE.','TENIENTE'),
							 ('','SBTTE.','OFICIAL SUBALTERNO'),
							 ('','SOF. MY.','SUBOFICIAL MAYOR'),
							 ('','SOF. 1RO','SUBOFICIAL PRIMERO'),
							 ('','SOF. 2DO','SUBOFICIAL SEGUNDO'),
							 ('','SOF. INCL.','SUBOFICIAL INICIAL'),
							 ('','SGTO. 1RO','SARGENTO PRIMERO'),
							 ('','SGTO. 2DO','SARGENTO SEGUNDO'),
							 ('','SGTO. INCL.','SARGENTO INICIAL')";

		if (mysqli_query($con, $INSERT_GRADOS_TEST)) {
			echo "<br> - GRADOS TESTS INSERTADOS - ";
		}

	}

//-----------------------------TABLA TUTOR------------------------------------
 /* preguntar id_ciusuario  debe star tabla tutor*/
	$sqltutor = "CREATE TABLE tutor (
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

//----------------------------TABLA SANCION-----------------------------------
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



crearBD();
crearTablas();

?>
