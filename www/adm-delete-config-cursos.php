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
        
        $query = "DELETE FROM tb_configcursos where id = ".$_GET["id"];

        $res = mysqli_query($conn, $query);

        if ($res) {
            header("Location: ./adm-config-cursos.php?mensagem=Curso excluído com sucesso");
            exit();
        
        }else {
            header("Location: ./adm-config-cursos.php?mensagem=Ocorreu algum erro");
            exit();
        }


    
    }
    else 
    {
        header("location: ./adm-config-cursos.php?mensagem=Selecione um Curso para apagar");
        exit();

    }





?>