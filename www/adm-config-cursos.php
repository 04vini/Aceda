<?php
session_start();
ob_start();
include_once 'conexao.php';

// Verifica se o usuário está logado
if ((!isset($_SESSION['id'])) AND (!isset($_SESSION['nome']))) {
    $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Necessário realizar o login para acessar a página!</p>";
    header("Location: Login.php");
    exit(); 
}



?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar e Editar Cursos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/css/main.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-xxxxxx" crossorigin="anonymous" />
	<link rel="icon" type="image/x-icon" href="./assets/img/favicons/android-icon-48x48favicon.png">

</head>
<body>
    <!-- NavBar -->
    <?php include_once "./template/navbar-adm.php"?>
    <!-- NavBar -->
    <div class="container mt-5">
        <h3 class="text-center m-3"><strong>Adicionar opção de Curso</strong></h3>
        <form action="./insert-config-cursos.php" method="post">
            <div class="form-group">
                <label for="curso_label">Novo curso:</label>
                <input type="text" name="curso_label" id="curso_label">
                <br><br>
            </div>
            <button type="submit" class="btn btn-success rounded-pill text-white">Adicionar Curso</button>
        </form>

        <hr>

        <h3 class="text-center m-3"><strong>Cursos disponíveis no site</strong></h3>
        <ul class="list-group">
            <?php
            include "conexao.php";
            
            // Consulta para obter os cursos
            $sql = "SELECT * FROM tb_configcursos";
            $result = $conn->query($sql);

            // Exibir os cursos como itens de lista
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<li class="list-group-item d-flex justify-content-between align-items-center">'
                            . htmlspecialchars($row['curso']) . '
                            <div>
                                <a href="adm-update-config-cursos.php?id=' . $row['id'] . '" class="btn btn-sm btn-primary rounded-pill text-white mr-2">Editar</a>
                                <a href="adm-delete-config-cursos.php?id=' . $row['id'] . '" class="btn btn-sm btn-danger rounded-pill text-white">Excluir</a>
                            </div>
                        </li>';
                    }
                } else {
                    echo '<li class="list-group-item">Nenhum curso encontrado</li>';
                }

            $conn->close();
            ?>
        </ul>
    </div>
</body>
</html>