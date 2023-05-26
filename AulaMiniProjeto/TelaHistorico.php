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
    <?php
        $idCampo = '';
        $idUsuarioCampo = '';
        //$nomeUsuarioCampo = '';
        $idProdutoCampo = '';
        //$nomeProdutoCampo = '';
        $cadastroCampo = '';
        $tipoCampo = '';
        $qtdeCampo = '';
        $valorCampo = '';
        $statusCampo = '';
        $obsCampo = '';
        $msg = 'Execute uma operação...';

        if($_POST)
        {
            $btn = $_POST['btn'];
            if($btn == 'buscar')
            {
                $msg = 'Busca realizada com sucesso!';
                include_once('./PHPHistórico/PesquisarHistorico.php');
            }
            if($btn == 'cadastrar')
            {
                include_once('./PHPHistórico/CadastrarHistorico.php');
                if($situacao)
                {
                    $idCampo = $id;
                    include_once('./PHPHistórico/PesquisarHistorico.php');
                }
            }
            if($btn == 'alterar')
            {
                include_once('./PHPHistórico/AlterarHistorico.php');
                if($situacao)
                {
                    $idCampo = $id;
                    include_once('./PHPHistórico/PesquisarHistorico.php');
                }
            }
            if($btn == 'excluir')
            {
                include_once('./PHPHistórico/DeletarHistorico.php');
            }
        }
    ?>
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h1>Gerenciamento de Históricos</h1>
            </div>
            <form action="" method="post" class="form-control">
                <div class="row mt-3">
                    <div class="col-sm-3">
                        <input type="number" name="txtId" id="txtId" class="form-control" min="0" placeholder="Id" value="<?=$idCampo?>">
                    </div>
                    <div class="col-sm-9">
                        <button id="btnBuscar" name="btn" class="btn btn-primary" formaction="TelaHistorico.php" value="buscar">&#128269;</button>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-3">
                        <input type="number" name="txtIdUsuario" id="txtIdUsuario" class="form-control" min="0" placeholder="Id do Usuário" value="<?=$idUsuarioCampo?>">
                    </div>
                    <div class="col-sm-3">
                        <select name="txtNomeUsuario" class="form-control" id="txtNomeUsuario">
                            <option value="">-- Selecione um Usuário --</option>
                            <option value="...">...</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <input type="number" name="txtIdProduto" id="txtIdProduto" class="form-control" min="0" placeholder="Id do Produto" value="<?=$idProdutoCampo?>">
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
                        <input type="date" name="txtCadastro" class="form-control" id="txtCadastro" value="<?=substr($cadastroCampo,0,10)?>">
                    </div>
                    <div class="col-sm-6">
                        <select name="txtTipo" class="form-control" id="txtTipo">
                            <option value="">-- Selecione um Tipo --</option>
                            <option value="Compra" <?=($tipoCampo=="Compra"?"selected":"")?>>Compra</option>
                            <option value="Venda" <?=($tipoCampo=="Venda"?"selected":"")?>>Venda</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-4">
                        <input type="number" name="txtQtde" id="txtQtde" class="form-control" min="0" placeholder="Quantidade" value="<?=$qtdeCampo?>">
                    </div>
                    <div class="col-sm-4">
                        <input type="number" name="txtValor" id="txtValor" class="form-control" step="0.01" min="0" placeholder="Valor" value="<?=$valorCampo?>">
                    </div>
                    <div class="col-sm-4">
                        <select name="txtStatus" class="form-control" id="txtStatus">
                            <option value="">-- Selecione um Status --</option>
                            <option value="Ativo" <?=($statusCampo=="Ativo"?"selected":"")?>>Ativo</option>
                            <option value="Inativo" <?=($statusCampo=="Inativo"?"selected":"")?>>Inativo</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <textarea name="txtObs" placeholder="Observações" class="form-control" rows="5" id="txtObs"><?=$obsCampo?></textarea>
                    </div>                    
                </div>
                <div class="row mt-3">
                <div class="col-sm-7">
                        <div class="col-sm-12 text-center p-1" style="background-color: lightgray; border-radius: 10px;">
                            <h5><?=$msg?></h5>
                        </div>
                    </div>
                    <div class="col-sm-5 text-end">
                        <button id="btnCadastrar" name="btn" class="btn btn-success" formaction="TelaHistorico.php" value="cadastrar">Cadastrar</button>
                        <button id="btnAlterar" name="btn" class="btn btn-secondary" formaction="TelaHistorico.php" value="alterar">Alterar</button>
                        <button id="btnLimpar" name="btn" class="btn btn-warning" formaction="TelaHistorico.php" value="limpar">Limpar</button>
                        <button id="btnExcluir" name="btn" class="btn btn-danger" formaction="TelaHistorico.php" value="excluir">Excluir</button>
                        <button id="btnSair" name="btn" class="btn btn-dark" formaction="" value="sair">Sair</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="../js/bootstrap.js"></script>
</body>
</html>