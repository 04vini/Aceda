<?php

    $host = "localhost";
    $username = "root";
    $password = "Ronaldodasilva@1";
    $dbname = "db_aceda";

    $conn = mysqli_connect($host, $username, $password) or die ("Não foi possível conectar");

    mysqli_select_db($conn,$dbname);


?>