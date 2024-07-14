<?php
    session_start();
    ob_start();
    include_once 'conexao.php';
    
    if((!isset($_SESSION['id'])) AND (!isset($_SESSION['nome']))){
        $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Necessário realizar o login para acessar a página!</p>";
        header("Location: Login.php");
    }

?>


<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Config Usuários - aceda </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="./assets/css/main.min.css" rel="stylesheet" crossorigin="anonymous">
	<link rel="icon" type="image/x-icon" href="./assets/img/favicons/android-icon-48x48favicon.png">
    <script>
        document.addEventListener("DOMContentLoaded", function() {
        const alertBox = document.getElementById("alertBox");
        if (alertBox) {
            setTimeout(() => {
            alertBox.style.display = 'none'; // 5 Segundos
            }, 5000);
        } else {
            console.error("Element with ID 'alertBox' not found");
        }
        });
    </script>
</head>
<body>
    <!-- NavBar -->
	<?php include_once "./template/navbar-adm.php"?>
	<!-- NavBar -->
    <div class="bg-secondary bg-gradient">    
        <?php
            include "conexao.php";
                    if(isset($_GET["mensagem"]) && !empty($_GET["mensagem"]))
                    {
                        ?>
                            <div id="alertBox" class="alert alert-warning text-center">
                                <?php echo htmlspecialchars($_GET["mensagem"], ENT_QUOTES, 'UTF-8'); ?>
                            </div>
                
                        <?php
                    }
                ?>
        <div>
            <br>
    <div class="container">      
            <div class="border border-dark bg-white">
                    <div class="m-5">
                        <div>
                            <h3 class="text-center m-3 "><strong>Usuários</strong></h3>
                        </div>

            <!-- Botão com a função de modal - novo Post -->
                        <button type="button" class="btn btn-success text-white rounded-pill" data-bs-toggle="modal" data-bs-target="#myModal">
                            Novo Usuário
                        </button>
                <!-- Modal com form - novo Post-->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title text-center" id="myModalLabel">Novo Usuário</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-1 m-1">
                                    <form class="" method="post" action="insert-user.php" enctype="multipart/form-data" />
                                        <div class="mb-3">
                                            <label class="form-label m-2" for="nomeUser">Nome do Usuário</label>
                                            <input type="text" name="nomeUser" id="nomeUser" required class="form-control" />

                                            <div data-mdb-input-init class="form-outline">
                                                <label class="form-label m-2" for="emailUser">Email</label>
                                                <input type="email" name="emailUser" id="emailUser" class="form-control">
                                            </div>                    

                                            <div data-mdb-input-init class="form-outline">
                                            <label class="form-label m-2" for="senhaUser" >Senha</label>
                                            <input type="text" name="senhaUser" id="senhaUser" class="form-control">
                                            </div> 
                                            <br>
                                            <button type="button" class="btn btn-default" data-bs-dismiss="modal">Fechar</button>
                                            <button type="submit" class="btn btn-primary text-white">Criar</button>
                                        </div>
                                    </form>
                                    </div>
                                    
                                </div>
                            </div>
                            </div>

        <!--Listando os registros de posts do blog -->
        <div class= "m-5">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        
                        $query = "SELECT * FROM tb_usuarios
                        ORDER BY id ASC";
                        $dados = mysqli_query($conn, $query);
                        if ($dados) 
                        {
                            while ($linha = mysqli_fetch_assoc ($dados)) 
                            {   
                    ?>
                                <tr>
                                    <td><?php echo $linha["id"];?></td>
                                    <td><?php echo $linha["nome"];?></td>
                                    <td><?php echo $linha["usuario"];?></td>
                                    <td>
                                        <a class = "btn btn-primary p-2 rounded-pill text-white" href="./update-user.php?id=<?php echo $linha["id"];?>">Editar</a>
                                        
                                        <a class = "btn btn-danger p-2 rounded-pill text-white" href="./delete-user.php?id=<?php echo $linha["id"];?>">Excluir</a>

                                        
                                    </td>
                                </tr>
                                <?php
                            };
                        };
                    ?>
                </tbody>
            </table>
        </div>    
    </div> 
</div>  
<br> 
<br> 
<br>                

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
