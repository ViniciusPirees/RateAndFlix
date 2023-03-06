<?php
include('../../controle/conexao.php');
if(session_id() == ''){
  session_start();
}
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



$query = "SELECT UsuNome FROM usuario WHERE UsuCod = " . $_SESSION['UsuCod'] . "";

$result = mysqli_query($conexao, $query);

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

    <link href="https://fonts.googleapis.com/css2?family=Rancho&family=Roboto:wght@500&display=swap" rel="stylesheet">

  </head>

  <body>
  <?php 
  include('../header.php');
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
    <div class="colunaperfil">
      <button onclick=criarlistas()>Listas</button>
      <button onclick=criarcriticas()>Critícas</button>
      <button onclick=editarperfil()>Editar Perfil</button>
    </div>
    <hr class="hrperfil">
    <div class="conteudosperfis">
      <div id=conteudo>
        <?php
      echo include('criarlistas.php')
      ?>
      </div>
  
    </div>
    <!-- partial -->
    <?php include('../footer.php'); ?>
    <script src='https://npmcdn.com/flickity@2/dist/flickity.pkgd.js'></script>
    <script src='https://cdn.rawgit.com/JacobLett/bootstrap4-latest/master/bootstrap-4-latest.min.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../../scripts/scriptsmain.js"></script>
    <script> 
        function criarlistas(){
        $('#conteudo').empty();
        $("#conteudo").load("criarlistas.php");
        }

        function criarcriticas(){
        $('#conteudo').empty();
        $("#conteudo").load("criarcriticas.php");
        }
        function editarperfil(){
        $('#conteudo').empty();
        $("#conteudo").load("editarperfil.php");
        }
    </script>
  </body>

  </html>