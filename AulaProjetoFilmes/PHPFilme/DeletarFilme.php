<?php
    include_once('../Conexão/conexao.php');

    if($_POST)
    {
        if(!empty($_POST['txtId']))
        {
            $id = $_POST['txtId'];
        
            try {
                $sql = $conn->query("
                    select img_Filme from Filme where id_Filme = $id;
                ");

                if ($sql->rowCount()>=1) {
                    foreach ($sql as $row) {
                        $imgDeletada = $row[0];
                    }
                }
                else
                {
                    $msg = 'Erro! Filme não existe';
                }
            } catch (PDOException $ex) {
                $msg = $ex->getMessage();
            }

            try {
                $sql = $conn->prepare("
                    delete from Filme where id_Filme=:id_Filme
                ");

                $sql->execute(array(
                    ':id_Filme'=>$id
                ));

                if ($sql->rowCount()>=1) {
                    $msg = 'Dados Excluidos com sucesso';
                    $caminho = '../img/';
                    unlink($caminho.$imgDeletada);
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