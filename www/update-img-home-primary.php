<?php

    /*session_start();
    ob_start();
    include_once 'conexao_login.php';
    
    if((!isset($_SESSION['id'])) AND (!isset($_SESSION['nome']))){
        $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Necessário realizar o login para acessar a página!</p>";
        header("Location: Login.php");
    }*/

include "./conexao.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_GET['id']) && !empty($_GET['id'])) 
    {
        $id = $_GET['id'];

        // Validação e tratamento da imagem para inserção no banco
        if (isset($_FILES['imagemprimary']) && !empty($_FILES['imagemprimary']['tmp_name'])) 
        {
            $imagem = "./assets/img/" . basename($_FILES["imagemprimary"]["name"]);
            if (move_uploaded_file($_FILES["imagemprimary"]["tmp_name"], $imagem)) 
            {
                // Query de atualização dos dados no banco
                $query = "UPDATE tb_home_img_primary SET imagemprimary='$imagem' WHERE id=" . $id;
                if (mysqli_query($conn, $query)) 
                {
                    header("Location: ./adm-home.php?mensagem=Imagem editada com Sucesso!");
                    exit();
                } 
                else 
                {
                    echo "Erro ao atualizar a imagem no banco de dados.";
                }
            } 
            else 
            {
                echo "Erro ao mover a imagem para o diretório de destino.";
            }
        } 
        else 
        {
            echo "Por favor, selecione uma imagem para atualizar.";
        }
    } 
    else 
    {
        echo "ID inválido.";
    }
} 
else if (isset($_GET["id"]) && !empty($_GET["id"])) 
{
    $id = $_GET["id"];
    $query = "SELECT * FROM tb_home_img_primary WHERE id=" . $id;
    $res = mysqli_query($conn, $query);

    if ($res && mysqli_num_rows($res) > 0) 
    {
        $dados = mysqli_fetch_array($res);
        $imagem = $dados["imagemprimary"];
    } 
    else 
    {
        header("Location: ./adm-home.php?mensagem=Imagem não encontrada.");
        exit();
    }
} 
else 
{
    header("Location: ./adm-home.php?mensagem=Selecione uma imagem para editar.");
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
            <form class="card" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label m-2">Selecione nova Imagem</label>
                    <input type="file" name="imagemprimary" accept="image/*" class="form-control form-control-sm" />
                    
                    <label class="form-label m-2">Imagem utilizada Antes</label>
                    <img src="<?php echo htmlspecialchars($imagem); ?>" style="height: 250px; width: 420px;" />

                    <button type="submit" class="btn btn-success mt-2">Salvar edição</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
