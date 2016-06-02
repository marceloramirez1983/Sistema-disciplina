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

//-------------------------------TABLE GRUPO----------------------------------
		$TB_GRUPO = "CREATE TABLE grupo (
		id_grupo INT NOT NULL AUTO_INCREMENT,
		grupo VARCHAR(60),
		puntos INT,
		PRIMARY KEY(id_grupo)
		)";

		if(mysqli_query($con, $TB_GRUPO)){
			echo "<br> - TABLA GRUPO CREADA -";

			$INSERT_GRUPO_TEST = "INSERT INTO
			grupo(id_grupo,grupo,puntos)
			VALUES ('','GRUPO I: Faltas sancionadas con presentacion de un Ensayo escrito.','0'),
						 ('','GRUPO II: Faltas sancionadas con una hora de reflexion presencial.','0'),
						 ('','GRUPO III: Faltas sancionadas con la perdida de 2 puntos en disciplina.','2'),
						 ('','GRUPO IV: Faltas sancionadas con la perdida de 3 puntos en disciplina.','3'),
						 ('','GRUPO V: Faltas sancionadas con la perdida de 4 puntos en disciplina.','4'),
						 ('','GRUPO VI: Faltas sancionadas con la perdida de 5 puntos en disciplina.','5')";

			if (mysqli_query($con, $INSERT_GRUPO_TEST)) {
				# code...
				echo "<br> - GRUPOS TESTS INSERTADOS - <br>";
			}
		}

//-------------------------------TABLE FALTA----------------------------------
	$TB_FALTA = "CREATE TABLE falta (
	id_falta INT NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(150),
	id_grupo INT,
	PRIMARY KEY(id_falta)
	)";

	if(mysqli_query($con,$TB_FALTA)){
		echo "<br> - TABLA FALTA CREADA -";

		$INSERT_FALTA_TEST = "INSERT INTO
		falta(id_falta,nombre,id_grupo)
		VALUES ('','Atrasarse a formacion hasta 15 minutos.','1'),
					 ('','Atrasarse en el ingreso al aula.','1'),
					 ('','Bostezar en filas.','1'),
					 ('','Botar basura en lugares indebidos.','1'),
					 ('','Carecer de utiles de aseo personal.','1'),
					 ('','Desconocimiento de la jerarquia.','2'),
					 ('','No cumplir con el horario de encendido y apagado de luces.','2'),
					 ('','No cumplir con sus obligaciones como encargado de dormitorio.','2'),
					 ('','No cumplir con sus obligaciones como encargado de limpieza.','2'),
					 ('','No cumplir con sus obligaciones como encargado de curso.','2'),
					 ('','Abuso de confianza.','3'),
					 ('','Falta de seriedad en los actos de servicio.','3'),
					 ('','Intimar con los empleados civiles y personal de servicios.','3'),
					 ('','Intimar con subalternos en actos del servicio o fuera de él.','3'),
					 ('','Manifestar desprecio por los alimentos suministrados en el comedor.','3'),
					 ('','Expresarse en lenguaje obsceno.','4'),
					 ('','Poner apodos ofensivos a los subalternos y/o camaradas.','4'),
					 ('','Prestar prendas militares de dotacion sin autorizacion.','4'),
					 ('','Realizar movimientos y gestos obscenos.','4'),
					 ('','Vestir uniforme en lugares no recomendables.','4'),
					 ('','Discutir airadamente en presencia de superiores o subalternos.','5'),
					 ('','Ingresar o salir del instituto por lugares indebidos.','5'),
					 ('','No cumplir correctamente sus obligaciones en la guardia.','5'),
					 ('','No observar medidas de seguridad cuando se maneja explosivos, armamento y/o munición, (siempre que no constituya un delito).','5'),
					 ('','No pagar sus deudas con oportunidad dentro y fuera del Instituto.','5'),
					 ('','No dar parte de algun incidente en el puesto de centinela.','6'),
					 ('','No presentarse a la autoridad militar durante vacaciones o cuando se sale de la guarnicion.','6'),
					 ('','Faltar a la palabra empeñada.','6'),
					 ('','Faltar al relevo de guardia (de 30 minutos hasta 2 horas).','6'),
					 ('','Faltar a la verdad.','6')";

		if (mysqli_query($con, $INSERT_FALTA_TEST)) {
			# code...
			echo "<br> - FALTAS TESTS INSERTADOS - <br>";
		}
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
			echo "<br> - ROLES TESTS INSERTADOS - <br>";
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
		ci_tutor INT,
		PRIMARY KEY(id_ci)
	)";

	if(mysqli_query($con, $TB_USER)){
		echo "<br> - TABLA USUARIO CREADA - ";

		$INSERT_USUARIOS_TESTS = "INSERT INTO
			usuario(id_ci, id_grado, id_arma, nombre, paterno, materno, sexo, fecha_nac, lugar_nac, correo, celular, direccion, codigo_secreto, ci_tutor)
				VALUES ('12','1','1','Juan','Nunez','Soto','Masculino','04/25/2016','Tiraque','juan@gmail.com','90909090','Av. Norte','0','0'),
							 ('13','1','1','Pepe','Aguilar','Marneli','Masculino','04/25/2016','Tiraque','pepe@gmail.com','90909090','Av. Norte','0','0'),
							 ('14','1','1','Lucas','Melo','Lopez','Masculino','04/25/2016','Tiraque','lucas@gmail.com','90909090','Av. Norte','0','0'),
							 ('15','1','1','Martin','Judas','Toro','Masculino','04/25/2016','Tiraque','martin@gmail.com','90909090','Av. Norte','0','0'),
							 ('16','1','1','Rodrigo','Murillo','Puerta','Masculino','04/25/2016','Tiraque','rodrigo@gmail.com','90909090','Av. Norte','0','0'),
							 ('17','15','0','Antonio','Solis','Mesa','Masculino','04/25/2016','Tiraque','antonio@gmail.com','90909090','Av. Norte','4444','123'),
							 ('18','16','0','Miguel','Morales','Zapata','Masculino','04/25/2016','Tiraque','miguel@gmail.com','90909090','Av. Norte','4224','456')";

		if (mysqli_query($con, $INSERT_USUARIOS_TESTS)) {
			# code...
			echo "<br> - USUARIOS TESTS INSERTADOS - <br>";
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
							 ('','6','17','alum','alum'),
							 ('','6','18','18','abcdef')";

		if (mysqli_query($con, $INSERT_ASIG_USUARIOS_TESTS)) {
			# code...
			echo "<br> - ASIGNAR USUARIOS TESTS INSERTADOS - <br>";
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
			echo "<br> - ARMAS TESTS INSERTADOS - <br>";
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
			grado(id_grado,grado,descripcion)
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
							 ('','SGTO. INCL.','SARGENTO INICIAL'),
							 ('','AL. 1AM.','ALUMNO PRIMER AÑO MILITAR'),
							 ('','AL. 2AM.','ALUMNO SEGUNDO AÑO MILITAR'),
							 ('','AL. 3AM.','ALUMNO TERCER AÑO MILITAR')";

		if (mysqli_query($con, $INSERT_GRADOS_TEST)) {
			echo "<br> - GRADOS TESTS INSERTADOS - <br>";
		}

	}

//-----------------------------TABLA TUTOR------------------------------------
	$TB_TUTOR = "CREATE TABLE tutor (
	ci_tutor INT,
	nombre VARCHAR(80),
	telefono INT,
	direccion VARCHAR(80),
	PRIMARY KEY(ci_tutor)
	)";

	if(mysqli_query($con, $TB_TUTOR)){
		echo "<br> - TABLA TUTOR CREADA -";

		$INSERT_TUTOR = "INSERT INTO
			tutor(ci_tutor,nombre,telefono,direccion)
				VALUES ('123','Juan Meneses','77887766','Av. Bolivar'),
							 ('345','Yuri Vose','99443322','Av. La paz'),
							 ('567','Maribel Lopez','33221111','Av. Sucre'),
							 ('891','Melani Guitierres','33344455','Av. Junin')";

		if (mysqli_query($con, $INSERT_TUTOR)) {
			echo "<br> - TUTORES TESTS INSERTADOS - <br>";
		}
	}

//----------------------------TABLA SANCION-----------------------------------
	$TB_SANCION = "CREATE TABLE sancion (
	id_sancion INT NOT NULL AUTO_INCREMENT,
	ci_instructor INT,
	ci_alumno INT,
	id_falta INT,
	id_grupo INT,
	puntos INT,
	fecha VARCHAR(50),
	resolucion MEDIUMBLOB,
	PRIMARY KEY(id_sancion)
	)";

	if(mysqli_query($con, $TB_SANCION)){
		echo "<br> - TABLA SANCION CREADA - ";
	}

	mysqli_close($con);
}



crearBD();
crearTablas();

?>
