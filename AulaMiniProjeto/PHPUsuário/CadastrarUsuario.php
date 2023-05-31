<?php
    include_once('../conexao.php');

    if($_POST)
    {
        $situacao = FALSE;

        if(empty($_POST['txtNome']) ||
        empty($_POST['txtUsuario']) ||
        empty($_POST['txtSenha']) ||
        empty($_POST['txtNascimento']) ||
        empty($_FILES['txtImg']['name']) ||
        empty($_POST['txtStatus']) ||
        empty($_POST['txtObs']))
        {
            $msg = 'Erro! Preencha todos os campos para Cadastrar um Usuário';
        }
        else
        {
            $nome = $_POST['txtNome'];
            $usuario = $_POST['txtUsuario'];
            $senha = $_POST['txtSenha'];
            $nascimento = $_POST['txtNascimento'];
            $img = $_FILES['txtImg']['name'];
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
                    $id = $conn->lastInsertId();
                    $msg = 'Dados Cadastrados com sucesso. ID Gerado: '.$id;
                    $situacao = TRUE;
                }
                else
                {
                    $msg = 'Erro no cadastro!';
                }

            } catch (PDOException $ex) {
                $msg = $ex->getMessage();
            }
        }
    }
    else
    {
        header('Location:../TelaUsuario.php');
    }
?>