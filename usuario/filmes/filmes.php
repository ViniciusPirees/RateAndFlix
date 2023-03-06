<?php

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
    <link rel="stylesheet" href="estilo/swiper-bundle.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Rancho&family=Roboto:wght@500&display=swap" rel="stylesheet">

  </head>
  <?php 
  include('../header.php');
  ?>
  <!--<body>
    <div class="pai">
      <div class="coluna1">
        <h1>Rate & Flix</h1>
      </div>
      <div class="coluna2">
        <nav>
          <a href="index.php">Home</a>
          <a href="noticias/noticias.php">Notícias</a>
          <a href="criticas/criticas.php">Critícas</a>
          <a href="">Filmes</a>
          <a href="listas/listas.php">Listas</a>
          <a href="">Sobre</a>
        </nav>
      </div>
      <div>
        <input class="inputfilmes" type='search' name="filme" id="filme">
        <button type="button" id="pesquisar">Pesquisar</button>
      </div>

      <div class="coluna3">
        <a href="perfil/perfil.php">
          <?php/*
          echo $_SESSION['UsuNome'];
          */?>
        </a>
        <a href="../controle/logout.php">Sair</a>

      </div>
    </div>
    -->
    <div class="textocarousel">
            Filmes Populares
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
        
        $url = BASEURL . 'movie/popular?api_key=' . APIKEY . '&language=pt-BR';
        $json = file_get_contents($url);
        $obj = json_decode($json);
        for ($i = 0; $i < 15; $i++) {
          $poster = $obj->results[$i]->poster_path;
          $id = $obj->results[$i]->id;

          echo '<div class="carouselImage" style="background-size:cover;">
        <a href="filme.php?id=' . $id . '"><img src="https://image.tmdb.org/t/p/original/' . $poster . '"/></a>
      </div>
      ';
        } ?>
      </div>
    </section>

    <div class="textocarousel">
            Filmes de Terror
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
        
        $url = BASEURL . 'discover/movie?api_key=' . APIKEY . '&language=pt-BR&sort_by=popularity.desc&include_adult=false&include_video=false&page=1&with_genres=27';
        $json = file_get_contents($url);
        $obj = json_decode($json);
        for ($i = 0; $i < 15; $i++) {
          $poster = $obj->results[$i]->poster_path;
          $id = $obj->results[$i]->id;

          echo '<div class="carouselImage" style="background-size:cover;">
        <a href="filme.php?id=' . $id . '"><img src="https://image.tmdb.org/t/p/original/' . $poster . '"/></a>
      </div>
      ';
        } ?>
      </div>
    </section>

    <div class="textocarousel">
            Filmes de Animação
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
        
        $url = BASEURL . 'discover/movie?api_key=' . APIKEY . '&language=pt-BR&sort_by=popularity.desc&include_adult=false&include_video=false&page=1&with_genres=16';
        $json = file_get_contents($url);
        $obj = json_decode($json);
        for ($i = 0; $i < 15; $i++) {
          $poster = $obj->results[$i]->poster_path;
          $id = $obj->results[$i]->id;

          echo '<div class="carouselImage" style="background-size:cover;">
        <a href="filme.php?id=' . $id . '"><img src="https://image.tmdb.org/t/p/original/' . $poster . '"/></a>
      </div>
      ';
        } ?>
      </div>
    </section>

    <div class="textocarousel">
            Filmes de Drama
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
        
        $url = BASEURL . 'discover/movie?api_key=' . APIKEY . '&language=pt-BR&sort_by=popularity.desc&include_adult=false&include_video=false&page=1&with_genres=18';
        $json = file_get_contents($url);
        $obj = json_decode($json);
        for ($i = 0; $i < 15; $i++) {
          $poster = $obj->results[$i]->poster_path;
          $id = $obj->results[$i]->id;

          echo '<div class="carouselImage" style="background-size:cover;">
        <a href="filme.php?id=' . $id . '"><img src="https://image.tmdb.org/t/p/original/' . $poster . '"/></a>
      </div>
      ';
        } ?>
      </div>
    </section>

    
    <div class="textocarousel">
            Filmes de Comédia
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
        
        $url = BASEURL . 'discover/movie?api_key=' . APIKEY . '&language=pt-BR&sort_by=popularity.desc&include_adult=false&include_video=false&page=1&with_genres=35&with_watch_monetization_types=flatrate';
        $json = file_get_contents($url);
        $obj = json_decode($json);
        for ($i = 0; $i < 15; $i++) {
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
    <!-- partial -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src='https://npmcdn.com/flickity@2/dist/flickity.pkgd.js'></script>
    <script src='https://cdn.rawgit.com/JacobLett/bootstrap4-latest/master/bootstrap-4-latest.min.js'></script>
    <script src="/JS/swiper-bundle.min.js"></script>
    <script src="../../scripts/scriptsmain.js"></script>

    <script>

      $(document).ready(function () {
        $('#pesquisar').click(function (e) {
          window.location.href = 'filmes/pesquisafilmes.php?filme=' + $('#filme').val()
        });
      });
    </script>
  </body>

  </html>