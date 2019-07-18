<?
	include("conexao.php");
	
	//Captura do parâmetro de ação
	$acao = $_REQUEST['acao'];
	
	//Action para gravar a venda
	if ($acao == 'gravaVenda'){
		$idCliente = $_REQUEST['idCliente'];
		$idVendedor = $_REQUEST['idVendedor'];
		$sql="insert into venda(idCliente,idVendedor,dataVenda)
			  values($idCliente,$idVendedor,now())";
		mysql_query($sql) or die("erro na gravação");	  
		echo json_encode(array('idVenda'=>mysql_insert_id()));	
	}

	
	//Action para idProduto retornar o preço de venda
	if ($acao == 'buscarPreco'){ 	
		$idProduto = $_REQUEST['id'];
		$sql = "select preco from Produto
		        where idProduto = $idProduto";
		$rs = mysql_query($sql);
		$reg = mysql_fetch_array($rs);
		echo json_encode(array( 'preco'=>$reg['preco'] ));
	}
	
	//Action para gravar o item vendido
	if ($acao == 'gravaItem'){
		$idVenda = $_REQUEST['idVenda'];
		$idProduto = $_REQUEST['idProduto'];
		$quant = $_REQUEST['quant'];
		$precoVenda = $_REQUEST['precoVenda'];
		$desconto = $_REQUEST['desconto'];
		$sql="insert into ItemVenda(idVenda,idProduto,quant,precoVenda,desconto)
		      values($idVenda,$idProduto,$quant,$precoVenda,$desconto)";
		mysql_query($sql)or die("erro na gravação");
		echo json_encode(array('idItemVenda'=>mysql_insert_id()));	
	}
	
	//Action para calcular o total da Venda
	if ($acao == 'totalVenda'){ 	
		$idVenda = $_REQUEST['idVenda'];
		$sql = "select sum(quant*precoVenda-desconto) total 
		        from itemvenda where idVenda=$idVenda";
		$rs = mysql_query($sql);
		$reg = mysql_fetch_array($rs);
		echo json_encode(array( 'total' => '<font color=red><b>' . $reg['total'] . '</b></font>'));
	}
	
	//Action para deletar o item Vendido
	if ($acao == 'deletaItem'){
		
		$idItemVenda = $_REQUEST['idItemVenda'];
		$idVenda = $_REQUEST['idVenda'];
		
		$sql="delete from ItemVenda where idItemVenda = $idItemVenda";
		mysql_query($sql,$conexao);	  

		$queryCount = "SELECT COUNT(idItemVenda) as count
						FROM itemVenda 
						WHERE idVenda = $idVenda";
				 
		$resultSetCount = mysql_query($queryCount);			 
				 
		$rowCount = mysql_fetch_array($resultSetCount);
		$count = $rowCount['count'];
		
		echo json_encode(array('retorno'=>$count));	
	}
	
	//Action para deletar a venda toda
	if ($acao == 'deletaVenda'){
		
		$idVenda = $_REQUEST['idVenda'];
			
		$sql="delete from ItemVenda where idVenda = $idVenda";
		mysql_query($sql);		  

		$sql="delete from Venda where idVenda = $idVenda";
		mysql_query($sql);	  

		$retorno = 1;	
		echo json_encode(array('retorno'=>$retorno));	
	}
	
?>