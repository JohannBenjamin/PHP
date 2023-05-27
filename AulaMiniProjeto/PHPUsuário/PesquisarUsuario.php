<?php
    include_once('../conexao.php');

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
                    select * from Usuario where id_Usuario=$id
                ");

                if ($sql->rowCount()>=1) {
                    foreach ($sql as $row) {
                        /*echo "<p>Id: $row[0]</p>";
                        echo "<p>Nome: $row[1]</p>";
                        echo "<p>Data de Nascimento: $row[2]</p>";
                        echo "<p>Data de Cadastro: $row[3]</p>";
                        echo "<p>Usuário: $row[4]</p>";
                        echo "<p>Senha: $row[5]</p>";
                        echo "<p>Imagem: $row[6]</p>";
                        echo "<p>Status: $row[7]</p>";
                        echo "<p>Obs: $row[8]</p>";*/

                        $idCampo = $row[0];
                        $nomeCampo = $row[1];
                        $nascimentoCampo = $row[2];
                        $cadastroCampo = $row[3];
                        $usuarioCampo = $row[4];
                        $senhaCampo = $row[5];
                        $imgCampo = $row[6];
                        $statusCampo = $row[7];
                        $obsCampo = $row[8];
                    }
                }
                else
                {
                    $msg = 'Erro! Usuário não existe';
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
        header('Location:../TelaUsuario.php');
    }
?>