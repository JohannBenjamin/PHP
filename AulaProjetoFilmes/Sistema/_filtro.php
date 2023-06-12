<?php
    include_once('../Conexão/conexao.php');
    
    $cont = 0;
    try {
        $sql = $conn->query("
            select nome_Categoria from Categoria;                       
        ");
        if ($sql->rowCount()>=1) {
            foreach ($sql as $row) {
                $nomeCategoria = $row[0];
                $cont++;

                echo
                "
                <div class='form-check'>
                    <input class='form-check-input' type='checkbox' value='$nomeCategoria' id='filtro$cont' name='filtro$cont'>
                    <label class='form-check-label' for='filtro$cont'>
                        $nomeCategoria
                    </label>
                </div>
                ";
            }
        }
    } catch (PDOException $ex) {
        $msg = $ex->getMessage();
    }
?>