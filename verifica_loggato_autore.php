<?php 

    require_once 'auth.php';         

    //chiamo checkAuth() in modo che se c'è un cookie valido venga settata la variabile di sessione
    //dentro checkAuth() viene comunque richiamata session_start() per cui vengono recuperate tutte le variabili di sessione attive 
    //se non viene settata si viene rimbalzati alla pagina di login
    if (!checkAuth()) {
        // Vai alla login
        header("Location: login.php");
        exit;
    }

    if ($_SESSION["id_user"] == $_POST["user_id"]) {
        echo json_encode(true);
    }
    else echo json_encode(false);
    

?>

