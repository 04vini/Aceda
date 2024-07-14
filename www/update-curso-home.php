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
        $nomeCurso = isset($_POST['nome-curso']) ? mysqli_real_escape_string($conn, $_POST['nome-curso']) : NULL ;
        $descricaoCurso = isset($_POST['descricao-curso']) ? mysqli_real_escape_string($conn, $_POST['descricao-curso']) : NULL;
        $conteudoCurso = isset($_POST['conteudo-curso']) ? mysqli_real_escape_string($conn, $_POST['conteudo-curso']) : NULL;

        //Validação e tratamento da imagem para inserção no banco
        $query = "SELECT imagem_curso FROM tb_curso_home WHERE id = ".$id;
        $res = mysqli_query($conn, $query);
        $dados = mysqli_fetch_array($res);
        $imagemCurso = $dados['imagem_curso'];

        if (isset($_FILES['imagem-curso']) && !empty ($_FILES['imagem-curso']['name'])) 
        {
            $imagemCurso = "./assets/img/".$_FILES["imagem-curso"]["name"];
            move_uploaded_file($_FILES["imagem-curso"]["tmp_name"], $imagemCurso);
        }

        //Query de atualização dos dados no banco
        $query = "UPDATE tb_curso_home SET nome_curso='$nomeCurso', descricao_curso='$descricaoCurso', conteudo_curso='$conteudoCurso', imagem_curso='$imagemCurso' WHERE id= ".$id;

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
        $conteudoCurso = $dados["conteudo_curso"];
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
    <title>Editando Curso</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="icon" type="image/x-icon" href="./assets/img/favicons/android-icon-48x48favicon.png">
</head>
<body>
    <div>
        <div class="col-md-4 p-2 m-5">
            <form class="card" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label m-2" for="nome-curso">Nome</label>
                    <input class="form-control" type="text" name="nome-curso" id="nome-curso" required value="<?php echo htmlspecialchars($nomeCurso); ?>">

                    <label class="form-label m-2" for="descricao-curso">Descrição</label>
                    <textarea rows="4" class="form-control" name="descricao-curso" id="descricao-curso" required><?php echo htmlspecialchars($descricaoCurso); ?></textarea>

                    <label class="form-label m-2" for="conteudo-curso">Conteudo</label>
                    <textarea rows="7" class="form-control" name="conteudo-curso" id="conteudo-curso" required><?php echo htmlspecialchars($conteudoCurso); ?></textarea>

                    <label class="form-label m-2">Imagem</label>
                    <input type="file" name="imagem-curso" accept="image/*" class="form-control form-control-sm" />
                    
                    <label class="form-label m-2">Imagem utilizada Antes</label>
                    <img src="<?php echo htmlspecialchars($imagemCurso); ?>" height="220" width="370"/>

                    <button type="submit" class="btn btn-success mt-2">
                        Salvar edição
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
