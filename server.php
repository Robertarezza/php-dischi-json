
<?php

$list_dischi_string = file_get_contents("dischi.json");

$dischi_array = json_decode($list_dischi_string, true);


// var_dump($dichi_array);

$dischi = [
    "result" => $dischi_array
];

$json_list_dischi = json_encode($dischi);

header("Content-Type: application/json");

echo $json_list_dischi;

?>