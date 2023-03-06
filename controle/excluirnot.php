<?php
include('conexao.php');
$codnoticia = mysqli_real_escape_string($conexao, $_POST['cod']);
$imgnoticia = mysqli_real_escape_string($conexao, $_POST['img']);
$query = "DELETE FROM Noticias where notcod = $codnoticia";
$query2 = "DELETE FROM Imagens where ImgNome = '$imgnoticia'";
if (mysqli_query($conexao, $query)) {
    if (mysqli_query($conexao, $query2)) {
        unlink('../imagensnoticias/'.$imgnoticia);
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