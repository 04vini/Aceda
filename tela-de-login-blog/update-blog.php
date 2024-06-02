<?php
    include "./conexao.php";

    if (isset($_POST) && !empty($_POST)) 
    {
        
        $id = $_GET['id'];
        $titulo = isset($_POST['title-post']) ? $_POST['title-post'] : NULL ;

        $descricao = isset($_POST['text-post']) ? $_POST['text-post'] : NULL;

        //Validação e tratamento da imagem para inserção no banco
        if (isset($_FILES['imagem']) && !empty ($_FILES['imagem'])) 
        {
            $imagem = "../img/".$_FILES["imagem"]["name"];
            move_uploaded_file($_FILES["imagem"]["tmp_name"], $imagem);
        };

        //Query de atualização dos dados no banco
        $query = "UPDATE tb_blog SET titulo='$titulo', descricao='$descricao', imagem='$imagem' WHERE id= ".$id;

        $res = mysqli_query($conn, $query);
        header("Location: ./adm-blog.php?mensagem=Editado com Sucesso!");
        exit();

    } 
    else if (isset($_GET["id"]) && !empty($_GET["id"]))
    {

        $query = "SELECT * FROM tb_blog where id = ".$_GET["id"];

        $res = mysqli_query($conn, $query);

        $dados = mysqli_fetch_array($res);

        $id = $dados["id"];
        $titulo = $dados["titulo"];
        $descricao = $dados["descricao"];
        $imagem = $dados["imagem"];


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
                    <label class="form-label m-2" for="title-post">Título do Post</label>
                    <input type="text" name="title-post" id="title-post" required class="form-control" value="<?php echo $titulo;?>"/>

                    <div data-mdb-input-init class="form-outline">
                        <label class="form-label m-2" for="text-post">Descrição do Post</label>
                        <textarea rows="4" class="form-control" type="text" name="text-post" id="text-post" required value="<?php echo $descricao;?>"></textarea>
                    </div>                    
                    
                    <label class="form-label m-2" >Selecione nova Imagem</label>
                    <input type="file" name="imagem" accept="image/*" class="form-control form-control-sm" />
                    
                    <label class="form-label m-2" >Imagem utilizada Antes</label>
                    <img src="<?php echo $imagem;?>"/>

                    <button type="submit" class="btn btn-success mt-2">
                        Salvar edição
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>