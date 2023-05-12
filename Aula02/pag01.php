<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>Calculadora</h1>
            </div>
            <form action="" method="post" class="form-control">
                <div class="row">
                    <div class="col-sm-3">
                        <input type="text" name="txtN1" placeholder="Informe N1" class="form-control" id="txtN1">
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="txtN2" placeholder="Informe N2" class="form-control" id="txtN2">
                    </div>
                    <div class="col-sm-6">
                        <button id="btoMais" name="bto" class="btn btn-primary" formaction="pag01.php" value="mais"> + </button>
                        <button id="btoMenos" name="bto" class="btn btn-secondary" formaction="pag01.php" value="menos"> - </button>
                        <button id="btoMultiplicacao" name="bto" class="btn btn-danger" formaction="pag01.php" value="vezes"> x </button>
                        <button id="btoDivisao" name="bto" class="btn btn-warning" formaction="pag01.php" value="dividir"> / </button>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="text-center p-3" style="background-color: lightgray;">
                            <h1>
                                <?php
                                    if($_POST)
                                    {
                                        $n1 = $_POST['txtN1'];
                                        $n2 = $_POST['txtN2'];
                                        $operacao = $_POST['bto'];
                                        $total = 0;

                                        //print_r($_POST);

                                        if($n1 <> null and $n2 <> null)
                                        {
                                            if($operacao == "mais")
                                            {
                                                $total = $n1 + $n2;
                                            }
                                            else if($operacao == "menos")
                                            {
                                                $total = $n1 - $n2;
                                            }
                                            else if($operacao == "vezes")
                                            {
                                                $total = $n1 * $n2;
                                            }
                                            else if($operacao == "dividir")
                                            {
                                                $total = $n1 / $n2;
                                            }
                                        }
                                        echo $total;
                                    }
                                ?>
                            </h1>
                        </div>
                    </div>
                </div>


            </form>
        </div>

        <script src="../js/bootstrap.js"></script>
    </div>
</body>
</html>