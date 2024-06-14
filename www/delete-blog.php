<?php

    session_start();
    ob_start();
    include_once 'conexao.php';
    
    if((!isset($_SESSION['id'])) AND (!isset($_SESSION['nome']))){
        $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Necessário realizar o login para acessar a página!</p>";
        header("Location: Login.php");
    }


    if (isset($_GET["id"]) && !empty($_GET["id"])) 
    {
        include "./conexao.php";
        
        $query = "DELETE FROM tb_blog where id = ".$_GET["id"];

        $res = mysqli_query($conn, $query);

        if ($res) {
            header("Location: ./adm-blog.php?mensagem=Excluído com sucesso");
            exit();
        
        }else {
            header("Location: ./adm-blog.php?mensagem=Ocorreu algum erro");
            exit();
        }


    
    }
    else 
    {
        header("location: ./upload.php?mensagem=Selecione um usuário para apagar");
        exit();

    }





?>