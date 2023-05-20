<?php
    include_once('../conexao.php');

    if($_POST)
    {
        if(empty($_POST['txtNome']) ||
        empty($_POST['txtStatus']) ||
        empty($_POST['txtObs']))
        {
            echo '<p>Erro! Preencha todos os campos para Cadastrar Categoria<p>';
        }
        else
        {
            $nome = $_POST['txtNome'];
            $status = $_POST['txtStatus'];
            $obs = $_POST['txtObs'];

            try {
                $sql = $conn->prepare("
                    insert into Categoria
                    (
                        nome_Categoria,
                        status_Categoria,
                        obs_Categoria
                    )
                    values
                    (
                        :nome_Categoria,
                        :status_Categoria,
                        :obs_Categoria
                    )
                ");

                $sql->execute(array(
                    ':nome_Categoria' => $nome,
                    ':status_Categoria' => $status,
                    ':obs_Categoria' => $obs
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
        header('Location:../TelaCategoria.php');
    }
?>

<hr>
<a href="../TelaCategoria.php">Voltar</a>