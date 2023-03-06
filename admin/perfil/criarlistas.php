<?php
if (empty($conexao)) {
    include('../../controle/conexao.php');
}
include('../../controle/key.php');
if(session_id() == ''){
    session_start();
 }
$_SESSION['filmearray'] = array();

?>

<div class="formperfil">
    <form action="../../controle/listas.php" method="POST">
        <div class="field">
            <div class="control">
                <input name="Titulo" class="inputtit" placeholder="Titulo">
            </div>
        </div>
        <div class="field">
            <div class="control">
                <textarea name="Descricao" class="inputdescr" placeholder="Descrição"></textarea>
            </div>
        </div>
        <div class="categoriaper">
            <input name="categoria" class="inputcat"
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
                        echo '<li>
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
<button type="button" id="filmeselecionado" name="filmeselecionado" onClick="Excluir(".$idfilme.")"><i class="fa-solid fa-xmark"></i></button>
  <div class="hrdiv">
  </li>';
                    }
                } ?>
            </ui>
        </div>

        <div style="display: flex; width: 100%; margin-left: 7%;">
            <div class="limparlista">
                <button type="button" name='limpar' id="limpar">Limpar Lista</button>
            </div>
            <div style="width: 40%">
                <button type="submit" name="submit" class="btnCriarNot">Publicar Lista</button>
            </div>
        </div>

    </form>
</div>
<hr class="hrperfilcriar">
<div class="listasperfil">
    <div class="titulolistasper">
        Listas criadas
    </div>
    <div style="display: flex; flex-wrap: wrap;">
        <?php
        if (empty($conexao)) {
            include('../../controle/conexao.php');
        }
        $resultlis = "SELECT * FROM lista WHERE LisUsuCod = $_SESSION[UsuCod] ORDER BY LisCod DESC";

        $lista = mysqli_query($conexao, $resultlis);
        while ($row_lista = mysqli_fetch_assoc($lista)) {
            $cod = $row_lista['LisCod'];
            $titulo = $row_lista['LisTitulo']; //ARRUMAR DIVS CSS
            $descricaolis = $row_lista['LisDescricao'];

            echo '
            <div class="posterlistapeqdiv">
                <a class="hreflista" href="lista/listaeditar.php?id=' . $cod . '">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

    $(document).ready(function () {
        $('#pesquisarfilmes').click(function (e) {
            console.log("ebixo");
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '../../controle/busca.php',
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
            url: '../../controle/selecionarfilme.php',
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
            url: '../../controle/excluirfilme.php',
            data: { id: $id },
            success: function (data) {
                $('#' + $id).remove();
            }
        });

    }


    $(document).ready(function () {
        $('#limpar').click(function (e) {
            console.log("teste");
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '../../controle/limparlista.php',
                success: function (data) {
                    $('#filmeselecionados').empty();
                }
            });
        });
    });

</script>