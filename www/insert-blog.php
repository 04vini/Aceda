<?php
    
    /*session_start();
    ob_start();
    include_once 'conexao_login.php';
    
    if((!isset($_SESSION['id'])) AND (!isset($_SESSION['nome']))){
        $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Necessário realizar o login para acessar a página!</p>";
        header("Location: Login.php");
    }*/

    include "conexao.php";

    //Validação dos dados do form
    $titulo = isset($_POST['title-post']) ? $_POST['title-post'] : NULL ;

    $descricao = isset($_POST['text-post']) ? $_POST['text-post'] : NULL;

    //Validação e tratamento da imagem para inserção no banco
    if (isset($_FILES['imagem']) && !empty ($_FILES['imagem'])) 
    {
        $imagem = "./assets/img/".$_FILES["imagem"]["name"];
        move_uploaded_file($_FILES["imagem"]["tmp_name"], $imagem);
    };

    //Query de inserçao dos dados no banco
    $query = "INSERT INTO tb_blog (titulo, descricao, imagem) VALUES ( '$titulo', '$descricao', '$imagem')";
    $res = mysqli_query($conn, $query);

    header("Location: ./adm-blog.php?mensagem=Incluído com sucesso");
    exit();

    
    
?>






