<?php
if (session_id() == '') {
    session_start();
}
?>
<div class="formperfil">
    <form action="../../controle/criticas.php" method="POST">
        <div class="field">
            <div class="control">
                <input name="Titulo" class="inputtit" placeholder="Titulo">
            </div>
        </div>
        <div class="field">
            <div class="control">
                <textarea name="Texto" class="inputtexto" placeholder="Texto"></textarea>
            </div>
        </div>
        <div class="field">
            <div class="control">
                <input name="Nota" class="inputnota" placeholder="Nota">
            </div>
        </div>
        <div class="search">
            <input type="text" id="search" name="search" placeholder="Pesquise por Filmes..." />
            <button type="button" name='pesquisar' id="pesquisarfilmes"><i class="fa fa-search" aria-hidden="true"
                    style="font-size: 30px; color: white; background-color: #D84444;"></i></button>
        </div>


        <div id="filmes">
            <ui id="filmeselecionados">
            </ui>
        </div>

        <div style="display: flex;">
            <div style="width: 50%">
                <button type="submit" class="btnCriarNot">Publicar Crítica</button>
            </div>
        </div>
    </form>
</div>
<hr class="hrperfilcriar">
<div style="margin-top: 5%;">
    <ul style="list-style-type: none;">
        <?php
        if (empty($conexao)) {
            include('../../controle/conexao.php');
        }
        $resultcat = "SELECT * FROM criticas WHERE CriUsuCod = $_SESSION[UsuCod] ORDER BY CriCod DESC LIMIT 20";

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
                        <a href="criticas/criticaseditar.php?id=' . $cod . '">
                        <button class="vermais" >Editar</button>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

    $(document).ready(function () {
        $('#pesquisarfilmes').click(function (e) {
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
            url: '../../controle/selecaofilmeunico.php',
            data: { id: $id },
            success: function (data) {
                $('.resultadodiv').remove();
                $("#filmeselecionados").html(data);
            }
        });
    }

</script>