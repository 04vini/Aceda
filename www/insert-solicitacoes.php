<?php
include "conexao.php";

// Verificação de conexão
if (!$conn) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar dados do formulário
    $nome = isset($_POST['InputNome']) ? $_POST['InputNome'] : '';
    $email = isset($_POST['InputEmail']) ? $_POST['InputEmail'] : '';
    $endereco = isset($_POST['InputEndereço']) ? $_POST['InputEndereço'] : '';
    $telefone = isset($_POST['InputWhats']) ? $_POST['InputWhats'] : '';
    $solicitacao = isset($_POST['selectSolicitacao']) ? $_POST['selectSolicitacao'] : '';
    $outros = isset($_POST['InputOutros']) ? $_POST['InputOutros'] : '';
    $solicitou = isset($_POST['InputSol']) ? $_POST['InputSol'] : '';
    $aceite = isset($_POST['flexPrivacidade']) ? $_POST['flexPrivacidade'] : '';

    // Verificar se os dados estão corretos
    if (empty($nome) || empty($email) || empty($endereco) || empty($telefone) || empty($solicitacao) || empty($aceite)) {
        header("Location: ./empreendaAceda.php?mensagem=Erro ao enviar dados: Preencha todos os campos obrigatórios");
        exit(); // Encerra o script após o redirecionamento
    }

    // Tratamento de upload de imagem
    $imagem = NULL;
    if (isset($_FILES['formImg']) && $_FILES['formImg']['error'] == UPLOAD_ERR_OK) {
        $imagem = "./assets/img/" . basename($_FILES["formImg"]["name"]);
        move_uploaded_file($_FILES["formImg"]["tmp_name"], $imagem);
    }

    // Preparar e executar a consulta SQL
    $query = "INSERT INTO tb_solicitacoes (nome, email, endereco, telefone, solicitacao, outrossolicitacao, orgaospublicos, imagem, aceite, registro) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";

    $stmt = mysqli_prepare($conn, $query);

    if ($stmt === false) {
        header("Location: ./empreendaAceda.php?mensagem=Erro na preparação da consulta: " . mysqli_error($conn));
        exit();
    }

    mysqli_stmt_bind_param($stmt, 'sssssssss', $nome, $email, $endereco, $telefone, $solicitacao, $outros, $solicitou, $imagem, $aceite);

    $res = mysqli_stmt_execute($stmt);

    if ($res) {
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header("Location: ./solicitacoesAceda.php?mensagem=Enviado com sucesso");
        exit();
    } else {
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header("Location: ./empreendaAceda.php?mensagem=Erro ao enviar dados");
        exit();
    }
}

mysqli_close($conn);
?>
