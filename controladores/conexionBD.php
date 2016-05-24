<?php
class conexion{
	function conectar (){ //funcion para conectar a la base de datos 
		return mysqli_connect("localhost","root","");
	}
}
/*$cnn = new conexion();//cnn es igual auna nueva  instancia de la clase conexio
	if ($cnn->conectar())//si $cnn ejecuta el metodo conectar
	{
	echo"conectado";
	}
	else
	{
		echo"desconectado";
	}*/
?>