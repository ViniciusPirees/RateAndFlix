<?php
include('../../controle/conexao.php');
session_start();
if ($_SESSION['UsuNivel'] == 'A') {
    header('location: ../admin/index.php');
  } else if (!isset($_SESSION['UsuCod'])) {
    header('location: ../visitante/index.php');
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
        <div style="display: flex;">
            <div style="display: flex; flex-wrap: wrap; width: 100%; margin-left: 10%; margin-top: 3%; margin-right: -35%; ">
                <?php
            if (empty($conexao)) {
                include('../../controle/conexao.php');
            }
            $resultlis = "SELECT * FROM lista where LisCod = $cod";

            $lista = mysqli_query($conexao, $resultlis);
            while ($row_lista = mysqli_fetch_assoc($lista)) {
                $cod = $row_lista['LisCod'];
                $titulo = $row_lista['LisTitulo']; //ARRUMAR DIVS CSS
                $descricaolis = $row_lista['LisDescricao'];
                $usucod = $row_lista['LisUsuCod'];
                $query = "SELECT UsuNome, UsuSobNome FROM Usuario where UsuCod = $usucod";
                $result = mysqli_query($conexao, $query);
                $rowcat = mysqli_fetch_array($result);
                $usunome = $rowcat['UsuNome'];
                $ususobnome = $rowcat['UsuSobNome'];
                $categoria = $row_lista['LisCatCod'];
                $query = "SELECT CatDescricao FROM categoria where CatCod = $categoria";
                $descricaocat = mysqli_fetch_array(mysqli_query($conexao, $query));
                echo '
            <div class="posterlistapeqdivlist">
                <div style="display: flex;">
                    <div style="float:left;" >
                        <div class="titulolistatela">' . $titulo . '    </div>
                        <div class="descricaolistatela"> ' . $descricaolis . '</div>
                        <div class="feitoporlisttela">
                        Feito por ' . $usunome . ' ' . $ususobnome . '
                        </div>
                    </div>
                    <div style="margin-left: auto; margin-right: 0; width:50%; margin-top: 5%">
                        <a href="pesquisalistas.php?id=' . $categoria . '"> 
                            <div class="categoria" style="float: right;"> Categoria: ' . $descricaocat['CatDescricao'] . '</div> 
                        </a>
                    </div>
                </div>
                    <div class="listapailis">';
                $querylisit = "SELECT * FROM listaitens WHERE LisCod = $cod ";
                $listaitens = mysqli_query($conexao, $querylisit);
                while ($row_listaitens = mysqli_fetch_assoc($listaitens)) {
                    echo '
                        <div class="posterlistapeqdivs">
                            <img class="posterlistatela" src="https://image.tmdb.org/t/p/original' . $row_listaitens['LisCaminhoPoster'] . '" />
                        </div>
                        ';

                }
                echo '
                    </div>
                 
           </div>     
           ';
            }
            ?>
            </div>

            <div style="width: 20%; margin-top: 6%; margin-left: -2%">
                <?php echo'
                <div class="laddirnotpeq" style="width: 100%;">
                    <div class="outrasnot">
                        Outras Listas
                    </div>
                    <ul style="list-style-type: none;">';

                $resultcat = "SELECT * FROM lista ORDER BY LisCod DESC LIMIT 5";
        
                $opcategorias = mysqli_query($conexao, $resultcat);
                while ($row_opcategorias = mysqli_fetch_assoc($opcategorias)) {
                    $cod = $row_opcategorias['LisCod'];
                    $titulo = $row_opcategorias['LisTitulo']; //ARRUMAR DIVS CSS
                    $categoria = $row_opcategorias['LisCatCod'];
                    $texto = $row_opcategorias['LisDescricao'];
                    $query = "SELECT CatDescricao FROM categoria where CatCod = $categoria";
                    $descricaocat = mysqli_fetch_array(mysqli_query($conexao, $query));
                    echo '
                    <li class="noticialipeq">
                        <div class="hrdiv">
                            <hr class="hrresultado">      
                        </div>
                            <div class=noticiapeq>
                                <a href="pesquisalistas.php?id=' . $categoria . '">    
                                <div class="categoria" style="font-size: 12px">'.$descricaocat['CatDescricao'].'</div> 
                                </a>
                                <a href="lista.php?id=' . $cod . '">                                
                                    <div class="titulonotpeq">' . $titulo . '    </div>
                                    <div class="textonotpeq">' . $texto . '    </div>
                                </a>           
                            </div>                   
                    </li>
                  ';
                }
                echo '
                        </ul>
                    </div>
                </div>
            
          ';
    
        ?>
            </div>
        </div>
        <div>
        <?php include('../footer.php'); ?>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
            <script src='https://npmcdn.com/flickity@2/dist/flickity.pkgd.js'></script>
            <script src='https://cdn.rawgit.com/JacobLett/bootstrap4-latest/master/bootstrap-4-latest.min.js'></script>
            <script src="/JS/swiper-bundle.min.js"></script>
            <script src="../../..scripts/scriptsmain.js"></script>

    </body>

    </html>