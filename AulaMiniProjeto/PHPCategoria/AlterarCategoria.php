<?php
    include_once('../conexao.php');

    if($_POST)
    {
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
                    echo '<p>Erro! Categoria não existe</p>';
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
        header('Location:../TelaCategoria.php');
    }
?>

<hr>
<a href="../TelaCategoria.php">Voltar</a>