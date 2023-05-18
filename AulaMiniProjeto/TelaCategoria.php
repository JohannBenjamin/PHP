<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categoria</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h1>Gerenciamento de Categorias</h1>
            </div>
            <form action="" method="post" class="form-control">
                <div class="row mt-3">
                    <div class="col-sm-3">
                        <input type="number" name="txtId" id="txtId" class="form-control" min="0" placeholder="Id">
                    </div>
                    <div class="col-sm-9">
                        <button id="btnBuscar" name="btnBuscar" class="btn btn-primary" formaction="TelaCategoria.php">&#128269;</button>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-9">
                        <input type="text" name="txtNome" id="txtNome" class="form-control" placeholder="Nome">
                    </div>
                    <div class="col-sm-3">
                        <select name="txtStatus" class="form-control" id="txtStatus">
                            <option value="">-- Selecione um Status --</option>
                            <option value="Ativo">Ativo</option>
                            <option value="Inativo">Inativo</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <textarea name="txtObs" id="txtObs" rows="5" class="form-control" placeholder="Observações"></textarea>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-12 text-end">
                        <button id="btnCadastrar" name="btnCadastrar" class="btn btn-success" formaction="TelaCategoria.php" value="cadastrar">Cadastrar</button>
                        <button id="btnAlterar" name="btnAlterar" class="btn btn-secondary" formaction="TelaCategoria.php" value="alterar">Alterar</button>
                        <button id="btnLimpar" name="btnLimpar" class="btn btn-warning" formaction="TelaCategoria.php" value="limpar">Limpar</button>
                        <button id="btnExcluir" name="btnExcluir" class="btn btn-danger" formaction="TelaCategoria.php" value="excluir">Excluir</button>
                        <button id="btnSair" name="btnSair" class="btn btn-dark" formaction="TelaCategoria.php" value="sair">Sair</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="../js/bootstrap.js"></script>
</body>
</html>