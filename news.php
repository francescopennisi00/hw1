<!DOCTYPE html>
    <head>
        <title>Titolo notizia</title>
        <link rel="stylesheet" href="common_code/common_style.css" />
        <link rel = "stylesheet" href="style/news.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Patua+One&family=Volkhov&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,200&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <script src="common_code/common_script.js" defer></script>
        <script src="news.js" defer></script>
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

            <!-- qui troviamo la sezione principale della pagina -->
            <section id = "main" <?php
                                    
                                    $id_notizia = $_POST["id_notizia"];
                                    echo "data-id-notizia = $id_notizia";  
                                    //serve per passarlo alla fetch in javascript per la visualizzazione della notizia

                                  ?>>

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

