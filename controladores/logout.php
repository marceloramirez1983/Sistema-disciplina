<?php
  session_start();
  //unset ($_SESSION['loggedin'] = false);
  session_destroy();

  header('Location: ../login.php');

?>
