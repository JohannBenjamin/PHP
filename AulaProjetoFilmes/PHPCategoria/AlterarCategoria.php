<?php
    include_once('../Conexão/conexao.php');

    if($_POST)
    {
        $situacao = FALSE;

        if(!empty($_POST['txtId']))
        {
            $id = $_POST['txtId'];
        
            try {
                $sql = $conn->query("
                    select * from Categoria where id_Categoria=$id
                ");

                if ($sql->rowCount()>=1) {
                    foreach ($sql as $row) {
                        $nome = $row[1];
                        $status = $row[2];
                        $obs = $row[3];
                        
                        $situacao = TRUE;
                    }
                }
                else
                {
                    $msg = 'Erro! Categoria não existe';
                }

            } catch (PDOException $ex) {
                $msg = $ex->getMessage();
            }

            if ($situacao)
            {
                if(empty($_POST['txtNome']) ||
                empty($_POST['txtStatus']) ||
                empty($_POST['txtObs']))
                {
                    $msg = 'Nenhum dado a Alterar!';
                    $situacao = FALSE;
                }
                else
                {
                    if(!empty($_POST['txtNome']))
                    {
                        $nome = $_POST['txtNome'];
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
                            update Categoria set
                                nome_Categoria=:nome_Categoria,
                                status_Categoria=:status_Categoria,
                                obs_Categoria=:obs_Categoria
                            where id_Categoria=:id_Categoria
                        ");

                        $sql->execute(array(
                            ':id_Categoria'=>$id,
                            ':status_Categoria' => $status,
                            ':obs_Categoria' => $obs
                        ));

                        if ($sql->rowCount()>=1) {
                            $msg = 'Dados Alterados com sucesso';
                            $situacao = TRUE;
                        }
                        else
                        {
                            $msg = 'Erro na alteração!';
                            $situacao = TRUE;
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
        header('Location:TelaCategoria.php');
    }
?>