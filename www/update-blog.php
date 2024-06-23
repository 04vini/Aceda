<?php
session_start();
ob_start();
include_once 'conexao.php';

if ((!isset($_SESSION['id'])) AND (!isset($_SESSION['nome']))) {
    $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Necessário realizar o login para acessar a página!</p>";
    header("Location: Login.php");
    exit();
}

include "./conexao.php";

if (isset($_POST) && !empty($_POST)) {
    
    $id = $_GET['id'];

    $titulo = isset($_POST['title-post']) ? $_POST['title-post'] : NULL;

    $descricao = isset($_POST['descricao-post']) ? $_POST['descricao-post'] : NULL;

    $conteudo = isset($_POST['text-post']) ? $_POST['text-post'] : NULL;

    $categoria = isset($_POST['categoria-post']) ? $_POST['categoria-post'] : NULL;

    $autor = isset($_POST['autor-post']) ? $_POST['autor-post'] : NULL;

    date_default_timezone_set('America/Sao_Paulo');
    $registro = date("Y-m-d H:i:s");
    
    //Validação e tratamento da imagem para inserção no banco
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == UPLOAD_ERR_OK) {
        $imagem = "./assets/img/".$_FILES["imagem"]["name"];
        move_uploaded_file($_FILES["imagem"]["tmp_name"], $imagem);
    } else {
        // Se não houver nova imagem, manter a imagem existente
        $query_select_imagem = "SELECT imagem FROM tb_blog WHERE id = ".$id;
        $res_select_imagem = mysqli_query($conn, $query_select_imagem);
        $linha_select_imagem = mysqli_fetch_assoc($res_select_imagem);
        $imagem = $linha_select_imagem['imagem'];
    }

    //Query de atualização dos dados no banco
    $query = "UPDATE tb_blog SET titulo='$titulo', descricao='$descricao', conteudo='$conteudo', categoria='$categoria', autor='$autor', imagem='$imagem', registro='$registro' WHERE id= ".$id;

    $res = mysqli_query($conn, $query);
    if ($res) {
        header("Location: ./adm-blog.php?mensagem=Post id ".$id. " editado com Sucesso!");
        exit();
    } else {
        echo "Erro ao editar o post.";
    }

} else if (isset($_GET["id"]) && !empty($_GET["id"])) {

    $query = "SELECT * FROM tb_blog where id = ".$_GET["id"];

    $res = mysqli_query($conn, $query);

    if ($res) {
        $dados = mysqli_fetch_array($res);

        $id = $dados["id"];
        $titulo = $dados["titulo"];
        $descricao = $dados["descricao"];
        $conteudo = $dados["conteudo"];
        $categoria = $dados["categoria"];
        $autor = $dados["autor"];
        $imagem = $dados["imagem"];
        $registro = $dados["registro"];
    } else {
        header("Location: ./adm-blog.php?mensagem=Erro ao selecionar o post para edição.");
        exit();
    }

} else {
    header("Location: ./upload.php?mensagem=Selecione um post para editar");
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
    <link rel="icon" type="image/x-icon" href="./assets/img/favicons/android-icon-48x48.png">
    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/f3sgpku312e9vuqeq3aevsab9ho77hgpfcq3xfqfoo5s4hz3/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#text-post', // Seletor para o textarea visível
            setup: function (editor) {
                editor.on('change', function () {
                    editor.save(); // Salva o conteúdo de volta para o textarea oculto
                });
            }
        });
    </script>
</head>
<body>
    <div>
        <div class="col-md-4 p-2 m-5">
            <form class="card" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label m-2" for="title-post">Título</label>
                    <input type="text" name="title-post" id="title-post" required class="form-control" value="<?php echo $titulo;?>" />

                    <label class="form-label m-2" for="descricao-post">Descrição</label>
                    <textarea type="text" rows="4" name="descricao-post" id="descricao-post" required class="form-control"><?php echo $descricao;?></textarea>

                    <div data-mdb-input-init class="form-outline">
                        <label class="form-label m-2" for="text-post">Conteudo do Post</label>
                        <!-- Textarea substituído por TinyMCE -->
                        <textarea rows="5" class="form-control" type="text" name="text-post" id="text-post" required><?php echo $conteudo;?></textarea>
                    </div> 
                    
                    <label class="form-label m-2" for="categoria-post">Categoria</label>
                    <input type="text" name="categoria-post" id="categoria-post" required class="form-control" value="<?php echo $categoria;?>" />

                    <label class="form-label m-2" for="autor-post">Autor</label>
                    <input type="text" name="autor-post" id="autor-post" required class="form-control" value="<?php echo $autor;?>" />

                    <label class="form-label m-2">Selecione nova Imagem</label>
                    <input type="file" name="imagem" accept="image/*" class="form-control form-control-sm" />

                    <label class="form-label m-2">Imagem utilizada Antes</label>
                    <img src="<?php echo $imagem;?>" />

                    <button type="submit" class="btn btn-success mt-2">
                        Salvar edição
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
