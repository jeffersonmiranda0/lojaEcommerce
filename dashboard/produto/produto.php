<?php 
	require_once('../../conn/Conexao.php');
	require_once('../../classe/Produto.class.php');
	include_once('../../inc/produto.con.inc.php');

	sProduto();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta leng="PT-br">
	<title></title>
	<style>
		label{
			display: block;
		}
	</style>
</head>
<body>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
		<label>Codigo de barras: <input name="codBarras" type="text" value="" placeHolder="codigo de barras do produto" /></label>
		<label>Nome: <input name="nomeProduto" type="text" value="" placeHolder="Nome do produto" /></label>
		<label>Preço Custo: <input name="pcusto" type="text" value="" placeHolder="Preço de custo" /></label>
		<label>Preço Venda: <input name="pvenda" type="text" value="" placeHolder="Preço para venda" /></label>
		<label>Altura: <input name="altura" type="text" value="" placeHolder="Altura do produto" /></label>
		<label>Largura: <input name="largura" type="text" value="" placeHolder="Largura do produto" /></label>
		<label>Profundidade: <input name="profundidade" type="text" value="" placeHolder="Profundidade do produto" /></label>
		<input name="salvar" type="submit" value="salvar"/>
	</form>
</body>
</html>