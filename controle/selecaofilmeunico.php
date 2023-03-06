<?php

include('key.php');
session_start();
$idfilme = $_POST['id'];
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
            <input type="hidden" value="'.$poster.'" name="postercaminho">
            <input type="hidden" value="'.$idfilme.'" name="idfilme">
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
      </div>
      </li>';

?>