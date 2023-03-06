<?php
include('../../../controle/conexao.php');
session_start();
/*
if (!isset($_SESSION['UsuCod'])) {
header('location: ../visitante/index.php');
}
else{ 
if ($_SESSION['UsuNivel'] == 'U') {
header('location: ../usuario/index.php');
}
}*/

if ($_SESSION['UsuNivel'] == 'A') {
    header('location: ../admin/index.php');
  } else if (!isset($_SESSION['UsuCod'])) {
    header('location: ../visitante/index.php');
}



if (isset($_GET["id"])) {
    $codcritica = $_GET["id"];
}

?>
<!DOCTYPE html>
<lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rate and Flix - O seu principal site de notícias sobre entretenimento e muito mais</title>
        <link rel="stylesheet" href="../../../css/stylemain.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <script src="https://use.fontawesome.com/fad0de82ab.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Rancho&family=Roboto:wght@500&display=swap"
            rel="stylesheet">

    </head>

    <body>
    <?php 
  include('../../header.php');
  ?>
        <!--
    <div class="infoperfil">
      <div class="fotoperfil">
        <img src="../../fotoperfil.png" style="width: 15%"></img>
      </div>
      <div class="nomeeditar">
        <?php /*
         echo $_SESSION['UsuNome'];
         */?>
      </div>
    </div>
-->
        <?php
        if (empty($conexao)) {
            include('../../controle/conexao.php');
        }
        $resultcat = "SELECT * FROM criticas WHERE CriCod = $codcritica";

        $opcategorias = mysqli_query($conexao, $resultcat);
        while ($row_opcategorias = mysqli_fetch_assoc($opcategorias)) {
            $cod = $row_opcategorias['CriCod'];
            $titulo = $row_opcategorias['CriTitulo']; //ARRUMAR DIVS CSS
            $caminho = $row_opcategorias['CriPosterCaminho'];
            $idfilme = $row_opcategorias['CriIdFilme'];
            $texto = $row_opcategorias['CriTexto'];
            $nota = $row_opcategorias['CriNota'];
        }
        ?>
        <hr class="hrperfil">
        <div class="conteudosperfis">
            <div id=conteudo>
                <div class="formperfil">
                    <form action="../../../controle/criticaseditar.php" method="POST">
                        <input type="hidden" name="cricod" id="cricod" value="<?php echo $cod ?>">
                        <div class="field">
                            <div class="control">
                                <input name="Titulo" class="inputtit" value="<?php echo $titulo ?>"
                                    placeholder="Titulo">
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <textarea name="Texto" class="inputtexto"
                                    placeholder="Texto"><?php echo $texto ?>"</textarea>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <input name="Nota" class="inputnota" value="<?php echo $nota ?>" placeholder="Nota">
                            </div>
                        </div>
                        <div class="search">
                            <input type="text" id="search" name="search" placeholder="Pesquise por Filmes..." />
                            <button type="button" name='pesquisar' id="pesquisar"><i class="fa fa-search"
                                    aria-hidden="true"
                                    style="font-size: 30px; color: white; background-color: #D84444;"></i></button>
                        </div>


                        <div id="filmes">
                            <ui id="filmeselecionados">
                                <?php

                                include('../../../controle/key.php');
                                define('BASEURL', 'https://api.themoviedb.org/3/');
                                $urldetalhes = BASEURL . 'movie/' . $idfilme . '?api_key=' . APIKEY . '&language=pt-br';
                                $jsondetalhes = file_get_contents($urldetalhes);
                                $objdetalhes = json_decode($jsondetalhes);
                                $nome = $objdetalhes->title;
                                $id = $objdetalhes->id;
                                $anolancamento = $objdetalhes->release_date;
                                $year = strtok($anolancamento, '-');
                                $poster = $objdetalhes->poster_path;
                                $tituloori = $objdetalhes->original_title;
                                $resumo = $objdetalhes->overview;
                                $nota = $objdetalhes->vote_average;
                                echo '<div class="hrdiv">
<hr class="hrresultado">   
</div>
<li class="content" id="' . $id . '"><div>
        <div class="posterfilmelista">
            <img class="posterlista" src="https://image.tmdb.org/t/p/original' . $poster . '" />
            <input type="hidden" name="postercaminho" value="' . $poster . '" >
            <input type="hidden" name="idfilme" value="' . $idfilme . '" >
        </div>
    
        <div class="detalheslista">
            <div class="titulofilmelista">
            ' . $nome . ' (' . $year . ')          
            </div>
            <div class="titulooriginallista">
            ' . $tituloori . '
            </div>
            <div class="resumolista">
            ' . $resumo . '
            </div>
        </div>
    </div>
     <div class="hrdiv">
      <hr class="hrresultado">   
      </div>
      </div>
      </li>';

                                ?>
                            </ui>


                            <div style="display: flex; margin-left: 2.5%;">
                                <div style="width: 50%">
                                    <button type="submit" class="btnCriarNotEditar">Publicar notícia</button>
                                </div>
                                <div style="width: 50%">
                                    <button type="button" id="excluir" class="btnExcluirEditar">Excluir notícia</button>
                                </div>
                            </div>
                    </form>
                </div>

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script>

                    $(document).ready(function () {
                        $('#pesquisar').click(function (e) {
                            e.preventDefault();
                            $.ajax({
                                type: 'POST',
                                url: '../../../controle/busca.php',
                                data: { search: $('#search').val() },
                                success: function (data) {
                                    $('.resultadodiv').remove();
                                    $("<div class='resultadodiv'><ul id='resultado'></ul></div>").insertAfter(".search");
                                    $("#resultado").html(data);
                                }
                            });
                        });
                    });

                    function Selecionar($id) {
                        $.ajax({
                            type: 'POST',
                            url: '../../../controle/selecaofilmeunico.php',
                            data: { id: $id },
                            success: function (data) {
                                $('.resultadodiv').remove();
                                $("#filmeselecionados").html(data);
                            }
                        });
                    }

                    $(document).ready(function () {
                        $('#excluir').click(function (e) {
                            e.preventDefault();
                            $.ajax({
                                type: 'POST',
                                url: '../../../controle/excluircri.php',
                                data: { cod: $('#codcri').val() },
                                success: function (data) {
                       
                                }
                            });
                        });
                    });

                </script>


            </div>

        </div>
        <!-- partial -->
        <?php include('../../footer.php'); ?>   
        <script src='https://npmcdn.com/flickity@2/dist/flickity.pkgd.js'></script>
        <script src='https://cdn.rawgit.com/JacobLett/bootstrap4-latest/master/bootstrap-4-latest.min.js'></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="../../../scripts/scriptsmain.js"></script>

    </body>

    </html>