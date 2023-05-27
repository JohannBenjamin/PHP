<?php
    include_once('../conexao.php');

    if($_POST)
    {
        $situacao = FALSE;

        if(empty($_POST['txtNome']) ||
        empty($_POST['txtStatus']) ||
        empty($_POST['txtObs']))
        {
            $msg = 'Erro! Preencha todos os campos para Cadastrar uma Categoria';
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
                    $id = $conn->lastInsertId();
                    $msg = 'Dados Cadastrados com sucesso. ID Gerado: '.$id;
                    $situacao = TRUE;
                }
                else
                {
                    $msg = '<p>Erro no cadastro!</p>';
                }

            } catch (PDOException $ex) {
                $msg = $ex->getMessage();
            }
        }
    }
    else
    {
        header('Location:../TelaCategoria.php');
    }
?>