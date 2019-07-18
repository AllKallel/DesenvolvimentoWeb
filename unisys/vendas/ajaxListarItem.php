<?php

	include_once('conexao.php');
	
	$page  = $_GET['page']; 
	$limit = $_GET['rows']; 
	$sidx  = $_GET['sidx']; 
	$sord  = $_GET['sord']; 		
	
	$where = " WHERE 1 = 1 ";
	
	$idVenda = $_GET['idVenda'];
	
	if( $idVenda > 0 ){	 	
		$where .= " AND idVenda = $idVenda ";		
	}
		
	//Quantidade de registros a serem paginados na grid
	$queryCount = "SELECT COUNT(idItemVenda) as count
			  	   FROM itemVenda INNER JOIN produto 
				        ON produto.idProduto = itemVenda.idProduto
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
	
    $query = "SELECT idItemVenda,nomeProduto,quant,precoVenda,desconto,
				(precoVenda * quant - desconto) total
			  FROM itemVenda INNER JOIN produto 
               ON produto.idProduto = itemVenda.idProduto
			  
			  $where
			  ORDER BY $sidx $sord 
			  LIMIT $start , $limit";				 
					
    $resultSet = mysql_query($query);
	
	$response->page = $page;
	$response->total = $total_pages;
	$response->records = $count;
	$i=0;
	
	while( $row = mysql_fetch_array($resultSet) ){
						
		$response->rows[$i]['idItemVenda']=$row['idItemVenda'];
		$response->rows[$i]['nomeProduto']=$row['nomeProduto'];
		$response->rows[$i]['quant']=$row['quant'];
		$response->rows[$i]['precoVenda']=$row['precoVenda'];
		$response->rows[$i]['desconto']=$row['desconto'];
		$response->rows[$i]['total']=$row['total'];
		$i++;
			
	}
	
	echo json_encode($response);

?>