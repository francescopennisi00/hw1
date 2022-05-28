<?php
    
    #GESTISCO SESSIONE GIA' ATTIVA

    include 'auth.php';

    //chiamo checkAuth() in modo che se c'è un cookie valido vengano settate le variabili di sessione
    //dentro checkAuth() viene comunque richiamata session_start() per cui vengono recuperate tutte le variabili di sessione attive
    if (checkAuth()) {
        //vai alla home community e arresta lo script php
        header("Location: community.php");
        exit;
    }

    #CONTROLLO CHE ESISTA UN UTENTE CON LE CRDENZIALI FORNITE


    if(isset($_POST["username"]) && isset($_POST["password"])) {

        $conn = mysqli_connect("localhost","root","","hw1");

        $username = mysqli_real_escape_string($conn,$_POST["username"]);
        $password = mysqli_real_escape_string($conn,$_POST["password"]);

        $query = "SELECT id,username,password FROM users WHERE username='".$username."'";

        $res = mysqli_query($conn,$query);
        if (mysqli_num_rows($res) > 0) {  //cioè 1 perchè lo username è univoco per ogni utente
            $row = mysqli_fetch_assoc($res);

            //ho verificato che lo username indicato è presente nel database

            //adesso verifico se la password è stata inserita correttamente
            #password_verify trasforma la stringa password nel suo hash, che è un'altra stringa, 
            //e confronta quest'ultimo con quello memorizzato nel DB
            if (password_verify($_POST["password"],$row["password"])) {

                //SE L'UTENTE VUOLE ESSERE RICORDATO IMPOSTO UN COOKIE DI 3 GIORNI
                if(isset($_POST["remember"])) {

                    //genero un stringa randomica di 12 byte (un token) e la metto in $token
                    $token = random_bytes(12);
                    // Per motivi di sicurezza, memorizzo nel DB un hash anzichè il token
                    $hash = password_hash($token, PASSWORD_BCRYPT);

                    //setto la durata del cookie di 3 giorni 
                    //(mettendo la data e l'ora di esattamente tre giorni da ora ma in formato timestamp Unix )
                    $time =  strtotime("+3 day");

                    //preparo la query di inserimento nella tabella cookies
                    $query = "INSERT INTO cookies(hash, id_user, time) VALUES('".$hash."',".$row['id'].", ".$time.")";

                    $res1 = mysqli_query($conn, $query) or die(mysqli_error($conn));

                    setcookie("id_user", $row['id'], $time);
                    setcookie("cookie_id", mysqli_insert_id($conn), $time);
                    setcookie("token", $token, $time);

                }

                //SE L'UTENTE NON VUOLE ESSERE RICORDATO IMPOSTO UNA SESSIONE
                else {
                    $_SESSION["username"] = $row['username'];
                    $_SESSION["id_user"] = $row['id'];
                }

                #libero le risorse, chiudo la connessione e arresto lo script php
                mysqli_free_result($res);
                mysqli_close($conn);

                #reindirizzo verso la home community
                header('Location: community.php');

                #arresto lo script php
                exit;
            } 

            else {
                //flag di errore
                $errore = true;
            }

        }

        else {
            //flag di errore
            $errore = true;
        }

    }

?>

<!DOCTYPE html>
    <head>
        <title>MilanWeb24: Accedi alla Community</title>
        <link rel="stylesheet" href="common_code/common_style.css" />
        <link rel="stylesheet" href="style/signup_login.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,200&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <script src="common_code/common_script.js" defer></script>
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

            <h1> Accedi alla community MilanWeb24</h1>

            <main>

                <div>
                    <img src="images/coreografia.jpg" />
                </div>

                <form method = "post">   

                    <?php
                        // Verifica la presenza di errori
                        if(isset($errore))
                        {
                            echo "<p id='errore'>";
                            echo "Credenziali non valide.";
                            echo "</p>";
                        }
                    ?>

                    <p>
                        <label>Username<input type="text" name="username"></label>
                        <span class="hidden">
                    </p>

                    <p>
                        <label>Password<input type="password" name="password"></label>
                        <span class="hidden">
                    </p>

                    <p>
                        <!-- se al momento del submit il checkbox è cliccato il value viene trasmesso al server, altrimenti no-->
                        <label>Ricorda l'accesso<input type="checkbox" name="remember" value="ok"></label>
                    </p>

                    <p>
                        <label>&nbsp;<input type="submit" value="Accedi"></label>
                    </p>


                    <div id="link">
                        <!-- faccio spazio tra il punto interrogativo ed il link-->
                        <div>Non hai ancora un account? &nbsp; <a href="signup.php"> Registrati</a></div>
                    </div>

                </form>


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