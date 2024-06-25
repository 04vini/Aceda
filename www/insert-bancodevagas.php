<?php
include "conexao.php";

// Obtém os dados do formulário
$nome = isset($_POST['InputNome']) ? $_POST['InputNome'] : '';
$nascimento = isset($_POST['InputDataNasc']) ? $_POST['InputDataNasc'] : '';
$sexo = isset($_POST['sexo']) ? $_POST['sexo'] : '';
$email = isset($_POST['InputEmail']) ? $_POST['InputEmail'] : '';
$pais = isset($_POST['InputPO']) ? $_POST['InputPO'] : '';
$cpf = isset($_POST['InputCPF']) ? $_POST['InputCPF'] : '';
$telefone = isset($_POST['InputWhats']) ? $_POST['InputWhats'] : '';
$fixo = isset($_POST['InputTEL']) ? $_POST['InputTEL'] : '';
$estado = isset($_POST['InputEst']) ? $_POST['InputEst'] : '';
$cidade = isset($_POST['InputCid']) ? $_POST['InputCid'] : '';
$linkedin = isset($_POST['InputLink']) ? $_POST['InputLink'] : '';
$aceite = isset($_POST['flexPrivacidade']) ? $_POST['flexPrivacidade'] : '';

// Data e hora atual
date_default_timezone_set('America/Sao_Paulo');
$registro = date("Y-m-d H:i:s");

// Prepara a query SQL (utilizando para segurança)
$query = "INSERT INTO tb_curriculo (nome, nascimento, sexo, email, pais, cpf, telefone, fixo, estado, cidade, linkedin, aceite, registro) 
          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("sssssssssssss", $nome, $nascimento, $sexo, $email, $pais, $cpf, $telefone, $fixo, $estado, $cidade, $linkedin, $aceite, $registro);

// Executa a query
if ($stmt->execute()) {
    header("Location: ./bancodevagas.php?mensagem=Enviado com sucesso");
    exit();
} else {
    header("Location: ./bancodevagas.php?mensagem=Erro ao enviar dados");
    exit();
}
?>
