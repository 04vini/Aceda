<?php
	include "conexao.php";


	//Query imagem home
    $query = "SELECT * FROM tb_home_img ORDER BY id DESC LIMIT 2";              
    $dados = mysqli_query($conn, $query);               

	//Query Imagem principal da home carousel
    $consulta = "SELECT * FROM tb_home_img_primary ORDER BY id DESC LIMIT 1";              
    $res = mysqli_query($conn, $consulta);  
    $row = mysqli_fetch_assoc($res);

	//Query serviços home
    $querys = "SELECT * FROM tb_servico_home ORDER BY id DESC LIMIT 3";              
    $resultado = mysqli_query($conn, $querys);  
    
	//Query Cursos home
	$consultaCurso = "SELECT * FROM tb_curso_home ORDER BY id DESC LIMIT 3";
	$resultadoCurso = mysqli_query($conn, $consultaCurso);

	//Query Ultimas notícias Blog
	$queryblog = "SELECT * FROM tb_blog 
    ORDER BY id DESC LIMIT 2";
    $dadosblog = mysqli_query($conn, $queryblog);
?>


<!doctype html>
<html lang="pt-BR">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
	</style>
	<!-- Bootstrap CSS -->
	<link href="./assets/css/main.min.css?t=1712110939880" rel="stylesheet" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<title>ACEDA | Associação Comercial Distrito Anhanguera</title>
</head>

<body>
<!-- NavBar -->
	<?php include_once "./template/navbar.php" ?>
<!-- NavBar -->
<!-- Hero -->
	<section class="hero pb-0" style="margin: 0; padding: 0; border: 0;">
		<div class="container-fluid">
			<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
				<div class="carousel-indicators">
					<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
					<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
					<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
				</div>
				<div class="carousel-inner">
					<div class="carousel-item active">
					<img class="d-block w-100" src="<?php echo $row["imagemprimary"];?>" alt="">
					</div>	
					<?php
						if($dados)
						{
							while ($linha = mysqli_fetch_assoc($dados))
							{
						?>        
								<div class="carousel-item">
								<img class="d-block w-100" src="<?php echo $linha["imagem"];?>" alt="">
								</div>
							<?php
							}
						}
									?>

				
				<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
				  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				  <span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
				  <span class="carousel-control-next-icon" aria-hidden="true"></span>
				  <span class="visually-hidden">Next</span>
				</button>
			  </div>
		</div>
	</section>
<!-- /Hero -->

	<section class="bg-success shadow mx-1">
		<h2 class="text-white">Serviços Aceda</h2>
	</section>

<!-- Serviços -->
	<section>
		<div class="container">
			<div class="row">
				<?php
						if($resultado)
						{
							while ($rows = mysqli_fetch_assoc($resultado))
							{
						?>   
							<div class="col-4 text-center p-1">
								<img src="<?php echo $rows["imagem_servico"];?>" class="img-fluid rounded-circle p-5 w-50" alt="">
								<h3><?php echo $rows["nome"];?></h3>
								<p><?php echo $rows["descricao"];?></p>
								<a class="btn btn-outline-success rounded-pill" href="./servicos.php">Saiba mais</a>
							</div>
							<?php
							}
						}
									?>

			</div>
		</div>
	</section>
<!-- /Serviços -->

	<section class="bg-primary shadow mx-1">
		<h2 class="text-white">Cursos</h2>
	</section>
<!-- Cursos -->
	<section>
		<div class="container">
			<div class="row container">
			<?php	
				if($resultado) 
						{
							while ($linhaCurso = mysqli_fetch_assoc ($resultadoCurso))
							{
						?>   
						<div class="col-4">
							<div class="card border-0">
							<img src="<?php echo $linhaCurso["imagem_curso"];?>" alt="" class="rounded-pill">
								<div class="card-body">
									<h5 class="card-title"><?php echo $linhaCurso["nome_curso"];?></h5>
									<p class="card-text text-muted"><?php echo $linhaCurso["descricao_curso"];?></p>
									<a href="./cursos.php" class="btn btn-primary rounded-pill text-white">Ver Curso</a>
								</div>
							</div>
						</div>
							<?php
							}
						}
									?>			
						
				
				
			</div>
		</div>
	</section>
<!-- /Cursos -->

<!-- Contato Short -->
<!-- /Contato Short -->

<!-- Ultimas notícias do blog -->
	<section class="bg-warning shadow mx-1">
		<h2 class="text-white">Fique por dentro!</h2>
	</section>
	<!-- Blog -->
	<section>
		<div class="row mb-2">
		<?php
			if ($dadosblog) 
			{
				while ($linhablog = mysqli_fetch_assoc ($dadosblog)) 
				{   
	?>
					<div class="col-md-6">
						<div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
							<div class="col p-4 d-flex flex-column position-static">
							<strong class="d-inline-block mb-2 text-primary"><?php echo $linhablog["titulo"];?></strong>
							<p class="card-text mb-auto" maxlenght=20 ><?php echo $linhablog["descricao"];?></p>
							<a href="./page-blog.php" class="stretched-link">Ler mais...</a>
							</div>
							<div class="col-auto d-none d-lg-block">
							<img src="<?php echo $linhablog["imagem"];?>" width="200" height="200" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#55595c"/></img>
							</div>
						</div>
					</div>
										
				<?php
							};
						};
				?>
		  </div>
	</section>


<!-- Ultimas notícias do blog -->
		
<!-- Footer -->
	<?php include_once "./template/footer.php" ?>
<!-- /Footer -->

<!-- Scripts -->
	<script src="./assets/js/main.min.js?t=1712110939880" crossorigin="anonymous"></script>
<!-- Scripts -->

</body>


</html>