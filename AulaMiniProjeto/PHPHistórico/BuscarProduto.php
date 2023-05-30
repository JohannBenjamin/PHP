<?php
include_once('../conexao.php');

try {
    $sql = $conn->query("
        select nome_Produto from Produto
    ");

    if ($sql->rowCount()>=1) {
        foreach ($sql as $row) {
            //var_dump($row['numero de nomes']['número de caracteres']);
            //var_dump($row[0]);
            $j = 0;
            $palavra = '';
            do {
                $palavra = $palavra.$row[0][$j];
                $j = $j + 1;
            }while ($row[0][$j] != Null);
            if($nomeProdutoCampo==$palavra)
            {
                $selected = 'selected';
            }
            else
            {
                $selected = '';
            }
            echo '<option value="'.$palavra.'" '.$selected.'>'.$palavra.'</option>';
            
        }
    }

} catch (PDOException $ex) {
    echo $ex->getMessage();
}
?>