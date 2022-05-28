<?php

    //Connessione al database
    $conn = mysqli_connect("localhost","root","","hw1");
    //inizializza l'array di notizie
    $notizie = array();
    //Escape dell'input
    $modalita = mysqli_real_escape_string($conn,$_POST["modalita"]);
    $valore = mysqli_real_escape_string($conn,$_POST["object"]);
    //query al database per mostrare le notizie in ordine di tempo dalle più recenti alle meno recenti
    if ($modalita === "author") {
        $query = "SELECT id, immagine, titolo, data_pubblicazione, ora_pubblicazione FROM notizia WHERE fonte LIKE '%'\"$valore\"'%' ORDER BY data_pubblicazione DESC, ora_pubblicazione DESC";
    }
    else $query = "SELECT id, immagine, titolo, data_pubblicazione, ora_pubblicazione FROM notizia WHERE titolo LIKE '%'\"$valore\"'%' ORDER BY data_pubblicazione DESC, ora_pubblicazione DESC";
    //esecuzione della query
    $res = mysqli_query($conn,$query);
    while($row = mysqli_fetch_assoc($res))
    {
        $notizie[] = $row;
    }
    //Libera le risorse e chiude la connessione
    mysqli_free_result($res);
    mysqli_close($conn);
    //Ritorna i risultati in formato json
    echo json_encode($notizie);

?>