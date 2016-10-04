<?php
  include_once("conexionBD.php");

  $cnn= new conexion();
  $con =$cnn->conectar();

  $database = mysqli_select_db($con,"sides") or die("Error al conectar la base de datos");

  $CI = $_POST['ci_alumno'];
  $ID_GRADO = $_POST['id_grado'];
  $NOMBRE = $_POST['nombre'];
  $PATERNO = $_POST['paterno'];
  $MATERNO = $_POST['materno'];
  $GENERO = $_POST['sexo'];
  $FECHA_NAC = $_POST['fecha_nac'];
  $NAC = $_POST['lugar'];
  $EMAIL = $_POST['email'];
  $CELULAR = $_POST['cel'];
  $DOMICILIO = $_POST['domicilio'];

  $CI_TUTOR = $_POST['ci_tutor'];
  $NOMBRE_TUTOR = $_POST['nombre_tutor'];
  $TELEFONO_TUTOR = $_POST['telefono_tutor'];
  $DIRECCION_TUTOR = $_POST['direccion_tutor'];

  function random_password( $length = 6 ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $password = substr( str_shuffle( $chars ), 0, $length );
    return $password;
  }

  function random_codigo( $length = 4 ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $password = substr( str_shuffle( $chars ), 0, $length );
    return $password;
  }

  $CONST_ID_ROL = 6;
  $CONST_PASSWORD = random_password();
  $CONST_CODIGO = random_codigo();


  $query="SELECT * FROM usuario WHERE id_ci='$CI' ";
  $result=mysqli_query($con,$query);

  if (mysqli_num_rows($result)<1) {
    //--------------------------no existe registrado--------------------------
    $querytutor="SELECT * FROM tutor WHERE ci_tutor='$CI_TUTOR' ";
    $resulttutor=mysqli_query($con,$querytutor);
        if (mysqli_num_rows($resulttutor)<1) {
          # no existe tutor se registra todos sus datos
          $INSERT_TUTOR = "INSERT INTO
          tutor(id_tutor,ci_tutor,nombre_tutor,telefono_tutor,direccion_tutor)
          VALUES ('','$CI_TUTOR','$NOMBRE_TUTOR','$TELEFONO_TUTOR','$DIRECCION_TUTOR')";
          if (!mysqli_query($con, $INSERT_TUTOR)) {
            die(" <br> Error al insertar TUTOR".mysql_error);
          }
        }

    $INSERT_USER = "INSERT INTO
      usuario(id_ci, id_grado,nombre, paterno, materno, sexo, fecha_nac, lugar_nac, correo, celular, direccion, codigo_secreto, ci_tutor)
      VALUES ('$CI','$ID_GRADO','$NOMBRE','$PATERNO','$MATERNO','$GENERO','$FECHA_NAC','$NAC','$EMAIL','$CELULAR','$DOMICILIO','$CONST_CODIGO','$CI_TUTOR')";

    $INSERT_ASIGN_USER = "INSERT INTO
      asignar_usuario(id_usuario, id_rol, id_ci, usuario_nombre, usuario_password)
      VALUES ('','$CONST_ID_ROL','$CI','$CI','$CONST_PASSWORD')";

      if (!mysqli_query($con, $INSERT_USER)) {
        die(" <br> Error al insertar USUARIO".mysql_error);
      }

      if (!mysqli_query($con, $INSERT_ASIGN_USER)) {
        die(" <br> Error al insertar ASIGNAR USUARIO".mysql_error);
      }
      // -----------------------

      //Enviar Email de Credencial
                $MENSAJE = "Bienvenidos al Sistema Disciplinario de la EMSE \n su cuenta de usuario o Username = ".$CI."\n Password: ". $CONST_PASSWORD."\n Codigo secreto: ". $CONST_CODIGO;
                $to = $EMAIL;
                $subject = 'Credencial de Acceso al Sistema ...';
                $header = 'From: sidesemse@gmail.com'.
                    'MIME-Version: 1.0'.'\r\n'.
                    'Content-type: text/html; charset=utf-8';
                if (mail($to,$subject,$MENSAJE,$header)) {
                    //echo "email enviado!";
                } else {
                    echo "error al enviar email!";
                }
    echo '<script language="javascript">
    alert("Alumno registrado correctamente");
    window.location="http://localhost/sides/sides_alumnos.php";
    </script>';
    exit;
  } else {
    # existe
    echo '<script language="javascript">
    alert("ERROR alumno ya se encuentra registrado");
    window.location="http://localhost/sides/sides_alumnos.php";
    </script>';
    exit;
  }
    
    mysqli_close($con);

?>
