<?php
    include_once('conexao.php');

    if($_POST)
    {
        $situacao = FALSE;

        if(empty($_POST['txtIdCategoria']) ||
        empty($_POST['txtNome']) ||
        empty($_POST['txtQtde']) ||
        empty($_POST['txtValor']) ||
        empty($_POST['txtStatus']) ||
        empty($_POST['txtObs']))
        {
            $msg = 'Erro! Preencha todos os campos para Cadastrar um Produto';
        }
        else
        {
            $idCategoria = $_POST['txtIdCategoria'];
            $nome = $_POST['txtNome'];
            $qtde = $_POST['txtQtde'];
            $valor = $_POST['txtValor'];
            $status = $_POST['txtStatus'];
            $obs = $_POST['txtObs'];

            try {
                $sql = $conn->prepare("
                    insert into Produto
                    (
                        id_Categoria_Produto,
                        nome_Produto,
                        qtde_Produto,
                        valor_Produto,
                        status_Produto,
                        obs_Produto
                    )
                    values
                    (
                        :id_Categoria_Produto,
                        :nome_Produto,
                        :qtde_Produto,
                        :valor_Produto,
                        :status_Produto,
                        :obs_Produto
                    )
                ");

                $sql->execute(array(
                    ':id_Categoria_Produto' => $idCategoria,
                    ':nome_Produto' => $nome,
                    ':qtde_Produto' => $qtde,
                    ':valor_Produto' => $valor,
                    ':status_Produto' => $status,
                    ':obs_Produto' => $obs
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
        header('Location:../TelaProduto.php');
    }
?>