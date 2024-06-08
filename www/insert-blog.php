<?php
    include "conexao.php";

    //Validação dos dados do form
    $titulo = isset($_POST['title-post']) ? $_POST['title-post'] : NULL ;

    $descricao = isset($_POST['text-post']) ? $_POST['text-post'] : NULL;

    //Validação e tratamento da imagem para inserção no banco
    if (isset($_FILES['imagem']) && !empty ($_FILES['imagem'])) 
    {
        $imagem = "../img/".$_FILES["imagem"]["name"];
        move_uploaded_file($_FILES["imagem"]["tmp_name"], $imagem);
    };

    //Query de inserçao dos dados no banco
    $query = "INSERT INTO tb_blog (titulo, descricao, imagem) VALUES ( '$titulo', '$descricao', '$imagem')";
    $res = mysqli_query($conn, $query);

    header("Location: ./adm-blog.php?mensagem=Incluído com sucesso");
    exit();

    
    
?>






