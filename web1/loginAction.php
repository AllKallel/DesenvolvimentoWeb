
<?php
include "conexao.php";

//captura os dados do formulário
$nome = $_REQUEST["txtNome"];
$senha = $_REQUEST["txtSenha"];

//Montagem do comando SQL
$sql = "select nome_usuario, senha, bloqueado
        from usuario
        where nome_usuario = '$nome' and senha = md5 ('$senha')";

//Execução do comando SQL        
$recordSet = mysql_query($sql,$conexao);

//Verificar se retornou registros
$nro_registros = mysql_num_rows($recordSet);
   if($nro_registros == 0){
       echo "NÃO ACHOU!";
   } else{
      /* $linha=mysql_fetch_row($recordSet);
       $nome=$linha[0];
       $senha=$linha[1];
       $bloqueado=$linha[2];
       echo "Nome=$nome Senha=$senha Bloqueado=$bloqueado"; */
       $linha=mysql_fetch_array($recordSet);
       $nome=$linha["nome_usuario"];
       $senha=$linha["senha"];
       $bloqueado=$linha["bloqueado"];
       echo "nome=$nome senha=$senha bloqeuado=$bloqueado";
   }

   
?>