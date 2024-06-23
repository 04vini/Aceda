<?php
session_start();
ob_start();
include_once 'conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="icon" type="image/x-icon" href="./assets/img/favicons/android-icon-48x48.png">
    <title>Login - Blog ACEDA</title>
</head>


<body class="outfit fundo-da-tela">
    
    <section class="mb-5">
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-12 col-sm-8 col-md-6 m-auto">
                    <div class="card shadow-custom">
                        <div class="card-body">
                            <?php
                            //Exemplo criptografar a senha
                            //echo password_hash(123456, PASSWORD_DEFAULT);
                            ?>
                        
                            <?php
                            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

                            if (!empty($dados['SendLogin'])) {
                                //var_dump($dados);
                                $query_usuario = "SELECT id, nome, usuario, senha_usuario 
                                                FROM tb_usuarios 
                                                WHERE usuario = ? 
                                                LIMIT 1";
                                $result_usuario = $conn->prepare($query_usuario);
                                $result_usuario->bind_Param('s', $dados['usuario']);
                                $result_usuario->execute();
                                $result_usuario->store_result();

                                if(($result_usuario) and ($result_usuario->num_rows != 0)){
                                    $result_usuario->bind_result($id, $nome, $usuario, $senha_usuario);
                                    $result_usuario->fetch();
                                    //var_dump($row_usuario);
                                    if(password_verify($dados['senha_usuario'], $senha_usuario)){
                                        $_SESSION['id'] = $id;
                                        $_SESSION['nome'] = $nome;
                                        header("Location: ./dashboard.php");
                                    }else{
                                        $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Usuário ou senha inválida!</p>";
                                    }
                                }else{
                                    $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Usuário ou senha inválida!</p>";
                                }

                                
                            }

                            if(isset($_SESSION['msg'])){
                                echo $_SESSION['msg'];
                                unset($_SESSION['msg']);
                            }
                            ?>
                            
                            <h1 class="text-center">Administrador Blog</h1>
                            <img src="./assets/img/brand-original.png" class="d-flex m-auto">

                            <form method="POST" action="">
                                <input type="text" name="usuario" class="form-control my-4 py-2" placeholder="Login" value="<?php if(isset($dados['usuario'])){ echo $dados['usuario']; } ?>">

                                <input type="password" name="senha_usuario" class="form-control my-4 py-2" placeholder="Senha" value="<?php if(isset($dados['senha_usuario'])){ echo $dados['senha_usuario']; } ?>">
                                
                                <div class="text-center mt-3">
                                    <input class="btn btn-primary" type="submit" value="Acessar" name="SendLogin">
                                </div>
                            </form>
                            <a href="recuperar_senha.php" class="nav-link text-center">Esqueceu a senha?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>