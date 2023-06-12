<?php
    include_once('../Conexão/conexao.php');

    $stringSql = "where nome_Categoria = ";
    $situacao = FALSE;
    for ($i=1; $i <= $_POST['btnFiltro']; $i++) { 
        $texto = 'filtro'.$i;
        
        if (array_key_exists($texto, $_POST)) {
            $temporario = $_POST["$texto"];
            $stringSql = $stringSql."'$temporario' OR nome_Categoria = ";
            $situacao = TRUE;
        }
    }
    if ($situacao) {
        $tamanho = strlen($stringSql) - 21;
        $stringSql = substr($stringSql, 0, $tamanho);
        
        try {
            $sql = $conn->query("
                select F.id_Filme, C.nome_Categoria, F.nome_Filme, F.sinopse_Filme, F.img_Filme, F.nota_Filme, F.status_Filme, F.obs_Filme
                from Filme as F
                inner join Categoria as C on C.id_Categoria = F.id_Categoria_Filme
                $stringSql;
            ");

            if ($sql->rowCount()>=1) {
                foreach ($sql as $row) {
                    $id = $row[0];
                    $nomeCategoria = $row[1];
                    $nome = $row[2];
                    $sinopse = $row[3];
                    $img = $row[4];
                    $nota = $row[5];
                    $status = $row[6];
                    $obs = $row[7];

                    echo
                    "
                    <div class='col mb-3'>
                            <div class='card m-3 border-dark h-100' id='card'>
                                <a href='#'><img src='../img/$img' class='card-img-top' alt='$img' style='height: 50vh; width:'></a>
                                <a href='#' class='card-body text-dark px-1 py-0'>
                                    <h6 class='card-title pt-2 text-center' style='height: 5vh;'><b>$nome</b></h6>
                                    <small class='card-text text-justify'>".substr($sinopse,0,75)."...</small>
                                </a>
                                <div class='card-footer'>
                                    <a class='btn btn-outline-dark btn-sm' href='_rodape.php'>$nomeCategoria</a>
                                    <small class='text-muted' style='float:right;'>Classificação: $nota</small>
                                </div>
                            </div>
                    </div>
                    ";
                }
            }
            else
            {
                echo '<h2>Nenhum filme encontrado</h2>';
            }
        } catch (PDOException $ex) {
            $msg = $ex->getMessage();
        }
    }
    else
    {
        try {
            $sql = $conn->query("
                select F.id_Filme, C.nome_Categoria, F.nome_Filme, F.sinopse_Filme, F.img_Filme, F.nota_Filme, F.status_Filme, F.obs_Filme
                from Filme as F
                inner join Categoria as C on C.id_Categoria = F.id_Categoria_Filme;
            ");

            if ($sql->rowCount()>=1) {
                foreach ($sql as $row) {
                    $id = $row[0];
                    $nomeCategoria = $row[1];
                    $nome = $row[2];
                    $sinopse = $row[3];
                    $img = $row[4];
                    $nota = $row[5];
                    $status = $row[6];
                    $obs = $row[7];

                    echo
                    "
                    <div class='col mb-3'>
                            <div class='card m-3 border-dark h-100' id='card'>
                                <a href='#'><img src='../img/$img' class='card-img-top' alt='$img' style='height: 50vh; width:'></a>
                                <a href='#' class='card-body text-dark px-1 py-0'>
                                    <h6 class='card-title pt-2 text-center' style='height: 5vh;'><b>$nome</b></h6>
                                    <small class='card-text text-justify'>".substr($sinopse,0,75)."...</small>
                                </a>
                                <div class='card-footer'>
                                    <a class='btn btn-outline-dark btn-sm' href='_rodape.php'>$nomeCategoria</a>
                                    <small class='text-muted' style='float:right;'>Classificação: $nota</small>
                                </div>
                            </div>
                    </div>
                    ";
                }
            }
        } catch (PDOException $ex) {
            $msg = $ex->getMessage();
        }
    }
?>