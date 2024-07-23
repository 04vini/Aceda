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

// Verifica se um arquivo foi enviado
if (isset($_FILES['InputCurriculo']) && $_FILES['InputCurriculo']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['InputCurriculo']['tmp_name'];
    $fileName = $_FILES['InputCurriculo']['name'];
    $fileSize = $_FILES['InputCurriculo']['size'];
    $fileType = $_FILES['InputCurriculo']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // Define os tipos de arquivo permitidos
    $allowedfileExtensions = array('pdf', 'doc', 'docx');

    if (in_array($fileExtension, $allowedfileExtensions)) {
        // Diretório onde o arquivo será salvo
        $uploadFileDir = './assets/uploads/';
        $dest_path = $uploadFileDir . $fileName;

        if(move_uploaded_file($fileTmpPath, $dest_path)) {
            $curriculoPath = $dest_path;
        } else {
            header("Location: ./bancodevagas.php?mensagem=Erro ao mover o arquivo para o diretório de upload");
            exit();
        }
    } else {
        header("Location: ./bancodevagas.php?mensagem=Tipo de arquivo não permitido");
        exit();
    }
} else {
    header("Location: ./bancodevagas.php?mensagem=Erro no upload do arquivo");
    exit();
}

// Prepara a query SQL (utilizando para segurança)
$query = "INSERT INTO tb_curriculo (nome, nascimento, sexo, email, pais, cpf, telefone, fixo, estado, cidade, linkedin, anexo, aceite, registro) 
          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("ssssssssssssss", $nome, $nascimento, $sexo, $email, $pais, $cpf, $telefone, $fixo, $estado, $cidade, $linkedin, $curriculoPath, $aceite, $registro);
// Executa a query
if ($stmt->execute()) {
    header("Location: ./bancodevagas.php?mensagem=Enviado com sucesso");
    exit();
} else {
    header("Location: ./bancodevagas.php?mensagem=Erro ao enviar dados");
    exit();
}
?>