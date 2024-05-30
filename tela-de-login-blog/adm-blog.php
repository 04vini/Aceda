


<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Form </title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link href="assets/css/main.min.css?t=1712110939880" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
    <!-- NavBar -->
	<?php include_once "template/navbar-adm.php"?>
	<!-- NavBar -->
    <?php

    include "conexao.php";
    if(isset($_GET["mensagem"]) && !empty($_GET["mensagem"]))
    {
        ?>
            <div class="alert alert-warning d-flex text-center">
                <?php echo $_GET["mensagem"]; ?>
            </div>

        <?php
    }


?>
    <div>
        <div class="col-md-4 p-2 m-1">
            <form class="card" method="post" action="insert.php" enctype="multipart/form-data" />
                <div class="mb-3">
                    <label class="form-label m-2" for="title-post">Título do Post</label>
                    <input type="text" name="title-post" id="title-post" required class="form-control" />

                    <div data-mdb-input-init class="form-outline">
                        <label class="form-label m-2" for="text-post">Descrição do Post</label>
                        <textarea rows="4" class="form-control" type="text" name="text-post" id="text-post" required></textarea>
                    </div>                    

                    <label class="form-label m-2" >Selecione a Imagem</label>
                    <input type="file" name="imagem" accept="image/*" class="form-control form-control-sm" />

                    <button type="submit" class="btn btn-success mt-2">
                        Postar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!--Listando os registros de posts do blog -->
    <div class= "m-5">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>TÍTULO DO POST</th>
                    <th>CONTEÚDO DO POST</th>
                    <th>IMAGEM</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    
                    $query = "SELECT * FROM tb_blog
                    ORDER BY id DESC";
                    $dados = mysqli_query($conn, $query);
                    if ($dados) 
                    {
                        while ($linha = mysqli_fetch_assoc ($dados)) 
                        {   
                ?>
                            <tr>
                                <td><?php echo $linha["id"];?></td>
                                <td><?php echo $linha["titulo"];?></td>
                                <td><?php echo $linha["descricao"];?></td>
                                <td>
                                    <img src="<?php echo $linha["imagem"];?>" width="120" height="120" />
                                </td>
                                <td>
                                    <a class = "btn btn-primary p-1 m-1 rounded-pill text-white" href="./update.php?id=<?php echo $linha["id"];?>">Editar</a>
                                    
                                    <a class = "btn btn-danger p-1 m-1 rounded-pill text-white" href="./delete.php?id=<?php echo $linha["id"];?>">Excluir</a>

                                    
                                </td>
                            </tr>
                            <?php
                        };
                    };
                ?>
            </tbody>
        </table>
    </div>               

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
