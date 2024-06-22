<?php
    include "conexao.php";

    $query = "SELECT * FROM tb_blog where id = ".$_GET["id"];
    $dados = mysqli_query($conn, $query);
    $linha = mysqli_fetch_assoc ($dados);

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
    <title>Blog - Aceda</title>
    <!-- Bootstrap CSS -->
	<link href="./assets/css/main.min.css?t=1712110939880" rel="stylesheet" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../www/assets/css/estilo.sass/style.css">
    <link rel="stylesheet" href="../www/assets/css/estilo.css/fontes.css">
    <link rel="stylesheet" href="../www/assets/css/estilo.css/style.css">
    <link rel="stylesheet" href="https://cdn.positus.global/production/resources/robbu/whatsapp-button/whatsapp-button.css">

</head>
<body>
    <!-- NavBar -->
	<?php include_once "./template/navbar.php" ?>
    <!-- NavBar -->
    <!--Noticia-->
    <div style="background-color:  #2C4D97;">
        <br>
        <div class="m-4 p-2 bg-white rounded-5" >
            <div class="row">
                <div>
                    <img src="<?php echo $linha["imagem"];?>" class="img-fluid" alt="Responsive image">
                </div>

                <div class="col-12">
                    <h2 class="m-5 text-center"><?php echo $linha["titulo"];?></h2>
                    <div class="m-5"><?php echo $linha["conteudo"];?></div>
                    <span class="row justify-content-end col-me-3 me-1">Postado por:  <?php echo $linha["autor"];?></span>
                    <p class=""><small class="row justify-content-end col-me-3 sm me-1"><?php echo $registroFormatado;?></small></p>
                </div>
            </div>
        </div>
        <br>
    </div>


    <!-- Scripts -->
	<script src="./assets/js/main.min.js?t=1712110939880" crossorigin="anonymous"></script>
    <!-- Scripts -->

    <!-- footer -->
	<?php include_once "./template/footer.php" ?>
    
    <!-- footer -->
    <a id="robbu-whatsapp-button" target="_blank" href="https://api.whatsapp.com/send?phone=5511958771996"> 
            <div class="rwb-tooltip">Fale com a ACEDA</div> 
            <img src="https://cdn.positus.global/production/resources/robbu/whatsapp-button/whatsapp-icon.svg"> 
    </a>
</body>
</html>