<?php
    include_once('../conexao.php');

    if($_POST)
    {
        if(!empty($_POST['txtId']))
        {
            $id = $_POST['txtId'];
        
            try {
                $sql = $conn->prepare("
                    delete from Categoria where id_Categoria=:id_Categoria
                ");

                $sql->execute(array(
                    ':id_Categoria'=>$id
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
        header('Location:../TelaCategoria.php');
    }
?>

<hr>
<a href="../TelaCategoria.php">Voltar</a>