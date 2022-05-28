<?php

    //Connessione al database
    $conn = mysqli_connect("localhost","root","","hw1");
    //inizializza l'array di notizie
    $notizie = array();
    //query al database per mostrare fino a 100 notizie in ordine di tempo dalle più recenti alle meno recenti
    $res = mysqli_query($conn,"SELECT id, immagine, titolo, data_pubblicazione, ora_pubblicazione FROM notizia ORDER BY data_pubblicazione DESC, ora_pubblicazione DESC LIMIT 50");
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