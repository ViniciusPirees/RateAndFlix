<?php

session_start();
if (isset($_SESSION['UsuCod'])) {
  if ($_SESSION['UsuNivel'] == 'A') {
    header('location: ../admin/index.php');
  }
  else {
    header('location: ../usuario/index.php');
  }
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
  <div style="margin-left: 4%; margin-right: 4%; margin-top: 3%;">
    <div class="Sobrenos">
        Sobre nós
    </div>
    <div class="textosobre" >
        O site Rate & Flix foi criado por Matheus Fukuda e Vinicius Pires, como um projeto de finalização do curso de Análise e desenvolvimento de sistemas pela Fatec Itu. <br>
        O objetivo principal foi desenvolver um site voltado ao mundo do entretenimento e cultura pop (filmes), criado na plataforma web, para que o crítico possa colocar o filme que assistiu imediatamente ou que tenha assistido por um bom tempo. Deixar uma crítica positiva ou negativa para que outros usuários possam ler e com isso pensar se é necessário assistir ao filme ou não, e dicas de outros filmes e séries. E ler as principais notícias do mundo do entretenimento e cultura pop. <BR>
        O site foi desenvolvido junto da API do TMDB, nela conseguimos buscar as informações de todos os filmes da database, que é o maior foco do projeto. <br>    
    </div>
    <img src="../../logotmdb.png" style="width: 180px;display: block; margin-left: auto; margin-right: auto; margin-top: 2%;">
  </div>

  <?php 
  include('../footer.php');
  ?>

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