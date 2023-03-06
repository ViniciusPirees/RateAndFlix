<?php
include('../../controle/conexao.php');
session_start();
if ($_SESSION['UsuNivel'] == 'A') {
    header('location: ../admin/index.php');
  } else if (!isset($_SESSION['UsuCod'])) {
    header('location: ../visitante/index.php');
}


if (isset($_GET["id"])) {
    $codcategoria = $_GET["id"];
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
        <div class="filmescom">
        Notícias com a categoria 
            <?php 
            $query = "SELECT CatDescricao FROM categoria where CatCod = $codcategoria";
            $descricaocat = mysqli_fetch_array(mysqli_query($conexao, $query)); 
            echo $descricaocat['CatDescricao'];?>
        </div>
            <ul style="list-style-type: none;">
                <?php
        if (empty($conexao)) {
            include('../../controle/conexao.php');
        }
        $resultcat = "SELECT * FROM noticias WHERE NotCatCod = $codcategoria ORDER BY NotCod DESC LIMIT 20";

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
                <div class="ladesqnot"><img class="imgnoticia" src="../../imagensnoticias/' . $caminho . '">
                </div>
                <div class=laddirnot>
                    <a href="noticiapesquisa.php?id=' . $categoria . '"> 
                    <div class="categoria">'.$descricaocat['CatDescricao'].'</div> 
                    </a>
                   <div class="titulonoticia">' . $titulo . '    </div>
                   <div class="previanot"> '.$texto.'</div>
                   <div>
                   <a href="noticia.php?id=' . $cod . '">
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
        <div>
        <?php include('../footer.php'); ?>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
            <script src='https://npmcdn.com/flickity@2/dist/flickity.pkgd.js'></script>
            <script src='https://cdn.rawgit.com/JacobLett/bootstrap4-latest/master/bootstrap-4-latest.min.js'></script>
            <script src="/JS/swiper-bundle.min.js"></script>
            <script src="../../scripts/scriptsmain.js"></script>

    </body>

    </html>