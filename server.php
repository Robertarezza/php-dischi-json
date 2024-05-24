
<?php

//prelevi il file e lo leggi
$list_dischi_string = file_get_contents("dischi.json");

//trasformazione in array
$dischi_list = json_decode($list_dischi_string, true);


// var_dump($dichi_array);



if (isset($_POST["action"]) && $_POST["action"] === "toggle-like") {
    
    $disc_index = $_POST["disc_index"];

    $dischi_list[$disc_index]["like"] = !$dischi_list[$disc_index]["like"];
    file_put_contents("dischi.json", json_encode($dischi_list));
}


//sistemo la risposta
$dischi = [
    "result" => $dischi_list
];


//mandiamo la risposta come l'abbiamo struttirata
$json_list_dischi = json_encode($dischi); //string
//comunica ch stiamo mandando un file json
header("Content-Type: application/json");

echo $json_list_dischi;

?>