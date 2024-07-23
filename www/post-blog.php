<?php
include "conexao.php";

$query = "SELECT * FROM tb_blog where id = ".$_GET["id"];
$dados = mysqli_query($conn, $query);
$linha = mysqli_fetch_assoc($dados);

if ($linha && isset($linha["registro"])) {
    $dataHora = strtotime($linha["registro"]);
    $registroFormatado = date("d/m/Y H:i:s", $dataHora);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - aceda</title>
    <!-- Bootstrap CSS-->
    <link href="./assets/css/main.min.css?t=1712110939880" rel="stylesheet" crossorigin="anonymous">
    <!-- Ícones Bootstrap -->
    <link href="./assets/css/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Estilos locais -->
    <link rel="stylesheet" href="./assets/css/estilo.sass/style.css">
    <link rel="stylesheet" href="./assets/css/estilo.css/fontes.css">
    <link rel="stylesheet" href="./assets/css/estilo.css/style.css">
    <style>
        body {
            overflow-x: hidden;
        }

        #robbu-whatsapp-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: #25d366;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            transition: transform 0.3s ease;
        }

        #robbu-whatsapp-button:hover {
            transform: scale(1.1);
        }

        #robbu-whatsapp-button img {
            width: 40px;
            height: 40px;
        }

        .rwb-tooltip {
            position: absolute;
            bottom: 70px;
            right: 0;
            background-color: #333;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
            display: none;
        }

        #robbu-whatsapp-button:hover .rwb-tooltip {
            display: block;
        }

    </style>
</head>
<body>
    <!-- NavBar -->
    <?php include_once "./template/navbar.php" ?>
    <!-- NavBar -->
    <!--Noticia-->
    <div style="background-color:  #2C4D97;">
        <br>
        <div class="m-4 p-2 bg-white rounded-5">
            <div class="row">
                <div>
                    <img src="<?php echo $linha["imagem"];?>" class="img-fluid" alt="Responsive image">
                </div>
                <div class="col-12">
                    <h2 class="m-5 text-center"><?php echo $linha["titulo"];?></h2>
                    <div class="m-5"><?php echo $linha["conteudo"];?></div>
                    <span class="row justify-content-end col-me-3 me-1">Postado por: <?php echo $linha["autor"];?></span>
                    <p class=""><small class="row justify-content-end col-me-3 sm me-1"><?php echo $registroFormatado;?></small></p>
                </div>
            </div>
        </div>
        <br>
    </div>

    <script src="./assets/js/main.min.js?t=1712110939880" crossorigin="anonymous"></script>

    <!-- footer -->
    <?php include_once "./template/footer.php" ?>
    <!-- footer -->
    <a id="robbu-whatsapp-button" target="_blank" href="https://api.whatsapp.com/send?phone=5511958771996">
        <img src="./assets/img/whatsapp-icon.png">
    </a>
</body>
</html>
