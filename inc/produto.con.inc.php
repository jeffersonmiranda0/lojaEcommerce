<?php

function sProduto(){
	$conn = new Conexao();
	$prod = new Produto();

	if(!empty($_POST)){
		$prod->setCodBarrasProduto($_POST['codBarras']);
		$prod->setNomeProduto($_POST['nomeProduto']);
		$prod->setPrecoCusto($_POST['pcusto']);
		$prod->setPrecoVenda($_POST['pvenda']);
		$prod->setAlturaProduto($_POST['altura']);
		$prod->setLarguraProduto($_POST['largura']);
		$prod->setProfundidadeProduto($_POST['profundidade']);

		if(empty($prod->getMensagem())){
			$prod->salvarProduto($conn->conectaBanco());
		}

		print_r($prod->getMensagem());

	}


}