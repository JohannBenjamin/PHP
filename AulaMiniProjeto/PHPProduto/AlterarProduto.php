<?php
    include_once('../conexao.php');

    if($_POST)
    {
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
                    echo '<p>Erro! Produto não existe</p>';
                    $situacao = FALSE;
                }

            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }

            if ($situacao)
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
        header('Location:../TelaProduto.php');
    }
?>

<hr>
<a href="../TelaProduto.php">Voltar</a>