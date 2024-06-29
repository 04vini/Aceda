<?php
session_start();
ob_start();
include_once 'conexao.php';

if((!isset($_SESSION['id'])) AND (!isset($_SESSION['nome']))){
    $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Necessário realizar o login para acessar a página!</p>";
    header("Location: Login.php");
    exit();
}

include "conexao.php";

//Validação dos dados do form
$nome = isset($_POST['nome']) ? mysqli_real_escape_string($conn, $_POST['nome']) : NULL;
$funcao = isset($_POST['funcao']) ? mysqli_real_escape_string($conn, $_POST['funcao']) : NULL;
$resumo = isset($_POST['resumo']) ? mysqli_real_escape_string($conn, $_POST['resumo']) : NULL;
$periodo = isset($_POST['periodo']) ? mysqli_real_escape_string($conn, $_POST['periodo']) : NULL;
$linkedin = isset($_POST['linkedin']) ? mysqli_real_escape_string($conn, $_POST['linkedin']) : NULL;

date_default_timezone_set('America/Sao_Paulo');
$registro = date("Y-m-d H:i:s");

//Validação e tratamento da imagem para inserção no banco
if (isset($_FILES['foto']) && !empty ($_FILES['foto'])) {
    $foto = "./assets/img/" . basename($_FILES["foto"]["name"]);
    move_uploaded_file($_FILES["foto"]["tmp_name"], $foto);
} else {
    $foto = NULL;
}

//Query de inserção dos dados no banco
$query = "INSERT INTO tb_voluntarios (nome, foto, funcao, resumo, periodo, linkedin, registro) VALUES ('$nome', '$foto', '$funcao', '$resumo', '$periodo', '$linkedin', '$registro')";
$res = mysqli_query($conn, $query);

if ($res) {
    header ("Location: ./adm-voluntarios.php?mensagem=Incluído com sucesso");
} else {
    header ("Location: ./adm-voluntarios.php?mensagem=Não foi possível incluir os dados");
};

exit();
?>
