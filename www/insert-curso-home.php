<?php

    /*session_start();
    ob_start();
    include_once 'conexao_login.php';
    
    if((!isset($_SESSION['id'])) AND (!isset($_SESSION['nome']))){
        $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Necessário realizar o login para acessar a página!</p>";
        header("Location: Login.php");
    }*/

    include "conexao.php";

    $nomeCurso = isset($_POST['nome-curso']) ? $_POST['nome-curso'] : NULL ;

    $descricaoCurso = isset($_POST['descricao-curso']) ? $_POST['descricao-curso'] : NULL;

    //Validação e tratamento da imagem para inserção no banco
    if (isset($_FILES['imagem-curso']) && !empty ($_FILES['imagem-curso'])) 
    {
        $imagemCurso = "./assets/img/".$_FILES["imagem-curso"]["name"];
        move_uploaded_file($_FILES["imagem-curso"]["tmp_name"], $imagemCurso);
    };

    //Query de inserçao dos dados no banco
    $query = "INSERT INTO tb_curso_home (nome_curso, descricao_curso, imagem_curso) VALUES ( '$nomeCurso', '$descricaoCurso', '$imagemCurso')";
    $res = mysqli_query($conn, $query);

    header("Location: ./adm-home.php?mensagem=Incluído Curso com sucesso");
    exit();



?>