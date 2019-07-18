<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cadastrando Endereços</title>

<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>

<script type="text/javascript">
	
	function adicionaCategoria(){
		$.ajax({
				type:"POST",
				url:"adicionaCategoria.php",
				dataType:"json",
				data:{nomeCategoria:$("#txtCategoria").val()},
					nomeCategoria:$("#txtCategoria").val(),
					
					success: function(data, textStatus, request){
					$("#retorno").html(data['retorno']);
				}	
			});
	}

</script>

</head>

<body>

<form>

<table width="422" border="0">
  <tr>
    <td colspan="2" align="center"><strong>Cadastro de Categoria</strong></td>
  </tr>
  <tr>
    <td width="126">&nbsp;</td>
    <td width="286">&nbsp;</td>
  </tr>
  <tr>
    <td>Nome da Categoria</td>
    <td><input type="text" name="txtCategoria" id="txtCategoria" /></td>
  </tr>
  
  <tr>
	<td colspan="2" align="center" id="retorno" name="retorno">
	</td>
  </tr>
  
  <tr>
    <td colspan="2" align="center">
		<input type="reset" value="Limpar">
	    <input type="button" nome="button" value="Cadastrar" onclick="adicionaCategoria();" />
    </td>
  </tr>
</table>

</form>

</body>
</html>








