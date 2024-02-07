<?php 

    //Autenticar sessão
    session_start();

    if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') {

        header('Location: login.php?erro=2');
    }
?>