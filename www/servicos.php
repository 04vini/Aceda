<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../www/assets/css/estilo.sass/style.css">
    <link rel="stylesheet" href="../www/assets/css/estilo.css/fontes.css">
    <link rel="stylesheet" href="../www/assets/css/estilo.css/style.css">
    <link rel="stylesheet"
        href="https://cdn.positus.global/production/resources/robbu/whatsapp-button/whatsapp-button.css">
    <link rel="icon" type="image/x-icon" href="./assets/img/favicons/android-icon-48x48.png">
    <style>
        body {
            font-family: 'Outfit';
        }

        /* CÓDIGO CSS/CARROSEL DE SERVIÇOS - NÃO CONSEGUI FAZER O CSS E O JAVASCRIPT DO CARROSEL DE SERVIÇOS FUNCIONAR FORA DO CÓDIGO HTML */

        .slider {
            height: 400px;
            display: flex;
            overflow: hidden;
            position: relative;
        }

        .slide-card {
            width: 300px;
            flex: 0 0 auto;
            transition: transform 0.5s ease;
        }

        .arrow {
            width: 40px;
            height: 40px;
        }

        .bg-disabled {
            background-color: #e5e3e7;
        }

        .slider-wrap {
            display: flex;
            transition: transform 1s ease-in-out;
        }

        .slider-wrap.grabbing {
            cursor: grabbing;
            cursor: -webkit-grabbing;
        }
    </style>
    <title>Serviços ACEDA</title>
</head>

<body>

    <!-- NavBar -->
    <?php include_once "./template/navbar.php" ?>
    <!-- NavBar -->


    <!-- CABEÇALHO -->
    <div class="shadow-custom image-back"
        style="background-image: url('../www/assets/img/mãos-dadas.png'); background-position: center;">
        <div class="container text-white">
            <div class="row">
                <div class="col-lg-5 col-md-12 text-center">
                    <h1 class="pt-4 pb-0 fw-bold display-5 shadow-custom-text">SERVIÇOS</h1>
                    <img class="align-items-center img-fluid" src="assets/img/logo-azul-aceda2x.png"
                        alt="ACEDA Serviços">
                </div>
                <div class="col-lg-7 col-md-12">
                    <h3 class="m-lg-5 text-center pt-4 pb-3 fw-semibold shadow-custom-text">
                        A ACEDA oferece uma ampla gama de serviços para impulsionar seu negócio e facilitar sua vida.
                        <br>
                        Confira aqui o que podemos fazer por você!
                    </h3>
                </div>
            </div>
        </div>
    </div>

    <!-- SESSÃO ACEDA MONITORA -->
    <section class="container mt-5 mb-5">
        <div class="d-flex justify-content-center">
            <img class="img-fluid" src="../www/assets/img/acedamonitora@3x.png" style="max-width: 55%; height: auto;">
        </div>
        <div class="row mt-3">
            <div class="col-12 col-md-5 order-md-first">
                <div class="d-flex justify-content-center">
                    <video src="../www/assets/videos/Camerite video.mp4" class="mt-3 rounded-2 shadow"
                        style="max-width: 56%; height: auto;" autoplay loop muted>
                    </video>
                </div>
            </div>
            <div class="col-12 col-md-7 order-md-last">
                <div class="text-start p-4">
                    <h1 class="text-center">O seu parceiro em segurança comunitária!</h1> <br>
                    <p class="text-justify-space">Com mais de 35 câmeras estrategicamente posicionadas no bairro do Sol
                        Nascente, o <strong>ACEDA Monitora</strong>
                        vai além de um simples sistema de vigilância - é uma iniciativa de cuidado coletivo que une
                        vizinhos em prol da segurança e bem-estar de todos.</p>
                    <br>
                    <h2 class="text-center">Porque escolher a ACEDA MONITORA?</h2>
                    <br>
                    <ul>
                        <li>Acesso 24 horas;</li>
                        <li>Gravação em Nuvem;</li>
                        <li>Acesso Web+App;</li>
                        <li>Chat e Alerta com Localização;</li>
                        <li>Central de Inteligência;</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- ACEDA DIVULGA -->
    <section class="container mt-5 mb-5">
        <div class="d-flex justify-content-center">
            <img class="img-fluid" src="../www/assets/img/divulgaaceda.png" style="max-width: 48%; height: auto;">
        </div>
        <div class="container mt-3">
            <div class="row">
                <div class="col-12 col-md-7 text-center text-md-start">
                    <div class="p-4">
                        <h1 class="text-center">Potencialize o alcance do seu comércio.</h1>
                        <p class="pt-3 text-justify">Amplie o alcande dos seus produtos e serviços com o <strong>DIVULGA
                                ACEDA!</strong> Nosso programa é projetado para promover o comércio local de
                            Perus/Anhanguera, levando suas
                            ofertas a mais clientes na região.
                        <h2 class="text-center">Como funciona?</h2>
                        <ol class="text-justify">
                            <li>Envio de conteúdo: Você nos envi suas fotos, textos, logomarca, produtos e serviços.
                            </li>
                            <li>Criação da arte: Nossa equipe cria a arte de divulgação baseada no material enviado.
                            </li>
                            <li>Aprovação: Enviamos o material para sua análise e aprovação.</li>
                            <li>Publicação: Após aprovação, publicamos nos stories de nossas redes sociais e nos grupos
                                que a ACEDA participa.</li>
                        </ol>
                    </div>
                </div>
                <div class="col-12 col-md-5 text-center mt-2">
                    <img src="../www/assets/img/divulga-aceda-img14.jpeg"
                        class="img-fluid mt-3 rounded-2 shadow mx-auto" style="max-width: 95%; max-height: 85%;">
                </div>
            </div>
        </div>
    </section>

    <!-- OUTROS SERVIÇOS -->

    <div style="background-color:  #2C4D97;" class="pb-1 shadow">
        <!-- SLIDE DE SERVIÇOS -->
        <section class="p-md-2 p-2 mb-5 container">
            <h1 class="text-center text-white pt-4 shadow-custom-text">Conheça nossos demais serviços</h1>
            <div class="container position-relative">
                <div class="slider d-flex align-items-center justify-content-start overflow-hidden position-relative">
                    <div class="slider-wrap d-flex align-items-center position-absolute">
                        <!-- Cards de Serviços -->
                        <div class="slide-card position-relative bg-white shadow-sm mx-2 rounded">
                            <div class="text-decoration-none">
                                <img src="assets/img/img-carrosel-servicos/Card 1 - nota-fiscal.png" alt="slide"
                                    style="display: flex; width: 50%; margin: auto;" class="w-50 mt-3">
                                <div class="content p-2 mt-3 text-center">
                                    <h4 class="fw-bold text-dark">Emissão NF-e (Nota Fiscal Eletrônica)</h4>
                                    <p>Emita suas notas fiscais eletrônicas com rapidez e facilidade, garantindo
                                        conformidade com as regulamentações fiscais.</p>
                                </div>
                            </div>
                        </div>
                        <div class="slide-card position-relative bg-white shadow-sm mx-2 rounded">
                            <div class="text-decoration-none">
                                <img src="../www/assets/img/img-carrosel-servicos/Card 2 - curriculos.png" alt="slide"
                                    style="display: flex; width: 50%; margin: auto;" class="w-50 mt-3">
                                <div class="content p-2 mt-3 text-center">
                                    <h4 class="fw-bold text-dark">Elaboração eficiente de Currículos (CV)</h4>
                                    <p>Conte com nossa expertise para elaborar um currículo que destaque suas
                                        habilidades e experiências de forma profissional.</p>
                                </div>
                            </div>
                        </div>
                        <div class="slide-card position-relative bg-white shadow-sm mx-2 rounded">
                            <div class="text-decoration-none">
                                <img src="../www/assets/img/img-carrosel-servicos/Card 3 - consultar INSS.png"
                                    alt="slide" style="display: flex; width: 50%; margin: auto;" class="w-50 mt-3">
                                <div class="content p-2 mt-3 text-center">
                                    <h4 class="fw-bold text-dark">Consulta do cadastro no INSS</h4>
                                    <p>Acesse todas as informações necessárias sobre sua previdência social através de
                                        nosso serviço de consulta INSS.</p>
                                </div>
                            </div>
                        </div>
                        <div class="slide-card position-relative bg-white shadow-sm mx-2 rounded">
                            <div class="text-decoration-none">
                                <img src="../www/assets/img/img-carrosel-servicos/Card 4 - Cadastro bilhete unico.png"
                                    alt="slide" style="display: flex; width: 50%; margin: auto;" class="w-50 mt-3">
                                <div class="content p-2 mt-3 text-center">
                                    <h4 class="fw-bold text-dark">Cadastro Bilhete Único e Idoso</h4>
                                    <p>Simplificamos o processo de cadastro para o Bilhete Único e Bilhete do Idoso,
                                        garantindo acesso facilitado ao transporte público para os idosos.</p>
                                </div>
                            </div>
                        </div>
                        <div class="slide-card position-relative bg-white shadow-sm mx-2 rounded">
                            <div class="text-decoration-none">
                                <img src="assets/img/img-carrosel-servicos/Card 5 - poupa-tempo.png" alt="slide"
                                    style="display: flex; width: 50%; margin: auto;" class="w-50 mt-3">
                                <div class="content p-2 mt-3 text-center">
                                    <h4 class="fw-bold text-dark">Agendamentos Poupa Tempo</h4>
                                    <p>Oferecemos agendamento de serviços no Poupa Tempo, com destaque para a emissão de
                                        segunda via de documentos pessoais.</p>
                                </div>
                            </div>
                        </div>
                        <div class="slide-card position-relative bg-white shadow-sm mx-2 rounded">
                            <div class="text-decoration-none">
                                <img src="assets/img/img-carrosel-servicos/Card 6 - processo-procon.png" alt="slide"
                                    style="display: flex; width: 50%; margin: auto;" class="w-50 mt-3">
                                <div class="content p-2 mt-3 text-center">
                                    <h4 class="fw-bold text-dark">Abertura de Processos PROCON</h4>
                                    <p>Auxiliamos você na abertura de processos no Procon, garantindo suporte
                                        especializado e eficiente para resolver suas questões de consumo. </p>
                                </div>
                            </div>
                        </div>
                        <div class="slide-card position-relative bg-white shadow-sm mx-2 rounded">
                            <div class="text-decoration-none">
                                <img src="assets/img/img-carrosel-servicos/Card 8 - divida.png" alt="slide"
                                    style="display: flex; width: 50%; margin: auto;" class="w-50 mt-3">
                                <div class="content p-2 mt-3 text-center">
                                    <h4 class="fw-bold text-dark">Consulta Desenrola (Dívida Ativa)</h4>
                                    <p>Através do serviço de Consulta Desenrola, oferecemos uma maneira simples e rápida
                                        de verificar suas dívidas ativas. </p>
                                </div>
                            </div>
                        </div>
                        <div class="slide-card position-relative bg-white shadow-sm mx-2 rounded">
                            <div class="text-decoration-none">
                                <img src="assets/img/img-carrosel-servicos/Card 9 - lei-comercio.png" alt="slide"
                                    style="display: flex; width: 50%; margin: auto;" class="w-50 mt-3 pt-4">
                                <div class="content p-2 mt-3 text-center">
                                    <h4 class="fw-bold text-dark">Consulta e Cadastro TPU ou Tô Legal</h4>
                                    <p>Ajudamos você a cadastrar seu comércio na cidade com o TPU (Termo de Permissão de
                                        Uso) ou Tô Legal.</p>
                                </div>
                            </div>
                        </div>
                        <div class="slide-card position-relative bg-white shadow-sm mx-2 rounded">
                            <div class="text-decoration-none">
                                <img src="assets/img/img-carrosel-servicos/Card 10 - pesquisa-serasa.png" alt="slide"
                                    style="display: flex; width: 50%; margin: auto;" class="w-50 mt-3">
                                <div class="content p-2 mt-3 text-center">
                                    <h4 class="fw-bold text-dark">Consultas SPC, SERASA e Cartórios</h4>
                                    <p>Oferecemos consultas ao SPC, SERASA e Cartórios para você conhecer sua situação
                                        financeira de forma dethada e precisa.</p>
                                </div>
                            </div>
                        </div>
                        <div class="slide-card position-relative bg-white shadow-sm mx-2 rounded">
                            <div class="text-decoration-none">
                                <img src="assets/img/img-carrosel-servicos/Card 11 - receita-federal.png" alt="slide"
                                    style="display: flex; width: 50%; margin: auto;" class="w-50 mt-3">
                                <div class="content p-2 mt-3 text-center">
                                    <h4 class="fw-bold text-dark">Alteração de Dados na Receita Federal</h4>
                                    <p>Oferecemos consultas ao SPC, SERASA e Cartórios para você conhecer sua situação
                                        financeira de forma dethada e precisa.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- BOTÕES DE ROLAGEM DO SLIDE -->

                <button id="previous-arrow"
                    class="btn bg-white shadow-sm rounded-circle position-absolute d-flex align-items-center justify-content-center arrow"
                    style="top: 50%; left: 10px; transform: translateY(-50%); z-index: 1;">
                    <i class="bi bi-chevron-left"></i>
                </button>
                <button id="next-arrow"
                    class="btn bg-white shadow-sm rounded-circle position-absolute d-flex align-items-center justify-content-center arrow"
                    style="top: 50%; right: 10px; transform: translateY(-50%); z-index: 1;">
                    <i class="bi bi-chevron-right"></i>
                </button>
            </div>
        </section>
    </div>

    <!-- CÓDIGO SCRIPT DO CARROSEL DE OUTROS SERVIÇOS DA ACEDA,
NÃO CONSEGUI FAZER O CARROSEL FUNCIONAR SEM COLOCAR ELE DIRETO
NO ARQUIVO HTML-->

<script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('.slide-card');
    const slideCount = slides.length;
    const slideWidth = 320;
    const visibleSlides = 4;  // Quantidade de slides visíveis no carrossel
    let isDragging = false;
    let startPos = 0;
    let currentTranslate = 0;
    let prevTranslate = 0;
    let animationID = 0;
    const sliderWrap = document.querySelector('.slider-wrap');

    // Clone all slides and append them to the end
    for (let i = 0; i < slideCount; i++) {
        const clone = slides[i].cloneNode(true);
        sliderWrap.appendChild(clone);
    }

    function nextSlide() {
        currentSlide++;
        if (currentSlide === slideCount) {
            setTimeout(() => {
                sliderWrap.style.transition = 'none';
                currentSlide = 0;
                sliderWrap.style.transform = `translateX(-${currentSlide * slideWidth}px)`;
            }, 1000);
        }
        updateSlide(currentSlide);
    }

    function previousSlide() {
        if (currentSlide === 0) {
            currentSlide = slideCount - visibleSlides;
            sliderWrap.style.transition = 'none';
            sliderWrap.style.transform = `translateX(-${currentSlide * slideWidth}px)`;
            setTimeout(() => {
                sliderWrap.style.transition = 'transform 1s ease-in-out';
                currentSlide--;
                updateSlide(currentSlide);
            }, 20);
        } else {
            currentSlide--;
            updateSlide(currentSlide);
        }
    }

    function updateSlide(index) {
        sliderWrap.style.transition = 'transform 1s ease-in-out';
        sliderWrap.style.transform = `translateX(-${index * slideWidth}px)`;
    }

    document.querySelector("#next-arrow").addEventListener('click', nextSlide);
    document.querySelector("#previous-arrow").addEventListener('click', previousSlide);

    // Mouse events
    sliderWrap.addEventListener('mousedown', dragStart);
    sliderWrap.addEventListener('mouseup', dragEnd);
    sliderWrap.addEventListener('mouseleave', dragEnd);
    sliderWrap.addEventListener('mousemove', drag);

    // Touch events
    sliderWrap.addEventListener('touchstart', dragStart);
    sliderWrap.addEventListener('touchend', dragEnd);
    sliderWrap.addEventListener('touchmove', drag);

    function dragStart(event) {
        isDragging = true;
        startPos = getPositionX(event);
        prevTranslate = currentTranslate;
        animationID = requestAnimationFrame(animation);
        sliderWrap.classList.add('grabbing');
    }

    function dragEnd() {
        isDragging = false;
        cancelAnimationFrame(animationID);
        const movedBy = currentTranslate - prevTranslate;

        if (movedBy < -100 && currentSlide < slideCount - 1) {
            currentSlide++;
        }

        if (movedBy > 100 && currentSlide > 0) {
            currentSlide--;
        }

        setPositionByIndex();
        sliderWrap.classList.remove('grabbing');
    }

    function drag(event) {
        if (isDragging) {
            const currentPosition = getPositionX(event);
            currentTranslate = prevTranslate + currentPosition - startPos;
        }
    }

    function getPositionX(event) {
        return event.type.includes('mouse') ? event.pageX : event.touches[0].clientX;
    }

    function animation() {
        setSliderPosition();
        if (isDragging) requestAnimationFrame(animation);
    }

    function setSliderPosition() {
        sliderWrap.style.transform = `translateX(${currentTranslate}px)`;
    }

    function setPositionByIndex() {
        currentTranslate = currentSlide * -slideWidth;
        prevTranslate = currentTranslate;
        setSliderPosition();
    }
</script>


    <!-- BOTÃO WHATSAPP DA ACEDA -->
    <a id="robbu-whatsapp-button" target="_blank" href="https://api.whatsapp.com/send?phone=5511958771996">
        <div class="rwb-tooltip">Fale com a ACEDA</div>
        <img src="https://cdn.positus.global/production/resources/robbu/whatsapp-button/whatsapp-icon.svg">
    </a>

    <!-- RODAPÉ -->
    <?php include_once "./template/footer.php" ?>
    <!-- RODAPÉ -->
</body>

</html>