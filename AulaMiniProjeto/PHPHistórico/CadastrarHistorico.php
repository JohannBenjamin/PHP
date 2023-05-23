<?php
    include_once('../conexao.php');

    if($_POST)
    {
        if(empty($_POST['txtIdUsuario']) ||
        empty($_POST['txtIdProduto']) ||
        empty($_POST['txtCadastro']) ||
        empty($_POST['txtTipo']) ||
        empty($_POST['txtQtde']) ||
        empty($_POST['txtValor']) ||
        empty($_POST['txtStatus']) ||
        empty($_POST['txtObs']))
        {
            echo '<p>Erro! Preencha todos os campos para Cadastrar Usuário<p>';
        }
        else
        {
            $idUsuario = $_POST['txtIdUsuario'];
            $idProduto = $_POST['txtIdProduto'];
            $tipo = $_POST['txtTipo'];
            $qtde = $_POST['txtQtde'];
            $valor = $_POST['txtValor'];
            $status = $_POST['txtStatus'];
            $obs = $_POST['txtObs'];

            try {
                $sql = $conn->prepare("
                    insert into Historico
                    (
                        id_Historico_Historico,
                        id_Produto_Historico,
                        tipo_Historico,
                        qtde_Historico,
                        valor_Historico,
                        status_Historico,
                        obs_Historico
                    )
                    values
                    (
                        :id_Historico_Historico,
                        :id_Produto_Historico,
                        :tipo_Historico,
                        :qtde_Historico,
                        :valor_Historico,
                        :status_Historico,
                        :obs_Historico
                    )
                ");

                $sql->execute(array(
                    ':id_Usuario_Historico' => $idUsuario,
                    ':id_Produto_Historico' => $idProduto,
                    ':tipo_Historico' => $tipo,
                    ':qtde_Historico' => $qtde,
                    ':valor_Historico' => $valor,
                    ':status_Historico' => $status,
                    ':obs_Historico' => $obs
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
        header('Location:../TelaHistorico.php');
    }
?>

<hr>
<a href="../TelaHistorico.php">Voltar</a>