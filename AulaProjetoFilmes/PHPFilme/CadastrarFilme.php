<?php
    include_once('../Conexão/conexao.php');

    if($_POST)
    {
        $situacao = FALSE;

        if(empty($_POST['txtIdCategoria']) ||
        empty($_POST['txtNome']) ||
        empty($_POST['txtSinopse']) ||
        empty($_FILES['txtImg']['name']) ||
        empty($_POST['txtNota']) ||
        empty($_POST['txtStatus']) ||
        empty($_POST['txtObs']))
        {
            $msg = 'Erro! Preencha todos os campos para Cadastrar um Filme';
        }
        else
        {
            $idCategoria = $_POST['txtIdCategoria'];
            $nome = $_POST['txtNome'];
            $sinopse = $_POST['txtSinopse'];
            $img = $_FILES['txtImg']['name'];
            $nota = $_POST['txtNota'];
            $status = $_POST['txtStatus'];
            $obs = $_POST['txtObs'];
            
            //renomeando a imagem
            $nome = str_replace(":", "", $nome);
            $nomeImg = str_replace(" ", "-", $nome);
            $indiceImg = strpos($img,'.');
            $tipoImg = substr($img, $indiceImg);
            $img = $nomeImg.$tipoImg;


            try {
                $sql = $conn->prepare("
                    insert into Filme
                    (
                        id_Categoria_Filme,
                        nome_Filme,
                        sinopse_Filme,
                        img_Filme,
                        nota_Filme,
                        status_Filme,
                        obs_Filme
                    )
                    values
                    (
                        :id_Categoria_Filme,
                        :nome_Filme,
                        :sinopse_Filme,
                        :img_Filme,
                        :nota_Filme,
                        :status_Filme,
                        :obs_Filme
                    )
                ");

                $sql->execute(array(
                    ':id_Categoria_Filme' => $idCategoria,
                    ':nome_Filme' => $nome,
                    ':sinopse_Filme' => $sinopse,
                    ':img_Filme' => $img,
                    ':nota_Filme' => $nota,
                    ':status_Filme' => $status,
                    ':obs_Filme' => $obs
                ));

                if ($sql->rowCount()>=1) {
                    $id = $conn->lastInsertId();
                    $msg = 'Filme Cadastrado com sucesso. ID Gerado: '.$id;
                    $situacao = TRUE;

                    $caminho = '../img/';
                    $arquivo = $caminho . $img;
                    move_uploaded_file($_FILES['txtImg']['tmp_name'], $arquivo);
                }
                else
                {
                    $msg = 'Erro no cadastro!';
                }

            } catch (PDOException $ex) {
                $msg = $ex->getMessage();
            }
        }
    }
    else
    {
        header('Location:TelaFilme.php');
    }
?>