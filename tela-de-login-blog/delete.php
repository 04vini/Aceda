<?php

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