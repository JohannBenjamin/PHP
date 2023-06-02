<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <title>Gerenciamento de Filmes</title>
</head>
<body>
    <?php
    $idCampo = '';
    $idCategoriaCampo = '';
    $nomeCategoriaCampo = '';
    $nomeCampo = '';
    $sinopseCampo = '';
    $imgCampo = '';
    $notaCampo = '';
    $statusCampo = '';
    $obsCampo = '';
    $msg = 'Execute uma operação...';

    if($_POST)
    {
        $btn = $_POST['btn'];
        if($btn == 'buscar')
        {
            $msg = 'Busca realizada com sucesso!';
            include_once('PesquisarFilme.php');
        }
        if($btn == 'cadastrar')
        {
            include_once('CadastrarFilme.php');
            if($situacao)
            {
                $idCampo = $id;
                include_once('PesquisarFilme.php');
            }
        }
        if($btn == 'alterar')
        {
            include_once('AlterarFilme.php');
            if($situacao)
            {
                $idCampo = $id;
                include_once('PesquisarFilme.php');
            }
        }
        if($btn == 'excluir')
        {
            include_once('DeletarFilme.php');
        }
    }
    ?>
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h1>Gerenciamento de Filmes</h1>
            </div>
            <form enctype="multipart/form-data" action="" method="post" class="form-control">
                <div class="row mt-3">
                    <div class="col-sm-3">
                        <input type="number" name="txtId" id="txtId" class="form-control" min="0" placeholder="Id" value="<?=$idCampo?>">
                    </div>
                    <div class="col-sm-3">
                        <button id="btnBuscar" name="btn" class="btn btn-primary" formaction="" value="buscar">&#128269;</button>
                    </div>
                    <div class="col-sm-3">
                        <input type="number" name="txtIdCategoria" id="txtIdCategoria" class="form-control" min="0" placeholder="Id da Categoria" value="<?=$idCategoriaCampo?>">
                    </div>
                    <div class="col-sm-3">
                        <select name="txtNomeCategoria" class="form-control" id="txtNomeCategoria">
                            <option value="">-- Selecione uma Categoria --</option>
                            <?php include_once('BuscarCategoria.php'); ?>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <input type="text" name="txtNome" id="txtNome" class="form-control" placeholder="Nome" value="<?=$nomeCampo?>">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <textarea name="txtSinopse" placeholder="Sinopse" class="form-control" rows="3" id="txtSinopse"><?=$sinopseCampo?></textarea>
                    </div>                    
                </div>
                <div class="row mt-3">
                    <div class="col-sm-5">
                        <input type="file" name="txtImg" placeholder="Imagem" class="form-control" id="txtImg">
                    </div>
                    <div class="col-sm-3">
                        <input type="number" name="txtNota" id="txtNota" class="form-control" step="0.1" min="0" placeholder="Nota" value="<?=$notaCampo?>">
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
                        <button id="btnCadastrar" name="btn" class="btn btn-success" formaction="TelaFilme.php" value="cadastrar">Cadastrar</button>
                        <button id="btnAlterar" name="btn" class="btn btn-secondary" formaction="TelaFilme.php" value="alterar">Alterar</button>
                        <button id="btnLimpar" name="btn" class="btn btn-warning" formaction="TelaFilme.php" value="limpar">Limpar</button>
                        <button id="btnExcluir" name="btn" class="btn btn-danger" formaction="TelaFilme.php" value="excluir">Excluir</button>
                        <button id="btnSair" name="btn" class="btn btn-dark" formaction="" value="sair">Sair</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>