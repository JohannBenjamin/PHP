<?php
    include_once('conexao.php');

    if($_POST)
    {
        $situacao = FALSE;

        if(!empty($_POST['txtId']))
        {
            $id = $_POST['txtId'];
        
            try {
                $sql = $conn->query("
                    select * from Produto where id_Produto=$id
                ");

                if ($sql->rowCount()>=1) {
                    foreach ($sql as $row) {
                        $idCategoria = $row[1];
                        $nome = $row[2];
                        $qtde = $row[3];
                        $valor = $row[4];
                        $status = $row[5];
                        $obs = $row[6];
                        
                        $situacao = TRUE;
                    }
                }
                else
                {
                    $msg = 'Erro! Produto não existe';
                }

            } catch (PDOException $ex) {
                $msg = $ex->getMessage();
            }

            if ($situacao)
            {
                if(empty($_POST['txtIdCategoria']) ||
                empty($_POST['txtNome']) ||
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
                    
                    if(!empty($_POST['txtIdCategoria']))
                    {
                        $idCategoria = $_POST['txtIdCategoria'];
                    }
                    if(!empty($_POST['txtNome']))
                    {
                        $nome = $_POST['txtNome'];
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
                            update Produto set
                                id_Categoria_Produto=:id_Categoria_Produto,
                                nome_Produto=:nome_Produto,
                                qtde_Produto=:qtde_Produto,
                                valor_Produto=:valor_Produto,
                                status_Produto=:status_Produto,
                                obs_Produto=:obs_Produto
                            where id_Produto=:id_Produto
                        ");

                        $sql->execute(array(
                            ':id_Produto'=>$id,
                            ':id_Categoria_Produto'=>$idCategoria,
                            ':nome_Produto' => $nome,
                            ':qtde_Produto' => $qtde,
                            ':valor_Produto' => $valor,
                            ':status_Produto' => $status,
                            ':obs_Produto' => $obs
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
        header('Location:../TelaProduto.php');
    }
?>