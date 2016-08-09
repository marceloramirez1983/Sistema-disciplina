<?php
  include_once("conexionBD.php");

  $cnn= new conexion();
  $con =$cnn->conectar();

  $database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");

  $CI_OtorgaMerito = $_POST['id_user'];
  $CI_AlumRecibeMerito = $_POST['id_cimerito'];
  $ID_Merito = $_POST['falta'];
  $PUNTOSMerito = $_POST['puntos'];
  $FECHA = $_POST['fecha'];

  echo $CI_OtorgaMerito;
  echo "---";
  echo $CI_AlumRecibeMerito;
  echo "---";
  echo $ID_Merito;
  echo "---";
  echo $PUNTOSMerito;
  echo "---";
  echo $FECHA;

  // $sql = "SELECT * FROM usuario WHERE id_ci = '$CI_ALUM' AND codigo_secreto = '$CODIGO'";
  //
  // $result = mysqli_query($con, $sql);
  //
  // $count = mysqli_num_rows($result);

  $count==1
  if ($count == 1) {
    # code...
    $INSERT_SANCION = "INSERT INTO
    sancion(id_sancion,ci_instructor,ci_alumno,id_falta,id_grupo,puntos,tipo,fecha)
    VALUES ('','$CI_OtorgaMerito','$CI_AlumRecibeMerito','$ID_Merito','----grupo---','$PUNTOSMerito','M','$FECHA')";

    $SELECT_POINT = "SELECT total_puntos FROM usuario WHERE id_ci = '$CI_AlumRecibeMerito'";
    $RESULT_POINTS = mysqli_query($con, $SELECT_POINT);
    $ROW_POINTS = mysqli_fetch_assoc($RESULT_POINTS);
    $SUM = $ROW_POINTS['total_puntos'];

    $SUM = $SUM - $PUNTOSMerito;

    $VU = 0.98;
    $CALIFICACION_FINAL = 100 - ($SUM * $VU);

    $UPDATE_POINT_TOTAL = "UPDATE usuario SET total_puntos = '$SUM' WHERE id_ci = '$CI_AlumRecibeMerito'";
    $UPDATE_CALIFICACION_FINAL = "UPDATE usuario SET calificacion_disciplinario = '$CALIFICACION_FINAL' WHERE id_ci = '$CI_AlumRecibeMerito'";

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



    header("location: ../sides_otorgar_merito.php?success");
  } else {
    # code...
    header("location: ../sides_otorgar_merito.php?error");
  }

  mysqli_close($con);
?>
