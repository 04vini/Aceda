<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voluntários - Aceda</title>
    <link href="./assets/css/main.min.css?t=1712110939880" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.positus.global/production/resources/robbu/whatsapp-button/whatsapp-button.css">
    <link rel="icon" type="image/x-icon" href="./assets/img/favicons/android-icon-48x48.png">
</head>
<body style="font-family: Outfit;">
    <!-- NavBar -->
    <?php include_once "./template/navbar.php"; ?>
    <!-- NavBar -->
    <!--BLOG-->
    <?php
    include "conexao.php";
    ?>

    <div style="background-color: #A3C8D8;">
        <br>
        <div class="container mb-1 mt-2">
            <div class="row bg-white p-5">
                <div class="col img-fluid text-left">
                    <img class="rounded-circle pe-2" src="../www/assets/img/1.png" width="300" height="290" />
                </div>
                <div class="col text-right">
                    <span class="bg-warning text-dark mb-1 pt-0 pb-0 p-1 font-sm">DESENVOLVEDOR FULLSTACK</span>
                    <h3>NOME SOBRENOME</h3>
                    <p>Resumo profissional</p>
                    <div class="row">
                        <p class=""><small class="row justify-content-end col-me-3 sm me-1">Período de contribuição</small></p>
                        <a class="col btn btn-primary m-1 mt-0 me-0 mb-0 rounded-pill text-white" href="#">Saiba mais</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mb-1 mt-2">
            <div class="row bg-white p-5">
                <div class="col img-fluid text-left">
                    <img class="rounded-circle pe-2" src="../www/assets/img/1.png" width="300" height="290" />
                </div>
                <div class="col text-right">
                    <span class="bg-warning text-dark mb-1 pt-0 pb-0 p-1 font-sm">DESENVOLVEDOR FULLSTACK</span>
                    <h3>NOME SOBRENOME</h3>
                    <p>Resumo profissional</p>
                    <div class="row">
                        <p class=""><small class="row justify-content-end col-me-3 sm me-1">Período de contribuição</small></p>
                        <a class="col btn btn-primary m-1 mt-0 me-0 mb-0 rounded-pill text-white" href="#">Saiba mais</a>
                    </div>
                </div>
            </div>
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