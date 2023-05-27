<?php
    include_once('../conexao.php');

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
                        /*echo "<p>Id: $row[0]</p>";
                        echo "<p>Nome: $row[1]</p>";
                        echo "<p>Status: $row[2]</p>";
                        echo "<p>Obs: $row[3]</p>";*/

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
        header('Location:../TelaCategoria.php');
    }
?>