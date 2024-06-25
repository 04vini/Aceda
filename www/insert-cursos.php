<?php
include "conexao.php";

// Obtém os dados do formulário
$nome = isset($_POST['InputNome']) ? $_POST['InputNome'] : '';
$email = isset($_POST['InputEmail']) ? $_POST['InputEmail'] : '';
$curso = isset($_POST['curso']) ? $_POST['curso'] : '';
$cpf = isset($_POST['InputCPF']) ? $_POST['InputCPF'] : '';
$nascimento = isset($_POST['InputDataNasc']) ? $_POST['InputDataNasc'] : '';
$endereco = isset($_POST['InputEndereco']) ? $_POST['InputEndereco'] : '';
$cep = isset($_POST['InputCep']) ? $_POST['InputCep'] : '';
$telefone = isset($_POST['InputWhats']) ? $_POST['InputWhats'] : '';
$cnpj = isset($_POST['InputCNPJ']) ? $_POST['InputCNPJ'] : '';
$razaosocial = isset($_POST['InputRS']) ? $_POST['InputRS'] : '';
$aceite = isset($_POST['flexPrivacidade']) ? $_POST['flexPrivacidade'] : '';

// Data e hora atual
date_default_timezone_set('America/Sao_Paulo');
$registro = date("Y-m-d H:i:s");

// Prepara a query SQL (utilizando para segurança)
$query = "INSERT INTO tb_curso (nome, email, curso, cpf, nascimento, endereco, cep, telefone, cnpj, razaosocial, aceite, registro) 
          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("ssssssssssss", $nome, $email, $curso, $cpf, $nascimento, $endereco, $cep, $telefone, $cnpj, $razaosocial, $aceite, $registro);

// Executa a query
if ($stmt->execute()) {
    header("Location: ./cursos.php?mensagem=Enviado com sucesso");
    exit();
} else {
    header("Location: ./cursos.php?mensagem=Erro ao enviar dados");
    exit();
}
?>
