<?php

    function getTime($timestamp) {    

        // CALCOLA IL TEMPO TRASCORSO DALLA PUBBLICAZIONE DEL POST
        
        //strtotime prende in ingresso una stringa che descrive un certo tempo e la converte in formato Unix timestamp 
        //(numero di secondi trascorsi dall' 1 gennaio 1970 alle 00:00:00)
        //quindi salviamo in old il valore del timestamp al momento della pubblicazione del post
        $old = strtotime($timestamp); 

        //time permette di conoscere il valore attuale del timestamp
        $diff = time() - $old;

        //in old mettiamo la data di pubblicazione (formato gg/mm/aaaa) convertendo il timestamp relativo al momento della pubblicazione
        $old = date('d/m/y', $old);


        //se sono passati meno di 60 secondi
        if ($diff /60 <1) {
            //intval ritona il valore intero dell'argomento
            return intval($diff%60)." secondi fa";

        
        //se è passato esattamente un minuto
        } else if (intval($diff/60) == 1)  {
            return "Un minuto fa";  


        //se è passata meno di un'ora
        } else if ($diff / 60 < 60) {
            return intval($diff/60)." minuti fa";


        //se è passata esattamente un'ora
        } else if (intval($diff / 3600) == 1) {
            return "Un'ora fa";


        //se sono passate meno di 24 ore
        } else if ($diff / 3600 <24) {
            return intval($diff/3600) . " ore fa";


        //se è passato esattamente un giorno
        } else if (intval($diff/86400) == 1) {
            return "Ieri";


        //se è passato meno di un mese
        } else if ($diff/86400 < 30) {
            return intval($diff/86400) . " giorni fa";


        } else {
            return $old; 
        }
    }
    

    require_once 'auth.php';

    //chiamo checkAuth() in modo che se c'è un cookie valido venga settata la variabile di sessione 
    //dentro checkAuth() viene comunque richiamata session_start() per cui vengono recuperate tutte le variabili di sessione attive
    //se non viene settata si viene rimbalzati alla pagina di login
    if (!checkAuth()) {
        header("Location: login.php");
        exit;
    }

    //preleva dal database gli ultimi 100 post o tutti, se sono meno di 100

    $conn = mysqli_connect("localhost","root","","hw1");

    //inizializzo l'array di informazioni utenti (conterrà un solo elemento)
    $risultati = array();

    //query per ottenere i dati dei vari post
    $query = "SELECT P.id AS id_post, P.id_user AS id_user, P.content AS content,P.nlikes AS nlikes,P.ncomments AS ncomments,
              U.username AS username,P.time AS time
              FROM posts P JOIN users U ON P.id_user = U.id  ORDER BY time DESC LIMIT 100";
    $res = mysqli_query($conn,$query);

    while($row = mysqli_fetch_assoc($res)) {
        $risultati[] = array("id_post" => $row["id_post"], "id_user" => $row["id_user"], "content" => $row["content"], "nlikes" => $row["nlikes"],
                             "ncomments" => $row["ncomments"], "username" => $row["username"], "time" => getTime($row["time"]));
    }

    //Libera le risorse e chiude la connessione
    mysqli_free_result($res);
    mysqli_close($conn);
    
    echo json_encode($risultati);

?>