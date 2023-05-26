<?php
    include_once('conexao.php');

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
                    select * from Historico where id_Historico=$id
                ");

                if ($sql->rowCount()>=1) {
                    foreach ($sql as $row) {
                        /*echo "<p>Id: $row[0]</p>";
                        echo "<p>Id do Usuário: $row[1]</p>";
                        echo "<p>Id do Produto: $row[2]</p>";
                        echo "<p>Cadastro: $row[3]</p>";
                        echo "<p>Tipo: $row[4]</p>";
                        echo "<p>Quantidade: $row[5]</p>";
                        echo "<p>Valor: $row[6]</p>";
                        echo "<p>Status: $row[7]</p>";
                        echo "<p>Obs: $row[8]</p>";*/

                        $idCampo = $row[0];
                        $idUsuarioCampo = $row[1];
                        //$nomeUsuarioCampo = '';
                        $idProdutoCampo = $row[2];
                        //$nomeProdutoCampo = '';
                        $cadastroCampo = $row[3];
                        $tipoCampo = $row[4];
                        $qtdeCampo = $row[5];
                        $valorCampo = $row[6];
                        $statusCampo = $row[7];
                        $obsCampo = $row[8];
                    }
                }
                else
                {
                    $msg = 'Erro! Historico não existe';
                }

            } catch (PDOException $ex) {
                $msg = $ex->getMessage();
            }
        }
        else
        {
            $msg = 'Erro!Informe o Id para Pesquisar.';
        }
    }
    else
    {
        header('Location:../TelaHistorico.php');
    }
?>