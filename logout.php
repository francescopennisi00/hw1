<?php
    
    #CANCELLA I DATI DI SESSIONE E RITORNA ALLA LOGIN

    //in questo modo si recuperano tutte le variabili di sessione settate
    session_start();

    //distruggo tali variabili
    session_destroy();

    //SE DEI COOKIE SONO STATI SETTATI, DEVO CANCELLARLI

    if (isset($_COOKIE['id_user']) && isset($_COOKIE['token']) && isset($_COOKIE['cookie_id'])) { 

        $conn = mysqli_connect("localhost", "root", "", "hw1") or die(mysqli_error($conn));

        // Leggo i dati dei cookie settati
        $cookieid = mysqli_real_escape_string($conn, $_COOKIE['cookie_id']);
        $userid = mysqli_real_escape_string($conn, $_COOKIE['id_user']);

        // Ricerco i cookie dell'utente nel database
        $res = mysqli_query($conn, "SELECT id, hash FROM cookies WHERE id = $cookieid AND id_user = $userid");
        if ($cookie = mysqli_fetch_assoc($res)) { 
            // Se viene restituito qualcosa verifico che il token del client sia ancora valido
            // (altrimenti sarà già stato eliminato nella checkAuth)
            if (password_verify($_COOKIE['token'], $cookie['hash'])) {

                // Elimino sia dal DB che dal cookie
                mysqli_query($conn, "DELETE FROM cookies WHERE id = $cookieid");

                setcookie('id_user', '');
                setcookie('cookie_id', '');
                setcookie('token', '');
            }
        }
        mysqli_close($conn);
    }

    //reindirizza alla login
    header("Location: login.php");
?>