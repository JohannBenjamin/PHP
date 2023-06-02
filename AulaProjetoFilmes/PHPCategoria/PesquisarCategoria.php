<?php
    include_once('../Conexão/conexao.php');

    if($_POST)
    {
        if(!empty($_POST['txtId']) || !empty($idCampo))
        {
            $id = $_POST['txtId'];
            if(!empty($idCampo))
            {
                $id = $idCampo;
            }

            try {
                $sql = $conn->query("
                    select * from Categoria where id_Categoria=$id
                ");

                if ($sql->rowCount()>=1) {
                    foreach ($sql as $row) {
                        $idCampo = $row[0];
                        $nomeCampo = $row[1];
                        $statusCampo = $row[2];
                        $obsCampo = $row[3];
                    }
                }
                else
                {
                    $msg = 'Erro! Categoria não existe';
                }

            } catch (PDOException $ex) {
                $msg = $ex->getMessage();
            }
        }
        else
        {
            $msg = 'Erro! Informe o Id para Pesquisar.';
        }
    }
    else
    {
        header('Location:TelaCategoria.php');
    }
?>