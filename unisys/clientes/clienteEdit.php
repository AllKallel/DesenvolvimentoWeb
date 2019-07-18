<?php
	include('conexao.php');
			
	//Captura do "id"	
	$idCliente = $_REQUEST[id];
	
	//Pesquisar o Produto referente ao "id" passado pela JGrid
	$rs1 = mysql_query("select * from cliente where idCliente=$idCliente");
	$reg1 = mysql_fetch_object($rs1);
?>
<html>
<head>
	<script type="text/javascript" src="js/jquery.form.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.8.17.custom/js/jquery-1.7.1.min.js"></script>
	<script>
		function editaCliente(){
		$.ajax({
			type:"POST",
			url:"clienteAction.php?acao=editaCliente",
			dataType:"json",
			data:{idCliente:$("#idCliente").val(),
				  nomeCliente:$("#txtNomeCliente").val(),
			      cpf:$("#txtCpf").val(),
			      telefone:$("#txtTelefone").val(),
				  sexo:$("#txtSexo").val() },
			success: function(data, textStatus, request){
				$("#retorno").html(data['retorno']);
			}	
		});
	}
	
		function voltarInicio(){
			window.location = "index.php";
		}
	</script>
	
</head>
<body>
	<form>
		<input hidden type="text" name="idCliente" id="idCliente" value="<?=$idCliente?>">
		<table>
			<tr><td>Nome do Cliente</td>
				<td><input type='text' name='txtNomeCliente' id='txtNomeCliente'
						   value='<?=$reg1->nomeCliente?>'></td>
			</tr>
			<tr><td>Cpf</td>
				<td><input type='text' name='txtCpf' id='txtCpf'
						   value='<?=$reg1->cpf?>'></td>
			</tr>	
			<tr><td>Telefone</td>
				<td><input type='text' name='txtTelefone' id='txtTelefone'
						   value='<?=$reg1->telefone?>'></td>
			</tr>
			<tr><td>Sexo</td>
				<td><input type='text' name='txtSexo' id='txtSexo'
						   value='<?=$reg1->sexo?>'></td>
			</tr>	
			<tr><td><input type="button" name="btnSalvar" id="btnSalvar" 
			               value="Salvar" onClick="editaCliente()"></td>
						   
				<td><input type="reset" value="Limpar"></td>
				
				<td><input type="button" value="inicio" onClick="voltarInicio()"></td>
			</tr>	
 		</table>
		<div name="retorno" id="retorno"></div>
	</form>
</body>
</html>