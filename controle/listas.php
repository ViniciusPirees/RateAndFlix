<?php
include('conexao.php');
include('key.php');
define('BASEURL', 'https://api.themoviedb.org/3/');
session_start();
//validação para não poder acessar o login.php sem as informações do usuario ou senha
/*if (empty($_POST['UsuLogin']) || empty($_POST['UsuSenha'])) {
    header('Location: ../telalogin.php');
    exit();
}*/


$titulo = mysqli_real_escape_string($conexao, $_POST['Titulo']);
$descricao = mysqli_real_escape_string($conexao, $_POST['Descricao']);
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
        $query3 = "SELECT CatCod FROM categoria where CatDescricao LIKE '$categorianome'";
        $result3 = mysqli_query($conexao, $query3);
        $rowcat3 = mysqli_fetch_array($result3);
        $categoriacod = $rowcat3['CatCod'];
    }
}
$usuariocod = $_SESSION['UsuCod'];

$query = "INSERT INTO lista (LisTitulo, LisDescricao, LisUsuCod, LisCatCod) VALUES ('$titulo', '$descricao', '$usuariocod', '$categoriacod')";

if (mysqli_query($conexao, $query)) {
    $query2 = "SELECT MAX(LisCod) FROM Lista WHERE LisUsuCod = $usuariocod";
    $result = mysqli_query($conexao, $query2);
    while ($idlista = mysqli_fetch_column($result, 0)) {
        $tam = count($_SESSION['filmearray']);
        for ($i = 0; $i < $tam; $i++) {
            $filme = $_SESSION['filmearray'][$i];

            $urldetalhes = BASEURL . 'movie/' . $filme . '?api_key=' . APIKEY . '&language=pt-br';

            $jsondetalhes = file_get_contents($urldetalhes);
            $objdetalhes = json_decode($jsondetalhes);
            $poster = $objdetalhes->poster_path;

            $query3 = "INSERT INTO listaitens (LisCod, LisIdFilme, LisCaminhoPoster) VALUES ('$idlista', '$filme', '$poster')";

            if (mysqli_query($conexao, $query3)) {
                if (isset($_SESSION['UsuCod'])) {
                    if ($_SESSION['UsuNivel'] == 'A') {
                        header('location: ../admin/perfil/perfil.php');
                    }
                    else {
                        header('location: ../usuario/perfil/perfil.php');
                    }
                  }
            } else {
                header('Location: ../.admin/perfil.php#deunao');
            }
        }

    }
    $_SESSION['filmearray'] = array();

} else {
    header('Location: ../admin/perfil.php#deunaotbm');
}



?>