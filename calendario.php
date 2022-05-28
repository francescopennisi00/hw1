<?php

    //Connessione al database
    $conn = mysqli_connect("localhost","root","","hw1");

    //inizializza l'array di punteggi
    $punteggi = array();

    //query al database per mostrare i risultati stagionali in ordine di tempo dalle più recenti alle meno recenti
    $query = "SELECT P.competizione,P.giornata,P.stadio,P.data_partita,P.orario,SC.logo AS logo_casa, SC.nome_completo AS casa, P.punteggio_casa, P.punteggio_trasferta, ST.nome_completo AS trasferta, ST.logo AS logo_trasferta FROM partite_Milan P JOIN squadra SC JOIN squadra ST WHERE P.id_casa = SC.id AND P.id_trasferta = ST.id ORDER BY P.data_partita DESC";
    
    //esecuzione query
    $res = mysqli_query($conn,$query);

    while($row = mysqli_fetch_assoc($res))
    {
        $punteggi[] = $row;
    }

    //Libera le risorse e chiude la connessione
    mysqli_free_result($res);
    mysqli_close($conn);
    
    //Ritorna i risultati in formato json
    echo json_encode($punteggi);
?>