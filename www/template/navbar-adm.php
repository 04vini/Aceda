<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body class="p-0 m-0">

<nav class="navbar navbar-expand-lg m-0 p-0">
	<div class="container">
		<a class="navbar-brand" href="#">
			<img src="./assets/img/logo_aceda.png" alt="Aceda Associação Comercial" height="32">
		</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="./dashboard.php">Início</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="./adm-blog.php">Blog</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="./adm-cursos.php">Cursos</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="./adm-candidatos.php">Banco de candidatos</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="menuDrop" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Configurações
					</a>
					<div class="dropdown-menu" aria-labelledby="menuDrop">
					<a class="dropdown-item" href="./adm-home.php">Config Página inicial</a>
					<a class="dropdown-item" href="./adm-usuarios.php">Config usuários</a>
					</div>
				</li> 

				<li class= "pl-5">
				<span class= "pl-5 ml-5"> <?php echo $_SESSION['nome'] . "&emsp;|" ; ?></span>

				<a class="btn btn-danger rounded-pill ml-3 " href="sair.php">Sair</a>
				</li>
			</ul>
		</div>
	</div>
</nav>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>

