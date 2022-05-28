<?php

    $FootballStandinsAPIEndpoint = "https://api-football-standings.azharimm.site";
    $url_fetch_classifica = $FootballStandinsAPIEndpoint . "/leagues/ita.1/standings?season=2021&sort=asc";  //FORMATO RICHIESTA GET

    $curl = curl_init();

    curl_setopt($curl,CURLOPT_URL,$url_fetch_classifica);

    //restituisce il risultato come stringa, ma la stringa in questione contiene la classifica già in formato json
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);

    //eseguo la fetch e metto il risultato dentro la variabile result
    $result = curl_exec($curl);

    curl_close($curl);
    
    echo $result;
?>