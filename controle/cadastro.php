<?php
session_start();
include('conexao.php');

//validação para não poder acessar o login.php sem as informações do usuario ou senha
/*if (empty($_POST['UsuLogin']) || empty($_POST['UsuSenha'])) {
    header('Location: ../telalogin.php');
    exit();
}*/

$login = mysqli_real_escape_string($conexao, $_POST['login']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
$sobnome = mysqli_real_escape_string($conexao, $_POST['sobnome']);
$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$email = mysqli_real_escape_string($conexao, $_POST['email']);

$query = "INSERT INTO usuario (UsuLogin, UsuSenha, UsuNome, UsuSobNome, UsuEmail) VALUES ('$login', MD5('$senha'), '$nome','$sobnome','$email')";

$querylog = "SELECT * FROM usuario WHERE UsuLogin like '$login'";

$result = mysqli_query($conexao, $querylog);

$row = mysqli_num_rows($result);

if ($row > 0) {
    header('location: ../visitante/telacadastro.php#error2');
} else {

    if (mysqli_query($conexao, $query)) {

        $querylog = "SELECT * FROM usuario WHERE UsuLogin like '$login'";

        $result = mysqli_query($conexao, $querylog);

        $row = mysqli_num_rows($result);
        
        $_SESSION = mysqli_fetch_array($result);

        if ($row == 1) {

            if ($_SESSION['UsuNivel'] == 'A') {
                header('location: ../admin/index.php');
            } else {
                header('location: ../usuario/index.php');
            }
        }

    }
}
?>