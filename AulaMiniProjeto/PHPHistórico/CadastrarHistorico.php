<?php
    include_once('../conexao.php');

    if($_POST)
    {
        $situacao = FALSE;

        if(empty($_POST['txtIdUsuario']) ||
        empty($_POST['txtIdProduto']) ||
        empty($_POST['txtCadastro']) ||
        empty($_POST['txtTipo']) ||
        empty($_POST['txtQtde']) ||
        empty($_POST['txtValor']) ||
        empty($_POST['txtStatus']) ||
        empty($_POST['txtObs']))
        {
            $msg = 'Erro! Preencha todos os campos para Cadastrar um Histórico';
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
        header('Location:../TelaHistorico.php');
    }
?>