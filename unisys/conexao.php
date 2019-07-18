<?php  
   //LOCALHOST

    $hots = "127.0.0.1";
    $login = "root";
    $senha = "jesus";
    $banco = "unisys2";


    //CONECTANDO AO SERVIDOR
    $conexao = mysql_connect($hots, $login, $senha);

    //SELECIONA O BANCO DE DADOS
    $db = mysql_select_db($banco);
?>