<?php

	$response->page = 1;
	$response->total = 1;
	$response->records = 0;
					
	$response->rows[$i]['idItemVenda']=$row['idItemVenda'];
	$response->rows[$i]['nomeProduto']=$row['nomeProduto'];
	$response->rows[$i]['quant']=$row['quant'];
	$response->rows[$i]['precoVenda']=$row['precoVenda'];
	$response->rows[$i]['desconto']=$row['desconto'];
	$response->rows[$i]['total']=$row['total'];
	
	echo json_encode($response);

?>