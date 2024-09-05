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
        $curso = isset($_POST['nome-curso']) ? $_POST['nome-curso'] : NULL ;
        $descricao = isset($_POST['descricao-curso']) ? $_POST['descricao-curso'] : NULL ;
        //Query de atualização dos dados no banco
        $query = "UPDATE tb_configcursos SET curso='$curso', descricao='$descricao' WHERE id= ".$id;

        $res = mysqli_query($conn, $query);
        header("Location: ./adm-config-cursos.php?mensagem=Curso editado com Sucesso!");
        exit();

    } 
    else if (isset($_GET["id"]) && !empty($_GET["id"]))
    {
        $query = "SELECT * FROM tb_configcursos where id = ".$_GET["id"];

        $res = mysqli_query($conn, $query);

        $dados = mysqli_fetch_array($res);

        $id = $dados["id"];
        $curso = $dados["curso"];
        $descricao = $dados["descricao"];



    }else {
        header("Location: ./adm-config-cursos.php?mensagem=Selecione um Curso para editar");
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
                    <label class="form-label m-2" for="nome-curso">Curso</label>
                    <input class="form-control" type="text" name="nome-curso" id="nome-curso" required value="<?php echo $curso ?>">
                    <br>
                    <label class="form-label m-2" for="descricao-curso">Descrição</label>
                    <input class="form-control" type="text" name="descricao-curso" id="descricao-curso" required value="<?php echo $descricao ?>">
                    
                    <button type="submit" class="btn btn-success mt-2">
                        Salvar edição
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>