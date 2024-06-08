<?php

    $host = "162.241.61.20";
    $username = "farias54_wp767";
    $password = ")8Wg0.3SpZ";
    $dbname = "farias54_wp_aceda";

    $conn = mysqli_connect($host, $username, $password) or die ("Não foi possível conectar");

    mysqli_select_db($conn,$dbname);


?>