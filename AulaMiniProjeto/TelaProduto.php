<?php
    $idCampo = '';
    $idCategoriaCampo = '';
    $nomeCategoriaCampo = '';
    $nomeCampo = '';
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
            include_once('./PHPProduto/PesquisarProduto.php');
        }
        if($btn == 'cadastrar')
        {
            include_once('./PHPProduto/CadastrarProduto.php');
            if($situacao)
            {
                $idCampo = $id;
                include_once('./PHPProduto/PesquisarProduto.php');
            }
        }
        if($btn == 'alterar')
        {
            include_once('./PHPProduto/AlterarProduto.php');
            if($situacao)
            {
                $idCampo = $id;
                include_once('./PHPProduto/PesquisarProduto.php');
            }
        }
        if($btn == 'excluir')
        {
            include_once('./PHPProduto/DeletarProduto.php');
        }
    }
?>
<div class="container mt-3">
    <div class="row">
        <div class="col-sm-12 text-center">
            <h1>Gerenciamento de Produtos</h1>
        </div>
        <form action="" method="post" class="form-control">
            <div class="row mt-3">
                <div class="col-sm-3">
                    <input type="number" name="txtId" id="txtId" class="form-control" min="0" placeholder="Id" value="<?=$idCampo?>">
                </div>
                <div class="col-sm-3">
                    <button id="btnBuscar" name="btn" class="btn btn-primary" formaction="TelaProduto.php" value="buscar">&#128269;</button>
                </div>
                <div class="col-sm-3">
                    <input type="number" name="txtIdCategoria" id="txtIdCategoria" class="form-control" min="0" placeholder="Id da Categoria" value="<?=$idCategoriaCampo?>">
                </div>
                <div class="col-sm-3">
                    <select name="txtNomeCategoria" class="form-control" id="txtNomeCategoria">
                        <option value="">-- Selecione uma Categoria --</option>
                        <?php include_once('./PHPProduto/BuscarCategoria.php'); ?>
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12">
                    <input type="text" name="txtNome" id="txtNome" class="form-control" placeholder="Nome" value="<?=$nomeCampo?>">
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
            <div class="col-sm-6">
                    <div class="col-sm-12 text-center p-1" style="background-color: lightgray; border-radius: 10px;">
                        <h5><?=$msg?></h5>
                    </div>
                </div>
                <div class="col-sm-6 text-end">
                    <button id="btnCadastrar" name="btn" class="btn btn-success" formaction="TelaProduto.php" value="cadastrar">Cadastrar</button>
                    <button id="btnAlterar" name="btn" class="btn btn-secondary" formaction="TelaProduto.php" value="alterar">Alterar</button>
                    <button id="btnLimpar" name="btn" class="btn btn-warning" formaction="TelaProduto.php" value="limpar">Limpar</button>
                    <button id="btnExcluir" name="btn" class="btn btn-danger" formaction="TelaProduto.php" value="excluir">Excluir</button>
                    <button id="btnSair" name="btn" class="btn btn-dark" formaction="" value="sair">Sair</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../js/bootstrap.js"></script>