
<?php
   if(session_id() == ''){
      session_start();
   }
?>
<div class="formperfil">
    <form action="../../controle/noticias.php" method="POST">
        <div class="field">
            <div class="control">
                <input name="Titulo" class="inputtit" placeholder="Titulo">
            </div>
        </div>
        <div class="field">
            <div class="control">
                <textarea name="Noticia" class="inputtexto" placeholder="Texto"></textarea>
            </div>
        </div>
        <div class="categoriaper">
            <input name="categoria" class="inputcat"
                placeholder="Digite a categoria da notícia. Ex: Ação, Drama, Marvel, Batman">
        </div>

        <div class="enviaimagem">
            <label for="imagem">
                <div id="img">
                    Selecionar Imagem
                    <i class="fa fa-camera" aria-hidden="true"></i>
                </div>
                <input type="file" name="imagem" id="imagem" />
            </label>
        </div>
        <button type="button" name="Envia" id="Envia">Enviar imagem</button>
        <div style="display: flex;">
            <div style="width: 50%">
                <button type="submit" class="btnCriarNot">Publicar notícia</button>
            </div>
        </div>
    </form>
</div>

<div>
    <div>
        <ul style="list-style-type: none;">
            <?php
                if (empty($conexao)) {
                    include('../../controle/conexao.php');
                }
                $resultcat = "SELECT * FROM noticias WHERE NotUsuCod = $_SESSION[UsuCod] ORDER BY NotCod DESC LIMIT 10";

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
                    <a href="noticiapesquisa.php?id=' . $categoria . '" style="text-decoration:none;"> 
                    <div class="categoria">' . $descricaocat['CatDescricao'] . '</div> 
                    </a>
                   <div class="titulonoticia">' . $titulo . '    </div>
                   <div class="previanot"> ' . $texto . '</div>
                   <div>
                   <a href="noticia/noticiaeditar.php?id=' . $cod . '">
                   <button class="continuelendo">Editar notícia</button>
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
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {

        $("#Envia").click(function (e) {
            console.log("hihi");
            e.preventDefault();
            let form_data = new FormData();
            let img = $("#imagem")[0].files;

            // Check image selected or not
            if (img.length > 0) {
                console.log("simsim")
                form_data.append('imagem', img[0]);
                $.ajax({
                    url: '../../controle/enviaimagem.php',
                    type: 'post',
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        $("#img").html(data);
                    }
                });

            } else {
                console.log("naonao")
            }
        });

        $("#imagem").change(function () {
            filename = this.files[0].name;
            $("#img").html(filename);
        });

    });
</script>