<?php
    include "./conexao.php";

    if (isset($_POST) && !empty($_POST)) 
    {
        
        $id = $_GET['id'];
        $nomeCurso = isset($_POST['nome-curso']) ? $_POST['nome-curso'] : NULL ;

        $descricaoCurso = isset($_POST['descricao-curso']) ? $_POST['descricao-curso'] : NULL;

        //Validação e tratamento da imagem para inserção no banco
        if (isset($_FILES['imagem-curso']) && !empty ($_FILES['imagem-curso'])) 
        {
            $imagemCurso = "../img/".$_FILES["imagem-curso"]["name"];
            move_uploaded_file($_FILES["imagem-curso"]["tmp_name"], $imagemCurso);
        };

        //Query de atualização dos dados no banco
        $query = "UPDATE tb_curso_home SET nome_curso='$nomeCurso', descricao_curso='$descricaoCurso', imagem_curso='$imagemCurso' WHERE id= ".$id;

        $res = mysqli_query($conn, $query);
        header("Location: ./adm-home.php?mensagem=Curso editado com Sucesso!");
        exit();

    } 
    else if (isset($_GET["id"]) && !empty($_GET["id"]))
    {

        $query = "SELECT * FROM tb_curso_home where id = ".$_GET["id"];

        $res = mysqli_query($conn, $query);

        $dados = mysqli_fetch_array($res);

        $id = $dados["id"];
        $nomeCurso = $dados["nome_curso"];
        $descricaoCurso = $dados["descricao_curso"];
        $imagemCurso = $dados["imagem_curso"];


    }else {
        header("Location: ./adm-home.php?mensagem=Selecione um Curso para editar");
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
                <label class="form-label m-2" for="nome-curso">Nome</label>
                <input class="form-control" type="text" name="nome-curso" id="nome-curso class="form-control" required value="<?php echo $nomeCurso ?>">
                
                <label class="form-label m-2" for="descricao-curso">Descrição</label>
                <textarea rows="4" class="form-control" type="text" name="descricao-curso" id="descricao-curso" required value="<?php echo $nomeCurso ?>"></textarea>

                <label class="form-label m-2" >Imagem </label>
                <input type="file" name="imagem-curso" accept="image/*" class="form-control form-control-sm" />
                    
                    <label class="form-label m-2" >Imagem utilizada Antes</label>
                    <img src="<?php echo $imagemCurso;?>" height="220" width="370"/>

                    <button type="submit" class="btn btn-success mt-2">
                        Salvar edição
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>