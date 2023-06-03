<?php
    include_once('../Conexão/conexao.php');

    if($_POST)
    {
        $situacao = FALSE;

        if(!empty($_POST['txtId']))
        {
            $id = $_POST['txtId'];
        
            try {
                $sql = $conn->query("
                    select * from Filme where id_Filme=$id
                ");

                if ($sql->rowCount()>=1) {
                    foreach ($sql as $row) {
                        $idCategoria = $row[1];
                        $nome = $row[2];
                        $sinopse = $row[4];
                        $img = $row[5];
                        $nota = $row[6];
                        $status = $row[7];
                        $obs = $row[8];
                        
                        $situacao = TRUE;
                    }
                }
                else
                {
                    $msg = 'Erro! Filme não existe';
                }

            } catch (PDOException $ex) {
                $msg = $ex->getMessage();
            }

            if ($situacao)
            {
                if(empty($_POST['txtIdCategoria']) &&
                empty($_POST['txtNome']) &&
                empty($_POST['txtSinopse']) &&
                empty($_FILES['txtImg']['name']) &&
                empty($_POST['txtNota']) &&
                empty($_POST['txtStatus']) &&
                empty($_POST['txtObs']))
                {
                    $msg = 'Nenhum dado a Alterar!';
                    $situacao = FALSE;
                }
                else
                {
                    $situacaoNome = FALSE;
                    $situacaoImg = FALSE;
                    if(!empty($_POST['txtIdCategoria']))
                    {
                        $idCategoria = $_POST['txtIdCategoria'];
                    }
                    if(!empty($_POST['txtNome']))
                    {
                        $nomeVelho = $nome;
                        $nome = $_POST['txtNome'];
                        $situacaoNome = TRUE;
                    }
                    if(!empty($_POST['txtSinopse']))
                    {
                        $sinopse = $_POST['txtSinopse'];
                    }
                    if(!empty($_FILES['txtImg']['name']))
                    {
                        $nomeVelho = $nome;
                        $img = $_FILES['txtImg']['name'];
                        $situacaoImg = TRUE;
                    }
                    if(!empty($_POST['txtNota']))
                    {
                        $nota = $_POST['txtNota'];
                    }
                    if(!empty($_POST['txtStatus']))
                    {
                        $status = $_POST['txtStatus'];
                    }
                    if(!empty($_POST['txtObs']))
                    {
                        $obs = $_POST['txtObs'];
                    }

                    if($situacaoImg && $situacaoNome)
                    {
                        $nomeImg = str_replace(" ", "-", $nome);
                        $indiceImg = strpos($img,'.');
                        $tipoImg = substr($img, $indiceImg);
                        $img = $nomeImg.$tipoImg;

                        $caminho = '../img/';
                        $arquivo = $caminho . $img;
                        move_uploaded_file($_FILES['txtImg']['tmp_name'], $arquivo);

                        unlink($caminho.$nomeVelho);
                    }
                    else if($situacaoImg)
                    {
                        $nomeImg = str_replace(" ", "-", $nome);
                        $indiceImg = strpos($img,'.');
                        $tipoImg = substr($img, $indiceImg);
                        $img = $nomeImg.$tipoImg;

                        $caminho = '../img/';
                        $arquivo = $caminho . $img;
                        move_uploaded_file($_FILES['txtImg']['tmp_name'], $arquivo);

                        unlink($caminho.$nomeVelho);
                    }
                    else if($situacaoNome)
                    {
                        $caminhoImgVelho = '../img/'.$img;

                        $nomeImg = str_replace(" ", "-", $nome);
                        $indiceImg = strpos($img,'.');
                        $tipoImg = substr($img, $indiceImg);
                        $img = $nomeImg.$tipoImg;
                        
                        $caminhoImgNovo = '../img/'.$img;
                        rename($caminhoImgVelho,$caminhoImgNovo);
                    }

                    try {
                        $sql = $conn->prepare("
                            update Filme set
                                id_Categoria_Filme=:id_Categoria_Filme,
                                nome_Filme=:nome_Filme,
                                sinopse_Filme=:sinopse_Filme,
                                img_Filme=:img_Filme,
                                nota_Filme=:nota_Filme,
                                status_Filme=:status_Filme,
                                obs_Filme=:obs_Filme
                            where id_Filme=:id_Filme
                        ");

                        $sql->execute(array(
                            ':id_Filme'=>$id,
                            ':id_Categoria_Filme' => $idCategoria,
                            ':nome_Filme' => $nome,
                            ':sinopse_Filme' => $sinopse,
                            ':img_Filme' => $img,
                            ':nota_Filme' => $nota,
                            ':status_Filme' => $status,
                            ':obs_Filme' => $obs
                        ));

                        if ($sql->rowCount()>=1) {
                            $msg = 'Dados Alterados com sucesso';
                            $situacao = TRUE;
                        }
                        else
                        {
                            $msg = 'Erro na alteração!';
                            $situacao = FALSE;
                        }

                    } catch (PDOException $ex) {
                        $msg = $ex->getMessage();
                    }
                }
            }
        }
        else
        {
            $msg = 'Erro! Informe o Id para alterar';
        }
    }
    else
    {
        header('Location:TelaFilme.php');
    }
?>