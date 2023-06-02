<?php
    include_once('../Conexão/conexao.php');

    if($_POST)
    {
        if(!empty($_POST['txtId']) || !empty($idCampo))
        {
            $id = $_POST['txtId'];
            if(!empty($idCampo))
            {
                $id = $idCampo;
            }

            try {
                $sql = $conn->query("
                    select F.id_Filme, C.id_Categoria, C.nome_Categoria, F.nome_Filme, F.sinopse_Filme, F.img_Filme, F.nota_Filme, F.status_Filme, F.obs_Filme
                    from Filme as F
                    inner join Categoria as C on C.id_Categoria = F.id_Categoria_Filme
                    where id_Filme = $id;
                ");

                if ($sql->rowCount()>=1) {
                    foreach ($sql as $row) {
                        $idCampo = $row[0];
                        $idCategoriaCampo = $row[1];
                        $nomeCategoriaCampo = $row[2];
                        $nomeCampo = $row[3];
                        $sinopseCampo = $row[4];
                        $imgCampo = $row[5];
                        $notaCampo = $row[6];
                        $statusCampo = $row[7];
                        $obsCampo = $row[8];
                    }
                }
                else
                {
                    $msg = 'Erro! Filme não existe';
                }

            } catch (PDOException $ex) {
                $msg = $ex->getMessage();
            }
        }
        else
        {
            $msg = 'Erro! Informe o Id para Pesquisar';
        }
    }
    else
    {
        header('Location:TelaFilme.php');
    }
?>