<?php
include "conexao.php";

// Obter o ID do curso a partir da URL
$id = isset($_GET["id"]) ? (int)$_GET["id"] : 0;

// Verificar se o ID é válido
if ($id <= 0) {
    header("Location: ./erro.php?mensagem=ID inválido");
    exit();
}

// Consultar o banco de dados para obter os dados do curso
$query = "SELECT * FROM tb_curso_home WHERE id = $id";
$dados = mysqli_query($conn, $query);

if ($dados && mysqli_num_rows($dados) > 0) {
    $linha = mysqli_fetch_assoc($dados);
    $corTitulo = isset($linha["cor_titulo"]) ? htmlspecialchars($linha["cor_titulo"]) : "#000000"; // Cor padrão caso não esteja definida
    $nomeCurso = htmlspecialchars($linha["nome_curso"]);
    $conteudoCurso = htmlspecialchars($linha["conteudo_curso"]);
} else {
    // Redirecionar para uma página de erro se o curso não for encontrado
    header("Location: ./erro.php?mensagem=Curso não encontrado");
    exit();
}

// Depuração: Verificar o valor da cor do título
echo "<!-- Valor de cor_titulo: $corTitulo -->";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./assets/css/main.min.css?t=1712110939880" rel="stylesheet" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.positus.global/production/resources/robbu/whatsapp-button/whatsapp-button.css">
    <link rel="icon" type="image/x-icon" href="./assets/img/favicons/android-icon-48x48favicon.png">
    <title>Curso - aceda</title>
</head>
<body>
    <!-- NavBar -->
    <?php include_once "./template/navbar.php" ?>
    <!-- NavBar -->

    <div>
        <h2 class="ms-5 me-5 text-white rounded-pill text-center p-5 mt-5" style="background-color: <?php echo $corTitulo; ?>; color: white;">
            <?php echo $nomeCurso; ?>
        </h2>
        <div class="col-12">
            <div class="m-5"><?php echo $conteudoCurso; ?></div>
        </div>
    </div>
    <div class="mt-4 mb-3 ms-2">
        <a href="./cursos.php" class="btn btn-primary rounded-pill text-white">Se inscrever</a>
    </div>
    <!-- Footer -->
    <?php include_once "./template/footer.php" ?>
    <!-- Footer --> 

    <!-- Scripts -->
    <script src="./assets/js/main.min.js?t=1712110939880" crossorigin="anonymous"></script>
    <!-- Scripts -->

    <a id="robbu-whatsapp-button" target="_blank" href="https://api.whatsapp.com/send?phone=5511958771996">
        <div class="rwb-tooltip">Fale com a ACEDA</div>
        <img src="https://cdn.positus.global/production/resources/robbu/whatsapp-button/whatsapp-icon.svg">
    </a>
</body>
</html>
