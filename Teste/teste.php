<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form enctype="multipart/form-data" action="" method="post">
        <input type="text" name="txtNome" id="txtNome">
        <input type="file" name="txtImg" id="txtImg">
        <button id="btn" name="btn">Teste</button>
    </form>
    <?php
        if($_POST)
        {
            /*$img = $_POST['txtImg'];
            //$img = isset($_FILES["txtImg"]) ? $_FILES["txtImg"] : FALSE;
            echo $img;
            $img = base64_encode($img);
            echo '<img src="data:image/png;base64,'.$img.'">';
            echo base64_decode($img);*/
            $txtNome = str_replace(" ","-",$_POST['txtNome']);

            $caminho = './arquivos/';
            $nomeArquivo = basename($_FILES['txtImg']['name']);
            $indice = strpos($nomeArquivo,'.');
            $tipoArquivo=substr($nomeArquivo,$indice);
            $arquivo = $caminho . $txtNome . $tipoArquivo;
            move_uploaded_file($_FILES['txtImg']['tmp_name'], $arquivo);
            echo $arquivo;
            echo '<img src="'.$arquivo.'">';
            $img = $_FILES['txtImg']['name'];
            echo $img;
            var_dump($_POST);
            //rename('./arquivos/Vingadores.jpg','./arquivos/Vingadores-Teste.jpg');
            //unlink('./arquivos/Vingadores-Ultimato.jpg');
            
             /*if ()) {
                echo "Arquivo válido e enviado com sucesso.\n";
            } else {
                echo "Possível ataque de upload de arquivo!\n";
            }*/
            


            /*$img = isset($_FILES["txtImg"]) ? $_FILES["txtImg"] : FALSE;
            // Obtém extensão do arquivo
            //preg_match("/\.(gif|bmp|png|jpg|jpeg|exe|txt|html|html|php|txt|doc|docx|ppt|pptx|odf|asp|lnk|dll|js){1}$/i", $img["name"], $ext);

            // Um nome único para a imagem
            // Se duas imagens tiverem o mesmo nome é porque o inferno está congelado
            $imagem_nome = $_POST["txtNome"];

            // Pasta de uploads
            $imagem_dir = "arquivos/" . $imagem_nome;

            // Faz o upload da imagem
            move_uploaded_file ($img, $imagem_dir);*/
        }
    ?>
</body>
</html>