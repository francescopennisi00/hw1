<?php
    //connessione al database
    $conn = mysqli_connect("localhost","root","","hw1");

    //query al database per prelevare la notizia
    $id_notizia = mysqli_real_escape_string($conn,$_GET["id_notizia"]);
    $res = mysqli_query($conn,"SELECT * FROM notizia WHERE id = $id_notizia");

    //dichiaro l'array di risultati (conterà un solo elemento pouichè l'id della notizia è una chiave primaria)
    $risultato = array();

    while($row = mysqli_fetch_assoc($res)) {
        $risultato[] = $row;
    }

    //libero le risorse e chiudo la connessione
    mysqli_free_result($res);
    mysqli_close($conn);

    //ritorno il json 
    echo json_encode($risultato);
?>