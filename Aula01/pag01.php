<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Teste de PHP - Aula 1</h1>
    <hr>
    <?php
        echo '<h2>Olá Mundo!</h2>'; // 'echo' imprime um texto
        echo '<hr>';

        echo '<h2>1. Comandos:</h2>';
        echo '<h3>* "echo" - Imprimir um texto ou variável na tela, usar antes do texto ou variável.</h3>';
        echo '<h3>* "$" - Para criar variáveis, usar no começo do nome da variável.</h3>';
        echo '<h3>* "." - Serve para concatenar.</h3>';
        echo '<h3>* "var_dump" - Exibe o tipo da variável e o tamanho (se for string) ou o valor (se for número).</h3>';
        echo '<hr>';

        $nome = 'Johann'; // '$' cria variável, não é tipada e é sensitive case;

        echo '<h2>2. Diferença do uso de Apóstrofes e Aspas:</h2>';
        echo '<h3>Nome da variável e seu valor:</h3>';
        echo '<h3>$nome = Johann</h3>';

        echo '<h3><u>*Uso de Apóstrofes:</u></h3>';
        echo '<h4>Seu nome é: $nome</h4>';//apóstrofes não diferencia as variáveis
        
        echo '<h3><u>*Uso de Aspas:</u></h3>';
        echo "<h4>Seu nome é: $nome</h4>"; //aspas diferencia as variáveis
        
        echo '<h3><u>*Uso de Apóstrofes com concatenação:</u></h3>';
        echo '<h4>Seu nome é: '.$nome.'</h4>'; //forma de apóstrofes entender a variável 
        echo '<hr>';

        echo '<h2>3. Uso de var_dump:</h2>';
        echo '<h3>Nome das variáveis e seus valores:</h3>';
        echo '<h3>$x = 5</h3>';
        echo '<h3>$y = 56.87</h3>';
        echo '<h3>$nomes = ['.'João'.', '.'Beatriz'.', '.'Maria'.', '.'Daniel'.']</h3>';
        $x = 5;
        $y = 56.87;
        $nomes = ['João', 'Beatriz', 'Maria', 'Daniel'];

        echo '<h3><u>Uso de var_dump na variável:</u></h3>';
        echo '<h4>Sintaxe: var_dump($NomeDaVariável)</h4>';
        echo '<h4>*$nome:</h4>';
        var_dump($nome); //mostra o tipo de variável e o tamanho se for string ou o valor se for número
        echo '<br>';

        echo '<h4>*$x:</h4>';
        var_dump($x);
        echo '<br>';

        echo '<h4>*$y:</h4>';
        var_dump($y);
        echo '<br>';
        
        echo '<h4>*$nomes:</h4>';
        var_dump($nomes);
        echo '<hr>';

        echo '<h3>Obs: Podemos especificar o índice de um array</h3>';
        echo '<h3>Ex.:$nomes[2] :</h3>';
        echo $nomes[2];

    ?>
</body>
</html>