<?php
      //LOCALHOST
      $host   = "127.0.0.1";
      $login  = "root";
      $senha  = "jesus";
      $banco  = "web1";

      //CONECTANDO AO SERVIDOR
      $conexao = mysql_connect($host, $login, $senha);

      //SELECIONA O BANCO DE DADOS
      $db = mysql_select_db($banco);
?>