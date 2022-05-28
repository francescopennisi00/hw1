<?php

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

    $risultati = array();

    $query = "SELECT L.postid AS postid, U.username AS username, L.userid AS userid FROM likes L JOIN users U ON L.userid = U.id WHERE L.postid = $postid";

    $res = mysqli_query($conn,$query);

    while($row = mysqli_fetch_assoc($res)) {
        $risultati[] = $row;
    }

    echo json_encode($risultati);
          
    //Libera le risorse e chiude la connessione
    mysqli_free_result($res);
    mysqli_close($conn);

?>