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
    $query = "SELECT * FROM tb_blog ORDER BY id DESC"; // Query padrão sem filtro inicialmente

    // Verifica se há filtro enviado via GET
    if (isset($_GET['filtro'])) {
        $filtro = trim($_GET['filtro']); // Remove espaços em branco desnecessários
        if (!empty($filtro)) {
            $filtro_escapado = mysqli_real_escape_string($conn, $filtro); // Escapa o filtro para evitar SQL injection
            $query = "SELECT * FROM tb_blog WHERE titulo LIKE '%$filtro_escapado%' OR categoria LIKE '%$filtro_escapado%' OR autor LIKE '%$filtro_escapado%' ORDER BY id DESC";
        }
    }

    $dados = mysqli_query($conn, $query); // Executa a consulta SQL
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Config Blog - Aceda</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/css/main.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.tiny.cloud/1/f3sgpku312e9vuqeq3aevsab9ho77hgpfcq3xfqfoo5s4hz3/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#text-post',
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
        
        <div class="ml-4 me-4 mt-2">
            <br>
            <div class="border border-dark bg-white">
                <div class="m-5">
                    <div>
                        <h3 class="text-center m-3"><strong>Posts da Página Blog</strong></h3>
                    </div>

                    <!-- Botão com a função de modal - novo Post -->
                    <button type="button" class="btn btn-success text-white rounded-pill" data-bs-toggle="modal" data-bs-target="#myModal">
                        Novo Post
                    </button>

                    <!-- Modal com form - novo Post-->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title text-center" id="myModalLabel">Insira o novo Post</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="insert-blog.php" enctype="multipart/form-data" class="">
                                        <div class="mb-3">
                                            <label class="form-label" for="title-post">Título</label>
                                            <input type="text" name="title-post" id="title-post" required class="form-control" />
                                            
                                            <label class="form-label pt-1" for="descricao-post">Breve Resumo</label>
                                            <textarea name="descricao-post" id="descricao-post" required class="form-control"> </textarea>
                                            
                                            <label class="form-label pt-1" for="text-post">Conteudo completo</label>
                                            <!-- Textarea substituído por TinyMCE -->
                                            <textarea class="form-control" name="text-post" id="text-post" required></textarea>
                                            
                                            <label class="form-label pt-1" for="imagem">Selecione a Imagem</label>
                                            <input type="file" name="imagem" accept="image/*" class="form-control form-control-sm mb-2" />

                                            <label class="form-label pt-1" for="categoria-post">Categoria</label>
                                            <input type="text" name="categoria-post" id="categoria-post" required class="form-control" />

                                            <label class="form-label pt-1" for="autor-post">Autor</label>
                                            <input type="text" name="autor-post" id="autor-post" required class="form-control" />

                                            <div class="mt-1 p-2">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                <button type="submit" class="btn btn-primary">Postar</button>
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
                                    <input type="text" class="form-control form-control-sm" placeholder="Título, categoria ou Autor" name="filtro" value="<?php echo isset($_GET['filtro']) ? htmlspecialchars($_GET['filtro'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                                    <button class="btn btn-primary btn-sm" type="submit">Buscar</button>
                                    <?php if (isset($_GET['filtro'])): ?>
                                        <a href="adm-blog.php" class="btn btn-warning btn-sm">Limpar</a>
                                    <?php endif; ?>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Listando os registros de posts do blog -->
                    <div class="mt-4 table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Imagem</th>
                                    <th>Título</th>
                                    <th>Descrição</th>
                                    <th>Conteúdo</th>
                                    <th>Categoria</th>
                                    <th>Autor</th>
                                    <th>Registro</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    // Loop para exibir os resultados da consulta
                                    if ($dados && mysqli_num_rows($dados) > 0) {
                                        while ($linha = mysqli_fetch_assoc($dados)) {
                                            echo '<tr>';
                                            echo '<td>' . $linha["id"] . '</td>';
                                            echo '<td><img src="' . $linha["imagem"] . '" width="120" height="120" /></td>';
                                            echo '<td>' . $linha["titulo"] . '</td>';
                                            echo '<td>' . $linha["descricao"] . '</td>';
                                            echo '<td>' . $linha["conteudo"] . '</td>';
                                            echo '<td>' . $linha["categoria"] . '</td>';
                                            echo '<td>' . $linha["autor"] . '</td>';
                                            echo '<td>' . $linha["registro"] . '</td>';
                                            echo '<td>';
                                            echo '<a class="btn btn-primary p-1 m-1 rounded-pill text-white" href="./update-blog.php?id=' . $linha["id"] . '">Editar</a>';
                                            echo '<a class="btn btn-danger p-1 m-1 rounded-pill text-white" href="./delete-blog.php?id=' . $linha["id"] . '">Excluir</a>';
                                            echo '</td>';
                                            echo '</tr>';
                                        }
                                    } else {
                                        echo '<tr><td colspan="5">Nenhum registro encontrado.</td></tr>';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
