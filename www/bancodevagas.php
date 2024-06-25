<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currículos</title>
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
                console.error("Elemento com ID 'alertBox' não encontrado");
            }
        });
    </script>
</head>
<body>
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
        <div class="col-12">
            <img class="img-fluid img-thumbnail" src="./assets/img/curriculos2.png" alt="Menina Sorrindo">
        </div>
    </div>

    <!--Contate-nos-->
    <section class="container">
        <form method="POST" enctype="multipart/form-data" action="insert-bancodevagas.php">
            <div class="mb-3">
                <label for="InputNome" class="form-label">Nome Completo</label>
                <input type="text" class="form-control" id="InputNome" name="InputNome">
            </div>
            <div class="mb-3">
                <label for="InputDataNasc" class="form-label">Data de nascimento</label>
                <input type="date" class="form-control" id="InputDataNasc" name="InputDataNasc">
            </div>
            
            <p>Sexo</p>
            <select class="form-select mb-3" name="sexo">
                <option value="" default>-- Selecione --</option>
                <option value="masculino">Masculino</option>
                <option value="feminino">Feminino</option>
                <option value="outros">Outros</option>
                <option value="naoinformar">Prefiro Não informar</option>
            </select>

            <div class="mb-3">
                <label for="InputEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="InputEmail" name="InputEmail" aria-describedby="emailInfo">
                <div id="emailInfo" class="form-text">Nunca compartilharemos seu e-mail com mais ninguém.</div>
            </div>
            <div class="mb-3">
                <label for="InputPO" class="form-label">País de origem</label>
                <input type="text" class="form-control" id="InputPO" name="InputPO">
            </div>
            <div class="mb-3">
                <label for="InputCPF" class="form-label">CPF</label>
                <input type="number" class="form-control" id="InputCPF" name="InputCPF">
            </div>           
            <div class="mb-3">
                <label for="InputWhats" class="form-label">Celular/WhatsApp</label>
                <input type="number" class="form-control" id="InputWhats" name="InputWhats">
            </div>
            <div class="mb-3">
                <label for="InputTEL" class="form-label">Telefone Fixo</label>
                <input type="number" class="form-control" id="InputTEL" name="InputTEL">
            </div>
            <div class="mb-3">
                <label for="InputEst" class="form-label">Estado</label>
                <input type="text" class="form-control" id="InputEst" name="InputEst">
            </div>
            <div class="mb-3">
                <label for="InputCid" class="form-label">Cidade</label>
                <input type="text" class="form-control" id="InputCid" name="InputCid" aria-describedby="cidInfo">
                <div id="cidInfo" class="form-text">Caso possua empresa aberta.</div>
            </div>
            <div class="mb-3">
                <label for="InputLink" class="form-label">LinkedIn</label>
                <input type="text" class="form-control" id="InputLink" name="InputLink" aria-describedby="linkInfo">
                <div id="linkInfo" class="form-text">Opcional.</div>
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
                <input class="form-check-input" type="radio" name="flexPrivacidade" id="flexPrivacidadeNAcept" value="NÃO ACEITO" checked>
                <label class="form-check-label" for="flexPrivacidadeNAcept">
                  NÃO ACEITO
                </label>
            </div>
            <button type="submit" class="btn btn-primary text-white">Enviar</button>
        </form>
    </section>
    <!-- Footer -->
    <?php include_once "./template/footer.php" ?>
    <!-- Footer -->  
    <a id="robbu-whatsapp-button" target="_blank" href="https://api.whatsapp.com/send?phone=5511958771996"> 
        <div class="rwb-tooltip">Fale com a ACEDA</div> 
        <img src="https://cdn.positus.global/production/resources/robbu/whatsapp-button/whatsapp-icon.svg"> 
    </a>
</body>
</html>
