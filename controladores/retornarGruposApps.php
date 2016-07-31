<?php
  include_once("conexionBD.php");
  $cnn= new conexion();
  $con =$cnn->conectar();
  $database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");

  $queryGetAllGroup = "SELECT * FROM grupo";
  $resultGetAllGroup = mysqli_query($con, $queryGetAllGroup);

  $jsonArray = array();

  if (mysqli_num_rows($resultGetAllGroup)) {
    # code...
    while ($row = mysqli_fetch_assoc($resultGetAllGroup)) {
      # code...
      $jsonArray['group_info'][] = $row;
    }

  } else {
    # code...
  }



  mysqli_close($con);
  echo json_encode($jsonArray);
?>
