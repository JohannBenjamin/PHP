<?php
    include_once('../conexao.php');

    if($_POST)
    {
        if(!empty($_POST['txtId']))
        {
            $id = $_POST['txtId'];

            try {
                $sql = $conn->query("
                    select * from Produto where id_Produto=$id
                ");

                if ($sql->rowCount()>=1) {
                    foreach ($sql as $row) {
                        echo "<p>Id: $row[0]</p>";
                        echo "<p>Id da Categoria: $row[1]</p>";
                        echo "<p>Nome: $row[2]</p>";
                        echo "<p>Quantidade: $row[3]</p>";
                        echo "<p>Valor: $row[4]</p>";
                        echo "<p>Status: $row[5]</p>";
                        echo "<p>Obs: $row[6]</p>";
                    }
                }
                else
                {
                    echo '<p>Produto não existe</p>';
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
        header('Location:../TelaProduto.php');
    }
?>

<hr>
<a href="../TelaProduto.php">Voltar</a>