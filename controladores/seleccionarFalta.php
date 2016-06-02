<?php
  include_once("conexionBD.php");

  $cnn= new conexion();
  $con =$cnn->conectar();

   $database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");

  if($_POST['id']){
    $id=$_POST['id'];
    $query = "SELECT * FROM falta WHERE id_grupo = '$id'";
    //$sql=mysqli_query("select b.id,b.data from data_parent a,data b where b.id=a.did and parent='$id'");
    $sql=mysqli_query($con, $query);
    while($row=mysqli_fetch_array($sql)){
      $id=$row['id_falta'];
      $data=$row['nombre'];
      echo '<option value="'.$id.'">'.$data.'</option>';
    }
  }
  // if (!empty($_POST['value'])) {
  //     // query for options based on value
  //     $sql = 'SELECT * FROM falta WHERE id_grupo = ' . mysql_real_escape_string($_POST['value']);
  //
  //     // iterate over your results and create HTML output here
  //     ....
  //
  //     // return HTML option output
  //     $html = '<option value="1">1</option>';
  //     $html .= '<option value="b">B</option';
  //     die($html);
  // }
  // die('error');
  // if(isset($_POST['get_option']))
  //  {
  //    include_once("conexionBD.php");
  //
  //    $cnn= new conexion();
  //    $con =$cnn->conectar();
  //
  //    $database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");
  //
  //    $id = $_POST['get_option'];
  //    $query = "SELECT * FROM falta WHERE id_grupo = '1'";
  //    $find = mysqli_query($con, $query);
  //    while($row = mysqli_fetch_array($con,$find))
  //    {
  //      echo "<option>".$row['id_grupo']."</option>";
  //    }
  //
  //    exit;
  //  }
?>
