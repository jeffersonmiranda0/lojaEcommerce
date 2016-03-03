CREATE DATABASE loja;

CREATE TABLE produto(
	idProduto INT(11) NOT NULL AUTO_INCREMENT,
	codBarrasProduto VARCHAR(50) NOT NULL,
	nomeProduto VARCHAR(50) NOT NULL,
	precoCusto DECIMAL(10,2) NOT NULL,
	precoVenda DECIMAL(10,2) NOT NULL,
	alturaProduto VARCHAR(15),
	larguraProduto VARCHAR(15),
	profundidadeProduto VARCHAR(15),

	PRIMARY KEY(idProduto)
);