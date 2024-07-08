<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitações Reunião Aceda</title>
    <link href="./assets/css/main.min.css?t=1712110939880" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.positus.global/production/resources/robbu/whatsapp-button/whatsapp-button.css">
    <link rel="icon" type="image/x-icon" href="./assets/img/favicons/android-icon-48x48.png">
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
    <style>
        body {
			overflow-x: hidden;
		}
    </style>
</head>
<body style="font-family: Outfit;">
    <!-- NavBar -->
    <?php include_once "./template/navbar.php" ?>
    <!-- NavBar -->
    <!--Hero-->
    <?php
            // Exibe mensagem se houver
            if (isset($_GET["mensagem"]) && !empty($_GET["mensagem"])) {
        ?>
            <div id="alertBox" class="alert alert-warning text-center">
                <?php echo htmlspecialchars($_GET["mensagem"], ENT_QUOTES, 'UTF-8'); ?>
            </div>
        <?php } ?>
    
    <div class="row">
        <div class="col">
            <img class="img-fluid img-thumbnail" src="./assets/img/Aceda solicitações.png" alt="Menina Sorrindo">
        </div>
    </div>

    <div class="row">
        <div class="col">
            <section class="container">
                <h2 class="text-center mb-3">Solicitações Reunião Aceda</h2>
                <p>
                    Traga sua demanda, solicitação e reivindicação para ACEDA.
                    <br>
                    Trabalhamos através de empenho e trabalho voluntário junto aos órgãos públicos na defesa dos interesses da comunidade e comércio do Distrito Anhanguera e região.
                    <br>
                    Participe das nossas reuniões mensais e acompanhe suas solicitações, toda primeira quarta-feira de cada mês as 19h, na Avenida Euclides da Cunha, 705 - Sol Nascente - São Paulo - SP.
                    <br>
                    Entre em contato com a ACEDA por WhatsApp (11) 95877-1996
                </p>
                <form method="POST" enctype="multipart/form-data" action="insert-solicitacoes.php">
                    <div class="mb-3">
                        <label for="InputNome" class="form-label">Nome Completo</label>
                        <input type="text" class="form-control" id="InputNome" name="InputNome">
                    </div>
                    <div class="mb-3">
                        <label for="InputEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="InputEmail" name="InputEmail">
                    </div>
                    <div class="mb-3">
                        <label for="InputEndereço" class="form-label">Endereço</label>
                        <input type="text" class="form-control" id="InputEndereço" name="InputEndereço">
                    </div>

                    <div class="mb-3">
                        <label for="InputWhats" class="form-label">Celular/WhatsApp</label>
                        <input type="number" class="form-control" id="InputWhats" name="InputWhats">
                    </div>
                    <div class="mb-3">
                        <label for="selectSolicitacao" class="form-label">Solicitação</label>
                        <select class="form-select" id="selectSolicitacao" name="selectSolicitacao">
                            <option value="" selected>Selecione</option>
                            <option value="Sabesp">Sabesp</option>
                            <option value="Enel">Enel</option>
                            <option value="Inss">INSS</option>
                            <option value="Impressao">Impressões de documentos</option>
                            <option value="SP156">SP156</option>
                            <option value="Poupatempo">Poupatempo</option>
                            <option value="Contrato">Contratos</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="InputOutros" class="form-label">Outros</label>
                        <input type="text" class="form-control" id="InputOutros" name="InputOutros">
                    </div>
                    
                    <div class="mb-3">
                        <label for="InputSol" class="form-label">Solicitou aos órgãos públicos?</label>
                        <input type="text" class="form-control" id="InputSol" name="InputSol" aria-describedby="solInfo">
                        <div id="solInfo" class="form-text">Se sim informe o órgão e nº de Protocolo.</div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="formImg" class="form-label">Deseja enviar uma imagem?</label>
                        <input class="form-control form-control-lg" id="formImg" name="formImg" type="file" aria-describedby="imgInfo">
                        <div id="imgInfo" class="form-text">Atenção para geolocalização de sua solicitação orientamos que fotos e vídeos sejam tirados através do aplicativo Timestamp Camera download: https://play.google.com/store/apps/details?id=com.jeyluta.timestampcamerafree&pcampaignid=web_share</div>
                    </div>

                    <div class="form-check">
                        <p>
                            Termo de Autorização LGPD
                            Informamos que os seus dados pessoais serão utilizados para o cumprimento de obrigações contratuais, legais e regulatórias do SEBRAE AQUI - ACEDA em razão de suas atividades, para a execução de seus Programas e prestação de serviços, para fomentar, desenvolver e melhorar soluções para empreendedores e pequenos negócios, para oferecer produtos e serviços que sejam do seu interesse, para realizar pesquisas com os clientes que foram atendidos entre o SEBRAE AQUI - ACEDA e para realizar a comunicação oficial pelo SEBRAE ou por seus prestadores de serviço, por telefone, e-mail, SMS, WhatsApp, etc. Caso você queira conhecer um pouco mais de como o SEBRAE trata os seus dados pessoais, você pode acessar o seu Portal em www.sebrae.com.br/lgpd, lá reunimos um conjunto de informações sobre como estamos atuando com os dados pessoais de nossos clientes, com foco em segurança e transparência. Para Ao prosseguir com seu cadastro, o senhor (a), concorda com nossa política de privacidade e autoriza o Sebrae a realizar o tratamento de seus dados pessoais, INCLUSIVE OS DADOS PESSOAIS SENSÍVEIS, ASSIM DEFINIDOS NO ART. 5, II DA LEI Nº 13.709 DE 2.018, OS QUAIS, ESCLARECEMOS, SÃO COLETADOS PARA FINS MERAMENTE ESTATÍSTICOS E DE ESTUDOS DE DESENVOLVIMENTO SOCIAL.
                        </p>
                        <input class="form-check-input" type="radio" name="flexPrivacidade" id="flexPrivacidadeAcept" value="ACEITO">
                        <label class="form-check-label" for="flexPrivacidadeAcept">
                            ACEITO
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" name="flexPrivacidade" id="flexPrivacidadeNAcept" value="NÃO ACEITO">
                        <label class="form-check-label" for="flexPrivacidadeNAcept">
                            NÃO ACEITO
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary text-white">Enviar</button>
                </form>
            </section>
        </div>
    </div>
    <!--Contate-nos-->
    
    <!-- Footer -->
    <?php include_once "./template/footer.php" ?>
    <!-- Footer --> 
    <a id="robbu-whatsapp-button" target="_blank" href="https://api.whatsapp.com/send?phone=5511958771996"> 
        <div class="rwb-tooltip">Fale com a ACEDA</div> 
        <img src="https://cdn.positus.global/production/resources/robbu/whatsapp-button/whatsapp-icon.svg"> 
    </a>
    <script src="./assets/js/main.min.js?t=1712110939880" crossorigin="anonymous"></script>
</body>
</html>
