<?php
	include "conexao.php";


	//Query imagem home
    $query = "SELECT * FROM tb_home_img ORDER BY id DESC LIMIT 1";              
    $dados = mysqli_query($conn, $query);               
    $linha = mysqli_fetch_assoc ($dados);

	//Query texto da home
    $res = "SELECT * FROM tb_text_home ORDER BY id DESC LIMIT 1";              
    $dados_text = mysqli_query($conn, $res);               
    $linha_text= mysqli_fetch_assoc ($dados_text);
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

	<title>ACEDA | Associação Comercial Distrito Anhanguera</title>
</head>

<body>
	<!-- NavBar -->
	<?php include_once "../template/navbar.php" ?>
	<!-- NavBar -->
	<!-- Hero -->
	<section class="hero pb-0">
		<div class="container">
			<div class="row">
				<div class="col m-5 text-center">
					<img src="../_oldprojeto/img/brand-original.png" alt="">
					<p class="lead text-justify"><strong><?php echo $linha_text["text"];?></strong></p>																		
					<button type="button" class="btn btn-outline-primary rounded-pill">Entre em contato</button>
				</div>
			</div>

			<div class="col">
				<img src="<?php echo $linha["imagem"];?>" class="img-fluid img-thumbnail" alt="Peoples">
			</div>
		</div>
	</section>
	<!-- /Hero -->

	<!-- Serviços -->
	<section>
		<div class="container">
			<h2 class="text-center pb-10">Serviços Aceda</h2>
			
			<div class="row">
			<?php
                                        
				$query = "SELECT * FROM tb_servico_home
				ORDER BY id DESC LIMIT 3";
				$dados = mysqli_query($conn, $query);
				if ($dados) 
				{
					while ($linha = mysqli_fetch_assoc ($dados)) 
					{   
			?>
				
					<div class="col-4 text-center">
						<img src="<?php echo $linha["imagem_servico"];?>" class="img-fluid rounded-circle pb-5" alt="" width="240" height="180">
						<h3 class="m-1"><?php echo $linha["nome"];?></h3>
						<p><?php echo $linha["descricao"];?></p>
						<a class="btn btn-outline-primary rounded-pill">Saiba mais</a>
					</div>
				
						<?php
					};
				};
			?>
			</div>
			
			
		</div>
	</section>
	<!-- /Serviços -->

	<!-- Cursos -->
	<section>
		<div class="container p-5">
			<h2 class="text-center pb-10">Cursos</h2>
			<div class="row">
				<div class="col-3 pb-5">
					<div class="card" style="width: 18rem;">
						<img src="https://picsum.photos/200/200" class="img-fluid" alt="">
						<div class="card-body">
						  <h4 class="card-title">Nome do Curso</h4>
						  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						  <p class="card-text">00/00 ás 11h</p>
						  <h6 class="card-subtitle mb-2 text-muted mt-3"><span class="btn bg-success rounded-pill text-white disabled">Gratuito</span> <span class="btn bg-primary rounded-pill text-white disabled">Curso Sebrae</span></h6>
						  <a href="#" class="card-link btn bg-primary rounded-pill text-white">Inscreva-se</a>
						</div>
					  </div>
				</div>
				<div class="col-3 pb-5">
					<div class="card" style="width: 18rem;">
						<img src="https://picsum.photos/200/200" class="img-fluid" alt="">
						<div class="card-body">
						  <h4 class="card-title">Nome do Curso</h4>
						  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						  <p class="card-text">00/00 ás 11h</p>
						  <h6 class="card-subtitle mb-2 text-muted mt-3"><span class="btn bg-success rounded-pill text-white disabled">Gratuito</span> <span class="btn bg-primary rounded-pill text-white disabled">Curso Sebrae</span></h6>
						  <a href="#" class="card-link btn bg-primary rounded-pill text-white">Inscreva-se</a>
						</div>
					  </div>
				</div>
				<div class="col-3 pb-5">
					<div class="card" style="width: 18rem;">
						<img src="https://picsum.photos/200/200" class="img-fluid" alt="">
						<div class="card-body">
						  <h4 class="card-title">Nome do Curso</h4>
						  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						  <p class="card-text">00/00 ás 11h</p>
						  <h6 class="card-subtitle mb-2 text-muted mt-3"><span class="btn bg-success rounded-pill text-white disabled">Gratuito</span> <span class="btn bg-primary rounded-pill text-white disabled">Curso Sebrae</span></h6>
						  <a href="#" class="card-link btn bg-primary rounded-pill text-white">Inscreva-se</a>
						</div>
					  </div>
				</div>
				<div class="col-3 pb-5">
					<div class="card" style="width: 18rem;">
						<img src="https://picsum.photos/200/200" class="img-fluid" alt="">
						<div class="card-body">
						  <h4 class="card-title">Nome do Curso</h4>
						  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						  <p class="card-text">00/00 ás 11h</p>
						  <h6 class="card-subtitle mb-2 text-muted mt-3"><span class="btn bg-success rounded-pill text-white disabled">Gratuito</span> <span class="btn bg-primary rounded-pill text-white disabled">Curso Sebrae</span></h6>
						  <a href="#" class="card-link btn bg-primary rounded-pill text-white">Inscreva-se</a>
						</div>
					  </div>
				</div>
			</div>
		</div>
	</section>
	<!-- /Serviços -->

	<!-- Contato Short -->
	<!-- /Contato Short -->

	<!-- Blog -->
	<section class="section-blog">
		<div class="container">
			<h2 class="text-center pb-10">FIQUE POR DENTRO!</h2>
			<div class="row">
					<div class="col-3 pb-5">
						<div class="card" style="width: 18rem;">
							<img src="https://picsum.photos/200/200" class="img-fluid" alt="">
							<div class="card-body">
							  <h4 class="card-title">Titulo</h4>
							  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							  <h6 class="card-subtitle mb-2 text-muted mt-3"><span class="btn bg-success rounded-pill text-white disabled">Evento</span> <span class="btn bg-primary rounded-pill text-white disabled">Gestão</span></h6>
							  <p class="card-text">ultima atualização há 3 minutos...</p>
							  <a href="#" class="card-link">Ler mais...</a>
							</div>
						  </div>
					</div>

					<div class="col-3 pb-5">
						<div class="card" style="width: 18rem;">
							<img src="https://picsum.photos/200/200" class="img-fluid" alt="">
							<div class="card-body">
							  <h4 class="card-title">Titulo</h4>
							  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							  <h6 class="card-subtitle mb-2 text-muted mt-3"><span class="btn bg-success rounded-pill text-white disabled">Evento</span> <span class="btn bg-primary rounded-pill text-white disabled">Gestão</span></h6>
							  <p class="card-text">ultima atualização há 3 minutos...</p>
							  <a href="#" class="card-link">Ler mais...</a>
							</div>
						  </div>
					</div>

					<div class="col-3 pb-5">
						<div class="card" style="width: 18rem;">
							<img src="https://picsum.photos/200/200" class="img-fluid" alt="">
							<div class="card-body">
							  <h4 class="card-title">Titulo</h4>
							  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							  <h6 class="card-subtitle mb-2 text-muted mt-3"><span class="btn bg-success rounded-pill text-white disabled">Evento</span> <span class="btn bg-primary rounded-pill text-white disabled">Gestão</span></h6>
							  <p class="card-text">ultima atualização há 3 minutos...</p>
							  <a href="#" class="card-link">Ler mais...</a>
							</div>
						  </div>
					</div>

					<div class="col-3 pb-5">
						<div class="card" style="width: 18rem;">
							<img src="https://picsum.photos/200/200" class="img-fluid" alt="">
							<div class="card-body">
							  <h4 class="card-title">Titulo</h4>
							  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							  <h6 class="card-subtitle mb-2 text-muted mt-3"><span class="btn bg-success rounded-pill text-white disabled">Evento</span> <span class="btn bg-primary rounded-pill text-white disabled">Gestão</span></h6>
							  <p class="card-text">ultima atualização há 3 minutos...</p>
							  <a href="#" class="card-link">Ler mais...</a>
							</div>
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