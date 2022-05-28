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

    $userid = mysqli_real_escape_string($conn,$_SESSION["id_user"]);
    $contenuto = mysqli_real_escape_string($conn,$_POST["contenuto"]);
    $postid = mysqli_real_escape_string($conn,$_POST["postid"]);

    $query = "INSERT INTO comments (userid,postid,text) VALUES ($userid,$postid,'". $contenuto ."')";

    if ($res = mysqli_query($conn,$query)) {

        //recupero il numero di commenti aggiornato dal trigger (passo pure l'id del post che mi serve ad identificarlo in javascript)
        $query_ncomments = "SELECT ncomments,id FROM posts WHERE id=$postid";
        $arrayNComments = array();
        $res2 = mysqli_query($conn,$query_ncomments);
        while ($row = mysqli_fetch_assoc($res2)) {
            $arrayNComments[] = $row;
        }

        //Libera le risorse e chiude la connessione
        mysqli_free_result($res2);
        mysqli_close($conn);

        echo json_encode($arrayNComments);
        
    }
?>