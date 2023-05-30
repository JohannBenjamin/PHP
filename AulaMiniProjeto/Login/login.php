<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <title>Login</title>

    <style>
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>
<?php
    $mensagem = "";
    if($_POST)
    {
        include_once('../conexao.php');
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

                    header('Location:../Sistema/_sistema.php');
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
            <!-- Email input -->
            <div class="row mt-3">
                <div class="col-sm-12">
                    <div class="form-outline mb-4">
                        <!--label class="form-label" for="txtLogin">Login do Usuário</label-->
                        <input type="text" id="txtLogin" name="txtLogin" class="form-control" placeholder="Digite o Usuário"/>
                    </div>
                </div>
            </div>
            <!-- Password input -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-outline mb-4">
                        <!--label class="form-label" for="txtSenha">Senha do Usuário</label-->
                        <input type="password" id="txtSenha" name="txtSenha" class="form-control" placeholder="Digite a Senha"/>
                    </div>
                </div>
            </div>

            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                <!-- Checkbox -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                        <label class="form-check-label" for="form2Example31"> Lembrar-se </label>
                    </div>
                </div>

                <div class="col">
                <!-- Simple link -->
                <a href="#!">Esqueceu a senha?</a>
                </div>
            </div>

            <!-- Submit button -->
            <div class="row text-center">
                <div class="col">
                    <button class="btn btn-primary btn-block mb-4" id="btnLogin" name="btnLogin" formaction="login.php">Entrar</button>
                </div>
            </div>

            <!-- Register buttons -->
            <div class="text-center">
                <p>Não é membro? <a href="#!">Registre-se</a></p>
            </div>
            <div class="text-center">
                <p><?=$mensagem?></p>
            </div>
        </form>
    </div>
</body>
</html>