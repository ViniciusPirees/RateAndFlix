<?php
include('conexao.php');
session_start();
//validação para não poder acessar o login.php sem as informações do usuario ou senha
/*if (empty($_POST['UsuLogin']) || empty($_POST['UsuSenha'])) {
    header('Location: ../telalogin.php');
    exit();
}*/
$imgcaminho = mysqli_real_escape_string($conexao, $_POST['postercaminho']);
$titulo = mysqli_real_escape_string($conexao, $_POST['Titulo']);
$titulo = str_replace("", "<br>", $titulo);
$texto = mysqli_real_escape_string($conexao, $_POST['Texto']);
$usuariocod = $_SESSION['UsuCod'];
$idfilme = mysqli_real_escape_string($conexao, $_POST['idfilme']);
$nota = mysqli_real_escape_string($conexao, $_POST['Nota']);


$query = "INSERT INTO criticas (CriTitulo, CriTexto, CriUsuCod, CriIdFilme, CriNota, CriPosterCaminho) VALUES ('$titulo', '$texto', '$usuariocod', '$idfilme', '$nota', '$imgcaminho')";

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