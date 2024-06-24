<?php
require '../vendor/autoload.php';
include "conexao.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


// Buscar registros do banco de dados
$sql = "SELECT * FROM tb_solicitacoes ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Criar uma nova planilha
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Obter cabeçalhos
    $fields = $result->fetch_fields();
    $cabecalhos = [];
    foreach ($fields as $field) {
        $cabecalhos[] = $field->name;
    }

    // Adiciona cabeçalho
    foreach ($cabecalhos as $coluna => $cabecalho) {
        $colunaLetra = chr(65 + $coluna); // Convertendo índice de coluna para letra (A, B, C, etc.)
        $sheet->setCellValue($colunaLetra . '1', $cabecalho);
    }

    // Adiciona registro
    $linha = 2;
    while ($row = $result->fetch_assoc()) {
        foreach ($cabecalhos as $coluna => $cabecalho) {
            $colunaLetra = chr(65 + $coluna); // Convertendo índice de coluna para letra (A, B, C, etc.)
            $sheet->setCellValue($colunaLetra . $linha, $row[$cabecalho]);
        }
        $linha++;
    }

    //faz download do arquivo
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Relatório Solicitações Aceda.xlsx"');
    header('Cache-Control: max-age=0');

    // Gerar e enviar o arquivo Excel
    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
    exit;

} else {
    echo "Nenhum registro encontrado.";
}

$conn->close();