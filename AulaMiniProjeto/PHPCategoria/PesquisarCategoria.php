<?php
    include_once('../conexao.php');

    if($_POST)
    {
        if(!empty($_POST['txtId']))
        {
            $id = $_POST['txtId'];

            try {
                $sql = $conn->query("
                    select * from Categoria where id_Categoria=$id
                ");

                if ($sql->rowCount()>=1) {
                    foreach ($sql as $row) {
                        echo "<p>Id: $row[0]</p>";
                        echo "<p>Nome: $row[1]</p>";
                        echo "<p>Status: $row[2]</p>";
                        echo "<p>Obs: $row[3]</p>";
                    }
                }
                else
                {
                    echo '<p>Categoria não existe</p>';
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
        header('Location:../TelaCategoria.php');
    }
?>

<hr>
<a href="../TelaCategoria.php">Voltar</a>