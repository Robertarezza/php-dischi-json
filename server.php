
<?php

$list_dischi_string = file_get_contents("dischi.json");

$dischi_list = json_decode($list_dischi_string, true);


// var_dump($dichi_array);

//iterare sull'array
foreach ($dischi_list as &$disco) {
    $disco["like"] = true ;
}

// Codifica nuovamente l'array aggiornato in JSON
$new_list = json_encode($dischi_list, JSON_PRETTY_PRINT);

// Salva il nuovo JSON nel file
file_put_contents("dischi.json", $new_list);

$dischi = [
    "result" => $dischi_list
];

$json_list_dischi = json_encode($dischi);

header("Content-Type: application/json");

echo $json_list_dischi;

?>