<?php  

    //PAGINA DEL PROFILO DELL'UTENTE (CONTIENE TUTTI I POST DELL'UTENTE)    

    require_once 'auth.php';         

    //chiamo checkAuth() in modo che se c'è un cookie valido venga settata la variabile di sessione
    //dentro checkAuth() viene comunque richiamata session_start() per cui vengono recuperate tutte le variabili di sessione attive 
    //se non viene settata si viene rimbalzati alla pagina di login
    if (!checkAuth()) {
        // Vai alla login
        header("Location: login.php");
        exit;
    }


?>
<!DOCTYPE html>
    <head>
        <title> MilanWeb24 - Community - @<?php     
                                               $conn = mysqli_connect("localhost","root","","hw1");
                                               $userid = mysqli_real_escape_string($conn,$_POST["id_user"]);
                                               $query = "SELECT username,name,surname FROM users WHERE id=$userid";
                                               $res = mysqli_query($conn,$query);
                                               $row = mysqli_fetch_assoc($res);
                                               $username = $row["username"];
                                               $name = $row["name"];
                                               $surname = $row["surname"];
                                               echo $username;    
                                               mysqli_free_result($res);                  
                                           ?></title>
        <link rel="stylesheet" href="common_code/common_style.css" />
        <link rel="stylesheet" href="style/community.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="community_user.js" defer></script>
        <script src="common_code/common_script.js" defer></script>
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,200&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    </head>
    <body>
        <article>
            <nav id="links">
                <a href="home.html">HOME</a> 
                <a href="stagione.html">STAGIONE</a>  
                <a href="login.php">COMMUNITY</a>  
            </nav>
            <div id="menu" class="hidden">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div id="menu_view" class="hidden">
                <a href="home.html">HOME</a>
                <a href="stagione.html">STAGIONE</a>  
                <a href="login.php">COMMUNITY</a> 
                <em>Chiudi menu</em>
            </div>
            <header id="upper_header">
                <div id="spazio_nero"></div>
                <img src="images/logo_pagina.png" />  
            </header>
            <h1>
                <?php
                    echo "$name". " " . "$surname" . " - @" . "$username";        
                ?>
            </h1>
            <header id="navbar_user_logout">
                <div>
                    <!-- l'attributo dataset serve per generare la pagina dinamica dell'utente al click sullo username-->
                    <a id = "user_button" class="gold" data-id-user=<?php
                                                                        echo $_SESSION["id_user"];    
                                                                    ?>
                    
                    >@<?php
                            
                            //non posso usare la variabile di sessione username poichè questa è settata solo se nella sessione corrente si è fatto il signup
                            $conn = mysqli_connect("localhost","root","","hw1");
                            $user_id = mysqli_real_escape_string($conn,$_SESSION["id_user"]);
                            $query = "SELECT username FROM users WHERE id=$user_id";
                            $results = mysqli_query($conn,$query);
                            $entry = mysqli_fetch_assoc($results);
                            echo $entry["username"];
                            mysqli_free_result($results);  
                            mysqli_close($conn);  
                            
                        ?> 
                    </a>
                    <a class="gold" href="logout.php">Logout</a>
                </div>
                <a id="button_new_post" href="create_post.php">Nuovo Post</a>
            </header>
            <section id="main" <?php

                                    $id_utente = $_POST["id_user"];
                                    echo "data-id-utente-pagina-attiva = $id_utente";
                                    //serve per passarlo alla fetch in javascript per la visualizzazione dei post

                                ?>>
                
                <!-- qui dentro ci saranno i postdell'utente prelevati dal database-->
                
            </section>
            
            <footer>
                <img src="images/logo_milan.png">  
                <p>
                    Universita' di Catania Web Programming 2022 </br>
                    Realizzato da Francesco Pennisi
                </p>
                <img src="images/nuovo-logo-unict.png">  
            </footer>
        </article>
    </body>
</html>