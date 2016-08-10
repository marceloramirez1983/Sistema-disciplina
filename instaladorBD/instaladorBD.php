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
			VALUES ('','GRUPO I: SANCIONADA CON 1 PUNTO.','1'),
						 ('','GRUPO II: SANCIONADAS CON 2 PUNTOS','2'),
						 ('','GRUPO III: SANCIONADAS CON 3 PUNTOS.','3'),
						 ('','GRUPO IV: SANCIONADAS CON 4 PUNTOS','4'),
						 ('','GRUPO V: SANCIONADAS CON 5 PUNTOS','5')";

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
		VALUES ('','ATRASARSE A FORMACION','1'),
					 ('','MOVERSE EN FILAS','1'),
					 ('','FALTA DE POSTURA MILITAR','1'),
					 ('','DESASEADO','1'),
					 ('','DESORDENADO CON SUS EFECTOS PERSONALES','1'),
					 ('','FALTA DE URBANIDAD','1'),
					 ('','HABLAR EN FILAS','1'),
					 ('','ATRASARSE AL PARTE','1'),
					 ('','LLEVAR O CONSUMIR ALIMENTOS EN AULAS O EN FILAS','1'),
					 ('','NO PEDIR PERMISO PARA PASAR O RETIRARSE DE UN RECINTO','1'),
					 ('','NO GRITAR ATENCION CUANDO INGRESA UN SUPERIOR','1'),
					 ('','DESCONOCIMIENTO DE LA JERARQUIA','1'),
					 ('','DESCUIDADO CON EL UNIFORME','1'),
					 ('','MAL TENDIDO DE CAMAS','1'),
					 ('','NO ACUDIR CON PRESTEZA AL LLAMADO DE UN SUPERIOR','1'),
					 ('','NO PEDIR PERMISO PARA CONTINUAR','1'),
					 ('','RETIRARSE O INCORPORARSE A FORMACION SIN PEDIR PERMISO','1'),
					 ('','CARECER DE UTILES DE LIMPIEZA DE ARMAS','1'),
					 ('','CARECER DE UTILES DE ASEO PAÑUELOS TRAPO DE CALZADO HILO AGUJAS','1'),
					 ('','VOTAR BASURA EN LUGARES INDEBIDOS','1'),
					 ('','NO CUMPLIR CON EL HORARIO DE ENCENDIDO Y APAGADO DE LUCES','1'),
					 ('','BOSTEZAR EN FILAS JUGAR EN FILAS','1'),
					 ('','REIR EN FILAS','1'),
					 ('','FALTA DE POSTURA MILITAR','1'),
					 ('','DESATENTO','1'),
					 ('','DESCUIDADO CON LAS PRENDAS DE DOTACION','1'),
					 ('','DESCUIDADO CON LOS PUPITRES','1'),
					 ('','DESATENTO EN CLASES','1'),
					 ('','ATRASARSE EN EL INGRESO AL AULA','1'),
					 ('','NO LLEVAR EL MATERIAL NECESARIO PARA LA MATERIA REGLAMENTO O DOSIER','1'),
					 ('','PONER APODOS OFENSIVOS A LOS SUBALTERNOS Y O CAMARADAS','2'),
					 ('','FALTA DE CORTESIA MILITAR','2'),
					 ('','FALTA DE RESPETO CON LOS CAMARADAS DE CURSO','2'),
					 ('','FALTA DE CONSIDERACION CON EL QUE ESTA AL MANDO','2'),
					 ('','FALTA DE CUIDADO CON LOS JARDINES DEL INSTITUTO','2'),
					 ('','DESCONOCIMIENTO DE LA REGLAMENTACION INTERNA DEL INSTITUTO','2'),
					 ('','FALTA DE SERIEDAD CON LOS ACTOS DE SERVICIO','2'),
					 ('','NO REALIZAR BIEN UN EJERCICIO','2'),
					 ('','PRESTAR PRENDAS MILITARES DE DOTACION SIN AUTORIZACION','2'),
					 ('','FALTA DE CAMARADERIA','2'),
					 ('','NO PRESENTAR PRENDAS EN LA REVISIÓN DE VESTUARIO Y EQUIPO','2'),
					 ('','NO CUMPLIR CORRECTAMENTE UNA SANCION','2'),
					 ('','NO DAR CUMPLIMIENTO A LAS PRESCRIPCIONES MEDICAS ESTABLECIDAS','2'),
					 ('','REALIZAR MOVIMIENTOS Y GESTOS OBSCENOS','2'),
					 ('','NEGLIGENTE','2'),
					 ('','MANIFESTAR DESPRECIO POR LOS ALIMENTOS SUMINISTRADOS EN EL COMEDOR','2'),
					 ('','ALTERAR EL UNIFORME','2'),
					 ('','INTIMAR CON LOS EMPLEADOS CIVILES Y PERSONAL DE SERVICIOS','2'),
					 ('','MANTENER PUBLICA FAMILIARIDAD CON LOS SUBALTERNOS','2'),
					 ('','NO CUMPLIR CON SUS OBLIGACIONES COMO ENCARGADO DE DORMITORIO','2'),
					 ('','NO CUMPLIR CON SUS OBLIGACIONES COMO ENCARGADO DE PABELLON','2'),
					 ('','NO CUMPLIR CON SUS OBLIGACIONES COMO ALUMNO DE SERVICIO','2'),
					 ('','FALTA DE CONTROL CON SU UNIDAD','2'),
					 ('','NO PRESENTARSE A UN SUPERIOR DESPUES DE HABER RECIBIDO UNA ORDEN','2'),
					 ('','INTIMAR CON SUBALTERNOS EN ACTOS DEL SERVICIO O FUERA DE EL','2'),
					 ('','FALTA DE INTERES EN INSTRUCCION','2'),
					 ('','FALTA DE ESPIRITU DE CUERPO','2'),
					 ('','NO RESPETAR EL SUEÑO DE SUS CAMARADAS DESPUES DEL TOQUE DE SILENCIO','2'),
					 ('','IMPONER SANCIONES INMEDIATAS DENTRO DE LOS COMEDORES Y SANIDAD','2'),
					 ('','INSULTAR A UN CAMARADA','2'),
					 ('','ESCUPIR EN LUGARES INDEBIDOS','2'),
					 ('','NO REPETIR EN VOZ ALTA LA ORDEN IMPARTIDA POR UN SUPERIOR','2'),
					 ('','NO LLEVAR CORRECTAMENTE EL UNIFORME','2'),
					 ('','NO DAR CUMPLIMIENTO AL HORARIO','2'),
					 ('','NO CONTESTAR EL SALUDO DE LOS SUBALTERNOS','2'),
					 ('','NO CONDUCIR CORRECTAMENTE SU UNIDAD','2'),
					 ('','NO PRESENTARSE CON SU PAPELETA PARA ENTRAR EN REPOSO','2'),
					 ('','NO VESTIR EL UNIFORME PRESCRITO','2'),
					 ('','NO PERMANECER CON SU UNIDAD','2'),
					 ('','INDIFERENTE','2'),
					 ('','EXPRESARSE EN LENGUAJE OBSCENO','2'),
					 ('','FUMAR','2'),
					 ('','ASUMIR ATRIBUCIONES QUE NO LE CORRESPONDEN','2'),
					 ('','ARBITRARIO','2'),
					 ('','EXCEDERSE EN SUS ATRIBUCIONES','2'),
					 ('','VESTIR UNIFORME EN LUGARES NO RECOMENDABLES','2'),
					 ('','DESCUIDADO CON EL MATERIAL DEPORTIVO','2'),
					 ('','JUGAR EN FORMACION','2'),
					 ('','FALTA DE INSTRUCCION','2'),
					 ('','NO DAR CORRECTAMENTE LAS VOCES DE MANDO','2'),
					 ('','USO DE MAQUILLAJE PINTURA DE LABIOS CEJAS','2'),
					 ('','PINTARSE LAS UÑAS','2'),
					 ('','UTILIZAR ARETES NO REGLAMENTARIOS','2'),
					 ('','NO LLEVAR ZAPATOS REGLAMENTARIOS TACO MEDIANO MODELO CLASICO DE CUERO NEGRO','2'),
					 ('','PERMANECER SIN AUTORIZACION INMEDIACIONES O DENTRO DEL PABELLON DE ALUMNAS(OS)','2'),
					 ('','UTILIZAR JOYAS VISTIENDO UNIFORMES ANILLOS COLLARES PULSERAS','2'),
					 ('','USAR TINTES DE CABELLO PARA ALTERAR EL COLOR NATURAL DEL MISMO','2'),
					 ('','DESPRECIAR LOS ALIMENTOS DEL COMEDOR','2'),
					 ('','PROVOCAR DESORDEN EN AULAS','2'),
					 ('','NO CUMPLIR CON SUS OBLIGACIONES COMO ENCARGADO DE CURSO','2'),
					 ('','NO CUMPLIR CON SUS OBLIGACIONES COMO ENCARGADO DE LIMPIEZA','2'),
					 ('','NO DEVOLVER LIBROS A LA BIBLIOTECA EN EL PLAZO ESTABLECIDO','2'),
					 ('','NO PORTAR SUS UTILES DE ESTUDIO','2'),
					 ('','FALTA DE CUIDADO CON LAS DEPENDENCIAS DEL INSTITUTO','3'),
					 ('','PRESTARSE PRENDAS CIVILES O MILITARES DE LOS SUBALTERNOS','3'),
					 ('','TENENCIA DE LIBROS FOLLETOS U OBJETOS PORNOGRAFICOS','3'),
					 ('','NO PAGAR SUS DEUDAS EN OPORTUNIDAD DENTRO Y FUERA DEL INSTITUTO','3'),
					 ('','ABUSO DE AUTORIDAD CON EL PERSONAL CIVIL Y SOLDADOS','3'),
					 ('','FALTA DE CONSIDERACION CON EL ALUMNO DE SERVICIO DEL BATALLON','3'),
					 ('','FALTA DE CONSIDERACION CON EL AUXILIAR DE SERVICIO DEL BATALLON','3'),
					 ('','FALTA DE CONSIDERACION CON LOS ALUMNOS QUE CUMPLEN EL SERVICIO DE GUARDIA','3'),
					 ('','FALTA DE ESPIRITU MILITAR','3'),
					 ('','NO CUMPLIR CORRECTAMENTE SUS OBLIGACIONES EN LA GUARDIA','3'),
					 ('','FALTA DE CARACTER Y FIRMEZA EN EL MANDO','3'),
					 ('','MANIFESTAR COMPORTAMIENTO ANTIDEPORTIVO EN COMPETENCIAS DEPORTIVAS','3'),
					 ('','IMPONER SANCIONES FISICAS DESPUES DE LOS ALIMENTOS','3'),
					 ('','ABANDONAR LAS INMEDIACIONES DE ENFERMERIA O LA SALA DEL HOSPITAL SIN AUTORIZACION','3'),
					 ('','NO INCORPORARSE A LA ESCUELA DESPUES DE SER DADO DE ALTA DEL HOSPITAL O COSSMIL','3'),
					 ('','RIDICULIZAR A UN SUBALTERNO','3'),
					 ('','NO DAR PARTE OPORTUNAMENTE','3'),
					 ('','ATRASARSE HASTA 30 MINUTOS AL RELEVO DE GUARDIA','3'),
					 ('','ATRASARSE HASTA 30 MINUTOS A CUMPLIR UN ARRESTO','3'),
					 ('','ATRASARSE HASTA 30 MINUTOS AL PARTE DE INCORPORACION DE FRANCOS Y SALIDAS POR ASUNTOS DEL SERVICIO','3'),
					 ('','DAR MAL USO A LOS JARDINES DEL INSTITUTO','3'),
					 ('','ELUDIR EL SALUDO A UN SUPERIOR','3'),
					 ('','REALIZAR RECLAMOS INFUNDADOS','3'),
					 ('','ALTERAR EL UNIFORME ESTABLECIDO PARA EL SERVICIO DE GUARDIA','3'),
					 ('','PERMANECER EN LA CANTINA EN HORAS INDEBIDAS','3'),
					 ('','PROLONGAR O ABREVIAR SANCIONES','3'),
					 ('','DAR MAL EJEMPLO','3'),
					 ('','NO LLEVAR LA PLACA DE IDENTIFICACION PERSONAL','3'),
					 ('','FALTA DE PERSONALIDAD','3'),
					 ('','NO DAR CURSO A SOLICITUDES DE LOS SUBALTERNOS','3'),
					 ('','REPRESENTAR EN TERMINOS INDECOROSOS','3'),
					 ('','DESAUTORIZAR O QUITAR EL MANDO A UN SUBALTERNO','3'),
					 ('','INGRESAR O SALIR DEL INSTITUTO POR LUGARES INDEBIDOS PARA LOS FRANCOS','3'),
					 ('','ELUDIR EL CONDUCTO REGULAR','3'),
					 ('','ELUDIR ACTIVIDADES DEPORTIVAS DE INSTRUCCION CLASES','3'),
					 ('','PERMANECER EN LOS DORMITORIOS EN HORAS INDEBIDAS','3'),
					 ('','SERVIRSE ALIMENTOS DESTINADOS A OTROS ALUMNOS','3'),
					 ('','NO LEVANTARSE AL TOQUE DE DIANA','3'),
					 ('','ABUSO DE CONFIANZA','3'),
					 ('','ELUDIR LA SANCION FISICO IMPUESTO','3'),
					 ('','FINGIR ENFERMEDAD PARA FALTAR A CLASES INSTRUCCION O ACTIVIDADES DEPORTIVAS','3'),
					 ('','DESCONOCER SUS OBLIGACIONES EN LA GUARDIA','3'),
					 ('','NO PASAR CONSIGNAS','3'),
					 ('','ATRASARSE A COMPROMISOS DEL BATALLON SOCIALES CULTURALES EVENTOS DEPORTIVOS','3'),
					 ('','FALTA DE MORAL MILITAR','3'),
					 ('','CONTRAER DEUDAS CON LOS SUBALTERNOS','3'),
					 ('','PERMANECER EN AREAS INDEBIDAS','3'),
					 ('','NO OBSERVAR MEDIDAS DE SEGURIDAD AL MANEJAR EXPLOSIVOS ARMAMENTO MUNICION SI NO ES DELITO','3'),
					 ('','DISCUTIR AIRADAMENTE EN PRESENCIA DE SUPERIORES O SUBALTERNOS','3'),
					 ('','FALTA DE RESPETO CON EL UNIFORME','3'),
					 ('','DEMOSTRAR CONDUCTA INDECOROSA EN ACTOS PUBLICOS','3'),
					 ('','NO LLEVAR EL CORTE REGLAMENTARIO','3'),
					 ('','DAR PARTE FALSO','3'),
					 ('','PERMANECER SIN AUTORIZACION EN LAS INMEDIACIONES O DENTRO DEL PABELLON DE ALUMNAS Y ALUMNOS','3'),
					 ('','TOMARSE DE LA MANO DENTRO DE LAS INSTALACIONES DEL INSTITUTO CON UNA ALUMNA','3'),
					 ('','ADUCIR DIFERENCIAS DE GENERO PARA NO REALIZAR UN EJERCICIO','3'),
					 ('','REALIZAR DISCRIMINACION DE GENEROS','3'),
					 ('','REALIZAR INSINUACIONES AMOROSAS A UN SUPERIOR O SUBALTERNO','3'),
					 ('','FINGIR ENCONTRARSE CON SU PERIODO MENSTRUAL PARA ELUDIR ACTIVIDADES Y O SANCIONES','3'),
					 ('','EXCUSARSE DE CUMPLIR UNA SANCION POR ESTAR CON SU PERIODO MENSTRUAL','3'),
					 ('','NO LLEVAR EL TRAJE DE BAÑO REGLAMENTARIO','3'),
					 ('','DESCUIDADO CON SUS PRENDAS DE DOTACION','3'),
					 ('','NO CUMPLIR SUS OBLIGACIONES COMO CENTINELA DE GUARDIA','3'),
					 ('','NO CUMPLIR SUS OBLIGACIONES EN LA GUARDIA','3'),
					 ('','NO LLEVAR EL CORTE REGLAMENTARIO PARA DAMAS','3'),
					 ('','FALTA DE PULCRITUD EN EL LLENADO DE DOCUMENTOS','3'),
					 ('','DORMIR EN AULAS','3'),
					 ('','FALTA DE CONSIDERACION CON LOS CATEDRATICOS CIVILES','3'),
					 ('','ABANDONAR LAS AULAS SIN AUTORIZACION','3'),
					 ('','PORTAR EN AULAS MATERIAL PORNOGRAFICO','3'),
					 ('','FALTA DE PULCRITUD EN LOS TRABAJOS PRESENTADOS','3'),
					 ('','FALTA DE PULCRITUD EN EXAMENES','3'),
					 ('','ATRASARSE EN INGRESAR AL PABELLON DE ESTUDIOS','3'),
					 ('','NO CUMPLIR O ELUDIR LOS PERIODOS DE TIEMPO DESTINADOS A ESTUDIOS','3'),
					 ('','DESCUIDO CON EL ARMAMENTO','4'),
					 ('','DESCUIDADO CON LA LIMPIEZA DEL ARMAMENTO','4'),
					 ('','PROPAGAR RUMORES FALSOS','4'),
					 ('','FALTA DE HIDALGUIA','4'),
					 ('','FALTA DE FORMACION','4'),
					 ('','GUARDAR ARMAMENTO MUNICION EQUIPO Y MATERIAL EN LUGARES NO ESTABLECIDOS','4'),
					 ('','SACAR DEL INSTITUTO PRENDAS SIN AUTORIZACION ','4'),
					 ('','EXIGIR TRIBUTO','4'),
					 ('','RECIBIR O ENTREGAR LA GUARDIA INCORRECTAMENTE','4'),
					 ('','ENCUBRIR FALTAS','4'),
					 ('','OBLIGAR O EJERCER INFLUENCIAS NEGATIVAS SOBRE SUBALTERNOS','4'),
					 ('','ABUSO DE AUTORIDAD','4'),
					 ('','NEGAR A SUS FAMILIARES O SU LUGAR DE PROCEDENCIA','4'),
					 ('','VACIAR ARBITRARIAMENTE LA PISCINA','4'),
					 ('','FALTA DE CELO CON LA SEGURIDAD DEL INSTITUTO','4'),
					 ('','DAR PARTE FALSO CON PREMEDITACION','4'),
					 ('','ENCUBRIR LA AUSENCIA DE UN CAMARADA','4'),
					 ('','EXCEDERSE EN SANCIONES FISICAS','4'),
					 ('','HABLAR MAL DE UN CAMARADA EN SU AUSENCIA','4'),
					 ('','RECIBIR VISITAS EN HORAS INDEBIDAS SIN AUTORIZACION','4'),
					 ('','NO PRESENTARSE A LA AUTORIDAD MILITAR EN LAS VACACIONES O CUANDO SALE DE LA GUARNICION','4'),
					 ('','DEMOSTRAR FALTA DE MORALIDAD Y ETICA MILITAR','4'),
					 ('','PROTAGONIZAR PELEAS CON LOS CAMARADAS','4'),
					 ('','EXTRAVIAR PRENDAS O ARTICULOS DEL INSTITUTO','4'),
					 ('','LEVANTAR EN FALSO NOMBRE DE UN SUPERIOR','4'),
					 ('','PIROPEAR O INSULTAR DENTRO O FUERA DEL INSTITUTO A UNA ALUMNA O ALUMNO','4'),
					 ('','MANTENER FAMILIARIDAD CON SUBALTERNOS O SUPERIORES','4'),
					 ('','EXHIBIR ROPA INTERIOR Y PRENDAS INTIMAS','4'),
					 ('','BESARSE FUERA DEL INSTITUTO ENCONTRANDOSE CON UNIFORME','4'),
					 ('','PERMANECER EN AREAS PROHIBIDAS RESTRINGIDAS CON LA AGRAVANTE DE CONSIDERARSE COMO ABANDONO ARBITRARIO DEL INSTITUTO','4'),
					 ('','NO DAR PARTE DE ALGUN INCIDENTE EN EL PUESTO DE CENTINELA','4'),
					 ('','PRESENTAR TRABAJOS O EJERCICIOS PRACTICOS INCOMPLETOS O REALIZADOS INCORRECTAMENTE','4'),
					 ('','EXCEDERSE EN EL PERIODO DE TIEMPO ASIGNADO PARA LA REALIZACION DE EXAMENES PARCIALES Y FINALES','4'),
					 ('','TRANSITAR POR AREAS RESTRINGIDAS PARA EL PERSONAL DE ALUMNAS Y ALUMNOS','4'),
					 ('','VALERSE DE INFLUENCIAS INTERNAS O EXTERNAS PARA OBTENER PREBENDAS','5'),
					 ('','DESCONOCER EL NUMERO DE SU ARMA DE DOTACION','5'),
					 ('','SACAR DE LA SALA DE ARMAS UN FUSIL QUE NO LE CORRESPONDE','5'),
					 ('','PERMITIR LA PRESENCIA SIN AUTORIZACION DE PERSONAL CIVIL Y MILITAR EN AREAS RESTRINGIDAS','5'),
					 ('','MURMURAR EN RELACION A UN SUPERIOR','5'),
					 ('','FOMENTAR LA DISCORDIA Y LOS CHISMES','5'),
					 ('','TRATAR DE CONSEGUIR FAVORES DE LOS SUPERIORES A TRAVES LAS INDULGENCIAS Y SERVILISMO','5'),
					 ('','HACER RECLAMOS IRRESPETUOSOS','5'),
					 ('','MODIFICAR LAS ORDENES DE UN SUPERIOR MALICIOSAMENTE','5'),
					 ('','OCULTAR EL CONTAGIO DE ENFERMEDADES VENEREAS Y OTRAS','5'),
					 ('','EMPEÑAR PRENDAS EN LAS CANTINAS','5'),
					 ('','SORPRENDER LA BUENA FE DE UN SUPERIOR','5'),
					 ('','FALTAR AL RELEVO DE GUARDIA MAS DE 30 MINUTOS','5'),
					 ('','HACERSE REMPLAZAR EN LA GUARDIA SIN AUTORIZACION','5'),
					 ('','UTILIZAR TELEFONOS DEL COMANDO 2DO COMANDO JEFATURA DE ESTUDIOS SIN AUTORIZACION','5'),
					 ('','INGRESAR A LAS OFICINAS SIN AUTORIZACION','5'),
					 ('','EN CUBRIR UNA FALTA COMETIDA POR UN CAMARADA Y UN SUBALTERNO','5'),
					 ('','VESTIR TRAJE CIVIL SIN AUTORIZACION','5'),
					 ('','NO CUMPLIR UNA ORDEN VERBAL O ESCRITA','5'),
					 ('','FALTAR A LA VERDAD','5'),
					 ('','BURLAR LA VIGILANCIA DE LA GUARDIA','5'),
					 ('','INCORPORARSE DE LA SALIDA DE FRANCOS CON ALIENTO A BEBIDAS ALCOHOLICAS','5'),
					 ('','TRATAR DE ENGAÑAR A UN SUPERIOR','5'),
					 ('','FALTAR A LA PALABRA EMPEÑADA','5'),
					 ('','DESLEALTAD','5'),
					 ('','NO CUMPLIR DISPOSICIONES CONTENIDAS EN LA ORDEN DEL DIA','5'),
					 ('','NO HACERSE ANOTAR UNA SANCION EN EL LIBRO DE DISCIPLINA','5'),
					 ('','FALTA DE RESPETO CON UN SUPERIOR O CATEDRATICO','5'),
					 ('','MANTENER RELACIONES SENTIMENTALES DENTRO O FUERA DEL INSTITUTO CON SUBALTERNOS CAMARADAS O SUPERIORES','5'),
					 ('','INTENTAR ACOSAR A UN SUPERIOR CAMARADA O SUBALTERNO','5'),
					 ('','BESARSE DENTRO DEL INSTITUTO','5'),
					 ('','INDUCIR A UN SUPERIOR O SUBALTERNO A REALIZAR ACTOS CONTRA LA MORAL Y LAS BUENAS COSTUMBRES','5'),
					 ('','EXHIBIRSE DE UNIFORME EN LA CALLE CON INDICIOS DE MANTENER UNA RELACION SENTIMENTAL CON UN SUPERIOR CAMARADA O SUBALTERNO','5'),
					 ('','MANTENER CONVERSACIONES PRIVADAS CON ALUMNAS Y ALUMNOS EN AREAS AISLADAS Y EN PRIVADO','5'),
					 ('','REALIZAR CHISTES PIROPOS CONVERSACIONES DE CONTENIDO SEXUAL QUE DAÑEN LA DIGNIDAD DE UNA PERSONA ','5'),
					 ('','EL SUPERIOR O DEL MISMO CURSO APROVECHANDO SU GRADO POSICION CARGO O FUNCION REALICE MIRADAS MUECAS GESTOS LASCIVOS','5'),
					 ('','MANIFESTAR INSINUACIONES PARA ELUDIR ACTIVIDADES O SANCIONES','5'),
					 ('','VALERSE DE INFLUENCIAS PARA ELUDIR ACTIVIDADES O SANCIONES O CONSEGUIR ALGUN BENEFICIO','5'),
					 ('','NO GUARDAR LA POSTURA MILITAR EN ACONTECIMIENTOS SOCIALES CUANDO SE ENCUENTRAN DE UNIFORME','5'),
					 ('','NO GUARDAR LA COMPOSTURA EN ACTOS SOCIALES','5'),
					 ('','NO PRESENTARSE A EXAMENES SIN JUSTIFICACION ALGUNA','5'),
					 ('','REALIZAR ACTOS SEÑAS O GESTOS SOSPECHOSOS DURANTE LOS EXAMENES','5'),
					 ('','NO PRESENTAR TRABAJOS','5'),
					 ('','FALTAR A CLASES SIN AUTORIZACION','5'),
					 ('','ABANDONAR LAS CLASES SIN AUTORIZACION','5'),
					 ('','NO RETORNAR A CLASES DESPUES DE UN DESCANSO','5')";

		if (mysqli_query($con, $INSERT_FALTA_TEST)) {
			# code...
			echo "<br> - FALTAS TESTS INSERTADOS - <br>";
		}
	}
//-------------------------------tabla merito-----------------------------------
$TB_MERITO = "CREATE TABLE merito (
id_merito INT NOT NULL AUTO_INCREMENT,
nombre_merito VARCHAR(150),
puntos INT,
PRIMARY KEY(id_merito)
)";
if(mysqli_query($con, $TB_MERITO)){
	echo "<br> - TABLA MERITO CREADA - ";

	$INSERT_MERITO_TESTS = "INSERT INTO
		merito(id_merito, nombre_merito, puntos)
			VALUES ('','EQUIPO O INDIVIDUAL 1ER PUESTO','3'),
						 ('','EQUIPO O INDIVIDUAL 2DO PUESTO','2'),
						 ('','EQUIPO O INDIVIDUAL 3ER PUESTO','1'),
						 ('','JUGADOR DESTACADO','1'),
						 ('','GANAR CONCURSOS CULTURALES','2'),
						 ('','FINALISTA CONCURSO CULTURAL','1')";
}
if (mysqli_query($con, $INSERT_MERITO_TESTS)) {

	echo "<br> - MERITO TESTS INSERTADOS - <br>";
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
		total_puntos INT,
		calificacion_disciplinario DOUBLE,
		PRIMARY KEY(id_ci)
	)";

	if(mysqli_query($con, $TB_USER)){
		echo "<br> - TABLA USUARIO CREADA - ";

		$INSERT_USUARIOS_TESTS = "INSERT INTO
			usuario(id_ci, id_grado, id_arma, nombre, paterno, materno, sexo, fecha_nac, lugar_nac, correo, celular, direccion, codigo_secreto, ci_tutor, total_puntos, calificacion_disciplinario)
				VALUES ('12','1','1','Juan','Nunez','Soto','Masculino','04/25/2016','Tiraque','juan@gmail.com','90909090','Av. Norte','0','0','0','0'),
							 ('13','1','1','Pepe','Aguilar','Marneli','Masculino','04/25/2016','Tiraque','pepe@gmail.com','90909090','Av. Norte','0','0','0','0'),
							 ('14','1','1','Lucas','Melo','Lopez','Masculino','04/25/2016','Tiraque','lucas@gmail.com','90909090','Av. Norte','0','0','0','0'),
							 ('15','1','1','Martin','Judas','Toro','Masculino','04/25/2016','Tiraque','martin@gmail.com','90909090','Av. Norte','0','0','0','0'),
							 ('16','1','1','Rodrigo','Murillo','Puerta','Masculino','04/25/2016','Tiraque','rodrigo@gmail.com','90909090','Av. Norte','0','0','0','0'),
							 ('17','15','0','Antonio','Solis','Mesa','Masculino','04/25/2016','Tiraque','antonio@gmail.com','90909090','Av. Norte','4444','123','4','96,08'),
							 ('18','16','0','Miguel','Morales','Zapata','Masculino','04/25/2016','Tiraque','miguel@gmail.com','90909090','Av. Norte','4444','456','1','99,02'),
							 ('19','16','0','Luis','Morales','Zapata','Masculino','04/25/2016','Tiraque','miguel@gmail.com','90909090','Av. Norte','4444','456','3','97,06'),
							 ('20','17','0','Marcos','Morales','Zapata','Masculino','04/25/2016','Tiraque','miguel@gmail.com','90909090','Av. Norte','4444','456','1','99,02'),
							 ('21','17','0','Leoncio','Morales','Zapata','Masculino','04/25/2016','Tiraque','miguel@gmail.com','90909090','Av. Norte','4444','456','1','99,02')";

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
							 ('','6','18','18','18'),
							 ('','6','19','19','19'),
							 ('','6','20','20','20'),
							 ('','6','21','21','21')";

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
	tipo VARCHAR(5),
	fecha VARCHAR(50),
	resolucion MEDIUMBLOB,
	PRIMARY KEY(id_sancion)
	)";

	if(mysqli_query($con, $TB_SANCION)){
		echo "<br> - TABLA SANCION CREADA - ";

		$INSERT_SANCIONES_TEST = "INSERT INTO
			sancion(id_sancion,ci_instructor,ci_alumno,id_falta,id_grupo,puntos,tipo,fecha,resolucion)
				VALUES ('','12','17','8','1','1','D','08/05/2016',NULL),
							 ('','12','17','8','1','1','D','08/06/2016',NULL),
							 ('','13','17','8','1','1','D','08/10/2016',NULL),
							 ('','14','17','23','1','1','D','08/11/2016',NULL),
							 ('','14','21','8','1','1','D','08/06/2016',NULL),
							 ('','14','20','8','1','1','D','08/05/2016',NULL),
							 ('','15','18','23','1','1','D','08/07/2016',NULL),
							 ('','16','19','8','1','1','D','08/09/2016',NULL),
							 ('','14','19','23','1','1','D','08/10/2016',NULL),
							 ('','14','19','23','1','1','D','08/11/2016',NULL)";

			if (mysqli_query($con, $INSERT_SANCIONES_TEST)) {
				echo "<br> - SANCIONES TESTS INSERTADOS - <br>";
			}
	}

	mysqli_close($con);
}


crearBD();
crearTablas();
?>
