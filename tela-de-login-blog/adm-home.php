<?php
    include "conexao.php";

    //Mensagem recebida no GET
    if(isset($_GET["mensagem"]) && !empty($_GET["mensagem"]))
    {
        ?>
            <div class="alert alert-warning d-flex text-center">
                <?php echo $_GET["mensagem"]; ?>
            </div>

        <?php
    }


    //Query imagem da home
    $query = "SELECT * FROM tb_home_img ORDER BY id DESC LIMIT 1";              
    $dados = mysqli_query($conn, $query);               
    $linha = mysqli_fetch_assoc ($dados);

    //Query texto da home
    $res = "SELECT * FROM tb_text_home ORDER BY id DESC LIMIT 1";              
    $dados_text = mysqli_query($conn, $res);               
    $linha_text= mysqli_fetch_assoc ($dados_text);


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Config Pagina Inicial</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../assets/css/main.min.css?t=1712110939880" rel="stylesheet" crossorigin="anonymous">  
</head>
<body>
<!-- NavBar -->
	<?php include_once "../template/navbar-adm.php"?>
<!-- NavBar -->
    
    <div class="bg-secondary bg-gradient">
    <br>
        <div class="container">
            
                
                
<!-- Configurações da imagem da página inicial -->
                <div class="row m-5 text-center border border-dark bg-white">
                    <h3 class="text-center m-3 "><strong>Imagem e texto</strong></h3>
                    <div class="col-md-6">
                        <form class="m-1" action="insert-img-home.php" method="post" enctype="multipart/form-data">
                            <p class="font-weight-bold"><strong>Imagem da página</strong></p>
                            <img src="<?php echo $linha["imagem"];?>" height="250" width="420">
                            <br>
                            <label class="form-label m-2" ><strong>Alterar imagem</strong></label>
                            <input type="file" name="imagem-home" id="imagem-home" accept="image/*" class="form-control form-control-sm" />
                            <br>
                            <button type="submit" class= "btn btn-primary rounded-pill text-white">Alterar</button>
                        </form>
                    </div>
<!-- Configurações da imagem da página inicial -->

<!-- Configurações do texto da página inicial -->
                    <div class="col-md-6">
                        <form class="m-1" action="insert-text-home.php" method="POST">
                            <p class="font-weight-bold"><strong>Texto da página</strong></p>
                            <p><?php echo $linha_text["text"];?></p>

                            <div data-mdb-input-init class="form-outline">
                                <label class="form-label m-2" for="text-home"><strong>Alterar texto</strong></label>
                                <textarea rows="3" class="form-control" type="text" name="text-home" id="text-home" required></textarea>
                            </div> 
                            <br>
                            <button type="submit" class= "btn btn-primary rounded-pill text-white m-1">Alterar</button>
                    
                        </form>
                    </div>
                </div>
                <hr>
<!-- Configurações do texto da página inicial -->

                
<!-- Configurações dos serviços (Adicionar editar excluir) -->
            <div class="border border-dark bg-white">
                    <div class="m-5">
                        <div>
                            <h3 class="text-center m-3 "><strong>Serviços</strong></h3>
                        </div>

            <!-- Botão com a função de modal - novo serviço -->
                        <button type="button" class="btn btn-success text-white rounded-pill" data-bs-toggle="modal" data-bs-target="#myModal">
                            Novo Serviço
                        </button>
                        <p class="span text-danger"><small>*Será listado os ultimos 3 serviços criados por conta da atual estrutura da página</small></p>

                <!-- Modal com form - novo serviço-->
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

                        <div>
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
                                        
                                        $query = "SELECT * FROM tb_servico_home
                                        ORDER BY id DESC";
                                        $dados = mysqli_query($conn, $query);
                                        if ($dados) 
                                        {
                                            while ($linha = mysqli_fetch_assoc ($dados)) 
                                            {   
                                    ?>
                                                <tr>
                                                    <td><?php echo $linha["id"];?></td>
                                                    <td><?php echo $linha["nome"];?></td>
                                                    <td><?php echo $linha["descricao"];?></td>
                                                    <td>
                                                        <img src="<?php echo $linha["imagem_servico"];?>" width="180" height="120" />
                                                    </td>
                                                    <td>
                                                        <a class = "btn btn-primary p-1 m-1 rounded-pill text-white" href="./update-blog.php?id=<?php echo $linha["id"];?>">Editar</a>
                                                        
                                                        <a class = "btn btn-danger p-1 m-1 rounded-pill text-white" href="./delete-blog.php?id=<?php echo $linha["id"];?>">Excluir</a>

                                                        
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
                <hr>
<!-- Configurações dos serviços (Adicionar editar excluir) -->
                
<!-- Configurações dos Cursos (Adicionar editar excluir) -->
            <div class="border border-dark bg-white m-6">    
                <div class="m-5">
                    <div>
                        <h3 class="text-center m-3 "><strong>Cursos</strong></h3>
                    </div>
                    

        <!-- Botão com a função de modal -->
                    <button type="button" class="btn btn-success text-white rounded-pill" data-bs-toggle="modal" data-bs-target="#myModal2">
                        Novo Curso
                    </button>
                    <p class="span text-danger"><small>*Será listado os ultimos 4 cursos criados por conta da atual estrutura da página</small></p>
                    
            <!-- Modal com form-->
                    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title text-center" id="myModalLabel">Insira o novo Curso</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-1 m-1">
                                <form method="post" action="insert.php" enctype="multipart/form-data" />
                                    <label class="form-label m-2" for="name-servico">Nome</label>
                                    <input class="form-control" type="text" name="name-serviço" id="name-serviço class="form-control">
                                    
                                    <label class="form-label m-2" for="name-servico">Descrição</label>
                                    <textarea rows="4" class="form-control" type="text" name="text-post" id="text-post" required></textarea>

                                    <label class="form-label m-2" >Imagem </label>
                                    <input type="file" name="imagem" accept="image/*" class="form-control form-control-sm" />

                                    <label class="form-label m-2" for="data-curso">Data</label>
                                    <br>
                                    <input class="form-control" type="date" name="data-curso" id="data-curso">

                                    <label class="form-label m-2" for="data-curso">Horário</label>
                                    <br>
                                    <input class="form-control" type="text" name="data-curso" id="data-curso" placeholder="xx:xx">

                                    <label class="form-label m-2" for="name-servico">Custo</label>
                                    <br>
                                    <input class="form-control type="text" name="name-serviço" id="name-serviço" class="form-control" placeholder="Gratuito">

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Fechar</button>
                                <button type="button" class="btn btn-primary text-white">Salvar</button>
                            </div>
                            </div>
                        </div>
                        </div>

                    <div>
                    <div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome do Curso</th>
                                    <th>Descrição do Curso</th>
                                    <th>Imagem do Curso</th>
                                    <th>Data e hora</th>
                                    <th>Custo</th>
                                    <th>Ações</th>
                                </tr> 
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>         
                </div>
            </div>
        </div>
        <hr>
<!-- Configurações dos Cursos (Adicionar editar excluir) -->


    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>
</html>