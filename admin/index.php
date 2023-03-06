<?php

session_start();
if (isset($_SESSION['UsuCod'])) {
  if ($_SESSION['UsuNivel'] != 'A') {
    header('location: ../usuario/index.php');
  }
} else {
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
    <link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/stylemain.css">
    <link rel="stylesheet" href="estilo/swiper-bundle.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://use.fontawesome.com/fad0de82ab.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Rancho&family=Roboto:wght@500&display=swap" rel="stylesheet">

  </head>
  <?php
  include('header.php');
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

  <section class="items">
    <div class="carouselOfImages">
      <?php
        include('../controle/key.php');
        include('../controle/conexao.php');
        define('BASEURL', 'https://api.themoviedb.org/3/');
        $url = BASEURL . 'movie/popular?api_key=' . APIKEY . '&language=pt-BR';
        $json = file_get_contents($url);
        $obj = json_decode($json);
        for ($i = 0; $i < 15; $i++) {
          $poster = $obj->results[$i]->poster_path;
          $id = $obj->results[$i]->id;

          echo '<div class="carouselImage" style="background-size:cover;">
        <a href="filmes/filme.php?id=' . $id . '"><img src="https://image.tmdb.org/t/p/original/' . $poster . '"/></a>
      </div>
      ';
        } ?>
    </div>
  </section>
  <div>
    <div class="ultimasnot">
      <a href="noticias/noticias.php" style="color: white; text-decoration: none;">
        Ultimas Notícias
      </a>
    </div>
    <ul style="list-style-type: none;">
      <?php
        if (empty($conexao)) {
          include('../../controle/conexao.php');
        }
        $resultcat = "SELECT * FROM noticias ORDER BY NotCod DESC LIMIT 5";

        $opcategorias = mysqli_query($conexao, $resultcat);
        while ($row_opcategorias = mysqli_fetch_assoc($opcategorias)) {
          $cod = $row_opcategorias['NotCod'];
          $titulo = $row_opcategorias['NotTitulo']; //ARRUMAR DIVS CSS
          $caminho = $row_opcategorias['NotCaminho'];
          $categoria = $row_opcategorias['NotCatCod'];
          $texto = $row_opcategorias['NotNoticia'];
          $query = "SELECT CatDescricao FROM categoria where CatCod = $categoria";
          $descricaocat = mysqli_fetch_array(mysqli_query($conexao, $query));
          echo '<li class="noticiali">
            <div class="hrdiv">
                <hr class="hrresultado">      
            </div>
            <div class="divnot">
                <div class="ladesqnot"><img class="imgnoticia" src="../imagensnoticias/' . $caminho . '">
                </div>
                <div class=laddirnot>
                    <a href="noticias/noticiapesquisa.php?id=' . $categoria . '" style="text-decoration:none;"> 
                    <div class="categoria">' . $descricaocat['CatDescricao'] . '</div> 
                    </a>
                   <div class="titulonoticia">' . $titulo . '    </div>
                   <div class="previanot"> ' . $texto . '</div>
                   <div>
                   <a href="noticias/noticia.php?id=' . $cod . '">
                   <button class="continuelendo">Continue Lendo</button>
                   </a>
                   </div>
                </div>
            </div>
            
            </li>
          ';
        }
        ?>
    </ul>
  </div>
  <div class="hrdiv">
                <hr class="hrresultado">      
            </div>
  <div class="listasperfilpesq">
    <div class="ultimasnot">
      <a href="listas/listas.php" style="color: white; text-decoration: none;">
        Ultimas Listas
      </a>
    </div>
    <div style="display: flex; flex-wrap: wrap; margin-top: 2%;">
      <?php
                if (empty($conexao)) {
                  include('../../controle/conexao.php');
                }
                $resultlis = "SELECT * FROM lista ORDER BY LisCod DESC LIMIT 3";

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
                <a class="hreflista" href="listas/lista.php?id=' . $cod . '">
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
  <div>
  <div class="hrdiv">
                <hr class="hrresultado">      
            </div>
  <div class="ultimasnot" style="margin-bottom: 3%;">
      <a href="criticas/criticas.php" style="color: white; text-decoration: none;">
        Ultimas Critícas
      </a>
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
                        <a href="criticas/critica.php?id=' . $cod . '">
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

  <?php include('footer.php'); ?>

  <!-- partial -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src='https://npmcdn.com/flickity@2/dist/flickity.pkgd.js'></script>
  <script src='https://cdn.rawgit.com/JacobLett/bootstrap4-latest/master/bootstrap-4-latest.min.js'></script>
  <script src="/JS/swiper-bundle.min.js"></script>
  <script src="../scripts/scriptsmain.js"></script>

  <script>

    $(document).ready(function () {
      $('#pesquisar').click(function (e) {
        window.location.href = 'filmes/pesquisafilmes.php?filme=' + $('#filme').val()
      });
    });
  </script>
  </body>

  </html>