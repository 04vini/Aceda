<?php

    session_start();
    ob_start();
    include_once 'conexao.php';
    
    if((!isset($_SESSION['id'])) AND (!isset($_SESSION['nome']))){
        $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Necessário realizar o login para acessar a página!</p>";
        header("Location: Login.php");
    }


    include "conexao.php";

    $nomeServico = isset($_POST['nome-servico']) ? $_POST['nome-servico'] : NULL ;

    $descricaoServico = isset($_POST['descricao-servico']) ? $_POST['descricao-servico'] : NULL;

    //Validação e tratamento da imagem para inserção no banco
    if (isset($_FILES['imagem-servico']) && !empty ($_FILES['imagem-servico'])) 
    {
        $imagemServico = "./assets/img/".$_FILES["imagem-servico"]["name"];
        move_uploaded_file($_FILES["imagem-servico"]["tmp_name"], $imagemServico);
    };

    //Query de inserçao dos dados no banco
    $query = "INSERT INTO tb_servico_home (nome, descricao, imagem_servico) VALUES ( '$nomeServico', '$descricaoServico', '$imagemServico')";
    $res = mysqli_query($conn, $query);

    header("Location: ./adm-home.php?mensagem=Incluído Serviço com sucesso");
    exit();



?>