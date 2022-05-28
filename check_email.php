<?php

    //CONTROLLA CHE L'EMAIL NON SIA GIA' IN USO

    $conn = mysqli_connect("localhost","root","","hw1");

    $email = mysqli_real_escape_string($conn,$_GET["param"]);

    $query = "SELECT email FROM users WHERE email = '".$email."'";
    $res = mysqli_query($conn,$query);

    //ritorno al client un json che contiene un booleano che indice se l'email è già presente o meno nel database
    //se la query torna almeno una riga (ne tornerà una sola perchè email è unique) array['exists'] = true (email) già in uso) altrimenti è false (email disponibile)
    echo json_encode(array('exists' => mysqli_num_rows($res) > 0 ? true : false));

    mysqli_close($conn);
?>