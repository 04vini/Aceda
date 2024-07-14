<?php
    include "conexao.php";

    $query = "SELECT * FROM tb_curso_home where id = ".$_GET["id"];
    $dados = mysqli_query($conn, $query);
    $linha = mysqli_fetch_assoc ($dados);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./assets/css/main.min.css?t=1712110939880" rel="stylesheet" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.positus.global/production/resources/robbu/whatsapp-button/whatsapp-button.css">
	<link rel="icon" type="image/x-icon" href="./assets/img/favicons/android-icon-48x48favicon.png">
    <title>Curso - aceda</title>
</head>
<body>
    <!-- NavBar -->
	<?php include_once "./template/navbar.php" ?>
	<!-- NavBar -->

    <div>
        <h2 class="ms-5 me-5 bg-secondary text-white rounded-pill text-center p-5 mt-5"><?php echo $linha["nome_curso"];?></h2>
        <div class="col-12">
            <div class="m-5"><?php echo $linha["conteudo_curso"];?></div>
        </div>
    </div>
    <div class="mt-4 mb-3 ms-2">
        <a href="./cursos.php" class="btn btn-primary rounded-pill text-white">Se inscrever</a>
    </div>
    <!-- Footer -->
    <?php include_once "./template/footer.php" ?>
    <!-- Footer --> 

    <!-- Scripts -->
	<script src="./assets/js/main.min.js?t=1712110939880" crossorigin="anonymous"></script>
	<!-- Scripts -->

	<a id="robbu-whatsapp-button" target="_blank" href="https://api.whatsapp.com/send?phone=5511958771996">
		<div class="rwb-tooltip">Fale com a ACEDA</div>
		<img src="https://cdn.positus.global/production/resources/robbu/whatsapp-button/whatsapp-icon.svg">
	</a>
</body>
</html>