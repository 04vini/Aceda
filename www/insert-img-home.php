<?php
    include "conexao.php";
    //Validação e tratamento da imagem para inserção no banco

//imagem 1 do carousel 
    if (isset($_FILES['imagem1-home']) && !empty ($_FILES['imagem1-home'])) 
    {
        $imagem = "../img/".$_FILES["imagem1-home"]["name"];
        move_uploaded_file($_FILES["imagem1-home"]["tmp_name"], $imagem);
    };

     //Query de inserçao dos dados no banco
    $query = "INSERT INTO tb_home_img (imagem) VALUES ('$imagem')";
    $res = mysqli_query($conn, $query);

    header("Location: ./adm-home.php?mensagem=Incluída imagem com sucesso");
    exit();

//imagem 2 do carousel 
    if (isset($_FILES['imagem2-home']) && !empty ($_FILES['imagem2-home'])) 
    {
        $imagem = "../img/".$_FILES["imagem2-home"]["name"];
        move_uploaded_file($_FILES["imagem2-home"]["tmp_name"], $imagem);
    };

    //Query de inserçao dos dados no banco
    $query = "INSERT INTO tb_home_img (imagem) VALUES ('$imagem')";
    $res = mysqli_query($conn, $query);

    header("Location: ./adm-home.php?mensagem=Incluída imagem com sucesso");
    exit();

//imagem 3 do carousel 
    if (isset($_FILES['imagem3-home']) && !empty ($_FILES['imagem3-home'])) 
    {
        $imagem = "../img/".$_FILES["imagem3-home"]["name"];
        move_uploaded_file($_FILES["imagem3-home"]["tmp_name"], $imagem);
    };

     //Query de inserçao dos dados no banco
    $query = "INSERT INTO tb_home_img (imagem) VALUES ('$imagem')";
    $res = mysqli_query($conn, $query);

    header("Location: ./adm-home.php?mensagem=Incluída imagem com sucesso");
    exit();


?>