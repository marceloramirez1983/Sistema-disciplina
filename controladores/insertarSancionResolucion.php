<?php
include_once("conexionBD.php");
$cnn= new conexion();//crea instancia de la clase conexion
$con =$cnn->conectar();//la clase conexion almacenada de cnn ejecuta la funcion conectar.

$database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");//mysqli_select_db(variableconexion,nombreBD)

$ci_sancionador=$_POST['ci_sancionador'];
$ci_arrestado=$_POST['ci_sancionado'];
$grupo=$_POST['grupo'];
$falta=$_POST['falta'];
$puntos=$_POST['puntos'];
$fecha=$_POST['fecha'];

$archivo = $_FILES["archivo"]["tmp_name"];
$tamanio = $_FILES["archivo"]["size"];
$tipo    = $_FILES["archivo"]["type"];
$nombre  = $_FILES["archivo"]["name"];
$titulo  = $_POST["titulo"];



if ( $archivo != "none" )
{
   $fp = fopen($archivo, "rb");
   $contenido = fread($fp, $tamanio);
   $contenido = addslashes($contenido);
   fclose($fp);

   $qry = "INSERT INTO resoluciones VALUES
           (0,'$ci_arrestado','$nombre','$titulo','$contenido','$tipo')";

   mysqli_query($con,$qry);
   $valor=mysqli_affected_rows($con);

   if($valor>0)
   {
    //  -------------------INSERTAR SANCION----------------------------------
    //$query="SELECT * FROM resoluciones WHERE rol='$ci_sancionado'";
    //$result=mysqli_query($con,$query);
    $rs = mysqli_query($con,"SELECT @@identity AS id");
    if ($row = mysqli_fetch_row($rs)) {
      $id_resolucion= trim($row[0]);
    }

      $INSERT_SANCION = "INSERT INTO
      sancion(id_sancion,ci_instructor,ci_alumno,id_falta,id_grupo,puntos,tipo,fecha,id_resolucion)
      VALUES ('','$ci_sancionador','$ci_arrestado','$falta','$grupo','$puntos','D','$fecha','$id_resolucion')";

      $SELECT_POINT = "SELECT total_puntos FROM usuario WHERE id_ci = '$ci_arrestado'";
      $RESULT_POINTS = mysqli_query($con, $SELECT_POINT);
      $ROW_POINTS = mysqli_fetch_assoc($RESULT_POINTS);
      $SUM = $ROW_POINTS['total_puntos'];
      $SUM = $SUM + $puntos;
      $VU = 0.98;
      $CALIFICACION_FINAL = 100 - ($SUM * $VU);

      $UPDATE_POINT_TOTAL = "UPDATE usuario SET total_puntos = '$SUM' WHERE id_ci = '$ci_arrestado'";
      $UPDATE_CALIFICACION_FINAL = "UPDATE usuario SET calificacion_disciplinario = '$CALIFICACION_FINAL' WHERE id_ci = '$ci_arrestado'";

      if(!mysqli_query($con,$UPDATE_POINT_TOTAL)) {
        echo '<script language="javascript">
        alert("Error al Insertar puntos total");
        window.location.assign("../sides_sanciones_rs.php");
        </script>';
        exit;
      }

      if(!mysqli_query($con, $UPDATE_CALIFICACION_FINAL)) {

        echo '<script language="javascript">
        alert("Error al Insertar calificacion final disciplinario");
        window.location.assign("../sides_sanciones_rs.php");
        </script>';
        exit;

      }

      if (!mysqli_query($con, $INSERT_SANCION)) {
        # code...
        echo '<script language="javascript">
        alert("Error al Insertar sancion");
        window.location.assign("../sides_sanciones_rs.php");
        </script>';
        exit;
      }
    //  -------------------FIN INSERTAR SANCION------------------------------
     echo '<script language="javascript">
     alert("Sancion y resolucion registrada correctamente");
     window.location.assign("../sides_sanciones_rs.php");
     </script>';
       mysqli_close($con);
     exit;
   }
   else
   {
     echo '<script language="javascript">
     alert("No se ha podido registrar la Sancion y resolucion");
     window.location.assign("../sides_sanciones_rs.php");
     </script>';
     exit;
   }
 }
else
 {
   echo '<script language="javascript">
   alert("No se ha podido subir el archivo al servidor");
   window.location.assign("../sides_sanciones_rs.php");
   </script>';
   exit;
 }

// ?>
