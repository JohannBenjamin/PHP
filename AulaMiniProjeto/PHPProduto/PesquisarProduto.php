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
                    select P.id_Produto, C.id_Categoria, C.nome_Categoria, P.nome_Produto, P.qtde_Produto, P.valor_Produto, P.status_Produto, P.obs_Produto
                    from Produto as P
                    inner join Categoria as C on C.id_Categoria = P.id_Categoria_Produto
                    where P.id_Produto = $id;
                ");

                if ($sql->rowCount()>=1) {
                    foreach ($sql as $row) {
                        /*echo "<p>Id: $row[0]</p>";
                        echo "<p>Id da Categoria: $row[1]</p>";
                        echo "<p>Nome: $row[2]</p>";
                        echo "<p>Quantidade: $row[3]</p>";
                        echo "<p>Valor: $row[4]</p>";
                        echo "<p>Status: $row[5]</p>";
                        echo "<p>Obs: $row[6]</p>";*/

                        $idCampo = $row[0];
                        $idCategoriaCampo = $row[1];
                        $nomeCategoriaCampo = $row[2];
                        $nomeCampo = $row[3];
                        $qtdeCampo = $row[4];
                        $valorCampo = $row[5];
                        $statusCampo = $row[6];
                        $obsCampo = $row[7];
                    }
                }
                else
                {
                    $msg = 'Erro! Produto não existe';
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
        header('Location:../TelaProduto.php');
    }
?>