<?php
    include_once('../Conexão/conexao.php');

    if($_POST)
    {
        $situacao = FALSE;
        $situacaoImg = FALSE;

        if(empty($_POST['txtNome']) ||
        empty($_POST['txtUsuario']) ||
        empty($_POST['txtSenha']) ||
        empty($_POST['txtNascimento']) ||
        empty($_FILES['txtImg']['name']) ||
        empty($_POST['txtStatus']) ||
        empty($_POST['txtObs']))
        {
            $msg = 'Erro! Preencha todos os campos para Cadastrar um Usuário';
        }
        else
        {
            $nome = $_POST['txtNome'];
            $usuario = $_POST['txtUsuario'];
            $senha = $_POST['txtSenha'];
            $nascimento = $_POST['txtNascimento'];
            $img = $_FILES['txtImg']['name'];
            $status = $_POST['txtStatus'];
            $obs = $_POST['txtObs'];

            //renomeando a imagem
            $nomeImg = str_replace(" ", "-", $nome);
            $indiceImg = strpos($img,'.');
            $tipoImg = substr($img, $indiceImg);
            $img = $nomeImg.$tipoImg;

            try {
                $sql = $conn->prepare("
                    insert into Usuario
                    (
                        nome_Usuario,
                        nascimento_Usuario,
                        usuario_Usuario,
                        senha_Usuario,
                        img_Usuario,
                        status_Usuario,
                        obs_Usuario
                    )
                    values
                    (
                        :nome_Usuario,
                        :nascimento_Usuario,
                        :usuario_Usuario,
                        :senha_Usuario,
                        :img_Usuario,
                        :status_Usuario,
                        :obs_Usuario
                    )
                ");

                $sql->execute(array(
                    ':nome_Usuario' => $nome,
                    ':nascimento_Usuario' => $nascimento,
                    ':usuario_Usuario' => $usuario,
                    ':senha_Usuario' => $senha,
                    ':img_Usuario' => $img,
                    ':status_Usuario' => $status,
                    ':obs_Usuario' => $obs
                ));

                if ($sql->rowCount()>=1) {
                    $id = $conn->lastInsertId();
                    $msg = 'Dados Cadastrados com sucesso. ID Gerado: '.$id;
                    $situacao = TRUE;

                    $caminho = '../imgUsuario/';
                    $arquivo = $caminho . $img;
                    move_uploaded_file($_FILES['txtImg']['tmp_name'], $arquivo);

                    $caminhoImgVelho = '../imgUsuario/'.$img;

                    $nomeImg = str_replace(" ", "-", $nome);
                    $indiceImg = strpos($img,'.');
                    $tipoImg = substr($img, $indiceImg);
                    $img = $nomeImg.'-'.$id.$tipoImg;
                    
                    $caminhoImgNovo = '../imgUsuario/'.$img;
                    rename($caminhoImgVelho,$caminhoImgNovo);
                    $situacaoImg = TRUE;
                }
                else
                {
                    $msg = 'Erro no cadastro!';
                }

                

            } catch (PDOException $ex) {
                $msg = $ex->getMessage();
            }
            if($situacaoImg)
            {
                try {
                    $sql = $conn->prepare("
                        update Usuario set
                            img_Usuario=:img_Usuario
                        where id_Usuario=:id_Usuario
                    ");

                    $sql->execute(array(
                        ':id_Usuario'=>$id,
                        ':img_Usuario' => $img,
                    ));

                } catch (PDOException $ex) {
                    $msg = $ex->getMessage();
                }
            }
        }
    }
    else
    {
        header('Location:TelaUsuario.php');
    }
?>