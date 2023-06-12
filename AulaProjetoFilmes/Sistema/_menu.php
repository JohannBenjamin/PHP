
<!-- faz um if(verificar login) e se n tiver nada vai ter um menu simples e login, se tiver logado exiber o usuario, categoria, produto, etc.-->
<?php
    if($_SESSION)
    {
        echo
        "
            <nav class='row row-cols-5 nav nav-tabs'>
                    <div class='col'>
                        <a class='nav-link text-center' href='_sistema.php'>Início</a>
                    </div>
                    <div class='col'>
                        <a class='nav-link text-center' href='_sistema.php?tela=usuario'>Usuários</a>
                    </div>
                    <div class='col'>
                        <a class='nav-link text-center' href='_sistema.php?tela=categoria'>Categoria de Filmes</a>
                    </div>
                    <div class='col'>
                        <a class='nav-link text-center' href='_sistema.php?tela=filme'>Filmes</a>
                    </div>
                    <div class='col'>
                        <a class='nav-link text-center' href='_sistema.php?tela=sair'>Sair</a>
                    </div>
            </nav>
        ";
    }
    else
    {
        echo
        "
            <nav class='row nav nav-tabs'>
                    <div class='col-sm-10'>
                        <a class='nav-link text-center active' href='../_sistema.php'>Início</a>
                    </div>
                    <div class='col-sm-2'>
                        <a class='nav-link text-center' href='./Login/_login.php'>Login</a>
                    </div>
            </nav>
        ";
    }
?>





<!--div class="usuario p-2">
    <p>ID: <?=$idUsuarioLogin?></p>
    <p>Nome: <?=$nomeUsuarioLogin?></p>
    <p>Login: <?=$loginUsuarioLogin?></p>
    <img src="../PHPUsuário/img/<?=$imgUsuarioLogin?>" class="img-fluid">
</div>
<a href="_sistema.php">
    <div class="subMenu">INÍCIO</div>
</a>
<a href="_sistema.php?tela=usuario">
    <div class="subMenu">USUÁRIO</div>
</a>
<a href="_sistema.php?tela=categoria">
    <div class="subMenu">CATEGORIA</div>
</a>
<a href="_sistema.php?tela=produto">
    <div class="subMenu">PRODUTO</div>
</a>
<a href="_sistema.php?tela=historico">
    <div class="subMenu">HISTÓRICO</div>
</a>
<a href="../Login/login_logoff.php">
    <div class="subMenu">SAIR</div>
</a-->