
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

} elseif (isset($_GET["like"]) && $_GET["like"] === "true") {
    // Filtrare i dischi che hanno "like" impostato a true
    $liked_discs = array_filter($dischi_list, function ($cur_disk) {
        return isset($cur_disk["like"]) && $cur_disk["like"];
    });

    // Restituire i dischi filtrati come risposta

    // Preparazione della risposta
    $dischi = [
        "result" => array_values($liked_discs)
    ];

    // Conversione in formato JSON
    $json_list_dischi = json_encode($dischi); 

    // Comunicazione che si sta inviando un file JSON
    header("Content-Type: application/json");

    // Invio della risposta
    echo $json_list_dischi;

    // Terminazione dello script
    exit();
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