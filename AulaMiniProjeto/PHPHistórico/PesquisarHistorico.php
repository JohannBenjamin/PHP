<?php
    include_once('../conexao.php');

    if($_POST)
    {
        if(!empty($_POST['txtId']))
        {
            $id = $_POST['txtId'];

            try {
                $sql = $conn->query("
                    select * from Historico where id_Historico=$id
                ");

                if ($sql->rowCount()>=1) {
                    foreach ($sql as $row) {
                        echo "<p>Id: $row[0]</p>";
                        echo "<p>Id do Usuário: $row[1]</p>";
                        echo "<p>Id do Produto: $row[2]</p>";
                        echo "<p>Cadastro: $row[3]</p>";
                        echo "<p>Tipo: $row[4]</p>";
                        echo "<p>Quantidade: $row[5]</p>";
                        echo "<p>Valor: $row[6]</p>";
                        echo "<p>Status: $row[7]</p>";
                        echo "<p>Obs: $row[8]</p>";
                    }
                }
                else
                {
                    echo '<p>Historico não existe</p>';
                }

            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
        }
        else
        {
            echo '<p>Erro!Informe o Id para Pesquisar.</p>';
        }
    }
    else
    {
        header('Location:../TelaHistorico.php');
    }
?>

<hr>
<a href="../TelaHistorico.php">Voltar</a>