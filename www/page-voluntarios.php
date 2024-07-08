<?php
    include "conexao.php";


    $query = "SELECT * FROM tb_voluntarios ORDER BY id DESC";
    $dados = mysqli_query($conn, $query);



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voluntários - Aceda</title>
    <link href="./assets/css/main.min.css?t=1712110939880" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.positus.global/production/resources/robbu/whatsapp-button/whatsapp-button.css">
    <link rel="icon" type="image/x-icon" href="./assets/img/favicons/android-icon-48x48.png">
    <style>
        @keyframes slide-in {
            from {
                transform: translateX(-100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .slide-in {
            animation: slide-in 0.8s ease-out forwards;
        }

        .text-wrap {
            word-wrap: break-word;
            overflow-wrap: break-word;
        }

        .img-standard {
            width: 100%;
            max-width: 350px;
            height: auto;
        }

        @media (min-width: 768px) {
            .img-standard {
                width: 350px;
                height: 200px;
                object-fit: cover;
            }
        }
        
        body {
			overflow-x: hidden;
		}
    </style>
</head>
<body style="font-family: Outfit;">
    <!-- NavBar -->
    <?php include_once "./template/navbar.php"; ?>
    <!-- NavBar -->
    <div style="background-color: #A3C8D8;">
        <br>
        <?php
            if ($dados) {
                while ($linha = mysqli_fetch_assoc($dados)) {
        ?>
                    <div class="container mb-3">
                        <div class="row bg-white p-3 align-items-center rounded-5">
                            <div class="col-12 col-md-4 text-center text-md-left mb-3 mb-md-0 slide-in">
                                <img class="rounded-pill img-fluid img-standard" src="<?php echo $linha['foto']; ?>" alt="Foto de <?php echo $linha['nome']; ?>" />
                            </div>
                            <div class="col-12 col-md-8 slide-in">
                                <span class="bg-warning text-dark mb-1 pt-0 pb-0 p-1 d-inline-block"><?php echo $linha['funcao']; ?></span>
                                <h3><?php echo $linha['nome']; ?></h3>
                                <p class="mb-3 text-wrap"><?php echo nl2br($linha['resumo']); ?></p>
                                <div>
                                    <p><small class="d-block text-end">Período: <?php echo $linha['periodo']; ?></small></p>
                                </div>
                                <div>
                                    <p><small class="d-block text-end"><a href="<?php echo $linha['linkedin']; ?>">Linkedin</a></small></p>
                                </div>
                            </div>
                        </div>
                    </div>
        <?php
                }
            }
        ?>

        <div class="bg-primary text-white text-center rounded-5 p-2 mt-2">
            <h3>Seja um Voluntário aceda!</h3>
        <p><small class="d-block">Interessado em se tornar parte do nosso time de voluntários? Entre em contato conosco para saber mais sobre as oportunidades disponíveis e como você pode contribuir para nossa missão.</small></p>
        </div>
        <br>
        
    </div>
    
    <!-- Footer -->
    <?php include_once "./template/footer.php"; ?>
    <!-- /Footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <a id="robbu-whatsapp-button" target="_blank" href="https://api.whatsapp.com/send?phone=5511958771996">
        <div class="rwb-tooltip">Fale com a ACEDA</div>
        <img src="https://cdn.positus.global/production/resources/robbu/whatsapp-button/whatsapp-icon.svg">
    </a>
</body>
</html>
