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
    $cod = $_GET["id"];
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
        <?php
        if (empty($conexao)) {
            include('../../controle/conexao.php');
        }
        $resultcat = "SELECT * FROM noticias WHERE NotCod = $cod";

        $opcategorias = mysqli_query($conexao, $resultcat);
        while ($row_opcategorias = mysqli_fetch_assoc($opcategorias)) {
            $cod = $row_opcategorias['NotCod'];
            $titulo = $row_opcategorias['NotTitulo']; //ARRUMAR DIVS CSS
            $caminho = $row_opcategorias['NotCaminho'];
            $categoria = $row_opcategorias['NotCatCod'];
            $texto = $row_opcategorias['NotNoticia'];
            $query = "SELECT CatDescricao FROM categoria where CatCod = $categoria";
            $descricaocat = mysqli_fetch_array(mysqli_query($conexao, $query));
            echo '<div class="noticia">
            
                <div class="noticiaimgdiv"><img class="noticiaimg" src="../../imagensnoticias/' . $caminho . '">
                </div>
                    <div style="display: flex;">
                        <div class="ladesqnoticia">
                            <div class="categoria">'.$descricaocat['CatDescricao'].'</div> 
                            <div class="titulonoticia">' . $titulo . '    </div>
                            <div class="noticiatexto"> '.$texto.'</div>
                        <div>
                    </div>
                </div>
                    
                <div class="laddirnotpeq">
                    <div class="outrasnot">
                        Outras Notícias
                    </div>
                    <ul style="list-style-type: none;">';
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
                    echo '
                    <li class="noticialipeq">
                        <div class="hrdiv">
                            <hr class="hrresultado">      
                        </div>
                            <div class=noticiapeq>   
                                <div class="categoria">'.$descricaocat['CatDescricao'].'</div> 
                                <a href="noticia.php?id=' . $cod . '">                                
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
        ?>

        <div>
        <?php include('../footer.php'); ?>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
            <script src='https://npmcdn.com/flickity@2/dist/flickity.pkgd.js'></script>
            <script src='https://cdn.rawgit.com/JacobLett/bootstrap4-latest/master/bootstrap-4-latest.min.js'></script>
            <script src="/JS/swiper-bundle.min.js"></script>
            <script src="../../scripts/scriptsmain.js"></script>
    </body>

    </html>