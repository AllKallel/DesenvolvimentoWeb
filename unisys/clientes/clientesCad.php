<?php
    //Recordset para armazenar as categorias existentes
	include('conexao.php');
	$sql = "select -1 idCategoria, '--Escolha a categoria--' nomeCategoria
			union
			select idCategoria, nomeCategoria from categoria";
	$rs = mysql_query($sql);
?>
<html>
<head>
	<script type="text/javascript" src="js/jquery.form.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.8.17.custom/js/jquery-1.7.1.min.js"></script>
	<script>
		function adicionaCliente(){
			$.ajax({
				type:"POST",
				url:"clienteAction.php?acao=gravaCliente",
				dataType:"json",
				data:{nomeCliente:$("#txtNomeCliente").val(),
					cpf:$("#txtCpf").val(),
					telefone:$("#txtTelefone").val(),
				  	sexo:$("#txtSexo").val() },
				success: function(data, textStatus, request){
					$("#retorno").html(data['retorno']);
				}	
			});
		}
	
		function limpaForm(){
				$("#retorno").html('');
				$("#txtNomeCliente").val('');
				$("#txtCpf").val('');
				$("#txtTelefone").val('');
				$("#txtSexo").val('');
				$("#txtNomeCliente").focus();
		}
		
		function voltarInicio(){
			window.location = "index.php";
		}
	
	</script>
	
</head>
<body>
	<center><h3>Cadastro de Clientes</h3></center>
	<hr>
	
	<form>
		<center>
		<table>
			<tr><td>Nome do Cliente:</td>
				<td><input type='text' name='txtNomeCliente' id='txtNomeCliente'></td>
			</tr>
			<tr><td>Cpf:</td>
				<td><input type='text' name='txtCpf' id='txtCpf'></td>
			</tr>	
			<tr><td>Telefone:</td>
				<td><input type='text' name='txtTelefone' id='txtTelefone'></td>
			</tr>
			<tr><td>Sexo:</td>
				<td><input type='text' name='txtSexo' id='txtSexo'></td>
			</tr>	
			<tr><td><input type="button" name="btnSalvar" id="btnSalvar" 
			               value="Salvar" onClick="adicionaCliente()"></td>
						   
				<td><input type="button" name="btnLimpar" id="btnLimpar"
						   value="Limpar" onClick="limpaForm()"></td>
						   
				<td><input type="button" value="inicio" onClick="voltarInicio()"></td>
			</tr>	
		</table>
		<div name="retorno" id="retorno"></div>
	</form>
</body>
</html>