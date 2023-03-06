<?php
include('../../controle/conexao.php');
session_start();
if (isset($_SESSION['UsuCod'])) {
    if ($_SESSION['UsuNivel'] != 'A') {
        header('location: ../../usuario/index.php');
    }
} else {
    header('location: ../../visitante/index.php');
}

if (isset($_GET["filme"])) {
    $filme = $_GET["filme"];
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
            <?php
            include('../../controle/key.php');
            define('BASEURL', 'https://api.themoviedb.org/3/');
            $url = BASEURL . 'search/movie?api_key=' . APIKEY . '&language=pt-br&query=' . $filme;
            $json = file_get_contents($url);
            $obj = json_decode($json);
            $array = count($obj->results);

            echo '<div class="hrdiv">
      <div class="txthr">
      Filmes encontrados: ' . $array . '
      </div>
      <hr class="hrresultado">      
      </div>';
            if ($array > 0) {
                for ($i = 0; $i < $array; $i++) {
                    $nome = $obj->results[$i]->title;
                    $id = $obj->results[$i]->id;
                    $anolancamento = $obj->results[$i]->release_date;
                    $year = strtok($anolancamento, '-');
                    $poster = $obj->results[$i]->poster_path;
                    $tituloori = $obj->results[$i]->original_title;
                    $resumo = $obj->results[$i]->overview;
                    $nota = $obj->results[$i]->vote_average;
                    echo '
              <div>
                <div class="posterfilmepesquisa">
                    <img class="posterpesquisa" src="https://image.tmdb.org/t/p/original' . $poster . '" />
                </div>
            
                <div class="detalhespesquisa">
                    <div class="titulofilmepesquisa">
                    ' . $nome . ' (' . $year . ')          
                    </div>
                    <div class="titulooriginalpesquisa">
                    ' . $tituloori . '
                    </div>
                    <div class="resumopesquisa">
                    ' . $resumo . '
                    </div>
                    <div class="painotaver">
                        <div class="nota">
                        ' . $nota . '
                        </div>

                        <div>
                            <a href="filme.php?id=' . $id . '">
                            <button class="vermais">Ver Mais</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
              
              <div class="hrdiv">
      

      <hr class="hrresultado">      
      </div>';
                }
            } else {
                echo '<div class="Sobrenos">Sem Resultados</div>';
            }

            ?>
            <?php include('../footer.php'); ?>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
            <script src='https://npmcdn.com/flickity@2/dist/flickity.pkgd.js'></script>
            <script src='https://cdn.rawgit.com/JacobLett/bootstrap4-latest/master/bootstrap-4-latest.min.js'></script>
            <script src="/JS/swiper-bundle.min.js"></script>
            <script src="../../scripts/scriptsmain.js"></script>
    </body>

    </html>