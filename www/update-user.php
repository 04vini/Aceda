<?php

    /*session_start();
    ob_start();
    include_once 'conexao_login.php';
    
    if((!isset($_SESSION['id'])) AND (!isset($_SESSION['nome']))){
        $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Necessário realizar o login para acessar a página!</p>";
        header("Location: Login.php");
    }*/

    include "./conexao.php";

    if (isset($_POST) && !empty($_POST)) 
    {
        
        $id = $_GET['id'];
        $nomeUser = isset($_POST['nomeUser']) ? $_POST['nomeUser'] : NULL ;

        $emailUser = isset($_POST['emailUser']) ? $_POST['emailUser'] : NULL;



        //Query de atualização dos dados no banco
        $query = "UPDATE tb_usuarios SET nome='$nomeUser', usuario='$emailUser', senha_usuario='$senhaUser' WHERE id= ".$id;

        $res = mysqli_query($conn, $query);
        header("Location: ./adm-usuarios.php?mensagem=Usuário editado com Sucesso!");
        exit();

    } 
    else if (isset($_GET["id"]) && !empty($_GET["id"]))
    {

        $query = "SELECT * FROM tb_usuarios where id = ".$_GET["id"];

        $res = mysqli_query($conn, $query);

        $dados = mysqli_fetch_array($res);

        $id = $dados["id"];
        $nomeUser = $dados["nome"];
        $emailUser = $dados["usuario"];
        $senhaUser = $dados["senha_usuario"];


    }else {
        header("Location: ./adm-usuarios.php?mensagem=Selecione um usuário para editar");
        exit();
    }



?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editando Post</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body">
    <div class=>
        <div class="col-md-4 p-2 m-5">
            <form class="card p-1" method="post" enctype="multipart/form-data" />
                <div class="mb-3">
                    <label class="form-label m-2" for="nomeUser">Nome do Usuário</label>
                    <input type="text" name="nomeUser" id="nomeUser" required class="form-control" value="<?php echo $nomeUser;?>" />

                    <div data-mdb-input-init class="form-outline">
                        <label class="form-label m-2" for="emailUser">Email</label>
                        <input type="email" name="emailUser" id="emailUser" class="form-control" value="<?php echo $emailUser;?>">
                    </div>                    

                    <br>
                    <a href="./adm-usuarios.php?mensagem=Nenhuma alteração realizada!" class="btn btn-outline-warning">Voltar</a>
                    <button type="submit" class="btn btn-primary text-white">Alterar</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>