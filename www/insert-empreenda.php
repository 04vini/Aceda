<?php
include "conexao.php";

$nome_responsavel = isset($_POST['InputNome']) ? $_POST['InputNome'] : NULL;

$nome_negocio = isset($_POST['InputNegocio']) ? $_POST['InputNegocio'] : NULL;

$celular = isset($_POST['InputWhats']) ? $_POST['InputWhats'] : NULL;

$redes = isset($_POST['InputRedesSoc']) ? $_POST['InputRedesSoc'] : NULL;

$loja = isset($_POST['InputLoja']) ? $_POST['InputLoja'] : NULL;

$possuilogo = isset($_POST['flexLogo']) ? $_POST['flexLogo'] : NULL;

$aceite = isset($_POST['flexPrivacidade']) ? $_POST['flexPrivacidade'] : NULL;

$anexo = NULL;

if (isset($_FILES['formLogo']) && $_FILES['formLogo']['error'] == UPLOAD_ERR_OK) {
    $anexo = "./assets/img/" . basename($_FILES["formLogo"]["name"]);
    move_uploaded_file($_FILES["formLogo"]["tmp_name"], $anexo);
}

date_default_timezone_set('America/Sao_Paulo');
$registro = date("Y-m-d H:i:s");

$query = "INSERT INTO tb_empreenda (nome_responsavel, nome_negocio, celular, redes, loja, possuilogo, anexo, aceite, registro) 
          VALUES ('$nome_responsavel', '$nome_negocio', '$celular', '$redes', '$loja', '$possuilogo', '$anexo', '$aceite', '$registro')";

$res = mysqli_query($conn, $query);

if ($res) {
    header("Location: ./empreendaAceda.php?mensagem=Enviado com sucesso");
} else {
    header("Location: ./empreendaAceda.php?mensagem=Erro ao enviar dados");
}
exit();
?>