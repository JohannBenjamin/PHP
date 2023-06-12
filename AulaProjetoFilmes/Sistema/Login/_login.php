<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/bootstrap.css">
    <link rel="stylesheet" href="../css/styleSistema.css">
    <title>Login</title>
</head>
<body>
    <?php
        $mensagem = "";
        if($_POST)
        {
            include_once('../../Conexão/conexao.php');
            $login = $_POST['txtLogin'];
            $senha = $_POST['txtSenha'];

            try {
                $sql = $conn->query('
                    select * from Usuario
                    where 
                        usuario_usuario = "'.$login.'" and
                        senha_usuario = "'.$senha.'"
                ');

                if($sql->rowCount()==1)
                {
                    session_start();

                    foreach ($sql as $row) {
                        $_SESSION['idUsuario'] = $row[0];
                        $_SESSION['nomeUsuario'] = $row[1];
                        $_SESSION['loginUsuario'] = $row[4];
                        $_SESSION['imgUsuario'] = $row[6];

                        header('Location:../_sistema.php');
                    }
                }
                else{
                    $mensagem = 'Erro! Usuário ou Senha inválidos';
                }
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
        }
    ?>
    <div class="container w-25 mt-4">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h1>Login</h1>
            </div>
        </div>
        <form action="" method="post" class="form-control">
            
            <div class="row mt-3">
                <div class="col-sm-12">
                    <div class="form-outline mb-4">
                        <input type="text" id="txtLogin" name="txtLogin" class="form-control" placeholder="Informe o Usuário..."/>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-outline mb-4">
                        <input type="password" id="txtSenha" name="txtSenha" class="form-control" placeholder="Informe a Senha..."/>
                    </div>
                </div>
            </div>

            <div class="row text-center">
                <div class="col">
                    <button class="btn btn-primary btn-block mb-4" id="btnLogin" name="btnLogin" formaction="_login.php">Entrar</button>
                </div>
            </div>

            <div class="text-center">
                <p><?=$mensagem?></p>
            </div>
        </form>
    </div>
</body>
</html>