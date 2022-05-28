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

    $conn = mysqli_connect("localhost","root","","hw1");

    $postid = mysqli_real_escape_string($conn,$_POST["postid"]);  //passato con post al richiamo della fetch 

    $query = "SELECT C.id AS id_commento, P.id AS id_post, C.userid AS id_user, C.time AS time, C.text AS testo, U.username AS username
            FROM comments C JOIN posts P ON C.postid = P.id JOIN users U ON C.userid = U.id WHERE P.id = $postid ORDER BY time DESC";

    //inizializzo l'array di risultati
    $arrayComments = array();

    $res = mysqli_query($conn,$query);
    
    //se la query non restituisce alcuna riga ritorno solo l'id del post in modo che venga identificato via javascript
    if (mysqli_num_rows($res) == 0) {

        //Libera le risorse e chiude la connessione
        mysqli_free_result($res);
        mysqli_close($conn);

        echo json_encode(array(array("id_post" => $postid))); 
        //faccio questa cosa con il doppio array in modo che lato javascript possa porre "const postid = json[0].id_post sia che la
        //query non restitusca alcuna riga (nessun commento è presente nel post) sia che ne restituisca almeno una 
        //(ci sono commenti presenti nel post), tenendo conto che l'id del post è uguale per tutti i commenti

        exit; //interrompo lo script se la condizione è verificata
    }

    while ($row = mysqli_fetch_assoc($res)) {

        //se l'id dello user coincide con quello dell'utente loggato ritorno un booleano al valore vero, che mi serve lato js per poter fare in modo che l'utente possa eliminare il commento. 
        //Altrimenti ritorno falso
        if ($row["id_user"] == $_SESSION["id_user"]) {
            $delete = true;
        }
        else $delete = false;
        $arrayComments[] = array("id_comm" => $row["id_commento"], "id_post" => $row["id_post"], "id_user" => $row["id_user"],
                            "time" => getTime($row["time"]), "testo" => $row["testo"], "elimina" => $delete, "username" => $row["username"]);
    }

    //Libera le risorse e chiude la connessione
    mysqli_free_result($res);
    mysqli_close($conn);

    echo json_encode($arrayComments);

?>