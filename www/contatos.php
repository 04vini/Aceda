<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./assets/css/main.min.css?t=1712110939880" rel="stylesheet" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.positus.global/production/resources/robbu/whatsapp-button/whatsapp-button.css">
    <link rel="icon" type="image/x-icon" href="./assets/img/favicons/android-icon-48x48.png">
    <title>Contato | ACEDA</title>
    <style>
        body {
			overflow-x: hidden;
		}
    </style>
</head>
<body>
    <!-- NavBar -->
	<?php include_once "./template/navbar.php" ?>
	<!-- NavBar -->
    <!-- Main -->
    <div>
            <h2 class="bg-primary text-white p-5 mt-5">Contatos</h2>
    </div>
    
    <div class="container">
        
        <div class="row col-12 m-1 mt-3 text-center">           
            <div class="p-1 col-6">
                <strong>Email</strong>
                <p>contato@aceda.sampa.br</p> 
            </div>
            <div class="p-1 col-6">
                <strong>Telefone</strong>
                <p>+55 (11) 95877-1996</p> 
            </div>
            <div class="p-1 col-6">
                <strong>Instagram</strong> 
                <p><a href="https://www.instagram.com/aceda.sampa/">@aceda.sampa</a></p> 
            </div>
            <div class="p-1 col-6">
                <strong>Facebook</strong>
                <p><a href="https://www.facebook.com/aceda.sampa">aceda.sampa</a></p> 
            </div>
        </div>
        <a id="robbu-whatsapp-button" target="_blank" href="https://api.whatsapp.com/send?phone=5511958771996"> 
            <div class="rwb-tooltip">Fale com a ACEDA</div> 
            <img src="https://cdn.positus.global/production/resources/robbu/whatsapp-button/whatsapp-icon.svg"> 
        </a>

        <div class="items-center text-center m-1 mt-3 mb-3">
            
            <h3 class="mt-7">ACEDA - Associação Comercial e Empresarial do Distrito Anhanguera</h4>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3660.7254320837583!2d-46.779240225629756!3d-23.434283556934005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cefceff71bd54f%3A0x53cc67fcb61d3647!2sAv.%20Euclides%20da%20Cunha%2C%20705%20-%20Morada%20do%20Sol%2C%20S%C3%A3o%20Paulo%20-%20SP%2C%2005283-050!5e0!3m2!1spt-BR!2sbr!4v1715212197942!5m2!1spt-BR!2sbr" width="1000" height="360" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
        <br>
        <span class="border rounded-5 bg-warning p-1 m-8 mt-12 fs-6 ">Quer saber mais sobre nossos cursos? <a href="./cursos.php">Clique aqui</a></span>
        </div>
    <!-- Main -->

<!-- Footer -->
<?php include_once "./template/footer.php" ?>
<!-- Footer -->    
</body>
</html>