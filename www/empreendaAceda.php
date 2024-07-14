<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empreenda aceda</title>
    <link href="./assets/css/main.min.css?t=1712110939880" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.positus.global/production/resources/robbu/whatsapp-button/whatsapp-button.css">
	<link rel="icon" type="image/x-icon" href="./assets/img/favicons/android-icon-48x48favicon.png">
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const alertBox = document.getElementById("alertBox");
            if (alertBox) {
                setTimeout(() => {
                    alertBox.style.display = 'none'; // 5 Segundos
                }, 5000);
            } else {
                console.error("Elemento com ID 'alertBox' não encontrado");
            }
        });
    </script>
</head>

<body style="font-family: Outfit;">
    <!-- NavBar -->
    <?php include_once "./template/navbar.php" ?>
    <!-- NavBar -->
    
    <!-- Hero -->
    <!-- Aqui pode ser adicionado algum conteúdo hero, se necessário -->

    <!-- Mensagem de Alerta -->
    <?php
    // Exibe mensagem se houver
    if (isset($_GET["mensagem"]) && !empty($_GET["mensagem"])) {
    ?>
    <div id="alertBox" class="alert alert-warning text-center">
        <?php echo htmlspecialchars($_GET["mensagem"], ENT_QUOTES, 'UTF-8'); ?>
    </div>
    <?php } ?>
    
    <!-- Conteúdo Principal -->
    
        <div class="row">
            <div class="col">
                <img class="img-fluid img-thumbnail" src="./assets/img/Aceda imagens/Empreenda Aceda.png" alt="Menina Sorrindo">
            </div>
        </div>
        <div class="container">    
        <!-- Formulário de Inscrição -->
        <div class="row">
            <div class="col">
                <section class="container">
                    <h2 class="text-center mb-3">Empreenda aceda</h2>
                    <p>VAGAS: 20<br>
                    Endereço do evento: Av. Euclides da Cunha, 705 - Sol Nascente<br>
                    Dúvidas entre em contato através do telefone ou WhatsApp: 11958771996<br>
                    Será disponibilizado para os comerciantes expositores:<br>
                    Montagem e desmontagem do evento;<br>
                    Tenda para exposição dos produtos 2M; <br>
                    01 mesa de plástico tipo Buffet branca e 01 cadeira branca<br>
                    Banheiro;<br>
                    Água, Chá e café;<br>
                    Música<br>
                    Sorteios<br>
                    Divulgação audiovisual (Vídeo em redes sociais, arte com data e local do evento).<br>
                    Gravação de Vídeo antes para apresentação do seu negócio e durante o evento;<br>
                    O vídeo deverá ser gravado preferencialmente em fundo branco pelo expositor e enviado. (Opcional que faz a diferença).<br>
                    INVESTIMENTO:<br>
                    01 dia de evento: R$80,00<br>
                    02 dias de evento: R$120,00<br>
                    💰 CONFIRMAÇÃO E PAGAMENTO:<br>
                    A participação será confirmada após a inscrição e contribuição, você poderá realizar o pagamento presencialmente em dinheiro, cartão ou virtualmente através do PIX.<br>
                    CHAVE PIX 11958771996, por favor nos envie o comprovante para o mesmo número, pois ele é celular e dessa forma confirmaremos sua participação.<br>
                    Em caso de cancelamento nos informe com 72h antes do evento, após este período não reembolsaremos valores referente sua participação.<br>
                    📌ATENÇÃO:<br>
                    Caso você opte por dividir sua tenda, informe no formulário abaixo o nome dos dois negócios, redes sociais e envie as duas logomarcas.<br>
                    DURANTE O EVENTO:<br>
                    Solicitamos que os expositores cheguem com pelo menos uma hora de antecedência para organização do espaço.<br>
                    Não será disponibilizado extensões, bancada adicional, plug, ganchos ou acessórios para o funcionamento de equipamentos eletroeletrônicos.<br>
                    NÃO SERÁ PERMITIDO A VENDA DE RIFAS DURANTE O EVENTO.<br>
                    OPCIONAL: DOE UM BRINDE PARA O NOSSO EVENTO E FAÇA SUA MARCA SER RECONHECIDA APÓS A FEIRA, TEM DADO SUPER CERTO E MOVIMENTA A COMUNIDADE TAMBÉM.<br>
                    😊Será um prazer tê-lo conosco!!!😉</p>
                    
                    <!-- Formulário de Inscrição -->
                    <form method="POST" enctype="multipart/form-data" action="insert-empreenda.php">
                        <div class="mb-3">
                            <label for="InputNome" class="form-label">Nome do Responsável</label>
                            <input type="text" class="form-control" id="InputNome" name="InputNome">
                        </div>
                        <div class="mb-3">
                            <label for="InputNegocio" class="form-label">Nome do seu Negócio</label>
                            <input type="text" class="form-control" id="InputNegocio" name="InputNegocio" aria-describedby="negocioInfo">
                            <div id="negocioInfo" class="form-text">Caso possua mais de um negócio ou vá dividir sua tenda informe</div>           
                        </div>
                        <div class="mb-3">
                            <label for="InputWhats" class="form-label">Celular/WhatsApp</label>
                            <input type="text" class="form-control" id="InputWhats" name="InputWhats">
                        </div>
                        <div class="mb-3">
                            <label for="InputRedesSoc" class="form-label">Redes Sociais</label>
                            <input type="text" class="form-control" id="InputRedesSoc" name="InputRedesSoc" aria-describedby="redeInfo">
                            <div id="redeInfo" class="form-text">Instagram, Facebook ou TikTok</div>
                        </div>
                        <div class="mb-3">
                            <label for="InputLoja" class="form-label">Possui loja física?</label>
                            <input type="text" class="form-control" id="InputLoja" name="InputLoja" aria-describedby="lojaInfo">
                            <div id="lojaInfo" class="form-text">Se sim, informe: Endereço e Horário de funcionamento.</div>           
                        </div>
                        <div class="form-check">
                            <p>Você possui logomarca? (Caso não possua será utilizado apenas o nome do seu negócio)</p>
                            <input class="form-check-input" type="radio" name="flexLogo" id="flexLogoS" value="SIM">
                            <label class="form-check-label" for="flexLogoS">
                                SIM
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="flexLogo" id="flexLogoN" value="NAO">
                            <label class="form-check-label" for="flexLogoN">
                                NÃO
                            </label>
                        </div>
                        <div class="mb-3">
                            <label for="formLogo" class="form-label">Envie sua LogoMarca</label>
                            <input class="form-control form-control-lg" id="formLogo" type="file" name="formLogo">
                        </div>
                        <div class="form-check">
                            <p>Termo de Autorização LGPD</p>
                            <p>Informamos que os seus dados pessoais serão utilizados para o cumprimento de obrigações contratuais, legais e regulatórias do SEBRAE AQUI - ACEDA em razão de suas atividades, para a execução de seus Programas e prestação de serviços, para fomentar, desenvolver e melhorar soluções para empreendedores e pequenos negócios, para oferecer produtos e serviços que sejam do seu interesse, para realizar pesquisas com os clientes que foram atendidos entre o SEBRAE AQUI - ACEDA e para realizar a comunicação oficial pelo SEBRAE ou por seus prestadores de serviço, por telefone, e-mail, SMS, WhatsApp, etc. Caso você queira conhecer um pouco mais de como o SEBRAE trata os seus dados pessoais, você pode acessar o seu Portal em www.sebrae.com.br/lgpd, lá reunimos um conjunto de informações sobre como estamos atuando com os dados pessoais de nossos clientes, com foco em segurança e transparência. Para Ao prosseguir com seu cadastro, o senhor (a), concorda com nossa política de privacidade e autoriza o Sebrae a realizar o tratamento de seus dados pessoais, INCLUSIVE OS DADOS PESSOAIS SENSÍVEIS, ASSIM DEFINIDOS NO ART. 5, II DA LEI Nº 13.709 DE 2.018, OS QUAIS, ESCLARECEMOS, SÃO COLETADOS PARA FINS MERAMENTE ESTATÍSTICOS E DE ESTUDOS DE DESENVOLVIMENTO SOCIAL.</p>
                            <input class="form-check-input" type="radio" name="flexPrivacidade" id="flexPrivacidadeAcept" value="ACEITO">
                            <label class="form-check-label" for="flexPrivacidadeAcept">
                                ACEITO
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="flexPrivacidade" id="flexPrivacidadeNAcept" value="NAO ACEITO">
                            <label class="form-check-label" for="flexPrivacidadeNAcept">
                                NÃO ACEITO
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary text-white">Enviar</button>
                    </form>
                    <!-- Fim do Formulário de Inscrição -->
                </section>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include_once "./template/footer.php" ?>
    <!-- Footer -->  

    <!-- Botão do WhatsApp -->
    <a id="robbu-whatsapp-button" target="_blank" href="https://api.whatsapp.com/send?phone=5511958771996"> 
        <div class="rwb-tooltip">Fale com a ACEDA</div> 
        <img src="https://cdn.positus.global/production/resources/robbu/whatsapp-button/whatsapp-icon.svg"> 
    </a>

    <script src="./assets/js/main.min.js?t=1712110939880" crossorigin="anonymous"></script>

</body>
</html>
