<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Aceda</title>
    <link href="./assets/css/main.min.css?t=1712110939880" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.positus.global/production/resources/robbu/whatsapp-button/whatsapp-button.css">
</head>
<body>
    <!-- NavBar -->
    <?php include_once "./template/navbar.php"; ?>
    <!-- NavBar -->
    <!--BLOG-->
    <?php
    include "conexao.php";

    // Número de registros por página
    $registros_por_pagina = 5;

    // Página atual
    $pagina_atual = isset($_GET['pagina']) ? intval($_GET['pagina']) : 1;

    // Calcula o offset
    $offset = ($pagina_atual - 1) * $registros_por_pagina;

    // Consulta para contar o total de registros
    $query_total = "SELECT COUNT(*) as total FROM tb_blog";
    $resultado_total = mysqli_query($conn, $query_total);
    $total_registros = mysqli_fetch_assoc($resultado_total)['total'];

    // Consulta para buscar os registros
    $query = "SELECT * FROM tb_blog ORDER BY id DESC LIMIT $offset, $registros_por_pagina";
    $dados = mysqli_query($conn, $query);

    if ($dados) {
        while ($linha = mysqli_fetch_assoc($dados)) {
    ?>
        <div class="bg-dark">
            <br>
            <div class="container mb-1 mt-2">
                <div class="row bg-white rounded-pill p-5">
                    <div class="col-3 img-fluid text-left">
                        <img class="rounded-4 pe-2"src="<?php echo $linha['imagem']; ?>" width="270" height="220" />
                    </div>
                    <div class="col-9 text-right">
                        <span class="rounded-pill bg-warning text-dark mb-1 pt-0 pb-0 p-1 font-sm"><?php echo $linha['categoria']; ?></span>
                        <h3><?php echo $linha['titulo']; ?></h3>
                        <p><?php echo $linha['descricao']; ?></p>
                        <div class="row">
                            <span class="row justify-content-end col-me-3 me-5">Postado por: <?php echo $linha['autor']; ?></span>
                            <a class="col-2 btn btn-primary m-1 mt-0 me-0 mb-0 rounded-pill text-white" href="./post-blog.php?id=<?php echo $linha['id']; ?>">Ler Mais</a>
                        </div>
                    </div>
                </div>
        </div>
    <?php
        }
    }
    ?>
    </div>
    <!-- Paginação -->
    <div class="container">
        <div class="row justify-content-center">
            <nav>
                <ul class="pagination">
                    <?php
                    // Número total de páginas
                    $total_paginas = ceil($total_registros / $registros_por_pagina);

                    // Links de paginação
                    for ($i = 1; $i <= $total_paginas; $i++) {
                        $active = $i == $pagina_atual ? 'active' : '';
                        echo "<li class='page-item $active'><a class='page-link' href='?pagina=$i'>$i</a></li>";
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </div>

    <!-- Footer -->
    <?php include_once "./template/footer.php"; ?>
    <!-- /Footer -->
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <a id="robbu-whatsapp-button" target="_blank" href="https://api.whatsapp.com/send?phone=5511958771996">
        <div class="rwb-tooltip">Fale com a ACEDA</div>
        <img src="https://cdn.positus.global/production/resources/robbu/whatsapp-button/whatsapp-icon.svg">
    </a>
</body>
</html>
