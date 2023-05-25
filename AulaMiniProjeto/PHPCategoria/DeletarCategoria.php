<?php
    include_once('conexao.php');

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
                    $msg = 'Dados Excluidos com sucesso';
                }
                else
                {
                    $msg = 'Erro na exclusão!';
                }

            } catch (PDOException $ex) {
                $msg = $ex->getMessage();
            }
        }
        else
        {
            $msg = 'Erro!Informe o Id para excluir.';
        }
    }
    else
    {
        header('Location:../TelaCategoria.php');
    }
?>