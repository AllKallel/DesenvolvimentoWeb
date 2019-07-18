<?php
mysql_connect('localhost', 'root', 'jesus') or die('Erro ao conectar com o servidor');
mysql_select_db('web1') or die('Erro ao conectar com o banco de dados');
 
$idCategoria = $_GET['idCategoria'];
$rs = mysql_query("SELECT * FROM produto WHERE idCategoria = '$idCategoria' " .
                  " ORDER BY nomeProduto");
echo "<label>Produto: </label>";
echo "<select name='produto'>";
while($reg = mysql_fetch_object($rs)){
    echo "<option value='$reg->idProduto'>$reg->nomeProduto</option>";
}
echo "</select>";
 
?>