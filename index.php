<?php
session_start();
if (isset($_SESSION['UsuCod'])) {
    if ($_SESSION['UsuNivel'] == 'A') {
      header('location: admin/index.php');
    }
    else {
      header('location: usuario/index.php');
    }
  }
  else{
    header('location: visitante/index.php');
  }

?>