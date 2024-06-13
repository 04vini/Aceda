<?php
session_start();
ob_start();
include_once 'conexao.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require './lib/vendor/autoload.php';
$mail = new PHPMailer(true);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <img src="" alt="">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Blog ACEDA</title>
</head>

<body class="outfit fundo-da-tela">
    <section class="mb-5">
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-12 col-sm-8 col-md-6 m-auto">
                    <div class="card shadow-custom">
                        <div class="card-body">
                            <?php
                            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

                            if (!empty($dados['SendRecupSenha'])) {
                                //var_dump($dados);
                                $query_usuario = "SELECT id, nome, usuario 
                                            FROM tb_usuarios 
                                            WHERE usuario =:usuario  
                                            LIMIT 1";
                                $result_usuario = $conn->prepare($query_usuario);
                                $result_usuario->bindParam(':usuario', $dados['usuario'], PDO::PARAM_STR);
                                $result_usuario->execute();
                                //AQUI E ONDE EU CRIPTOGRAFO A SENHA
                                if (($result_usuario) and ($result_usuario->rowCount() != 0)) {
                                    $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
                                    $chave_recuperar_senha = password_hash($row_usuario['id'], PASSWORD_DEFAULT);
                                    //echo "Chave $chave_recuperar_senha <br>";

                                    $query_up_usuario = "UPDATE tb_usuarios 
                                                SET recuperar_senha =:recuperar_senha 
                                                WHERE id =:id 
                                                LIMIT 1";
                                    $result_up_usuario = $conn->prepare($query_up_usuario);
                                    $result_up_usuario->bindParam(':recuperar_senha', $chave_recuperar_senha, PDO::PARAM_STR);
                                    $result_up_usuario->bindParam(':id', $row_usuario['id'], PDO::PARAM_INT);

                                    if ($result_up_usuario->execute()) {
                                        $link = "http://localhost/aceda/www/atualizar_senha.php?chave=$chave_recuperar_senha";

                                        try {
                                            /*$mail->SMTPDebug = SMTP::DEBUG_SERVER;*/
                                            $mail->CharSet = 'UTF-8';
                                            $mail->isSMTP();
                                            $mail->Host       = 'sandbox.smtp.mailtrap.io';
                                            $mail->SMTPAuth   = true;
                                            $mail->Username   = '4abe5d1ff2a368';
                                            $mail->Password   = '03d132528f1379';
                                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                                            $mail->Port       = 2525;

                                            $mail->setFrom('atendimento@aceda.com', 'Atendimento');
                                            $mail->addAddress($row_usuario['usuario'], $row_usuario['nome']);

                                            $mail->isHTML(true);                                  //Set email format to HTML
                                            $mail->Subject = 'Recuperar senha';
                                            $mail->Body    = 'Prezado(a) ' . $row_usuario['nome'] .".<br><br>Você solicitou alteração de senha.<br><br>Para continuar o processo de recuperação de sua senha, clique no link abaixo ou cole o endereço no seu navegador: <br><br><a href='" . $link . "'>" . $link . "</a><br><br>Se você não solicitou essa alteração, nenhuma ação é necessária. Sua senha permanecerá a mesma até que você ative este código.<br><br>";
                                            $mail->AltBody = 'Prezado(a) ' . $row_usuario['nome'] ."\n\nVocê solicitou alteração de senha.\n\nPara continuar o processo de recuperação de sua senha, clique no link abaixo ou cole o endereço no seu navegador: \n\n" . $link . "\n\nSe você não solicitou essa alteração, nenhuma ação é necessária. Sua senha permanecerá a mesma até que você ative este código.\n\n";

                                            $mail->send();

                                            $_SESSION['msg'] = "<p style='color: green'>Enviado e-mail com instruções para recuperar a senha. Acesse a sua caixa de e-mail para recuperar a senha!</p>";
                                            header("Location: Login.php");
                                        } catch (Exception $e) {
                                            echo "Erro: E-mail não enviado sucesso. Mailer Error: {$mail->ErrorInfo}";
                                        }
                                    } else {
                                        echo  "<p style='color: #ff0000'>Erro: Tente novamente!</p>";
                                    }
                                } else {
                                    echo "<p style='color: #ff0000'>Erro: Usuário não encontrado!</p>";
                                }
                            }

                            if (isset($_SESSION['msg_rec'])) {
                                echo $_SESSION['msg_rec'];
                                unset($_SESSION['msg_rec']);
                            }

                            ?>
                            
                            <h1 class="text-center">Enviar link de redefinição</h1>
                            <img src="assets/brand-tagline-original.png" class="d-flex m-auto">
                            
                            <form method="POST" action="">
                                <?php
                                $usuario = "";
                                if (isset($dados['usuario'])) {
                                    $usuario = $dados['usuario'];
                                } ?>

                                <input type="text" name="usuario" class="form-control my-4 py-2" placeholder="Insira o email para redefinir sua senha" value="<?php echo $usuario; ?>"><br><br>
                                <div class="text-center mt-3">
                                    <input type="submit" class="btn btn-primary" value="Recuperar" name="SendRecupSenha">
                                </div>
                            </form>
                            <a href="Login.php" class="nav-link text-center">Lembrou? clique aqui para logar</a> 
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    </section>
</body>
<script src="1.redirecionar_usuario.js"></script>

</html>