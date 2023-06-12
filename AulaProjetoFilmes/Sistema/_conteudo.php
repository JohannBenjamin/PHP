<form class="form-control bg-dark" action="" method="post">
    <div class="row">
        <div class="col-sm-6">

        </div>
        <div class="col-sm-5 text-end">
            <input type="text" class="form-control" id="Pesquisar" name="txtNome" placeholder="Digite o nome do filme...">
        </div>
        <div class="col-sm-1">
            <button id="btnPesquisa" name="btnPesquisa" formaction="_sistema.php" value="" class="btn btn-primary">&#128269;</button>
        </div>
    </div>
</form>

<div class="row">
    <div class="col-sm-2">
        <form class="form-control mt-5" action="" method="post">
            <?php
                include_once('_filtro.php');
            ?>
            <button id="btnFiltro" name="btnFiltro" class="btn btn-primary" formaction="_sistema.php" value="<?=$cont?>">&#128269;</button>
        </form>
    </div>

    <div class="col-sm-10">
        <div class="row row-cols-3 m-3">
            <?php
                include_once('../Conexão/conexao.php');
                if ($_POST) {
                    if(array_key_exists('btnFiltro', $_POST))
                    {
                        include_once('_resultado.php');
                    }
                    if(array_key_exists('btnPesquisa', $_POST))
                    {
                        if (isset($_POST['txtNome'])) {
                            include_once('_pesquisa.php');
                        }
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
        </div>
    </div>
</div>