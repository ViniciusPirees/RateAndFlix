<?php

include('key.php');
$search = $_POST['search'];
define('BASEURL', 'https://api.themoviedb.org/3/');
$search = str_replace(' ', '%20', $search);
$url = BASEURL . 'search/movie?api_key=' . APIKEY . '&language=pt-BR&query=' . $search;
$json = file_get_contents($url);
$obj = json_decode($json);
$array = count($obj->results);

if ($array > 0) {
    for ($i = 0; $i < $array; $i++) {
        $nome = $obj->results[$i]->title;
        $id = $obj->results[$i]->id;
        $anolancamento = $obj->results[$i]->release_date;
        $year = strtok($anolancamento, '-');
        echo '<li class="'.$id.'"><div><button type="button" id="filmeselecao" name="filmeselecao" onClick="Selecionar('.$id.')">' . $nome . ' (' . $year . ')</button></div></li>';
    }
} else {
    echo '<li><div>Sem Resultados</div></li>';
}

?>