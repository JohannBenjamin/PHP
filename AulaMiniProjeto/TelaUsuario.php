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
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h1>Gerenciamento de Usuários</h1>
            </div>
            <form action="" method="post" class="form-control">
                <div class="row mt-3">
                    <div class="col-sm-4">
                        <input type="number" name="txtId" min="0"placeholder="Id" class="form-control" id="txtId">
                    </div>
                    <div class="col-sm-4">
                        <button id="btnBuscar" name="btnBuscar" class="btn btn-primary" formaction="TelaUsuario.php" value="buscar">&#128269;</button>
                    </div>
                    <div class="col-sm-4">
                        <input type="date" name="txtCadastro" class="form-control" id="txtCadastro">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <input type="text" name="txtNome" placeholder="Nome" class="form-control" id="txtNome">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-4">
                        <input type="text" name="txtUsuario" placeholder="Login" class="form-control" id="txtUsario">
                    </div>
                    <div class="col-sm-4">
                        <input type="password" name="txtSenha" placeholder="Senha" class="form-control" id="txtSenha">
                    </div>
                    <div class="col-sm-4">
                        <input type="date" name="txtNascimento" class="form-control" id="txtNascimento">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-8">
                        <input type="file" name="txtImg" placeholder="Imagem" class="form-control" id="txtImg">
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
                        <button id="btnCadastrar" name="btnCadastrar" class="btn btn-success" formaction="TelaUsuario.php" value="cadastrar">Cadastrar</button>
                        <button id="btnAlterar" name="btnAlterar" class="btn btn-secondary" formaction="TelaUsuario.php" value="alterar">Alterar</button>
                        <button id="btnLimpar" name="btnLimpar" class="btn btn-warning" formaction="TelaUsuario.php" value="limpar">Limpar</button>
                        <button id="btnExcluir" name="btnExcluir" class="btn btn-danger" formaction="TelaUsuario.php" value="excluir">Excluir</button>
                        <button id="btnSair" name="btnSair" class="btn btn-dark" formaction="TelaUsuario.php" value="sair">Sair</button>
                    </div>
                </div>
            </form>
        </div>
        <!--</?php
            include_once('conexao.php');
            if($_GET)
            {
                $id = $_GET['txtId'];
                try {
                    $sql = $conn->query("select * from Usuario where id_Usuario = $id");

                    if($sql->rowCount() != 0)
                    {
                        foreach ($sql as $linha) {
                            echo '<pre>';
                                print_r($linha);
                            echo '</pre>';
                            echo "Nome: ".$linha[1]."<br>";
                            echo "Login: ".$linha['usuario_Usuario']."<br>";
                            echo "<hr>";
                            $_GET['txtNome'] = $linha[1];
                        }
                    }
                    else
                    {
                        echo "Nenhum resultado!";
                    }


                } catch (PDOExcep $ex) {
                    echo $ex->getMessage();
                }
            }


        ?>-->
    </div>
    <script src="../js/bootstrap.js"></script>
</body>
</html>