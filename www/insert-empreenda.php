<?php
include "conexao.php";

// Obtém os dados do formulário
$nome_responsavel = isset($_POST['InputNome']) ? $_POST['InputNome'] : '';
$nome_negocio = isset($_POST['InputNegocio']) ? $_POST['InputNegocio'] : '';
$celular = isset($_POST['InputWhats']) ? $_POST['InputWhats'] : '';
$redes = isset($_POST['InputRedesSoc']) ? $_POST['InputRedesSoc'] : '';
$loja = isset($_POST['InputLoja']) ? $_POST['InputLoja'] : '';
$possuilogo = isset($_POST['flexLogo']) ? $_POST['flexLogo'] : '';
$aceite = isset($_POST['flexPrivacidade']) ? $_POST['flexPrivacidade'] : '';
$anexo = NULL;

// Trata o upload de arquivo, se houver
if (isset($_FILES['formLogo']) && $_FILES['formLogo']['error'] == UPLOAD_ERR_OK) {
    $anexo = "./assets/img/" . basename($_FILES["formLogo"]["name"]);
    move_uploaded_file($_FILES["formLogo"]["tmp_name"], $anexo);
}

// Data e hora atual
date_default_timezone_set('America/Sao_Paulo');
$registro = date("Y-m-d H:i:s");

// Prepara a query SQL (utilizando prepared statements para segurança)
$query = "INSERT INTO tb_empreenda (nome_responsavel, nome_negocio, celular, redes, loja, possuilogo, anexo, aceite, registro) 
          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("sssssssss", $nome_responsavel, $nome_negocio, $celular, $redes, $loja, $possuilogo, $anexo, $aceite, $registro);

// Executa a query
if ($stmt->execute()) {
    header("Location: ./empreendaAceda.php?mensagem=Enviado com sucesso");
    exit();
} else {
    header("Location: ./empreendaAceda.php?mensagem=Erro ao enviar dados");
    exit();
}
?>
