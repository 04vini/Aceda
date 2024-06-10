<?php

    /*session_start();
    ob_start();
    include_once 'conexao_login.php';
    
    if((!isset($_SESSION['id'])) AND (!isset($_SESSION['nome']))){
        $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Necessário realizar o login para acessar a página!</p>";
        header("Location: Login.php");
    }*/

    include "conexao.php";

    $nomeUser = isset($_POST['nomeUser']) ? $_POST['nomeUser'] : NULL ;

    $emailUser = isset($_POST['emailUser']) ? $_POST['emailUser'] : NULL;

    $senhaUser = isset($_POST['senhaUser']) ? $_POST['senhaUser'] : NULL;

    //Query de inserçao dos dados no banco
    $query = "INSERT INTO tb_usuarios (nome, usuario, senha_usuario) VALUES ( '$nomeUser', '$emailUser', '$senhaUser')";
    $res = mysqli_query($conn, $query);

    header("Location: ./adm-usuarios.php?mensagem=Usuário Criado com sucesso");
    exit();



?>