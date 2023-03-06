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

if (isset($_SESSION['UsuCod'])) {
    if ($_SESSION['UsuNivel'] != 'A') {
        header('location: ../../../usuario/index.php');
    }
} else {
    header('location: ../../../visitante/index.php');
}

if (isset($_GET["id"])) {
    $codlista = $_GET["id"];
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
        <link href="https://fonts.googleapis.com/css2?family=Rancho&family=Roboto:wght@500&display=swap" rel="stylesheet">

    </head>

    <body>
        <?php
    include('../../header.php');
    ?>
        <hr class="hrperfil">
        <div class="conteudosperfis">
            <div id=conteudo>

                <?php
                include('../../../controle/key.php');
                $_SESSION['filmearray'] = array();
                $arrayfilme = array();
                $selectlistait = "SELECT LisIdFilme FROM listaitens where LisCod = $codlista";
                $selectlista = "SELECT * FROM lista where LisCod = $codlista";
                $listaitres = mysqli_query($conexao, $selectlistait);
                $listares = mysqli_query($conexao, $selectlista);
                while ($row_lista = mysqli_fetch_assoc($listares)) {
                    $listaresul = $row_lista;
                }

                $query3 = "SELECT CatDescricao FROM categoria where CatCod LIKE '$listaresul[LisCatCod]'";
                $result3 = mysqli_query($conexao, $query3);
                $rowcat3 = mysqli_fetch_array($result3);
                $categoriadesc = $rowcat3['CatDescricao'];


                while ($row_listaitens = mysqli_fetch_assoc($listaitres)) {
                    $output[] = $row_listaitens['LisIdFilme'];
                }
                $_SESSION['filmearray'] = json_encode($output);
                echo '<Script>console.log(' . $_SESSION['filmearray'] . ')</script>';
                ?>
                <div class="formperfil">
                    <form action="../../../controle/listaseditar.php" method="POST">
                        <input type="hidden" name="codlista" id="codlista" value=" <?php echo $codlista ?>">
                        <div class="field">
                            <div class="control">
                                <input name="Titulo" class="inputtit" value="<?php echo $listaresul['LisTitulo']; ?>"
                                    placeholder="Titulo">
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <textarea name="Descricao" class="inputdescr"
                                    placeholder="Descrição"><?php echo $listaresul['LisDescricao']; ?></textarea>
                            </div>
                        </div>
                        <div class="categoriaper">
                            <input name="categoria" class="inputcat" value="<?php echo $categoriadesc; ?>"
                                placeholder="Digite a categoria da notícia. Ex: Ação, Drama, Marvel, Batman">
                        </div>

                        <div class="search">

                            <input type="text" id="search" name="search" placeholder="Pesquise por Filmes..." />

                            <button type="button" name='limpar' id="pesquisarfilmes"><i class="fa fa-search" aria-hidden="true"
                    style="font-size: 30px; color: white; background-color: #D84444;"></i></button>

                        </div>

                        <div id="filmes">
                            <div class="hrdiv">
                                <hr class="hrresultado">
                            </div>
                            <ui id="filmeselecionados">
                                <?php
                                if (!empty($_SESSION['filmearray'])) {
                                    $_SESSION['filmearray'] = json_decode($_SESSION['filmearray']);
                                    $tam = count($_SESSION['filmearray']);
                                    for ($i = 0; $i < $tam; $i++) {

                                        $idfilme = $_SESSION['filmearray'][$i];
                                        if (!defined('BASEURL')) {
                                            define('BASEURL', 'https://api.themoviedb.org/3/');
                                        }
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
                                        echo '<li class="content" id="' . $id . '">
                        <div>
                            <div class="posterfilmelista">
                                <img class="posterlista" src="https://image.tmdb.org/t/p/original' . $poster . '" />
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
                        <button type="button" id="filmeselecionado" name="filmeselecionado" onClick="Excluir(' . $idfilme . ')">X</button>
                        <div class="hrdiv">
                            <hr class="hrresultado">   
                        </div>
                      </li>';
                                    }
                                } ?>
                            </ui>
                        </div>

                        <div style="display: flex; width: 100%; margin-left: 2.5%;">
                            <div class="limparlistaeditar">
                                <button type="button" name='limpar' id="limpar">Limpar Lista</button>
                            </div>
                            <div style="width: 30%; margin-right: 5%;">
                                <button type="submit" name="submit" class="btnCriarNot">Publicar Lista</button>
                            </div>
                            <div class="limparlistaeditar">
                                <button type="button" name='limpar' id="excluirlista">Excluir Lista</button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>

        </div>
        <?php include('../../footer.php'); ?>
        <!-- partial -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src='https://npmcdn.com/flickity@2/dist/flickity.pkgd.js'></script>
        <script src='https://cdn.rawgit.com/JacobLett/bootstrap4-latest/master/bootstrap-4-latest.min.js'></script>
        <script src="../../../scripts/scriptsmain.js"></script>
       
        <script>

            $(document).ready(function () {
                $('#pesquisarfilmes').click(function (e) {
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
                    url: '../../../controle/selecionarfilme.php',
                    data: { id: $id },
                    success: function (data) {
                        $('.resultadodiv').remove();
                        $("#filmeselecionados").append(data);
                    }
                });
                console.log($id);
            }

            function Excluir($id) {
                $.ajax({
                    type: 'POST',
                    url: '../../../controle/excluirfilme.php',
                    data: { id: $id },
                    success: function (data) {
                        $('#' + $id).remove();
                    }
                });

            }


            $(document).ready(function () {
                $('#limpar').click(function (e) {

                    e.preventDefault();
                    $.ajax({
                        type: 'POST',
                        url: '../../../controle/limparlista.php',
                        success: function (data) {
                            $('#filmeselecionados').empty();
                        }
                    });
                });
            });

            $(document).ready(function () {
                $('#excluirlista').click(function (e) {
                    e.preventDefault();
                    $.ajax({
                        type: 'POST',
                        url: '../../../controle/excluirlista.php',
                        data: { cod: $('#codlista').val() },
                        success: function (data) {

                        }
                    });
                });
            });
        </script>
    </body>

    </html>