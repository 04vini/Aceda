<?php
    include "conexao.php";
     //Validação e tratamento da imagem para inserção no banco
    if (isset($_FILES['imagem-home']) && !empty ($_FILES['imagem-home'])) 
    {
        $imagem = "../img/".$_FILES["imagem-home"]["name"];
        move_uploaded_file($_FILES["imagem-home"]["tmp_name"], $imagem);
    };

     //Query de inserçao dos dados no banco
    $query = "INSERT INTO tb_home_img (imagem) VALUES ('$imagem')";
    $res = mysqli_query($conn, $query);

    header("Location: ./adm-home.php?mensagem=Incluída imagem com sucesso");
    exit();


?>