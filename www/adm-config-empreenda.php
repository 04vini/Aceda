<?php
session_start();
ob_start();
include_once 'conexao.php';

if ((!isset($_SESSION['id'])) AND (!isset($_SESSION['nome']))) {
    $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Necessário realizar o login para acessar a página!</p>";
    header("Location: Login.php");
}

// Processa o formulário de atualização
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $textoAtualizado = $_POST['text'];
    $queryUpdate = "UPDATE tb_configempreenda SET text = ? WHERE id = 1";
    $stmt = $conn->prepare($queryUpdate);
    $stmt->bind_param('s', $textoAtualizado);
    
    if ($stmt->execute()) {
        header("Location: adm-config-empreenda.php?mensagem=Registro atualizado com sucesso!"); 
        exit();
    } else {
        echo "<p style='color: red;'>Erro ao atualizar: " . $stmt->error . "</p>";
    }
}

// Consulta para pegar os dados atuais
$query = "SELECT * FROM tb_configempreenda";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$dataHora = strtotime($row["registro"]);
$registroFormatado = date("d/m/Y H:i:s", $dataHora);
?>

<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Config Usuários - aceda </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link href="./assets/css/main.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="./assets/img/favicons/android-icon-48x48favicon.png">
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const alertBox = document.getElementById("alertBox");
            if (alertBox) {
                setTimeout(() => {
                    alertBox.style.display = 'none';
                }, 5000);
            }
        });
    </script>
</head>
<body>
    <?php include_once "./template/navbar-adm.php"?>
    <div class="bg-secondary bg-gradient">    
        <?php
        if (isset($_GET["mensagem"]) && !empty($_GET["mensagem"])) {
            ?>
            <div id="alertBox" class="alert alert-warning text-center">
                <?php echo htmlspecialchars($_GET["mensagem"], ENT_QUOTES, 'UTF-8'); ?>
            </div>
            <?php
        }
        ?>
        <div>
            <br>
            <div class="container">      
                <div class="border border-dark bg-white">
                    <div class="m-5">
                        <div>
                            <h3 class="text-center m-3"><strong>Texto página Empreenda</strong></h3>
                        </div>
                    </div>
                    <div class="p-3">
                        <h4 class=""><strong>Conteúdo atual</strong></h4>
                        <form method="POST" action="" class="">
                            <textarea name="text" class="form-control me-5 m-1 mt-3" rows="8"><?php echo htmlspecialchars($row["text"], ENT_QUOTES, 'UTF-8'); ?></textarea>
                            <div class="d-flex justify-content-end m-3 mb-0" >
                                <button type="submit" class="btn btn-primary rounded-pill text-white">Atualizar</button>
                            </div>
                        </form>
                        <div class="">
                            <span><small>Atualizado: <?php echo $registroFormatado ?></small></span>
                        </div>
                    </div>
                </div>
                <br><br>
            </div>
        </div>
    </div>
</body>
</html>
