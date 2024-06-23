<?php
session_start();
ob_start();
include_once 'conexao.php';

if((!isset($_SESSION['id'])) AND (!isset($_SESSION['nome']))){
    $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Necessário realizar o login para acessar a página!</p>";
    header("Location: ./Login.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">



<head>
    <meta charset="UTF-8">
    <title>Home - Administrador</title>
    <link href="./assets/css/main.min.css?t=1712110939880" rel="stylesheet" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="./assets/img/favicons/android-icon-48x48.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="bg-secondary"> 
    <!-- NavBar -->
	<?php include_once "./template/navbar-adm.php" ?>
	<!-- NavBar -->
    <div> 
        <div class="container bg-white mt-5">
            <br>
            <div class="alert alert-success mt-2 row justify-content-md-center">
                <div class="col-md-auto">
                    <h4 class="">Bem vindo <?php echo $_SESSION['nome']; ?>!</h1>
                </div>
            </div>  
            
            <div class="d-flex justify-content-end dropdown ">
                <button class="btn btn-success dropdown-toggle mb-5" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Relatórios
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="adm-empreenda.php" target="_blank">EmpreendAceda</a></li>
                    <li><a class="dropdown-item" href="adm-solicitacoes.php" target="_blank">Solicitações</a></li>
                </ul>
            </div>
        </div>    
        
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html> 