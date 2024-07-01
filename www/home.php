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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="./assets/css/main.min.css?t=1712110939880" rel="stylesheet" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<link rel="stylesheet" href="https://cdn.positus.global/production/resources/robbu/whatsapp-button/whatsapp-button.css">
	<script src="../www/assets/js/scrip-cookies.js"></script>
	<link rel="icon" type="image/x-icon" href="./assets/img/favicons/android-icon-48x48.png">
	<link rel="stylesheet" href="../www/assets/css/estilo.css/fontes.css">
	<link rel="stylesheet" href="../www/assets/css/estilo.css/style.css">
	<style>
		@media (max-width: 767px) {
			.carousel-inner img {
				margin-top: 0px;
				margin-bottom: 0px;
				height: 300px !important;
			}
		}
	</style>
	<title>ACEDA | Associação Comercial Distrito Anhanguera</title>
</head>

<body style="font-family: Outfit; margin: 0; padding: 0; border: 0;">
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
						<img class="d-block w-100 img-fluid" src="<?php echo $row['imagemprimary']; ?>" alt="" style="height: 550px; object-fit: contain;">
					</div>
					<?php
					if ($dados) {
						while ($linha = mysqli_fetch_assoc($dados)) {
					?>
							<div class="carousel-item">
								<img class="d-block w-100 img-fluid" src="<?php echo $linha['imagem']; ?>" alt="" style="height: 550px; object-fit: contain;">
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
	<!-- Serviços -->
	<div class="row">
		<div class="col">
			<section class="shadow" style="background-color: #278F48;">
				<h2 class="text-white fw-semibold">Serviços aceda</h2>
			</section>
		</div>
		<section>
			<div class="container">
				<div class="row">
					<div class="col d-flex flex-column order-md-first">
						<?php
						if ($resultado) {
							while ($rows = mysqli_fetch_assoc($resultado)) {
						?>
								<div class="col text-center p-1">
									<img src="<?php echo $rows["imagem_servico"]; ?>" class="img-fluid rounded-circle p-5 w-50 h-50">
									<h3>
										<?php echo $rows["nome"]; ?>
									</h3>
									<p>
										<?php echo $rows["descricao"]; ?>
									</p>
									<a class="btn btn-outline-success rounded-pill" href="./servicos.php">Saiba mais</a>
								</div>
						<?php
							}
						}
						?>
					</div>
				</div>
			</div>
		</section>
	</div>
		<!-- /Serviços -->
		<div class="row">
			<div class="col">
					<section class="shadow" style="background-color: #2C4D97;">
						<h2 class="text-white fw-semibold">Cursos</h2>
					</section>
			</div>
			<!-- Cursos -->
			<section>
				<div class="container">
					<div class="row container">
						<?php
						if ($resultado) {
							while ($linhaCurso = mysqli_fetch_assoc($resultadoCurso)) {
						?>
								<div class="col d-flex flex-column order-md-first">
									<div class="col d-flex flex-column 	 card border-0">
										<img class="img-fluid" src="<?php echo $linhaCurso["imagem_curso"]; ?>" alt="" class="rounded-pill">
										<div class="col card-body">
											<h5 class="col card-title">
												<?php echo $linhaCurso["nome_curso"]; ?>
											</h5>
											<p class="col card-text text-muted">
												<?php echo $linhaCurso["descricao_curso"]; ?>
											</p>
											<a href="./cursos.php" class="col btn btn-primary rounded-pill text-white">Ver Curso</a>
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
		</div>
			<!-- /Cursos -->

			<!-- Contato Short -->
			<!-- /Contato Short -->

			<!-- Ultimas notícias do blog -->
			<div class="row">
				<div class="col">
					<section class="shadow" style="background-color: #FFE32D;">
						<h2 class="text-white fw-semibold">fique por dentro!</h2>
					</section>
				</div>
			</div>

			<!-- Blog -->
			<section>
				<div class="container">
					<div class="row row-cols-1 row-cols-md-2 g-4">
						<?php
						if ($dadosblog) {
							while ($linhablog = mysqli_fetch_assoc($dadosblog)) {
						?>
								<div class="col">
									<div class="card border rounded overflow-hidden shadow-sm h-100">
										<div class="row g-0">
											<div class="col-md-6 d-flex align-items-center">
												<img src="<?php echo $linhablog["imagem"]; ?>" class="img-fluid rounded-start" alt="Imagem do Blog">
											</div>
											<div class="col-md-6">
												<div class="card-body">
													<h5 class="card-title text-primary mb-1"><?php echo $linhablog["titulo"]; ?></h5>
													<p class="card-text text-secondary mb-2"><?php echo $linhablog["categoria"]; ?></p>
													<p class="card-text"><?php echo $linhablog["descricao"]; ?></p>
													<a href="./post-blog.php?id=<?php echo $linhablog["id"]; ?>" class="btn btn-primary rounded-pill text-white">Ler Mais</a>
												</div>
											</div>
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


			<!-- Ultimas notícias do blog -->

			<!-- Footer -->
			<?php include_once "./template/footer.php" ?>
			<!-- /Footer -->

			<!-- Scripts -->
			<script src="./assets/js/main.min.js?t=1712110939880" crossorigin="anonymous"></script>
			<!-- Scripts -->

			<a id="robbu-whatsapp-button" target="_blank" href="https://api.whatsapp.com/send?phone=5511958771996">
				<div class="rwb-tooltip">Fale com a ACEDA</div>
				<img src="https://cdn.positus.global/production/resources/robbu/whatsapp-button/whatsapp-icon.svg">
			</a>

			<!-- POP UP DE USO DE COOKIES -->

			<div class="cookie-popup">
				<div class="container">
					<p>Este site utiliza cookies para melhorar sua experiência de navegação. Ao continuar navegando, você
						concorda com o uso de cookies.</p>

					<button type="button" class="btn btn-primary text-white" onclick="aceitarCookies()">Entendido</button>

					<button type="button" class="btn btn-primary" onclick="privacidade()"><a href="./politica-de-privacidade.php" class="text-decoration-none text-white" target="_blank">Política de privacidade</a></button>
				</div>
			</div>


</body>


</html>