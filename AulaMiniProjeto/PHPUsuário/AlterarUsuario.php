<?php
    include_once('../conexao.php');

    if($_POST)
    {
        if(!empty($_POST['txtId']))
        {
            $id = $_POST['txtId'];
        
            try {
                $sql = $conn->query("
                    select * from Usuario where id_Usuario=$id
                ");

                if ($sql->rowCount()>=1) {
                    foreach ($sql as $row) {
                        $nome = $row[1];
                        $nascimento = $row[2];
                        $usuario = $row[4];
                        $senha = $row[5];
                        $img = $row[6];
                        $status = $row[7];
                        $obs = $row[8];
                        
                        $situacao = TRUE;
                    }
                }
                else
                {
                    echo '<p>Erro! Usuário não existe</p>';
                    $situacao = FALSE;
                }

            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }

            if ($situacao)
            {
                if(!empty($_POST['txtNome']))
                {
                    $nome = $_POST['txtNome'];
                }
                if(!empty($_POST['txtUsuario']))
                {
                    $usuario = $_POST['txtUsuario'];
                }
                if(!empty($_POST['txtSenha']))
                {
                    $senha = $_POST['txtSenha'];
                }
                if(!empty($_POST['txtNascimento']))
                {
                    $nascimento = $_POST['txtNascimento'];
                }
                if(!empty($_POST['txtImg']))
                {
                    $img = $_POST['txtImg'];
                }
                if(!empty($_POST['txtStatus']))
                {
                    $status = $_POST['txtStatus'];
                }
                if(!empty($_POST['txtObs']))
                {
                    $obs = $_POST['txtObs'];
                }

                try {
                    $sql = $conn->prepare("
                        update Usuario set
                            nome_Usuario=:nome_Usuario,
                            nascimento_Usuario=:nascimento_Usuario,
                            usuario_Usuario=:usuario_Usuario,
                            senha_Usuario=:senha_Usuario,
                            img_Usuario=:img_Usuario,
                            status_Usuario=:status_Usuario,
                            obs_Usuario=:obs_Usuario
                        where id_Usuario=:id_Usuario
                    ");

                    $sql->execute(array(
                        ':id_Usuario'=>$id,
                        ':nome_Usuario' => $nome,
                        ':nascimento_Usuario' => $nascimento,
                        ':usuario_Usuario' => $usuario,
                        ':senha_Usuario' => $senha,
                        ':img_Usuario' => $img,
                        ':status_Usuario' => $status,
                        ':obs_Usuario' => $obs
                    ));

                    if ($sql->rowCount()>=1) {
                        echo '<p>Dados Alterados com sucesso</p>';
                    }
                    else
                    {
                        echo '<p>Erro na alteração!</p>';
                    }

                } catch (PDOException $ex) {
                    echo $ex->getMessage();
                }
            }
        }
        else
        {
            echo '<p>Erro! Informe o Id para alterar</p>';
        }
    }
    else
    {
        header('Location:../TelaUsuario.php');
    }
?>

<hr>
<a href="../TelaUsuario.php">Voltar</a>