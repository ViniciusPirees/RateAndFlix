<?php
session_start();
include('conexao.php');

//validação para não poder acessar o login.php sem as informações do usuario ou senha
/*if (empty($_POST['UsuLogin']) || empty($_POST['UsuSenha'])) {
    header('Location: ../telalogin.php');
    exit();
}*/

$nome = mysqli_real_escape_string($conexao, $_POST['Nome']);
$sobnome = mysqli_real_escape_string($conexao, $_POST['SobNome']);

$query = "UPDATE usuario SET UsuNome = '$nome', UsuSobNome = '$sobnome' where UsuCod = ".$_SESSION['UsuCod'];

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