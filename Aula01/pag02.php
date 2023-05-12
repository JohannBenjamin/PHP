<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Trabalhando com forms</h1>
    <h2>Método POST</h2>
    <hr>
    <form action="" method="post">
        <p>
            <label for="txtNome">Informe seu nome:</label>
            <input type="text" name="txtNome" id="txtNome">
        </p>
        <p>
            <label for="txtSobrenome">Informe seu sobrenome</label>
            <input type="text" name="txtSobrenome" id="txtSobrenome">
        </p>
        <p>
            <button>OK</button>
        </p>
    </form>
    <hr>
    <?php
        if($_POST) //Ao carregar a página o echo exibe erro de estar vazio, pois não colocamos o nome ainda (dps é solucionado ao apertar ok), por isso usamos if para esconde-lo
        {
            print_r($_POST); //imprime uma array, normalmente usado para arrays com mts valores
            echo '<br>';
            echo $_POST['txtNome']." ".$_POST['txtSobrenome']; //a variável POST é pública e em todo o código, por isso especificamos quais são os dados q queremos, senão pega as informações de toda a forms
        }
    ?>
</body>
</html>