<?
	include("conexao.php");
	
//Captura do par�metro de a��o___________________________________________________________________________
	$acao = $_REQUEST['acao'];
	
	//Action para gravar cliente
	if ($acao == 'gravaCliente'){
			
	//CAPTURA OS DADOS DO FORMUL�RIO
	$nomeCliente = $_REQUEST[nomeCliente];
	$cpf = $_REQUEST[cpf];
	$telefone = $_REQUEST[telefone];	
	$sexo = $_REQUEST[sexo];	
	
	//VALIDA��O DE DADOS
	if ($nomeCliente == ''){
		echo json_encode(array( 'retorno' => '<font color=red><b>Nome do Cliente obrigat&oacuterio!</b></font>' ));
		exit;
	}
			
	//MONTAGEM DO COMANDO SQL 	
	$sql = "insert into cliente(nomeCliente,cpf,telefone,sexo)
            values('$nomeCliente','$cpf','$telefone','$sexo')";

	mysql_query($sql) or die();
	echo json_encode(array( 'retorno' => 'Cadastro com sucesso!' ));
	
	}

	
//Action para editar cliente_____________________________________________________________________________
	if ($acao == 'editaCliente'){ 	
		//CAPTURA OS DADOS DO FORMUL�RIO
		$idCliente   = $_REQUEST[idCliente];
		$nomeCliente = $_REQUEST[nomeCliente];
		$cpf 		 = $_REQUEST[cpf];
		$telefone 	 = $_REQUEST[telefone];	
		$sexo 		 = $_REQUEST[sexo];	
		
		//VALIDA��O DE DADOS
		if ($nomeCliente == ''){
			echo json_encode(array( 'retorno' => '<font color=red><b>Nome do cliente obrigat&oacuterio!</b></font>' ));
			exit;
		}
		
		//MONTAGEM DO COMANDO SQL 	
		$sql = "update cliente set nomeCliente  = '$nomeCliente',
								cpf 			= '$cpf',
								telefone        = '$telefone',
								sexo     		= '$sexo'
						where idCliente = $idCliente";
		
		mysql_query($sql) or die();
		echo json_encode(array( 'retorno' => 'Alterado com sucesso!' ));
		
	}
	
//Action para deletar cliente____________________________________________________________________________
	if ($acao == 'delete'){
		//Capturada dados do formulario
		$id   = $_REQUEST[id];
		
		$query = "DELETE FROM cliente WHERE idCliente = $id";
		
		$result = mysql_query($query);
		
		if ($result == 1){
			echo "<script>alert('Exclus�o realizada com sucesso!');</script>";
		}else{
			echo "<script>alert('N�o foi poss�vel excluir este produto, tente novamente mais tarde. Se o erro persistir contate o administrador do sistema!');</script>";
		}		
	}
			
?>