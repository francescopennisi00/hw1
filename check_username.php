<?php

    //CONTROLLA CHE LO USERNAME NON SIA GIA' IN USO

    $conn = mysqli_connect("localhost","root","","hw1");

    $username = mysqli_real_escape_string($conn,$_GET["param"]);

    $query = "SELECT username FROM users WHERE username = '".$username."'";
    $res = mysqli_query($conn,$query);

    //ritorno al client un json che contiene un booleano che indice se lo username è già presente o meno nel database
    //se la query torna almeno una riga (ne tornerà una sola perchè username è unique) array['exists'] = true (username già in uso) altrimenti è false (username disponibile)
    echo json_encode(array('exists' => mysqli_num_rows($res) > 0 ? true : false));

    mysqli_close($conn);
?>