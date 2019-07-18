<?php 
	include('conexao.php');
	
	//CAPTURA OS DADOS DO FORMULÁRIO
	$nomeCategoria = $_REQUEST[nomeCategoria];
	$descricao = $_REQUEST[descricao];
	
	//VALIDAÇÃO DE DADOS
	if ($nomeCategoria == ''){
		echo json_encode(array( 'retorno' => '<font color=red><b>Nome da categoria obrigatorio!</b></font>' ));
		exit;
	}
	
	//MONTAGEM DO COMANDO SQL 	
	$sql = "insert into categoria(nomeCategoria, descricao)
            values('$nomeCategoria','$descricao')";

	mysql_query($sql) or die();
	echo json_encode(array( 'retorno' => 'Cadastro com sucesso!' ));
	

?>


