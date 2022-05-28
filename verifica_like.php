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

    $userid = mysqli_real_escape_string($conn,$_SESSION['id_user']);
    $postid = mysqli_real_escape_string($conn,$_POST["postid"]);  //passato con post al richiamo della fetch 

    $query = "SELECT * FROM likes WHERE userid = $userid AND postid = $postid";

    $res = mysqli_query($conn,$query);

    //passo nel json l'id del post per poterlo identificare in javascript

    if (mysqli_num_rows($res) > 0) {
        echo json_encode(array("id_post" => $postid, "like" => true)); 
    }
    else {
        echo json_encode(array("id_post" => $postid, "like" => false)); 
    }

          
    //Libera le risorse e chiude la connessione
    mysqli_free_result($res);
    mysqli_close($conn);

?>