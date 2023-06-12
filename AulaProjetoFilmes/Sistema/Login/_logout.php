<?php
    session_start();
    session_destroy();
    header('Location:../_sistema.php');
    /*include_once('_conteudo.php');*/
    /*header('Location:_sistema.php');
    include_once('_conteudo.php');*/
?>