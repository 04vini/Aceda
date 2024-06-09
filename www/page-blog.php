<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Aceda</title>
    <link href="./assets/css/main.min.css?t=1712110939880" rel="stylesheet" crossorigin="anonymous">

</head>
<body>
    <!-- NavBar -->
	<?php include_once "./template/navbar.php" ?>
	<!-- NavBar -->
    <!--BLOG-->
    <?php
    include "conexao.php";
    
    $query = "SELECT * FROM tb_blog 
    ORDER BY id DESC";
    $dados = mysqli_query($conn, $query);
        if ($dados) 
        {
            while ($linha = mysqli_fetch_assoc ($dados)) 
            {   
?>
                <section class="container">
                    <div class="row mb-10">
                        <div class="col-3 img-fluid text-left">
                            <img src="<?php echo $linha["imagem"];?>" width="270" height="220" />
                            </div>
                            <div class="col-9 text-right">
                            <h3><?php echo $linha["titulo"];?></h3>
                            <p><?php echo $linha["descricao"];?></p>
                            <button type="button" class="btn btn-primary rounded-pill text-white">Ler Mais</button>
                        </div>
                    </div>
                       
<?php
            };
        };
?>
                </section> 
        
    
    <section id="lista-noticias">
        <h2>Notícias Publicadas</h2>
    </section>
    </section>
    <!-- Footer -->
    <?php include_once "./template/footer.php" ?>
    <!-- /Footer -->
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>    
</body>
</html>