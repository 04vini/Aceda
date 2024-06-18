<?php




?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório EmpreendAceda - Administrador</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

        
        <div class="container">
            <div>
                <h3 class="row justify-content-center mt-3 pt-1">Relatório Empreenda Aceda</h3>
            </div>
            <div class="row justify-content-end mb-2 pt-0 pb-2">
                <a href="adm-empreenda-excel.php" class="btn btn-success text-white"><i class="bi bi-file-earmark-excel"> </i>Excel</a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome do Responsável</th>
                                <th scope="col">Nome do Negócio</th>
                                <th scope="col">Celular</th>
                                <th scope="col">Redes Sociais</th>
                                <th scope="col">Loja Física</th>
                                <th scope="col">Tem Logo?</th>
                                <th scope="col">Anexo Logo</th>
                                <th scope="col">Aceite termo?</th>
                                <th scope="col">Data do Registro</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Ronaldo</td>
                                <td>Aceda</td>
                                <td>5199999999</td>
                                <td>Aceda.sampa.br</td>
                                <td>São Paulo</td>
                                <td>Sim</td>
                                <td>aceda-logo.png</td>
                                <td>Aceito</td>
                                <td>16/06/2024</td>
                            </tr>
                        </tbody>
                </table>    
            </div>

        </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>