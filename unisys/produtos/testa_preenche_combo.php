<?php
mysql_connect('localhost', 'root', 'jesus') or die('Erro ao conectar com o servidor');
mysql_select_db('web1') or die('Erro ao conectar com o banco de dados');
 
$rs = mysql_query("SELECT * FROM categoria ORDER BY nomeCategoria");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <title>Atualizando combos com jquery</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<script type="text/javascript" src="js/jquery-ui-1.8.17.custom/js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('#idCategoria').change(function(){
            $('#produto').load('preenche_combo.php?idCategoria='+$('#idCategoria').val());
        });
    });
    </script>
  </head>
  
  <body>
  <h1>Atualizando combos com jquery</h1>
    <label>Categoria:</label>
    <select name="idCategoria" id="idCategoria">
    <?php while($reg = mysql_fetch_object($rs)): ?>
        <option value="<?php echo $reg->idCategoria ?>"><?php echo $reg->nomeCategoria ?></option>
    <?php endwhile; ?>
    </select>
    <br /><br />
    <div id="produto"></div>
  </body>
</html>







