<?php

	include_once('conexao.php');
	
	$page  = $_GET['page']; 
	$limit = $_GET['rows']; 
	$sidx  = $_GET['sidx']; 
	$sord  = $_GET['sord']; 		
	
	$where = " WHERE 1 = 1 ";
	
	if( $_GET['txtNomeCliente'] != "" ){	 	
		$where .= " AND nomeCliente like '%".$_GET['txtNomeCliente']."%' ";		
	}
	
	//Quantidade de registros a serem paginados na grid
	$queryCount = "SELECT COUNT(idVenda) as count
			  	   FROM venda INNER JOIN cliente 
				              ON cliente.idCliente = venda.idCliente
 			       $where";
				 
	$resultSetCount = mysql_query($queryCount);			 
				 
	$rowCount = mysql_fetch_array($resultSetCount);
	$count = $rowCount['count'];
	
	if( $count>0 ){
		$total_pages = ceil($count/$limit);	
	}else{
		$total_pages = 0;
	}
	
	if ($page > $total_pages) $page=$total_pages;
	$start = $limit*$page - $limit;
	
    $query = "SELECT idVenda,
					 dataVenda,
					 nomeCliente,
					 nomeVendedor,
					(select SUM(precoVenda*quant-desconto)
					 from itemVenda
					 where itemVenda.idVenda=venda.idVenda) total
			  FROM 
				cliente INNER JOIN 
					(vendedor INNER JOIN venda
					ON vendedor.idVendedor=venda.idVendedor)
				ON cliente.idCliente=venda.idCliente
			  
			  $where
			  ORDER BY $sidx $sord 
			  LIMIT $start , $limit";				 
					
    $resultSet = mysql_query($query);
	
	$response->page = $page;
	$response->total = $total_pages;
	$response->records = $count;
	$i=0;
	
	while( $row = mysql_fetch_array($resultSet) ){
						
		$response->rows[$i]['idVenda']=$row['idVenda'];
		$response->rows[$i]['dataVenda']=$row['dataVenda'];
		$response->rows[$i]['nomeCliente']=$row['nomeCliente'];
		$response->rows[$i]['nomeVendedor']=$row['nomeVendedor'];
		$response->rows[$i]['total']=$row['total'];
		$i++;
			
	}
	
	echo json_encode($response);

?>