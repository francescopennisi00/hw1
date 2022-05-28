<?php 
    require_once 'auth.php';

    //chiamo checkAuth() in modo che se c'è un cookie valido venga settata la variabile di sessione 
    //dentro checkAuth() viene comunque richiamata session_start() per cui vengono recuperate tutte le variabili di sessione attive
    //se non viene settata si viene rimbalzati alla pagina di login
    if (!checkAuth()) {
        header("Location: login.php");
        exit;
    }

    //se vengono ricevuti dati dal form dal DB e reinderizzo nella home page community
    if(isset($_POST["id_post"])) {

        $conn = mysqli_connect("localhost","root","","hw1");
        $userid = mysqli_real_escape_string($conn,$_SESSION["id_user"]);
        $postid = mysqli_real_escape_string($conn,$_POST["id_post"]);
        $query = "DELETE FROM posts WHERE id = $postid AND id_user = $userid";
        if ($res = mysqli_query($conn,$query)) {
            mysqli_close($conn);
            header ("Location: community.php");
            exit;
        }

    }

?>