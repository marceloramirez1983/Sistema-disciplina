<?php
  include_once("conexionBD.php");

  $cnn= new conexion();
  $con =$cnn->conectar();

  $database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");

  if($_POST['id']){
    $id = $_POST['id'];
    $query = "SELECT * FROM grupo WHERE id_grupo = '$id'";
    $sql = mysqli_query($con, $query);
    $result = mysqli_fetch_assoc($sql);
    // while($row=mysqli_fetch_array($sql)){
    //   $id=$row['id_falta'];
    //   $data=$row['nombre'];
    //   echo '<option value="'.$id.'">'.$data.'</option>';
    //   echo ''<input readonly type="text" id="last-name">
    //
    // }
    $puntos = $result['puntos'];
    echo '<input name="puntos" readonly type="text" required="required" class="form-control col-md-7 col-xs-12" value="'.$puntos.'">';
  }
?>
