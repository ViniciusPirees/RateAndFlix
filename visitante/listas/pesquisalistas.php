<?php
include('../../controle/conexao.php');
session_start();
if (isset($_SESSION['UsuCod'])) {
    if ($_SESSION['UsuNivel'] == 'A') {
      header('location: ../admin/index.php');
    }
    else {
      header('location: ../usuario/index.php');
    }
  }


if (isset($_GET["id"])) {
    $codcat = $_GET["id"];
}
?>

<!DOCTYPE html>
<lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rate and Flix - O seu principal site de notícias sobre entretenimento e muito mais</title>
        <link rel="stylesheet" href="../../css/stylemain.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rancho&family=Roboto:wght@500&display=swap"
            rel="stylesheet">

    </head>

    <body>
        <?php
        include('../header.php');
        ?>
        <div class="listasperfilpesq">
            <div class="titulolistaspesq">
                Listas criadas pelos usuários
            </div>
            <div style="display: flex; flex-wrap: wrap;">
                <?php
                if (empty($conexao)) {
                    include('../../controle/conexao.php');
                }
                $resultlis = "SELECT * FROM lista where liscatcod = $codcat";

                $lista = mysqli_query($conexao, $resultlis);
                while ($row_lista = mysqli_fetch_assoc($lista)) {
                    $cod = $row_lista['LisCod'];
                    $titulo = $row_lista['LisTitulo']; //ARRUMAR DIVS CSS
                    $descricaolis = $row_lista['LisDescricao'];
                    $usucod = $row_lista['LisUsuCod'];
                    $query = "SELECT UsuNome, UsuSobNome FROM Usuario where UsuCod = $usucod";
                        $result = mysqli_query($conexao, $query);
                        $rowcat = mysqli_fetch_array($result);
                        $usunome = $rowcat['UsuNome'];
                        $ususobnome = $rowcat['UsuSobNome'];
                    echo '
                    <div style="margin-left: 12%">
                <a class="hreflista" href="lista.php?id=' . $cod . '">
                <div class="feitoporlist">
                Feito por ' . $usunome . ' ' . $ususobnome . '
            </div>
                    <div>';
                    $querylisit = "SELECT * FROM listaitens WHERE LisCod = $cod LIMIT 5";
                    $listaitens = mysqli_query($conexao, $querylisit);
                    while ($row_listaitens = mysqli_fetch_assoc($listaitens)) {
                        echo '
                        
                        <img class="posterlistapeq" src="https://image.tmdb.org/t/p/original' . $row_listaitens['LisCaminhoPoster'] . '" />
                        
                        ';

                    }
                    echo '</div>
                    <div class="titulolista">' . $titulo . '    </div>
                    <div class="descricaolista"> ' . $descricaolis . '</div>
                </a>
           </div>
           ';
                }
                ?>
            </div>
        </div>
        
        <?php include('../footer.php'); ?>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
            <script src='https://npmcdn.com/flickity@2/dist/flickity.pkgd.js'></script>
            <script src='https://cdn.rawgit.com/JacobLett/bootstrap4-latest/master/bootstrap-4-latest.min.js'></script>
            <script src="/JS/swiper-bundle.min.js"></script>
            <script src="../../scripts/scriptsmain.js"></script>

    </body>

    </html>