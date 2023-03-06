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
    $codnoticia = $_GET["id"];
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
        <hr class="hrperfil">
        <div class="conteudosperfis">
            <div id=conteudo>
                <?php
                     $selectNOTICIA = "SELECT * FROM noticias where NotCod = $codnoticia";
                     $noticares = mysqli_query($conexao, $selectNOTICIA);
                     while ($row_NOTICIa = mysqli_fetch_assoc($noticares)) {
                         $noticiaresul = $row_NOTICIa;

                     }

                    $query3 = "SELECT CatDescricao FROM categoria where CatCod = $noticiaresul[NotCatCod]";
                    $result3 = mysqli_query($conexao, $query3);
                    $rowcat3 = mysqli_fetch_array($result3);
                    $categoriadesc = $rowcat3['CatDescricao'];

                ?>
                <div class="formperfil">
                    <form action="../../../controle/noticiaeditar.php" method="POST">
                        <input type="hidden" id="codnoticia" name="codnoticia" value="<?php echo $codnoticia; ?>">
                        <div class="field">
                            <div class="control">
                                <input name="Titulo" class="inputtit" value="<?php echo $noticiaresul['NotTitulo']; ?>" placeholder="Titulo">
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <textarea name="Noticia" class="inputtexto" placeholder="Texto"><?php echo $noticiaresul['NotNoticia']; ?></textarea>
                            </div>
                        </div>
                        <div class="categoriaper">
                            <input name="categoria" class="inputcat" value="<?php echo $categoriadesc; ?>" 
                                placeholder="Digite a categoria da notícia. Ex: Ação, Drama, Marvel, Batman">
                        </div>

                        <div class="enviaimagem">
                            <label for="imagem">
                                <div id="img">
                                <?php echo $noticiaresul['NotCaminho']; ?>
                                    <i class="fa fa-camera" aria-hidden="true"></i>
                                </div>
                                <input type="file" name="imagem" id="imagem" />
                            </label>
                        </div>
                        <input type="hidden" id="imgdesatualizada" name="imgdesatualizada" value="<?php echo $noticiaresul['NotCaminho']; ?>">
                        <button type="button" name="Envia" id="Envia">Enviar imagem</button>
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
                            url: '../../../controle/enviaimagem.php',
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

            
            $(document).ready(function () {
                        $('#excluir').click(function (e) {
                            e.preventDefault();
                            $.ajax({
                                type: 'POST',
                                url: '../../../controle/excluirnot.php',
                                data: { cod: $('#codnoticia').val(), img: $('#imgdesatualizada').val()  },
                                success: function (data) {
                       
                                }
                            });
                        });
                    });
        </script>

        <!-- partial -->
        <?php include('../../footer.php'); ?>
        <script src='https://npmcdn.com/flickity@2/dist/flickity.pkgd.js'></script>
        <script src='https://cdn.rawgit.com/JacobLett/bootstrap4-latest/master/bootstrap-4-latest.min.js'></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="../../../scripts/scriptsmain.js"></script>

    </body>

    </html>