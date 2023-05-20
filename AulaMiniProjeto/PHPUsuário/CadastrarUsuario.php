<?php
    include_once('../conexao.php');

    if($_POST)
    {
        if(empty($_POST['txtNome']) ||
        empty($_POST['txtUsuario']) ||
        empty($_POST['txtSenha']) ||
        empty($_POST['txtNascimento']) ||
        empty($_POST['txtImg']) ||
        empty($_POST['txtStatus']) ||
        empty($_POST['txtObs']))
        {
            echo '<p>Erro! Preencha todos os campos para Cadastrar Usuário<p>';
        }
        else
        {
            $nome = $_POST['txtNome'];
            $usuario = $_POST['txtUsuario'];
            $senha = $_POST['txtSenha'];
            $nascimento = $_POST['txtNascimento'];
            $img = $_POST['txtImg'];
            $status = $_POST['txtStatus'];
            $obs = $_POST['txtObs'];

            try {
                $sql = $conn->prepare("
                    insert into Usuario
                    (
                        nome_Usuario,
                        nascimento_Usuario,
                        usuario_Usuario,
                        senha_Usuario,
                        img_Usuario,
                        status_Usuario,
                        obs_Usuario
                    )
                    values
                    (
                        :nome_Usuario,
                        :nascimento_Usuario,
                        :usuario_Usuario,
                        :senha_Usuario,
                        :img_Usuario,
                        :status_Usuario,
                        :obs_Usuario
                    )
                ");

                $sql->execute(array(
                    ':nome_Usuario' => $nome,
                    ':nascimento_Usuario' => $nascimento,
                    ':usuario_Usuario' => $usuario,
                    ':senha_Usuario' => $senha,
                    ':img_Usuario' => $img,
                    ':status_Usuario' => $status,
                    ':obs_Usuario' => $obs
                ));

                if ($sql->rowCount()>=1) {
                    echo '<p>Dados Cadastrados com sucesso</p>';
                    echo '<p>ID Gerado: '.$conn->lastInsertId().'</p>';
                }
                else
                {
                    echo '<p>Erro no cadastro!</p>';
                }

            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
        }
    }
    else
    {
        header('Location:../TelaUsuario.php');
    }
?>

<hr>
<a href="../TelaUsuario.php">Voltar</a>