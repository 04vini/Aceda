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
    <title>Cursos - Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/css/main.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-xxxxxx" crossorigin="anonymous" />
    <link rel="icon" type="image/x-icon" href="./assets/img/favicons/android-icon-48x48.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

    <!-- NavBar -->
    <?php include_once "./template/navbar-adm.php"?>
    <!-- NavBar -->
        <div class="m-4">
            <div>
                <h3 class="row justify-content-center mt-3 pt-1">Cursos</h3>
            </div>
            <div class="justify-content-end pt-0 pb-2 col-1 rounded-pill">
                <a href="adm-cursos-excel.php" class="justify-content-end btn btn-success text-white rounded-pill"><i class="bi bi-file-earmark-excel"> </i>Excel</a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Email</th>
                                <th scope="col">Curso</th>
                                <th scope="col">CPF</th>
                                <th scope="col">Nascimento</th>
                                <th scope="col">Endereço</th>
                                <th scope="col">CEP</th>
                                <th scope="col">Telefone</th>
                                <th scope="col">CNPJ</th>
                                <th scope="col">Razão Social</th>
                                <th scope="col">Aceite</th>
                                <th scope="col">Data do Registro</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php
                            include "conexao.php";

                            $query = "SELECT * FROM tb_curso ORDER BY id DESC";
                            $dados = mysqli_query($conn, $query);
                                    // Loop para exibir os resultados da consulta
                                    if ($dados && mysqli_num_rows($dados) > 0) {
                                        while ($linha = mysqli_fetch_assoc($dados)) {
                                            $dataHora = strtotime($linha["registro"]);
                                            $registroFormatado = date("d/m/Y H:i:s", $dataHora);

                                            $nasc = strtotime($linha["nascimento"]);
                                            $nascatualizado = date("d/m/Y", $nasc);
                                echo '<tr>';
                                echo '<td>' . $linha["id"] . '</td>';
                                echo '<td>' . $linha["nome"] . '</td>';
                                echo '<td>' . $linha["email"] . '</td>';
                                echo '<td>' . $linha["curso"] . '</td>';
                                echo '<td>' . $linha["cpf"] . '</td>';
                                echo '<td>' . $nascatualizado . '</td>';
                                echo '<td>' . $linha["endereco"] . '</td>';
                                echo '<td>' . $linha["cep"] . '</td>';
                                echo '<td>' . $linha["telefone"] . '</td>';
                                echo '<td>' . $linha["cnpj"] . '</td>';
                                echo '<td>' . $linha["razaosocial"] . '</td>';
                                echo '<td>' . $linha["aceite"] . '</td>';
                                echo '<td>' . $registroFormatado . '</td>';
                                }
                            }
                        ?>
                        </tbody>
                </table>    
            </div>

        </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>