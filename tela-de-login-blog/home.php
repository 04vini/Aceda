<?php
	/*include "conexao.php";


	//Query imagem home
    $query = "SELECT * FROM tb_home_img ORDER BY id DESC LIMIT 1";              
    $dados = mysqli_query($conn, $query);               
    $linha = mysqli_fetch_assoc ($dados);

	//Query texto da home
    $res = "SELECT * FROM tb_text_home ORDER BY id DESC LIMIT 1";              
    $dados_text = mysqli_query($conn, $res);               
    $linha_text= mysqli_fetch_assoc ($dados_text);*/
?>


<!doctype html>
<html lang="pt-BR">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include_once "../template/head.php" ?>
	<style>
	</style>
	<!-- Bootstrap CSS -->
	<link href="../assets/css/main.min.css?t=1712110939880" rel="stylesheet" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<title>ACEDA | Associação Comercial Distrito Anhanguera</title>
</head>

<body>
	<!-- NavBar -->
	<?php include_once "../template/navbar.php" ?>
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
					<img src="./assets/images/Aceda Brading Book.png" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block bg-success">
					  <h3>ACEDA</h3>
					  <p>Associação Comercial e Empresarial do Distrito Anhanguera.</p>
					</div>
				  </div>
				  <div class="carousel-item">
					<img src="./assets/images/Aceda Brading Book PODCAST.png" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block">
					  <h3>Podcast Aceda</h3>
					  <p>Embarque em uma jornada de aprendizado e conhecimento com o Podcast da ACEDA, onde a informação se conecta com a ação!</p>
					</div>
				  </div>
				  <div class="carousel-item">
					<img src="./assets/images/Aceda Brading Book EMPREENDORISMO.png" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block">
					  <h3>Empreendorismo</h3>
					  <p>Impulsionando o Sucesso Empreendedor.</p>
					</div>
				  </div>
				</div>
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
				<div class="col-4 text-center">
					<img src="./assets/images/3112677.jpg" class="img-fluid rounded-circle pb-5 w-50" alt="">
					<h3>Nome do Serviço</h3>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita reprehenderit totam eos officiis aperiam, a dolor odio, laudantium nostrum, corporis excepturi id? Porro quam incidunt corrupti quibusdam temporibus! Perspiciatis, quaerat?</p>
					<a class="btn btn-outline-success rounded-pill">Saiba mais</a>
				</div>
				<div class="col-4 text-center">
					<img src="./assets/images/5355919.jpg" class="img-fluid rounded-circle pb-5 w-50" alt="">
					<h3>Nome do Serviço</h3>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita reprehenderit totam eos officiis aperiam, a dolor odio, laudantium nostrum, corporis excepturi id? Porro quam incidunt corrupti quibusdam temporibus! Perspiciatis, quaerat?</p>
					<a class="btn btn-outline-success rounded-pill">Saiba mais</a>
				</div>
				<div class="col-4 text-center">
					<img src="./assets/images/8953258.jpg" class="img-fluid rounded-circle pb-5 w-50" alt="">
					<h3>Nome do Serviço</h3>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita reprehenderit totam eos officiis aperiam, a dolor odio, laudantium nostrum, corporis excepturi id? Porro quam incidunt corrupti quibusdam temporibus! Perspiciatis, quaerat?</p>
					<a class="btn btn-outline-success rounded-pill">Saiba mais</a>
				</div>
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
				<div class="col-4">
					<div class="card border-0">
						<i class="bi bi-person text-primary ms-3" style="font-size: 3rem;"></i>
						<div class="card-body">
							<h5 class="card-title">Curso 01</h5>
							<p class="card-text text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum, modi?</p>
							<a href="#" class="btn btn-primary rounded-pill text-white">Ver Curso</a>
						</div>
					</div>
				</div>
				<div class="col-4">
					<div class="card border-0">
						<i class="bi bi-card-checklist text-primary ms-3" style="font-size: 3rem;"></i>
						<div class="card-body">
							<h5 class="card-title">Curso 02</h5>
							<p class="card-text text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum, modi?</p>
							<a href="#" class="btn btn-primary rounded-pill text-white">Ver Curso</a>
						</div>
					</div>
				</div>
				<div class="col-4">
					<div class="card border-0">
						<i class="bi bi-calendar-plus text-primary ms-3" style="font-size: 3rem;"></i>
						<div class="card-body">
							<h5 class="card-title">Curso 03</h5>
							<p class="card-text text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum, modi?</p>
							<a href="#" class="btn btn-primary rounded-pill text-white">Ver Curso</a>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<!-- /Serviços -->

	<!-- Contato Short -->
	<!-- /Contato Short -->

	<section class="bg-warning shadow mx-1">
		<h2 class="text-white">Fique por dentro!</h2>
	</section>
	<!-- Blog -->
	<section>
		<div class="row mb-2">
			<div class="col-md-6">
			  <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
				<div class="col p-4 d-flex flex-column position-static">
				  <strong class="d-inline-block mb-2 text-primary">Noticia 01</strong>
				  <h3 class="mb-0">Informações da noticia</h3>
				  <div class="mb-1 text-muted">Data da noticia</div>
				  <p class="card-text mb-auto">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla quis ea natus quibusdam optio est animi corrupti quo, explicabo totam? Ducimus autem ipsum deserunt provident quis officiis porro dolorum adipisci!</p>
				  <a href="#" class="stretched-link">Ler mais...</a>
				</div>
				<div class="col-auto d-none d-lg-block">
				  <img src="./assets/images/Aceda Brading Book PODCAST.png" width="200" height="200" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#55595c"/></img>
		
				</div>
			  </div>
			</div>
			<div class="col-md-6">
			  <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
				<div class="col p-4 d-flex flex-column position-static">
				  <strong class="d-inline-block mb-2 text-success">Noticia 02</strong>
				  <h3 class="mb-0">Informação da noticia</h3>
				  <div class="mb-1 text-muted">Data da noticia</div>
				  <p class="mb-auto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi nobis rerum fugiat libero tempora aliquam iusto vel corporis rem, harum non, molestiae quasi eligendi perferendis deserunt odio suscipit quam. Esse.</p>
				  <a href="#" class="stretched-link">Ler mais...</a>
				</div>
				<div class="col-auto d-none d-lg-block">
					<img src="./assets/images/Aceda Brading Book EMPREENDORISMO.png" width="200" height="200" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#55595c"/></img>		
				</div>
			  </div>
			</div>
		  </div>
	</section>
	<!-- /Blog -->
		
	<!-- Footer -->
	<!-- /Footer -->

	<!-- Scripts -->
	<script src="assets/js/main.min.js?t=1712110939880" crossorigin="anonymous"></script>
	<!-- Scripts -->
</body>


</html>