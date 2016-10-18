<?php
  include_once("conexionBD.php");

  $cnn= new conexion();
  $con =$cnn->conectar();

  $database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");

  $CI_USER = $_POST['id_user'];
  $CI_ALUM = $_POST['id_ci'];
  $ID_GROUP = $_POST['grupo'];
  $ID_FALTA = $_POST['falta'];
  $PUNTOS = $_POST['puntos'];
  $FECHA1 = $_POST['fecha'];
  $CODIGO = $_POST['cod_ci'];

  $FECHA1 = str_replace('/', '-', $FECHA1);//cambiando el formato de la fecha
  $FECHA= date("Y-m-d",strtotime($FECHA1));//cambiando el formato de la fecha

  $sql = "SELECT * FROM usuario WHERE id_ci = '$CI_ALUM' AND codigo_secreto = '$CODIGO'";

  $result = mysqli_query($con, $sql);

  $count = mysqli_num_rows($result);


  if ($count == 1) {
    # code...
    $INSERT_SANCION = "INSERT INTO
    sancion(id_sancion,ci_instructor,ci_alumno,id_falta,id_grupo,puntos,tipo,fecha)
    VALUES ('','$CI_USER','$CI_ALUM','$ID_FALTA','$ID_GROUP','$PUNTOS','D','$FECHA')";

    $SELECT_POINT = "SELECT total_puntos FROM usuario WHERE id_ci = '$CI_ALUM'";
    $RESULT_POINTS = mysqli_query($con, $SELECT_POINT);
    $ROW_POINTS = mysqli_fetch_assoc($RESULT_POINTS);
    $SUM = $ROW_POINTS['total_puntos'];

    $SUM = $SUM + $PUNTOS;

    $VU = 0.98;
    $CALIFICACION_FINAL = 100 - ($SUM * $VU);

    $UPDATE_POINT_TOTAL = "UPDATE usuario SET total_puntos = '$SUM' WHERE id_ci = '$CI_ALUM'";
    $UPDATE_CALIFICACION_FINAL = "UPDATE usuario SET calificacion_disciplinario = '$CALIFICACION_FINAL' WHERE id_ci = '$CI_ALUM'";

    if(!mysqli_query($con, $UPDATE_POINT_TOTAL)) {
      # code...
      echo "Error al Insertar puntos total";
    }

    if(!mysqli_query($con, $UPDATE_CALIFICACION_FINAL)) {
      # code...
      echo "Error al Insertar calificacion final disciplinario";
    }

    if (!mysqli_query($con, $INSERT_SANCION)) {
      # code...
      echo "Error al Insertar sancion";
    }



    header("location: ../sides_sanciones.php?success");
  } else {
    # code...
    header("location: ../sides_sanciones.php?error");
  }

  mysqli_close($con);
?>
