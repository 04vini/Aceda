<?php
    include "conexao.php";

    session_start();
    ob_start();
    include_once 'conexao.php';
    
    if((!isset($_SESSION['id'])) AND (!isset($_SESSION['nome']))){
        $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Necessário realizar o login para acessar a página!</p>";
        header("Location: Login.php");
    }
    
    //Query das 2 imagens da home carousel
    $query = "SELECT * FROM tb_home_img ORDER BY id DESC LIMIT 2";              
    $dados = mysqli_query($conn, $query);               
    
    //Query Imagem principal da home carousel
    $consulta = "SELECT * FROM tb_home_img_primary ORDER BY id DESC LIMIT 2";              
    $res = mysqli_query($conn, $consulta);  
    $row = mysqli_fetch_assoc($res)

    

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Config Pagina Inicial</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="./assets/css/main.min.css" rel="stylesheet" crossorigin="anonymous">  
    <link rel="icon" type="image/x-icon" href="./assets/img/favicons/android-icon-48x48.png">
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
    
<!--Mensagens recebidas via GET após ações CRUD -->
    <div class="bg-secondary bg-gradient">
        
            <?php
                if(isset($_GET["mensagem"]) && !empty($_GET["mensagem"]))
                {
                    ?>
                        <div id="alertBox" class="alert alert-warning text-center">
                            <?php echo htmlspecialchars($_GET["mensagem"], ENT_QUOTES, 'UTF-8'); ?>
                        </div>
            
                    <?php
                }
            ?>
        
    <br>
<!--Mensagens recebidas via GET após ações CRUD-->    
        <div class="ms-4 me-4">      
<!-- Configurações da imagem da página inicial -->
                <div class="row m-1 text-center border border-dark bg-white">
                    <h3 class="text-center mt-3 mb-1"><strong>Imagens Carousel</strong></h3>
                    <div class="col-4">
                        <img class="img-fluid" src="<?php echo $row["imagemprimary"];?>" height="200" width="350" class="p-1">
                        <a href="update-img-home-primary.php?id=<?php echo $row["id"];?>" class="btn btn-primary rounded-pill text-white">Alterar imagem</a>
                    </div>
                <?php
                    if($dados)
                    {
                        while ($linhaimagem = mysqli_fetch_assoc($dados))
                        {
                    ?>        
                            <div class="col-4">
                                    <img src="<?php echo $linhaimagem["imagem"];?>" height="200" width="350" class="p-1">
                                    
                                        <a href="update-img-home.php?id=<?php echo $linhaimagem["id"];?>" class="btn btn-primary rounded-pill text-white m-1">Alterar imagem</a>
                                    
                            </div>
                                <?php
                        }
                    }
                                ?>  

                                    <br>         
<!-- Configurações da imagem da página inicial -->
                </div> 
                <br>
                
<!-- Configurações dos serviços (Adicionar editar excluir) -->
            <div class="border border-dark bg-white">
                    <div class="m-5">
                        <div>
                            <h3 class="text-center m-3 "><strong>Serviços</strong></h3>
                        </div>
<!--
            Botão com a função de modal - novo serviço 
                        <button type="button" class="btn btn-success text-white rounded-pill" data-bs-toggle="modal" data-bs-target="#myModal">
                            Novo Serviço
                        </button>
                        <p class="span text-danger"><small>*Será listado os ultimos 3 serviços criados por conta da atual estrutura da página</small></p>

                <Modal com form - novo serviço
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title text-center" id="myModalLabel">Insira o novo Serviço</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-1 m-1">
                                    <form method="post" action="insert-servico-home.php" enctype="multipart/form-data">
                                        <label class="form-label m-2" for="nome-servico">Nome</label>
                                        <br>
                                        <input type="text" name="nome-servico" id="nome-servico" class="form-control">
                                        
                                        <label class="form-label m-2" for="descricao-servico">Descrição</label>
                                        
                                        <textarea rows="4" class="form-control" type="text" name="descricao-servico" id="descricao-servico" required></textarea>

                                        <label class="form-label m-2" >Imagem </label>
                                        <input type="file" name="imagem-servico" accept="image/*" class="form-control form-control-sm" />
                                        <br>
                                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Fechar</button>
                                        <button type="submit" class="btn btn-primary text-white">Salvar</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    
                                </div>
                                </div>
                            </div>
                            </div>
-->
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome do Serviço</th>
                                        <th>Descrição do serviço</th>
                                        <th>Imagem do serviço</th>
                                        <th>Ações</th>
                                    </tr> 
                                </thead>
                                <tbody>
                                    <?php
                                        
                                        $queryServico = "SELECT * FROM tb_servico_home
                                        ORDER BY id DESC";
                                        $dadosServico = mysqli_query($conn, $queryServico);
                                        if ($dadosServico) 
                                        {
                                            while ($linhaServico = mysqli_fetch_assoc ($dadosServico)) 
                                            {   
                                    ?>
                                                <tr>
                                                    <td><?php echo $linhaServico["id"];?></td>
                                                    <td><?php echo $linhaServico["nome"];?></td>
                                                    <td><?php echo $linhaServico["descricao"];?></td>
                                                    <td>
                                                        <img src="<?php echo $linhaServico["imagem_servico"];?>" width="180" height="120" />
                                                    </td>
                                                    <td>
                                                        <a class = "btn btn-primary p-1 m-1 rounded-pill text-white" href="./update-servico-home.php?id=<?php echo $linhaServico["id"];?>">Editar</a>
                                                        <!--
                                                        <a class = "btn btn-danger p-1 m-1 rounded-pill text-white" href="./delete-servico-home.php?id=
                                                        <?php //echo $linhaServico["id"];?>">Excluir</a>
                                                        -->
                                                        
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
<!-- Configurações dos serviços (Adicionar editar excluir) -->
                
<!-- Configurações dos Cursos (Adicionar editar excluir) -->
            <div class="border border-dark bg-white m-">    
                <div class="m-5">
                    <div>
                        <h3 class="text-center m-3 "><strong>Cursos</strong></h3>
                    </div>
                    
<!-- 
       Botão com a função de modal
                    <button type="button" class="btn btn-success text-white rounded-pill" data-bs-toggle="modal" data-bs-target="#modalCurso">
                        Novo Curso
                    </button>
                    <p class="span text-danger"><small>*Será listado os ultimos 3 cursos criados por conta da atual estrutura da página</small></p>
                    
            Modal com form
                    <div class="modal fade" id="modalCurso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title text-center" id="myModalLabel">Insira o novo Curso</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-1 m-1">
                                <form method="post" action="insert-curso-home.php" enctype="multipart/form-data" />
                                    <label class="form-label m-2" for="nome-curso">Nome</label>
                                    <input class="form-control" type="text" name="nome-curso" id="nome-curso class="form-control" required>
                                    
                                    <label class="form-label m-2" for="descricao-curso">Descrição</label>
                                    <textarea rows="4" class="form-control" type="text" name="descricao-curso" id="descricao-curso" required></textarea>

                                    <label class="form-label m-2" >Imagem </label>
                                    <input type="file" name="imagem-curso" accept="image/*" class="form-control form-control-sm" />
                                    <br>   
                                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-primary text-white">Salvar</button>
                                </form>
                            </div>
                                                              
                            </div>
                                    
                        </div>
                        </div>
                                    -->
                    <div>
                    <div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome do Curso</th>
                                    <th>Descrição do Curso</th>
                                    <th>Conteúdo do Curso</th>
                                    <th>Imagem do Curso</th>
                                </tr> 
                            </thead>
                            <tbody>
                                    <?php
                                        
                                        $consultaCurso = "SELECT * FROM tb_curso_home
                                        ORDER BY id DESC";
                                        $resultadoCurso = mysqli_query($conn, $consultaCurso);
                                        if ($resultadoCurso) 
                                        {
                                            while ($linhaCurso = mysqli_fetch_assoc ($resultadoCurso)) 
                                            {   
                                    ?>
                                                <tr>
                                                    <td><?php echo $linhaCurso["id"];?></td>
                                                    <td><?php echo $linhaCurso["nome_curso"];?></td>
                                                    <td><?php echo $linhaCurso["descricao_curso"];?></td>
                                                    <td><?php echo $linhaCurso["conteudo_curso"];?></td>
                                                    <td>
                                                        <img src="<?php echo $linhaCurso["imagem_curso"];?>" width="180" height="120" />
                                                    </td>
                                                    <td>
                                                        <a class = "btn btn-primary p-1 m-1 rounded-pill text-white" href="./update-curso-home.php?id=<?php echo $linhaCurso["id"];?>">Editar</a>
                                                        <!--
                                                        <a class = "btn btn-danger p-1 m-1 rounded-pill text-white" href="./delete-curso-home.php?id=<?php //echo $linhaCurso["id"];?>">Excluir</a>
                                                        -->

                                                        
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
        </div>    
        
<!-- Configurações dos Cursos (Adicionar editar excluir) -->
        </div>
        <hr>  
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>                                     
</body>
</html>