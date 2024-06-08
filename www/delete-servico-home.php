<?php

    if (isset($_GET["id"]) && !empty($_GET["id"])) 
    {
        include "./conexao.php";
        
        $query = "DELETE FROM tb_servico_home where id = ".$_GET["id"];

        $res = mysqli_query($conn, $query);

        if ($res) {
            header("Location: ./adm-home.php?mensagem=Serviço excluído com sucesso");
            exit();
        
        }else {
            header("Location: ./adm-home.php?mensagem=Ocorreu algum erro");
            exit();
        }


    
    }
    else 
    {
        header("location: ./upload.php?mensagem=Selecione um Serviço para apagar");
        exit();

    }





?>