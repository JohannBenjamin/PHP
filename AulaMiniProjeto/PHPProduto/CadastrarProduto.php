<?php
    include_once('../conexao.php');

    if($_POST)
    {
        if(empty($_POST['txtIdCategoria']) ||
        empty($_POST['txtNome']) ||
        empty($_POST['txtQtde']) ||
        empty($_POST['txtValor']) ||
        empty($_POST['txtStatus']) ||
        empty($_POST['txtObs']))
        {
            echo '<p>Erro! Preencha todos os campos para Cadastrar Produto<p>';
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
        header('Location:../TelaProduto.php');
    }
?>

<hr>
<a href="../TelaProduto.php">Voltar</a>