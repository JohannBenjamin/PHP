<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
            include_once('conexao.php');
            try {
                $sql = $conn->query('select * from Usuario');

                if($sql->rowCount() != 0)
                {
                    foreach ($sql as $linha) {
                        echo '<pre>';
                            print_r($linha);
                        echo '</pre>';
                        echo "Nome: ".$linha[1]."<br>";
                        echo "Login: ".$linha['usuario_Usuario']."<br>";
                        echo "<hr>";
                    }
                }
                else
                {
                    echo "Nenhum resultado!";
                }


            } catch (PDOExcep $ex) {
                echo $ex->getMessage();
            }


        ?>
</body>
</html>