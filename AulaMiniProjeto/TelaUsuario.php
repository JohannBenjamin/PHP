<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
    <?php
        $idCampo = '';
        $nomeCampo = '';
        $nascimentoCampo = '';
        $cadastroCampo = '';
        $usuarioCampo = '';
        $senhaCampo = '';
        $imgCampo = '';
        $statusCampo = '';
        $obsCampo = '';
        $msg = 'Execute uma operação...';

        if($_POST)
        {
            $btn = $_POST['btn'];
            if($btn == 'buscar')
            {
                $msg = 'Busca realizada com sucesso!';
                include_once('./PHPUsuário/PesquisarUsuario.php');
            }
            if($btn == 'cadastrar')
            {
                include_once('./PHPUsuário/CadastrarUsuario.php');
                if($situacao)
                {
                    $idCampo = $id;
                    include_once('./PHPUsuário/PesquisarUsuario.php');
                }
            }
            if($btn == 'alterar')
            {
                include_once('./PHPUsuário/AlterarUsuario.php');
                if($situacao)
                {
                    $idCampo = $id;
                    include_once('./PHPUsuário/PesquisarUsuario.php');
                }
            }
            if($btn == 'excluir')
            {
                include_once('./PHPUsuário/DeletarUsuario.php');
            }
        }
    ?>
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h1>Gerenciamento de Usuários</h1>
            </div>
            <form action="" method="post" class="form-control">
                <div class="row mt-3">
                    <div class="col-sm-4">
                        <input type="number" name="txtId" min="0" placeholder="Id" class="form-control" id="txtId" value="<?=$idCampo?>">
                    </div>
                    <div class="col-sm-4">
                        <button id="btnBuscar" name="btn" class="btn btn-primary" formaction="TelaUsuario.php" value="buscar">&#128269;</button>
                    </div>
                    <div class="col-sm-4">
                        <input type="date" name="txtCadastro" class="form-control" id="txtCadastro" placeholder="Data de Cadastro" value="<?=substr($cadastroCampo,0,10)?>">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <input type="text" name="txtNome" placeholder="Nome" class="form-control" id="txtNome" value="<?=$nomeCampo?>">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-4">
                        <input type="text" name="txtUsuario" placeholder="Login" class="form-control" id="txtUsario" value="<?=$usuarioCampo?>">
                    </div>
                    <div class="col-sm-4">
                        <input type="password" name="txtSenha" placeholder="Senha" class="form-control" id="txtSenha" value="<?=$senhaCampo?>">
                    </div>
                    <div class="col-sm-4">
                        <input type="date" name="txtNascimento" class="form-control" id="txtNascimento" placeholder="Data de Nascimento" value="<?=substr($nascimentoCampo,0,10)?>">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-8">
                        <input type="file" name="txtImg" placeholder="Imagem" class="form-control" id="txtImg" value="<?=$imgCampo?>">
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
                        <button id="btnCadastrar" name="btn" class="btn btn-success" formaction="TelaUsuario.php" value="cadastrar">Cadastrar</button>
                        <button id="btnAlterar" name="btn" class="btn btn-secondary" formaction="TelaUsuario.php" value="alterar">Alterar</button>
                        <a id="btnLimpar" name="btn" class="btn btn-warning" href="TelaUsuario.php">Limpar</a>
                        <button id="btnExcluir" name="btn" class="btn btn-danger" formaction="TelaUsuario.php" value="excluir">Excluir</button>
                        <button id="btnSair" name="btn" class="btn btn-dark" formaction="" value="sair">Sair</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="../js/bootstrap.js"></script>
</body>
</html>