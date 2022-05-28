<?php

    require_once "auth.php";

    if (checkAuth()) {
        header("Location: community.php");
        exit;
    }  

    # controllo la validità dei dati inseriti e prima di tutto se sono effettivamente stati inseriti
    if (isset($_POST["nome"]) && isset($_POST["cognome"]) && isset($_POST["email"]) && isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST['conferma_password']) && isset($_POST["allow"])) 
    {

        $errore = array();  //array che eventualmente conterrà le stringhe di errore
        $conn = mysqli_connect("localhost","root","","hw1");


        #VALIDAZIONE NOME

        //controllo che il nome inserito sia composto di sole lettere e che sia maiuscolo
        if(!preg_match('/^[A-Za-z ]{2,30}$/',$_POST["nome"])) {
            //se il pattern non è rispettato memorizzo l'errore (sotto forma di stringa) in un array
            $errore[] = "Nome non valido!";
        } else if (!preg_match('/^[A-Z]$/',substr($_POST["nome"],0,1))) {
            //se il nome non è maiuscolo memorizzo l'errore (sotto forma di stringa) in un array
            $errore[] = "Il nome deve essere maiuscolo!";
        }


        #VALIDAZIONE COGNOME

        //controllo che il cognome inserito sia composto di sole lettere e che sia maiuscolo
        if(!preg_match('/^[A-Za-z ]{2,30}$/',$_POST["cognome"])) {
            //se il pattern non è rispettato memorizzo l'errore (sotto forma di stringa) in un array
            $errore[] = "Cognome non valido!";
        } else if (!preg_match('/^[A-Z]$/',substr($_POST["cognome"],0,1))) {
            //se il cognome non è maiuscolo memorizzo l'errore (sotto forma di stringa) in un array
            $errore[] = "Il cognome deve essere maiuscolo!";
        }


        #VALIDAZIONE USERNAME

        //lo user name deve avere solo lettere minuscole o maiuscole e numeri con un numero di caratteri minimo di 1 e massimo di 20
        //preg_match controlla che una stringa rispetti un certo pattern di regular espression
        if (!preg_match('/^[a-zA-Z0-9_]{1,20}$/', $_POST["username"])) {
            //se il pattern non è rispettato memorizzo l'errore (sotto forma di stringa) in un array
            $errore[] = "Username non valido: inserire un numero massimo di 15 caratteri alfanumerici!";
        }
        else {
            $username = mysqli_real_escape_string($conn,$_POST["username"]);
            $query = "SELECT username FROM users WHERE username='$username'";
            $res = mysqli_query($conn,$query);
            //controllo se lo username esiste già e in tal caso memorizzo l'errore (sotto forma di stringa) in un array
            if (mysqli_num_rows($res) > 0) {
                $errore[] = "Username già esistente!";
            }
        }

        #VALIDAZIONE PASSWORD

        //la password deve essere di almeno 8 caratteri, in caso contrario memorizzo l'errore (sotto forma di stringa) in un array
        if (strlen($_POST["password"]) < 8) {
            $errore[] = "La password è troppo corta: inserire una password di almeno 8 caratteri!";
        }
        //controllo che le due password (la prima e quella di conferma) inserite siano identiche 
        if (strcmp($_POST["password"],$_POST["conferma_password"]) != 0) {
            $errore[] = "La password di conferma non coincide con la precedente!";
        }

        #VALIDAZIONE EMAIL

        //filter_var verifica che il campo email che ci viene passato sia valido (cioè rispetti il formato delle mail)
        if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $errore[] = "Email non valida!";
        } 
        else {  //controllo che l'email inserita non sia stata già utilizzata
           $email = mysqli_real_escape_string($conn,strtolower($_POST["email"]));
           $res = mysqli_query($conn,"SELECT email FROM users WHERE email = '$email'");
           if (mysqli_num_rows($res) > 0) {
               $errore[] = "Email già in uso!";
           }
        }

        #CONTROLLO DELL'ACCONSENTIMENTO AI TRATTAMENTO DEI DATI PERSONALI LATO CLIENT 


        #NEL CASO IN CUI NON CI SIANO STATI ERRORI AVVIENE LE REGISTRAZIONE NEL DATABASE
        if (count($errore) == 0) {
            $name = mysqli_real_escape_string($conn,$_POST["nome"]);
            $surname = mysqli_real_escape_string($conn,$_POST["cognome"]);
            $password = mysqli_real_escape_string($conn,$_POST["password"]);
            //anzichè memorizzare in chiaro la password nel DB, ne memorizzo un hash
            $password = password_hash($password, PASSWORD_BCRYPT);

            $query = "INSERT INTO users(username, password, name, surname, email) VALUES ('$username', '$password', '$name', '$surname', '$email')";

            //se l'esecuzione della query ritorna vero (l'utente è stato registrato) imposto delle variabili di sessione in modo che
            // l'utente appena registrato non debba rifare il login per accedere
            if (mysqli_query($conn,$query)) {

                //avvio la sessione
                session_start();

                $_SESSION["username"] = $_POST["username"];

                //UTILE PER I COOKIE 
                //memorizzo l'id dell'utente che è stato appena registrato tramite la funzione mysqli_insert_id che ritorno l'ultimo id 
                //inserito nel database tramite l'ultima query eseguita
                $_SESSION['id_user'] = mysqli_insert_id($conn);

                #libero le risorse, chiudo la connessione 
                mysqli_free_result($res);
                mysqli_close($conn);

                #reindirizzo verso la home community
                header('Location: community.php');

                #arresto lo script php
                exit;
            }
            else {
                $errore[] = "Errore di connessione al database!";
            }

        }

    }
?>

<!DOCTYPE html>
    <head>
        <title>MilanWeb24: Iscriviti alla Community</title>
        <link rel="stylesheet" href="common_code/common_style.css" />
        <link rel="stylesheet" href="style/signup_login.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,200&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <script src="signup.js" defer></script>
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

            <h1> Registrati alla community MilanWeb24</h1>

            <main>

                <div>
                    <img src="images/coreografia.jpg" />
                </div>

                <form method = "post">

                    <p>
                        <label>Nome<input type="text" name="nome"></label>
                        <span class="hidden">
                    </p>

                    <p>
                        <label>Cognome<input type="text" name="cognome"></label>
                        <span class="hidden">
                    </p>

                    <p>
                        <label>Email<input type="text" name="email"></label>
                        <span class="hidden">
                    </p>

                    <p>
                        <label>Username<input type="text" name="username"></label>
                        <span class="hidden">
                    </p>

                    <p>
                        <label>Password<input type="password" name="password"></label>
                        <span class="hidden">
                    </p>

                    <p>
                        <label>Conferma password<input type="password" name="conferma_password"></label>
                        <span class="hidden">
                    </p>

                    <p>
                        <label>Acconsento al trattamento dei dati personali<input type="checkbox" name="allow" value="confermed"></label>
                        <span class="hidden">
                    </p>

                    <p>
                        <label>&nbsp;<input type="submit" value="Registrati"></label>
                    </p>

                    <div id="link">
                        <!-- faccio spazio tra il punto interrogativo ed il link-->
                        <div>Hai già un account? &nbsp; <a href="login.php"> Accedi</a></div>
                    </div>            

                </form>

            </main>

            <?php

                if (isset($errore)) {
                    echo '<div id="alert">';
                    echo "<span>Messaggi dal server: </span>";
                    foreach ($errore as $stringa) {
                        echo "<span>$stringa</span>";
                    }
                       echo "</div>";
                }
                    
            ?>


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