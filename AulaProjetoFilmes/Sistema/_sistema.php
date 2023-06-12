<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="./css/styleSistema.css">
    <title>Início</title>
</head>
<body>
    <div class="container mt-3">
        <div class="row">
            <?php
                include_once('./Login/_autenticar.php');
                include_once('_cabecalho.php');
            ?>
        </div>
        <div class="row mt-2">
            <?php
                include_once('_menu.php');
            ?>
        </div>
    </div>

    <div class="container mt-2">
        <?php
            if(isset($_GET['tela']))
            {
                if($_GET['tela']=='usuario')
                {
                    include_once('../PHPUsuário/TelaUsuario.php');
                }
                else if($_GET['tela']=='categoria')
                {
                    include_once('../PHPCategoria/TelaCategoria.php');
                }
                else if($_GET['tela']=='filme')
                {
                    include_once('../PHPFilme/TelaFilme.php');
                }
                else if($_GET['tela']=='sair')
                {
                    //include_once('./Login/_logout.php');
                    echo 
                    "
                        <div class='container w-25 mt-4'>
                            <form action='' method='post' class='form-control'>
                                <div class='row mt-3'>
                                    <div class='col-sm-12 text-center'>
                                        <h5>Tem certeza que deseja sair?</h5>
                                    </div>
                                </div>
                        
                                <div class='row text-center'>
                                    <div class='col'>
                                        <a class='btn btn-primary btn-block m-2' id='btnSim' name='btnSim' href='./Login/_logout.php'>Sim</a>
                                    </div>
                                    <div class='col'>
                                        <a class='btn btn-danger btn-block m-2' id='btnNao' name='btnNao' href='_sistema.php'>Não</a>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    ";
                }
            }
            else
            {
                include_once('_conteudo.php');
            }
        ?>
        
        <?php
        
        ?>
        
    </div>

    <div class="container mt-3">
        <div class="row">
        <?php 
            include_once('_rodape.php');
        ?>
        </div>
    </div>

</body>
</html>