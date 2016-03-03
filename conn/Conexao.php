<?php
header ('Content-type: text/html; charset=UTF-8'); 

class Conexao{

	private $server = "localhost";
	private $user	= "root";
	private $pass	= "";
	private $sql	= "loja";
	private $conn;

	function conectaBanco(){

		try {

			//Faz a conexão com o banco de dados
			$this->conn = new pdo("mysql:host=$this->server;dbname=$this->sql", $this->user, $this->pass);
			$this->conn->query("SET NAMES 'utf8'");
			
		} catch (PDOException $e) {
			echo "Ops ocorreu um erro" . $e->getMessage();
		}

		//Retorna a conexão com o banco
		return $this->conn;
	}

}