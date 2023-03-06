<?php

include('key.php');
session_start();
$idfilme = $_POST['id'];
$igual = 0;
$tam = count($_SESSION['filmearray']);
echo '<script>console.log("teste"+$idfilme);</script>';
for ($i = 0; $i < $tam; $i++) {
    if ($idfilme == $_SESSION['filmearray'][$i]) {
        unset($_SESSION['filmearray'][$i]);
        $_SESSION['filmearray'] = array_values($_SESSION['filmearray']);
        
    }
}
?>