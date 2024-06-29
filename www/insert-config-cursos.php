<?php

    session_start();
    ob_start();
    include_once 'conexao.php';
    
    if((!isset($_SESSION['id'])) AND (!isset($_SESSION['nome']))){
        $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Necessário realizar o login para acessar a página!</p>";
        header("Location: Login.php");
    }

    include "./conexao.php";

    $curso = isset($_POST['curso_label']) ? $_POST['curso_label'] : NULL ;

    //Query de inserçao dos dados no banco
    $query = "INSERT INTO tb_configcursos (curso) VALUES ( '$curso')";
    $res = mysqli_query($conn, $query);

    header("Location: ./adm-config-cursos.php?mensagem=Incluído Curso com sucesso");
    exit();



?>