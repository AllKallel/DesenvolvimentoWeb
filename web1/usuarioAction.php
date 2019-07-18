<?php
    //Conexão com o banco de dados
    include "conexao.php";
    //Captura os dados do formulário
    $nomeUsuario = $_REQUEST["txtNome"];
    $senha = $_REQUEST["txtSenha"];
    //Montagem do comando SQL
    $sql = "INSERT INTO usuario(nome_usuario, senha)
            VALUES('$nomeUsuario', md5('$senha'))";
    //Execução do comando SQL
    mysql_query($sql,$conexao) or die('ERRO!!');
    //Retorno da mensagem
    echo "Gravação concluída com sucesso!!!";


?>