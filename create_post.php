<?php 
    require_once 'auth.php';

    //chiamo checkAuth() in modo che se c'è un cookie valido venga settata la variabile di sessione 
    //dentro checkAuth() viene comunque richiamata session_start() per cui vengono recuperate tutte le variabili di sessione attive
    //se non viene settata si viene rimbalzati alla pagina di login
    if (!checkAuth()) {
        header("Location: login.php");
        exit;
    }

    //se vengono ricevuti dati dal form (provenienti dalla textarea dalla pagina stessa) inserisco nel DB e reinderizzo nella home page community
    if(isset($_POST["content"])) {

        $conn = mysqli_connect("localhost","root","","hw1");
        $userid = mysqli_real_escape_string($conn,$_SESSION["id_user"]);
        $contenuto = mysqli_real_escape_string($conn,$_POST["content"]);
        $query = "INSERT INTO posts (id_user,nlikes,ncomments,content) VALUES ($userid,0,0,'". $contenuto ."')";
        if ($res = mysqli_query($conn,$query)) {
            mysqli_close($conn);
            header ("Location: community.php");
            exit;
        }

    }

?>

<!DOCTYPE html>
    
    <head>
        <title>MilanWeb24 - Community: Crea post</title>
        <link rel="stylesheet" href="common_code/common_style.css" />
        <link rel="stylesheet" href="style/create_post.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="create_post.js" defer></script>
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
            
            <main>

               <header>
                   <a href="community.php">
                        <img src="images/esci.png" />
                    </a>
                   <h3> Crea un post </h3> 
                   <button> Pubblica </button>
               </header>

               <section> <!-- questa sezione racchiude i dati dell'utente loggato (ottenuti tramite fetch) seguiti dalla textarea-->
                    
                    <div></div>
                
                    <form id = "textarea" method="post">
                    </form>
                    <textarea form="textarea" name = "content" placeholder="A cosa stai pensando?"></textarea>

                </section>

           </main>

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