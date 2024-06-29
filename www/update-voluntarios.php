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

$id = isset($_GET["id"]) ? $_GET["id"] : null;

if (isset($_POST) && !empty($_POST)) {
    //Validação dos dados do form
    $nome = isset($_POST['nome']) ? $_POST['nome'] : NULL;
    $funcao = isset($_POST['funcao']) ? $_POST['funcao'] : NULL;
    $resumo = isset($_POST['resumo']) ? $_POST['resumo'] : NULL;
    $periodo = isset($_POST['periodo']) ? $_POST['periodo'] : NULL;
    $linkedin = isset($_POST['linkedin']) ? $_POST['linkedin'] : NULL;

    date_default_timezone_set('America/Sao_Paulo');
    $registro = date("Y-m-d H:i:s");
    
    //Validação e tratamento da imagem para inserção no banco
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
        $foto = "./assets/img/".$_FILES["foto"]["name"];
        move_uploaded_file($_FILES["foto"]["tmp_name"], $foto);
    } else {
        // Se não houver nova imagem, manter a imagem existente
        $query_select_imagem = "SELECT foto FROM tb_voluntarios WHERE id = ".$id;
        $res_select_imagem = mysqli_query($conn, $query_select_imagem);
        $linha_select_imagem = mysqli_fetch_assoc($res_select_imagem);
        $foto = $linha_select_imagem['foto'];
    }

    //Query de atualização dos dados no banco
    $query = "UPDATE tb_voluntarios SET nome='$nome', foto='$foto', funcao='$funcao', resumo='$resumo', periodo='$periodo', linkedin='$linkedin', registro='$registro' WHERE id= ".$id;

    $res = mysqli_query($conn, $query);
    if ($res) {
        header("Location: ./adm-voluntarios.php?mensagem=Post id ".$id. " editado com Sucesso!");
        exit();
    } else {
        echo "Erro ao editar o voluntário.";
    }

} else if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $query = "SELECT * FROM tb_voluntarios WHERE id = ".$_GET["id"];
    $res = mysqli_query($conn, $query);

    if ($res) {
        $dados = mysqli_fetch_array($res);

        $id = $dados["id"];
        $nome = $dados["nome"];
        $foto = $dados["foto"];
        $funcao = $dados["funcao"];
        $resumo = $dados["resumo"];
        $periodo = $dados["periodo"];
        $linkedin = $dados["linkedin"];
        $registro = $dados["registro"];
    } else {
        header("Location: ./adm-voluntarios.php?mensagem=Erro ao selecionar o post para edição.");
        exit();
    }
} else {
    header("Location: ./adm-voluntarios.php?mensagem=Selecione um voluntario para editar");
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
            selector: 'textarea#resumo', // Seletor para o textarea visível
            setup: function (editor) {
                editor.on('change', function () {
                    editor.save(); // Salva o conteúdo de volta para o textarea oculto
                });
            }
        });
    </script>
</head>
<body>
    <div class="bg-dark">
        <br>
        <div class="bg-white col-md-7 m-2 ms-5">
            <form class="card" method="post" enctype="multipart/form-data">
                <div class="mb-3 p-2">
                    <label class="form-label" for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" required class="form-control" value="<?php echo $nome;?>"/>

                    <label class="form-label pt-1" for="foto">Selecione a Foto</label>
                    <input type="file" name="foto" accept="image/*" class="form-control form-control-sm mb-2" />
                    
                    <label class="form-label m-2">Imagem utilizada Antes</label>
                    <img src="<?php echo $foto;?>" height="220" width="370" />
                    <br>

                    <label class="form-label pt-1" for="funcao">Funcão</label>
                    <textarea name="funcao" id="funcao" required class="form-control"><?php echo $funcao;?></textarea>
                    
                    <label class="form-label pt-1" for="resumo">Resumo das atividades exercidas</label>
                    <!-- Textarea substituído por TinyMCE -->
                    <textarea class="form-control" name="resumo" id="resumo" required><?php echo $resumo;?></textarea>

                    <label class="form-label pt-1" for="periodo">Período</label>
                    <input type="text" name="periodo" id="periodo" required class="form-control" placeholder="XX/XX/XXX - XX/XX/XXXX ou Atual" value="<?php echo $periodo;?>"/>

                    <label class="form-label pt-1" for="linkedin">Linkedin</label>
                    <input type="text" name="linkedin" id="linkedin" required class="form-control" value="<?php echo $linkedin;?>"/>
                    <button type="submit" class="btn btn-success mt-2">
                        Salvar edição
                    </button>
                </div>
            </form>
        </div>
        <br>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
