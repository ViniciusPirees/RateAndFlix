<?php
include('../../controle/conexao.php');
session_start();
if ($_SESSION['UsuNivel'] == 'A') {
    header('location: ../admin/index.php');
  } else if (!isset($_SESSION['UsuCod'])) {
    header('location: ../visitante/index.php');
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

        <div>
            <div>
                <div class="hrdiv">
                    <div class="txthr">
                        Critícas
                    </div>
                    <hr class="hrresultado">
                </div>
                <ul style="list-style-type: none;">
                    <?php
                    if (empty($conexao)) {
                        include('../../controle/conexao.php');
                    }
                    $resultcat = "SELECT * FROM criticas ORDER BY CriCod DESC LIMIT 20";

                    $opcategorias = mysqli_query($conexao, $resultcat);
                    while ($row_opcategorias = mysqli_fetch_assoc($opcategorias)) {
                        $cod = $row_opcategorias['CriCod'];
                        $titulo = $row_opcategorias['CriTitulo']; //ARRUMAR DIVS CSS
                        $caminho = $row_opcategorias['CriPosterCaminho'];
                        $idfilme = $row_opcategorias['CriIdFilme'];
                        $texto = $row_opcategorias['CriTexto'];
                        $nota = $row_opcategorias['CriNota'];
                        $usucod = $row_opcategorias['CriUsuCod'];
                        $query = "SELECT UsuNome, UsuSobNome FROM Usuario where UsuCod = $usucod";
                        $result = mysqli_query($conexao, $query);
                        $rowcat = mysqli_fetch_array($result);
                        $usunome = $rowcat['UsuNome'];
                        $ususobnome = $rowcat['UsuSobNome'];
                        echo '<li class="noticiali"><div>
            <div class="posterfilmepesquisa">
                <img class="posterpesquisa" src="https://image.tmdb.org/t/p/original' . $caminho . '" />
            </div>
        
            <div class="detalhespesquisa">
                <div class="feitopor">
                    Feito por ' . $usunome . ' ' . $ususobnome . '
                </div>
                <div class="titulofilmepesquisa">
                ' . $titulo . '       
                </div>
                <div class="resumopesquisa">
                ' . $texto . '
                </div>
                <div class="painotaver">
                    <div class="nota">
                    ' . $nota . '
                    </div>

                    <div>
                        <a href="critica.php?id=' . $cod . '">
                        <button class="vermais">Ler Mais</button>
                        </a>
                    </div>
                </div>

            </div>
        </div>
        <div class="hrdiv">
      

      <hr class="hrresultado">      
      </div>
            
          ';
                    }
                    ?>
                </ul>
            </div>
            <?php include('../footer.php'); ?>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
            <script src='https://npmcdn.com/flickity@2/dist/flickity.pkgd.js'></script>
            <script src='https://cdn.rawgit.com/JacobLett/bootstrap4-latest/master/bootstrap-4-latest.min.js'></script>
            <script src="/JS/swiper-bundle.min.js"></script>
            <script src="../../scripts/scriptsmain.js"></script>
    </body>

    </html>