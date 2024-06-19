<?php

    session_start();
    ob_start();
    include_once 'conexao.php';
    
    if((!isset($_SESSION['id'])) AND (!isset($_SESSION['nome']))){
        $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Necessário realizar o login para acessar a página!</p>";
        header("Location: Login.php");
    }

    include "./conexao.php";

    if (isset($_POST) && !empty($_POST)) 
    {
        
        $id = $_GET['id'];
        $nomeServico = isset($_POST['nome-servico']) ? $_POST['nome-servico'] : NULL ;

        $descricaoServico = isset($_POST['descricao-servico']) ? $_POST['descricao-servico'] : NULL;

        //Validação e tratamento da imagem para inserção no banco
        if (isset($_FILES['imagem-servico']) && !empty ($_FILES['imagem-servico'])) 
        {
            $imagemServico = "./assets/img/".$_FILES["imagem-servico"]["name"];
            move_uploaded_file($_FILES["imagem-servico"]["tmp_name"], $imagemServico);
        };

        //Query de atualização dos dados no banco
        $query = "UPDATE tb_servico_home SET nome='$nomeServico', descricao='$descricaoServico', imagem_servico='$imagemServico' WHERE id= ".$id;

        $res = mysqli_query($conn, $query);
        header("Location: ./adm-home.php?mensagem=Serviço editado com Sucesso!");
        exit();

    } 
    else if (isset($_GET["id"]) && !empty($_GET["id"]))
    {

        $query = "SELECT * FROM tb_servico_home where id = ".$_GET["id"];

        $res = mysqli_query($conn, $query);

        $dados = mysqli_fetch_array($res);

        $id = $dados["id"];
        $nomeServico = $dados["nome"];
        $descricaoServico = $dados["descricao"];
        $imagemServico = $dados["imagem_servico"];


    }else {
        header("Location: ./upload.php?mensagem=Selecione um usuário para editar");
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
<body>
    <div>
        <div class="col-md-4 p-2 m-5">
            <form class="card" method="post" enctype="multipart/form-data" />
                <div class="mb-3">
                    <label class="form-label m-2" for="nome-servico">Nome</label>
                    <input type="text" name="nome-servico" id="nome-servico" class="form-control" value="<?php echo $nomeServico;?>">
                    
                    <label class="form-label m-2" for="descricao-servico">Descrição</label>
                    <textarea rows="6" class="form-control" type="text" name="descricao-servico" id="descricao-servico" required value=""><?php echo $descricaoServico;?></textarea>

                    <label class="form-label m-2" >Imagem </label>
                    <input type="file" name="imagem-servico" accept="image/*" class="form-control form-control-sm" />
                    <br>
                    
                    <label class="form-label m-2" >Imagem utilizada Antes</label>
                    <img src="<?php echo $imagemServico;?>" height="220" width="370"/>
                    <br>
                    <button type="submit" class="btn btn-success mt-2">
                        Salvar edição
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>