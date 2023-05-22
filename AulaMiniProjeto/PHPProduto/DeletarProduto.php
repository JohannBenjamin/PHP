<?php
    include_once('../conexao.php');

    if($_POST)
    {
        if(!empty($_POST['txtId']))
        {
            $id = $_POST['txtId'];
        
            try {
                $sql = $conn->prepare("
                    delete from Produto where id_Produto=:id_Produto
                ");

                $sql->execute(array(
                    ':id_Produto'=>$id
                ));

                if ($sql->rowCount()>=1) {
                    echo '<p>Dados Excluidos com sucesso</p>';
                }
                else
                {
                    echo '<p>Erro na exclusão!</p>';
                }

            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
        }
        else
        {
            echo '<p>Erro!Informe o Id para excluir.</p>';
        }
    }
    else
    {
        header('Location:../TelaProduto.php');
    }
?>

<hr>
<a href="../TelaProduto.php">Voltar</a>