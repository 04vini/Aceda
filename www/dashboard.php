<?php
session_start();
ob_start();
include_once 'conexao_login.php';

if((!isset($_SESSION['id'])) AND (!isset($_SESSION['nome']))){
    $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Necessário realizar o login para acessar a página!</p>";
    header("Location: Login.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">



<head>
    <meta charset="UTF-8">
    <title>Home - Administrador</title>
    <link href="./assets/css/main.min.css?t=1712110939880" rel="stylesheet" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <!-- NavBar -->
	<?php include_once "./template/navbar-adm.php" ?>
	<!-- NavBar -->
    <h1>Bem vindo <?php echo $_SESSION['nome']; ?>!</h1>

    <a class="btn btn-warning rounded-pill" href="sair.php">Sair</a>

</body>

</html>