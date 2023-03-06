<?php
include('conexao.php');
$codlista = mysqli_real_escape_string($conexao, $_POST['cod']);
$queryit = "DELETE FROM listaitens where LisCod = $codlista";

if (mysqli_query($conexao, $queryit)) {
    $query = "DELETE FROM lista where LisCod = $codlista";
    if (mysqli_query($conexao, $query)) {
        if (isset($_SESSION['UsuCod'])) {
            if ($_SESSION['UsuNivel'] == 'A') {
                header('location: ../admin/perfil/perfil.php');
            }
            else {
                header('location: ../usuario/perfil/perfil.php');
            }
          }
    }
}

?>