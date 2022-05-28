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
    $query = "SELECT name,surname,username FROM users WHERE id=$userid";

    $res = mysqli_query($conn,$query);  //la query tornerà una sola riga in quanto lo user_id è primary key

    $row = mysqli_fetch_assoc($res);  
    
    echo json_encode($row);

    mysqli_free_result($res);
    mysqli_close($conn);
    
?>
                        