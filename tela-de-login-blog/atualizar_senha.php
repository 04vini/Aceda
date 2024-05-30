<?php
session_start();
ob_start();
include_once 'conexao_login.php';
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
    <link rel="stylesheet" href="style.css">
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
                                $chave = filter_input(INPUT_GET, 'chave', FILTER_DEFAULT);


                                if (!empty($chave)) {
                                    //var_dump($chave);

                                    $query_usuario = "SELECT id 
                                                        FROM usuarios 
                                                        WHERE recuperar_senha =:recuperar_senha  
                                                        LIMIT 1";
                                    $result_usuario = $conn->prepare($query_usuario);
                                    $result_usuario->bindParam(':recuperar_senha', $chave, PDO::PARAM_STR);
                                    $result_usuario->execute();

                                    if (($result_usuario) and ($result_usuario->rowCount() != 0)) {
                                        $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
                                        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                                        //var_dump($dados);
                                        if (!empty($dados['SendNovaSenha'])) {
                                            $senha_usuario = password_hash($dados['senha_usuario'], PASSWORD_DEFAULT);
                                            $recuperar_senha = 'NULL';

                                            $query_up_usuario = "UPDATE usuarios 
                                                    SET senha_usuario =:senha_usuario,
                                                    recuperar_senha =:recuperar_senha
                                                    WHERE id =:id 
                                                    LIMIT 1";
                                            $result_up_usuario = $conn->prepare($query_up_usuario);
                                            $result_up_usuario->bindParam(':senha_usuario', $senha_usuario, PDO::PARAM_STR);
                                            $result_up_usuario->bindParam(':recuperar_senha', $recuperar_senha);
                                            $result_up_usuario->bindParam(':id', $row_usuario['id'], PDO::PARAM_INT);

                                            if ($result_up_usuario->execute()) {
                                                $_SESSION['msg'] = "<p style='color: green'>Senha atualizada com sucesso!</p>";
                                                header("Location: Login.php");
                                            } else {
                                                echo "<p style='color: #ff0000'>Erro: Tente novamente!</p>";
                                            }
                                        }
                                    } else {
                                        $_SESSION['msg_rec'] = "<p style='color: #ff0000'>Erro: Link inválido, solicite novo link para atualizar a senha!</p>";
                                        header("Location: recuperar_senha.php");
                                    }
                                } else {
                                    $_SESSION['msg_rec'] = "<p style='color: #ff0000'>Erro: Link inválido, solicite novo link para atualizar a senha!</p>";
                                    header("Location: recuperar_senha.php");
                                }

                                ?>

                                <h1 class="text-center">Redefina a sua senha</h1>
                                <img src="assets/brand-tagline-original.png" class="d-flex m-auto">

                                <form method="POST" action="">
                                    <?php
                                    $usuario = "";
                                    if (isset($dados['senha_usuario'])) {
                                        $usuario = $dados['senha_usuario'];
                                    } ?>

                                    <input type="password" name="senha_usuario" class="form-control my-4 py-2" placeholder="Digite sua nova senha..." value="<?php echo $usuario; ?>"><br><br>
                                    <div class="text-center mt-3">
                                        <input type="submit" class="btn btn-primary" value="Atualizar" name="SendNovaSenha">
                                    </div>
                                </form>

                                <br>
                                <a href="Login.php" class="nav-link text-center"> Lembrou? clique aqui para logar</a> 
    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>