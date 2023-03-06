<?php
session_start();
if (isset($_SESSION['UsuCod'])) {
  if ($_SESSION['UsuNivel'] != 'A') {
    header('location: ../../usuario/index.php');
  }
} else {
  header('location: ../../visitante/index.php');
}

if (isset($_GET["id"])) {
  $id = $_GET["id"];
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
    <link href="https://fonts.googleapis.com/css2?family=Rancho&family=Roboto:wght@500&display=swap" rel="stylesheet">

  </head>

  <body>
    <?php
    include('../header.php');
    ?>

    <div>
      <?php

      include('../../controle/key.php');
      include('../../controle/conexao.php');
      define('BASEURL', 'https://api.themoviedb.org/3/');
      $urldetalhes = BASEURL . 'movie/' . $id . '?api_key=' . APIKEY . '&language=pt-br';
      $jsondetalhes = file_get_contents($urldetalhes);
      $objdetalhes = json_decode($jsondetalhes);
      $fotofundo = $objdetalhes->backdrop_path;
      $poster = $objdetalhes->poster_path;
      $titulo = $objdetalhes->title;
      $tituloori = $objdetalhes->original_title;
      $anolancamento = $objdetalhes->release_date;
      $resumo = $objdetalhes->overview;
      $year = strtok($anolancamento, '-');
      $URLCAST = BASEURL . 'movie/' . $id . '/credits?api_key=' . APIKEY;
      $jsoNCAST = file_get_contents($URLCAST);
      $objcast = json_decode($jsoNCAST);


      echo '<style> #fundofilme {
        background: linear-gradient(0deg,  rgb(28,32,32) 15%, rgba(0, 0, 0, 0.183) 100%), url("https://image.tmdb.org/t/p/original' . $fotofundo . '");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
      }</style>';

      echo '
        <div id="fundofilme">
            <div >
                <div class="posterfilme">
                  <img class="poster1" src="https://image.tmdb.org/t/p/original' . $poster . '" />
                </div>
            
                <div class="detalhes">
                    <div class="titulofilme">
                    ' . $titulo . '(' . $year . ')          
                    </div>
                    <div class="titulooriginal">
                    ' . $tituloori . '
                    </div>
                    <div class="resumo">
                    ' . $resumo . '
                    </div>
                </div>

                <div class="atores">
                   <div class="txtelenco"> Elenco </div>  
                <div style="display: flex; flex-wrap: wrap; ">
                    
                  ';
      $tam = count($objcast->cast);
      for ($i = 0; $i < $tam; $i++) {
        $nomeator = $objcast->cast[$i]->name;
        echo '      <div class="nomeator">' . $nomeator . '</div>';
      }
      echo '
                </div>    
              </div>
            '; ?>
      <div style="margin-left: -7%;">

      <div class="textocarousel">
        Filmes Similares
      </div>
      <section class="items">

        <div class="carouselOfImages">

          <?php
        if (empty($conexao)) {
          include('../../controle/conexao.php');
        }
        if (!defined('APIKEY')) {
          include('../../controle/key.php');
        }

        if (!defined('BASEURL')) {
          define('BASEURL', 'https://api.themoviedb.org/3/');
        }

        $url = BASEURL . 'movie/'.$id.'/similar?api_key=' . APIKEY . '&language=pt-BR&sort_by=popularity.desc&include_adult=false&include_video=false&page=1&with_genres=27';
        $json = file_get_contents($url);
        
        $obj = json_decode($json);
        $tam = $obj->total_results;
        if($tam > 15){
            $tam = 15;
        }
        

        for ($i = 0; $i < $tam; $i++) {
          $poster = $obj->results[$i]->poster_path;
          $id = $obj->results[$i]->id;

          echo '<div class="carouselImage" style="background-size:cover;">
        <a href="filme.php?id=' . $id . '"><img src="https://image.tmdb.org/t/p/original/' . $poster . '"/></a>
      </div>
      ';
        } ?>
        </div>
      </section>
      <?php include('../footer.php'); ?>
      </div>

      
    </div>

  
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src='https://npmcdn.com/flickity@2/dist/flickity.pkgd.js'></script>
    <script src='https://cdn.rawgit.com/JacobLett/bootstrap4-latest/master/bootstrap-4-latest.min.js'></script>
    <script src="/JS/swiper-bundle.min.js"></script>
    <script src="../../scripts/scriptsmain.js"></script>
  </body>

  </html>