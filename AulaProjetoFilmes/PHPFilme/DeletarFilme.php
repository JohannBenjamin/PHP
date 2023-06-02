<?php
    include_once('../Conexão/conexao.php');

    if($_POST)
    {
        if(!empty($_POST['txtId']))
        {
            $id = $_POST['txtId'];
        
            try {
                $sql = $conn->prepare("
                    delete from Filme where id_Filme=:id_Filme
                ");

                $sql->execute(array(
                    ':id_Filme'=>$id
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
            $msg = 'Erro! Informe o Id para excluir.';
        }
    }
    else
    {
        header('Location:TelaFilme.php');
    }
?>