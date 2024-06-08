<?php

    include "conexao.php";

    $text = isset($_POST['text-home']) ? $_POST['text-home'] : "Não configurado!" ;

    //Query de inserçao do texto da home
    $query = "INSERT INTO tb_text_home (text) VALUES ( '$text')";
    $res = mysqli_query($conn, $query);

    header("Location: ./adm-home.php?mensagem=Incluído o texto com sucesso");
    exit();




?>