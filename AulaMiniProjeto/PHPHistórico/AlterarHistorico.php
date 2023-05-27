<?php
    include_once('../conexao.php');

    if($_POST)
    {
        $situacao = FALSE;

        if(!empty($_POST['txtId']))
        {
            $id = $_POST['txtId'];
        
            try {
                $sql = $conn->query("
                    select * from Historico where id_Historico=$id
                ");

                if ($sql->rowCount()>=1) {
                    foreach ($sql as $row) {
                        $idUsuario = $row[1];
                        $idProduto = $row[2];
                        $momento = $row[3];
                        $tipo = $row[4];
                        $qtde = $row[5];
                        $valor = $row[6];
                        $status = $row[7];
                        $obs = $row[8];
                        
                        $situacao = TRUE;
                    }
                }
                else
                {
                    $msg = 'Erro! Histórico não existe';
                }

            } catch (PDOException $ex) {
                $msg = $ex->getMessage();
            }

            if ($situacao)
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
                    $msg = 'Nenhum dado a Alterar!';
                    $situacao = FALSE;
                }
                else
                {
                    if(!empty($_POST['txtIdUsuario']))
                    {
                        $idUsuario = $_POST['txtIdUsuario'];
                    }
                    if(!empty($_POST['txtIdProduto']))
                    {
                        $idProduto = $_POST['txtIdProduto'];
                    }
                    if(!empty($_POST['txtCadastro']))
                    {
                        $cadastro = $_POST['txtCadastro'];
                    }
                    if(!empty($_POST['txtTipo']))
                    {
                        $tipo = $_POST['txtTipo'];
                    }
                    if(!empty($_POST['txtQtde']))
                    {
                        $qtde = $_POST['txtQtde'];
                    }
                    if(!empty($_POST['txtValor']))
                    {
                        $valor = $_POST['txtValor'];
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
                            update Historico set
                                id_Usuario_Historico=:id_Usuario_Produto,
                                id_Produto_Historico=:id_Produto_Historico,
                                momento_Historico=:momento_Historico,
                                tipo_Historico=:tipo_Historico,
                                qtde_Historico=:qtde_Historico,
                                valor_Historico=:valor_Historico,
                                status_Historico=:status_Historico,
                                obs_Historico=:obs_Historico
                            where id_Historico=:id_Historico
                        ");

                        $sql->execute(array(
                            ':id_Historico'=>$id,
                            ':id_Usuario_Produto'=>$idUsuario,
                            ':id_Produto_Historico'=>$idProduto,
                            ':momento_Historico' => $momento,
                            ':tipo_Historico' => $tipo,
                            ':qtde_Historico' => $qtde,
                            ':valor_Historico' => $valor,
                            ':status_Historico' => $status,
                            ':obs_Historico' => $obs
                        ));

                        if ($sql->rowCount()>=1) {
                            $msg = 'Dados Alterados com sucesso';
                            $situacao = TRUE;
                        }
                        else
                        {
                            $msg = 'Erro na alteração!';
                            $situacao = FALSE;
                        }

                    } catch (PDOException $ex) {
                        $msg = $ex->getMessage();
                    }
                }
            }
        }
        else
        {
            $msg = 'Erro! Informe o Id para alterar';
        }
    }
    else
    {
        header('Location:../TelaHistorico.php');
    }
?>