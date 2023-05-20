<?php
    include_once('../conexao.php');

    if($_POST)
    {
        if(!empty($_POST['txtId']))
        {
            $id = $_POST['txtId'];

            try {
                $sql = $conn->query("
                    select * from Usuario where id_Usuario=$id
                ");

                if ($sql->rowCount()>=1) {
                    foreach ($sql as $row) {
                        echo "<p>Id: $row[0]</p>";
                        echo "<p>Nome: $row[1]</p>";
                        echo "<p>Data de Nascimento: $row[2]</p>";
                        echo "<p>Data de Cadastro: $row[3]</p>";
                        echo "<p>Usuário: $row[4]</p>";
                        echo "<p>Senha: $row[5]</p>";
                        echo "<p>Imagem: $row[6]</p>";
                        echo "<p>Status: $row[7]</p>";
                        echo "<p>Obs: $row[8]</p>";
                    }
                }
                else
                {
                    echo '<p>Usuário não existe</p>';
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
        header('Location:../TelaUsuario.php');
    }
?>

<hr>
<a href="../TelaUsuario.php">Voltar</a>