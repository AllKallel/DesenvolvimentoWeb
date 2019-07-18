<?php 
	include "conexao.php";

	//CAPTURA OS DADOS DO FORMULÁRIO
	$nomeCategoria = $_REQUEST[nomeCategoria];
	
	//VALIDAÇÃO DE DADOS
	if ($nomeCategoria == ''){
		echo json_encode(array( 'retorno' => 'viado, ta errado' ));
		exit;
	}
	
	//MONTAGEM DO COMANDO SQL 	
	$sql = "insert into categoria(nomeCategoria)
            values('$nomeCategoria')";

	mysql_query($sql) or die();
	echo json_encode(array( 'retorno' => 'Cadastro com sucesso!' ));
	

?>


