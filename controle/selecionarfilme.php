<?php

include('key.php');
session_start();
$idfilme = $_POST['id'];
if (empty($_SESSION['filmearray'])) {
    $_SESSION['filmearray'] = array();
    array_push($_SESSION['filmearray'], $idfilme);
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
    echo '<li class="content" id="'.$id.'"><div>
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
<button type="button" id="filmeselecionado" name="filmeselecionado" onClick="Excluir('.$idfilme.')">X</button>
  <div class="hrdiv">
  <hr class="hrresultado">   
  </div>
  </div>
  </li>';

} else {
    $igual = 0;
    $tam = count($_SESSION['filmearray']);
    for ($i = 0; $i < $tam; $i++) {
        if ($idfilme == $_SESSION['filmearray'][$i]) {
            $igual++;
        }
    }
    if ($igual == 0) {
        array_push($_SESSION['filmearray'], $idfilme);
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
        echo '<li class="content" id="'.$id.'"><div>
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
    <button type="button" id="filmeselecionado" name="filmeselecionado" onClick="Excluir('.$idfilme.')">X</button>
     <div class="hrdiv">
      <hr class="hrresultado">   
      </div>
      </div>
      </li>';
    }
}


/*
define('BASEURL', 'https://api.themoviedb.org/3/');
$urldetalhes = BASEURL . 'movie/' . $idfilme . '?api_key=' . APIKEY . '&language=pt-br';
$jsondetalhes = file_get_contents($urldetalhes);
$objdetalhes = json_decode($jsondetalhes);
$poster = $objdetalhes->poster_path;
$titulo = $objdetalhes->title;
$anolancamento = $objdetalhes->release_date;
$year = strtok($anolancamento, '-');
echo '<li><div>'. $titulo . ' ' . $year . '</div></li>';
*/
?>