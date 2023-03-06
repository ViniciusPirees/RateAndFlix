<?php
include('conexao.php');
session_start();
//validação para não poder acessar o login.php sem as informações do usuario ou senha
/*if (empty($_POST['UsuLogin']) || empty($_POST['UsuSenha'])) {
    header('Location: ../telalogin.php');
    exit();
}*/

$codlista = mysqli_real_escape_string($conexao, $_POST['cricod']);
$imgcaminho = mysqli_real_escape_string($conexao, $_POST['postercaminho']);
$titulo = mysqli_real_escape_string($conexao, $_POST['Titulo']);
$titulo = str_replace("  ", "<br>", $titulo);
$texto = mysqli_real_escape_string($conexao, $_POST['Texto']);
$usuariocod = $_SESSION['UsuCod'];
$idfilme = mysqli_real_escape_string($conexao, $_POST['idfilme']);
$nota = mysqli_real_escape_string($conexao, $_POST['Nota']);

$query = "UPDATE criticas SET CriTitulo = '$titulo', CriTexto = '$texto', CriUsuCod = '$usuariocod', CriIdFilme = '$idfilme', CriNota = '$nota', CriPosterCaminho = '$imgcaminho' where CriCod = $codlista";

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