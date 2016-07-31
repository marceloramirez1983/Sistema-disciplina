<?php
  include_once("conexionBD.php");
  $cnn= new conexion();
  $con =$cnn->conectar();
  $database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");

  $id_group = $_POST['id_grupo'];

  $queryGetAllFoultByGroup = "SELECT * FROM falta WHERE id_grupo = '$id_group'";
  $resultGetAllFoult = mysqli_query($con, $queryGetAllFoultByGroup);

  $jsonArray = array();

  if (mysqli_num_rows($resultGetAllFoult)) {
    # code...
    while ($row = mysqli_fetch_assoc($resultGetAllFoult)) {
      # code...
      $jsonArray['falta_info'][] = $row;
    }

  } else {
    echo "hello ";
  }

  mysqli_close($con);
  echo json_encode($jsonArray);
?>
