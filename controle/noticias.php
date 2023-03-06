<?php
include('conexao.php');
session_start();
//validação para não poder acessar o login.php sem as informações do usuario ou senha
/*if (empty($_POST['UsuLogin']) || empty($_POST['UsuSenha'])) {
    header('Location: ../telalogin.php');
    exit();
}*/
$imgcaminho = mysqli_real_escape_string($conexao, $_POST['imgnome']);
$titulo = mysqli_real_escape_string($conexao, $_POST['Titulo']);
$noticia = mysqli_real_escape_string($conexao, $_POST['Noticia']);
$categorianome = mysqli_real_escape_string($conexao, $_POST['categoria']);
$querycat = "SELECT * FROM categoria where CatDescricao LIKE '$categorianome'";
$result = mysqli_query($conexao, $querycat);
$row = mysqli_num_rows($result);
$rowcat = mysqli_fetch_array($result);
if ($row == 1) {
    $categoriacod = $rowcat['CatCod'];
} else {
    $query2 = "INSERT INTO categoria (CatDescricao) VALUES ('$categorianome')";

    if (mysqli_query($conexao, $query2)) {
        $query3 = "SELECT * FROM categoria where CatDescricao LIKE '$categorianome'";
        $result3 = mysqli_query($conexao, $query3);
        $row3 = mysqli_num_rows($result3);
        $rowcat3 = mysqli_fetch_array($result3);
        if ($row3 == 1) {
            $categoriacod = $rowcat3['CatCod'];
        }
    }
}
$usuariocod = $_SESSION['UsuCod'];

$query = "INSERT INTO noticias (NotTitulo, NotNoticia, NotUsuCod, NotCatCod, NotCaminho) VALUES ('$titulo', '$noticia', '$usuariocod', '$categoriacod', '$imgcaminho')";

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