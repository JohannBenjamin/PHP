<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h1>Gerenciamento de Históricos</h1>
            </div>
            <form action="" method="post" class="form-control">
                <div class="row mt-3">
                    <div class="col-sm-3">
                        <input type="number" name="txtId" id="txtId" class="form-control" min="0" placeholder="Id">
                    </div>
                    <div class="col-sm-9">
                        <button id="btnBuscar" name="btnBuscar" class="btn btn-primary" formaction="./PHPHistórico/PesquisarHistorico.php">&#128269;</button>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-3">
                        <input type="number" name="txtIdUsuario" id="txtIdUsuario" class="form-control" min="0" placeholder="Id do Usuário">
                    </div>
                    <div class="col-sm-3">
                        <select name="txtNomeUsuario" class="form-control" id="txtNomeUsuario">
                            <option value="">-- Selecione um Usuário --</option>
                            <option value="...">...</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <input type="number" name="txtIdProduto" id="txtIdProduto" class="form-control" min="0" placeholder="Id do Produto">
                    </div>
                    <div class="col-sm-3">
                        <select name="txtNomeProduto" class="form-control" id="txtNomeProduto">
                            <option value="">-- Selecione um Produto --</option>
                            <option value="...">...</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-6">
                        <input type="date" name="txtCadastro" class="form-control" id="txtCadastro">
                    </div>
                    <div class="col-sm-6">
                        <select name="txtTipo" class="form-control" id="txtTipo">
                            <option value="">-- Selecione um Tipo --</option>
                            <option value="Compra">Compra</option>
                            <option value="Venda">Venda</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-4">
                        <input type="number" name="txtQtde" id="txtQtde" class="form-control" min="0" placeholder="Quantidade">
                    </div>
                    <div class="col-sm-4">
                        <input type="number" name="txtValor" id="txtValor" class="form-control" step="0.01" min="0" placeholder="Valor">
                    </div>
                    <div class="col-sm-4">
                        <select name="txtStatus" class="form-control" id="txtStatus">
                            <option value="">-- Selecione um Status --</option>
                            <option value="Ativo">Ativo</option>
                            <option value="Inativo">Inativo</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <textarea name="txtObs" placeholder="Observações" class="form-control" rows="5" id="txtObs"></textarea>
                    </div>                    
                </div>
                <div class="row mt-3">
                    <div class="col-sm-12 text-end">
                        <button id="btnCadastrar" name="btnCadastrar" class="btn btn-success" formaction="./PHPHistórico/CadastrarHistorico.php" value="cadastrar">Cadastrar</button>
                        <button id="btnAlterar" name="btnAlterar" class="btn btn-secondary" formaction=".PHPHistórico/AlterarHistorico.php" value="alterar">Alterar</button>
                        <button id="btnLimpar" name="btnLimpar" class="btn btn-warning" formaction="TelaHistorico.php" value="limpar">Limpar</button>
                        <button id="btnExcluir" name="btnExcluir" class="btn btn-danger" formaction="./PHPHistórico/DeletarHistorico.php" value="excluir">Excluir</button>
                        <button id="btnSair" name="btnSair" class="btn btn-dark" formaction="" value="sair">Sair</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="../js/bootstrap.js"></script>
</body>
</html>