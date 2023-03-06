<?php
session_start();
if ($_SESSION['UsuNivel'] == 'A') {
    header('location: ../admin/index.php');
  } else if (!isset($_SESSION['UsuCod'])) {
    header('location: ../visitante/index.php');
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
        <link href="https://fonts.googleapis.com/css2?family=Rancho&family=Roboto:wght@500&display=swap"
            rel="stylesheet">

    </head>

    <body>
    <?php 
        include('../header.php');
        ?>

        <div>
            <?php
            if (empty($conexao)) {
                include('../../controle/conexao.php');
            }
            $resultcat = "SELECT * FROM criticas where CriCod = $id";

            $opcategorias = mysqli_query($conexao, $resultcat);
            while ($row_opcategorias = mysqli_fetch_assoc($opcategorias)) {
                $cod = $row_opcategorias['CriCod'];
                $titulocri = $row_opcategorias['CriTitulo']; //ARRUMAR DIVS CSS
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
                include('../../controle/key.php');
                define('BASEURL', 'https://api.themoviedb.org/3/');
                $url = BASEURL . 'movie/' . $idfilme . '/images?api_key=' . APIKEY;
                $json = file_get_contents($url);
                $obj = json_decode($json);
                $urldetalhes = BASEURL . 'movie/' . $idfilme . '?api_key=' . APIKEY . '&language=pt-br';
                $jsondetalhes = file_get_contents($urldetalhes);
                $objdetalhes = json_decode($jsondetalhes);
                $fotofundo = $obj->backdrops[0]->file_path;
                $poster = $objdetalhes->poster_path;
                $titulo = $objdetalhes->title;
                $tituloori = $objdetalhes->original_title;
                $anolancamento = $objdetalhes->release_date;
                $year = strtok($anolancamento, '-');
                echo '<style> #fundofilme {
        background: linear-gradient(0deg, rgb(40,45,45) 15%, rgba(0, 0, 0, 0.183) 100%), url("https://image.tmdb.org/t/p/original' . $fotofundo . '");
        background-repeat: no-repeat;
        background-size: cover;
      }</style>';

                echo '
        <div id="fundofilme">
            <div style="display: flex;">
                <div style="display: inline-block;width: 70%;">
                    <div style="display: flex;">
                        <div style="display: inline-block;">
                            <a href="../filmes/filme.php?id=' . $idfilme . '">
                                <div class="posterfilme">
                                    <img class="poster1" src="https://image.tmdb.org/t/p/original' . $poster . '" />
                                    <div class="titulofilmecri">
                                    ' . $titulo . '(' . $year . ')          
                                    </div>
                                    <div class="titulooriginalcri">
                                    ' . $tituloori . '
                                    </div>
                                </div>
                            </a>
                        </div>
                    
                
                        <div style="display: inline-block;">
                            <div class="feitopor">
                                Feito por ' . $usunome . ' ' . $ususobnome . '
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
                            <div class="titulocritica">
                            ' . $titulocri . '       
                            </div>
                            <div class="critica">
                            ' . $texto . '
                            </div>
                        
                        </div>
                    </div>
                </div> 
                <div style="display:inline-block;">
                <div class="laddircripeq">
                <div class="outrascri">
                    Outras Critícas
                </div>
                <ul style="list-style-type: none;">';
            $resultcat = "SELECT * FROM criticas ORDER BY CriCod DESC LIMIT 5";
    
            $opcategorias = mysqli_query($conexao, $resultcat);
            while ($row_opcategorias = mysqli_fetch_assoc($opcategorias)) {
                $cod = $row_opcategorias['CriCod'];
                $titulo = $row_opcategorias['CriTitulo']; //ARRUMAR DIVS CSS
                $texto = $row_opcategorias['CriTexto'];
                echo '
                <li class="noticialipeq">
                    <div class="hrdiv">
                        <hr class="hrresultado">      
                    </div>
                        <div class=noticiapeq>   
                            <a href="critica.php?id=' . $cod . '">                                
                                <div class="titulonotpeq">' . $titulo . '    </div>
                            </a>           
                        </div>                   
                </li>
              ';
            }
            echo '
                    </ul>
                </div>
                </div> 
            </div>
        
        ';
            }

            
            ?><?php include('../footer.php'); ?>
            </div>  
            


            <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
            <script src='https://npmcdn.com/flickity@2/dist/flickity.pkgd.js'></script>
            <script src='https://cdn.rawgit.com/JacobLett/bootstrap4-latest/master/bootstrap-4-latest.min.js'></script>
            <script src="/JS/swiper-bundle.min.js"></script>
            <script src="../scripts/scriptsmain.js"></script>
    </body>

    </html>