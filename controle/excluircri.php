<?php
include('conexao.php');
$codcri = mysqli_real_escape_string($conexao, $_POST['cod']);
$query = "DELETE FROM criticas where CriCod = $codcri";
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

?>