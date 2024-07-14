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

    // Inicializa variáveis
    $filtro = '';
    $query = "SELECT * FROM tb_voluntarios ORDER BY id DESC"; // Query padrão sem filtro inicialmente

    // Verifica se há filtro enviado via GET
    if (isset($_GET['filtro'])) {
        $filtro = trim($_GET['filtro']); // Remove espaços em branco desnecessários
        if (!empty($filtro)) {
            $filtro_escapado = mysqli_real_escape_string($conn, $filtro); // Escapa o filtro para evitar SQL injection
            $query = "SELECT * FROM tb_voluntarios WHERE nome LIKE '%$filtro_escapado%' OR funcao LIKE '%$filtro_escapado%' ORDER BY id DESC";
        }
    }

    // Configuração da paginação
    $limit = 5; // Número de registros por página
    $page = isset($_GET['page']) && $_GET['page'] > 0 ? $_GET['page'] : 1;
    $offset = ($page - 1) * $limit;

    // Query para buscar os registros com paginação
    $query .= " LIMIT $limit OFFSET $offset";

    $dados = mysqli_query($conn, $query); // Executa a consulta SQL

    // Contagem total de registros para paginação
    $total_registros_query = "SELECT COUNT(*) AS total FROM tb_voluntarios";
    if (!empty($filtro)) {
        $total_registros_query .= " WHERE nome LIKE '%$filtro_escapado%' OR funcao LIKE '%$filtro_escapado%'";
    }
    $total_registros_result = mysqli_query($conn, $total_registros_query);
    $total_registros = mysqli_fetch_assoc($total_registros_result)['total'];
    
    // Calcular o número total de páginas
    $total_paginas = ceil($total_registros / $limit);

    // Liberar resultado da contagem de registros
    mysqli_free_result($total_registros_result);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Config Blog - aceda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/css/main.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-xxxxxx" crossorigin="anonymous" />
	<link rel="icon" type="image/x-icon" href="./assets/img/favicons/android-icon-48x48favicon.png">
    <script src="https://cdn.tiny.cloud/1/f3sgpku312e9vuqeq3aevsab9ho77hgpfcq3xfqfoo5s4hz3/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#resumo',
            setup: function (editor) {
                editor.on('change', function () {
                    editor.save();
                });
            }
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const alertBox = document.getElementById("alertBox");
            if (alertBox) {
                setTimeout(() => {
                    alertBox.style.display = 'none'; // 5 Segundos
                }, 5000);
            } else {
                console.error("Element with ID 'alertBox' not found");
            }
        });
    </script>
</head>
<body>
    <!-- NavBar -->
    <?php include_once "./template/navbar-adm.php"?>
    <!-- NavBar -->
    
    <div class="bg-secondary bg-gradient">
        <?php
            // Exibe mensagem se houver
            if (isset($_GET["mensagem"]) && !empty($_GET["mensagem"])) {
        ?>
            <div id="alertBox" class="alert alert-warning text-center">
                <?php echo htmlspecialchars($_GET["mensagem"], ENT_QUOTES, 'UTF-8'); ?>
            </div>
        <?php } ?>
        
        <div class="ms-4 me-4 mt-2">
            <br>
            <div class="border border-dark bg-white">
                <div class="m-5">
                    <div>
                        <h3 class="text-center m-3"><strong>Voluntários aceda</strong></h3>
                    </div>

                    <!-- Botão com a função de modal - novo Post -->
                    <button type="button" class="btn btn-success text-white rounded-pill" data-bs-toggle="modal" data-bs-target="#myModal">
                        Novo voluntário
                    </button>

                    <!-- Modal com form - novo Post-->
                    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title text-center" id="myModalLabel">Novo voluntário</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="insert-voluntarios.php" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label class="form-label" for="nome">nome</label>
                                            <input type="text" name="nome" id="nome" required class="form-control" />

                                            <label class="form-label pt-1" for="foto">Selecione a Foto</label>
                                            <input type="file" name="foto" accept="image/*" class="form-control form-control-sm mb-2" />
                                            
                                            <label class="form-label pt-1" for="funcao">Funcão</label>
                                            <textarea name="funcao" id="funcao" required class="form-control"> </textarea>
                                            
                                            <label class="form-label pt-1" for="resumo">Resumo das atividades exercidas</label>
                                            <!-- Textarea substituído por TinyMCE -->
                                            <textarea class="form-control" name="resumo" id="resumo" required></textarea>

                                            <label class="form-label pt-1" for="periodo">Período</label>
                                            <input type="text" name="periodo" id="periodo" required class="form-control" placeholder="XX/XX/XXX - XX/XX/XXXX ou Atual"/>

                                            <label class="form-label pt-1" for="linkedin">Linkedin</label>
                                            <input type="text" name="linkedin" id="linkedin" required class="form-control" />

                                            <div class="mt-1 p-2">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                <button type="submit" class="btn btn-primary">Criar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Formulário de busca -->
                    <div class="row justify-content-end">
                        <div class="col-md-4">
                            <form method="get" action="">
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm" placeholder="Nome ou Função" name="filtro" value="<?php echo isset($_GET['filtro']) ? htmlspecialchars($_GET['filtro'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                                    <button class="btn btn-primary btn-sm" type="submit">Buscar</button>
                                    <?php if (isset($_GET['filtro'])): ?>
                                        <a href="adm-voluntarios.php" class="btn btn-warning btn-sm">Limpar</a>
                                    <?php endif; ?>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Total de registros e Listando os registros de posts do blog -->
                    <div class="mt-4 table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Foto</th>
                                    <th>Função</th>
                                    <th>Resumo</th>
                                    <th>Período</th>
                                    <th>Linkedin</th>
                                    <th>Registro</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    // Loop para exibir os resultados da consulta
                                    if ($dados && mysqli_num_rows($dados) > 0) {
                                        while ($linha = mysqli_fetch_assoc($dados)) {
                                            $dataHora = strtotime($linha["registro"]);
                                            $registroFormatado = date("d/m/Y H:i:s", $dataHora);

                                            echo '<tr>';
                                            echo '<td>' . $linha["id"] . '</td>';
                                            echo '<td><img src="' . $linha["foto"] . '" width="120" height="120" /></td>';
                                            echo '<td>' . $linha["nome"] . '</td>';
                                            echo '<td>' . $linha["funcao"] . '</td>';
                                            echo '<td>' . $linha["resumo"] . '</td>';
                                            echo '<td>' . $linha["periodo"] . '</td>';
                                            echo '<td><a href="' . $linha["linkedin"] . '">LinkedIn</a></td>';
                                            echo '<td>' . $registroFormatado . '</td>';
                                            echo '<td>';
                                            echo '<a class="btn btn-primary p-1 m-1 rounded-pill text-white" href="./update-voluntarios.php?id=' . $linha["id"] . '">Editar</a>';
                                            echo '<a class="btn btn-danger p-1 m-1 rounded-pill text-white" href="./delete-voluntarios.php?id=' . $linha["id"] . '">Excluir</a>';
                                            echo '</td>';
                                            echo '</tr>';
                                        }
                                    } else {
                                        echo '<tr><td colspan="9">Nenhum registro encontrado.</td></tr>';
                                    }
                                ?>
                                
                            </tbody>
                        </table>
                        <p>Total de Registros: <?php echo $total_registros; ?></p>

                        <!-- Paginação -->
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <?php for ($i = 1; $i <= $total_paginas; $i++) : ?>
                                    <li class="page-item <?php if ($page == $i) echo 'active'; ?>">
                                        <a class="page-link" href="?page=<?php echo $i . ($filtro ? '&filtro=' . urlencode($filtro) : ''); ?>">
                                            <?php echo $i; ?>
                                        </a>
                                    </li>
                                <?php endfor; ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>
</html>
