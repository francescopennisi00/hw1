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

      $query = "INSERT INTO likes VALUES($userid,$postid)";

      if ($res = mysqli_query($conn,$query)) {

          //recupero il numero di like aggiornato dal trigger (passo pure l'id del post che mi serve ad identificarlo in javascript)
          $query_nlikes = "SELECT nlikes,id FROM posts WHERE id=$postid";
          $arrayNLikes = array();
          $res2 = mysqli_query($conn,$query_nlikes);
          while ($row = mysqli_fetch_assoc($res2)) {
              $arrayNLikes[] = $row;
          }

          //Libera le risorse e chiude la connessione
          mysqli_free_result($res2);
          mysqli_close($conn);

          echo json_encode($arrayNLikes);
          
      }

?>