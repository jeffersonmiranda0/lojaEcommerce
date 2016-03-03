<?php 

	class Produto{

		private $idProduto;
		private $codBarrasProduto;
		public $nomeProduto;
		public $precoCusto;
		public $precoVenda;
		public $pesoProduto;
		public $alturaProduto;
		public $larguraProduto;
		public $profundidadeProduto;
		public $statusProduto;

		public $mensagem = [];


		//GET
		function getIdProduto(){
			return $this->idProduto;
		}

		function getCodBarrasProduto(){
			return $this->codBarrasProduto;
		}

		function getNomeProduto(){
			return $this->nomeProduto;
		}

		function getPrecoCusto(){
			return $this->precoCusto;
		}

		function getPrecoVenda(){
			return $this->precoVenda;
		}

		function getPesoProduto(){
			return $this->pesoProduto;
		}

		function getAlturaProduto(){
			return $this->alturaProduto;
		}

		function getLarguraProduto(){
			return $this->larguraProduto;
		}

		function getProfundidadeProduto(){
			return $this->profundidadeProduto;
		}

		function getMensagem(){
			return $this->mensagem;
		}


		//SET
		function setIdProduto($idProduto){
			$this->idProduto = $idProduto;
		}

		function setCodBarrasProduto($codBarrasProduto){
			//Campo obrigatório ser preenchido
			!empty($codBarrasProduto) ? $this->codBarrasProduto = $codBarrasProduto : $this->setMensagem('Está faltando o codigo de Barras');
		}

		function setNomeProduto($nomeProduto){
			//Campo obrigatório ser preenchido
			!empty($nomeProduto) ? $this->nomeProduto = $nomeProduto : $this->setMensagem('Está faltando o nome do Produto');
		}

		function setPrecoCusto($precoCusto){
			//Campo obrigatório ser preenchido
			!empty($precoCusto) ? $this->precoCusto = $precoCusto : $this->setMensagem('Está faltando o preço de custo');
		}

		function setPrecoVenda($precoVenda){
			//Campo obrigatório ser preenchido
			!empty($precoVenda) ? $this->precoVenda = $precoVenda : $this->setMensagem('Está faltando o preço da venda');
		}

		function setPesoProduto($pesoProduto){
			$this->pesoProduto = $pesoProduto;
		}

		function setAlturaProduto($alturaProduto){
			$this->alturaProduto = $alturaProduto;
		}

		function setLarguraProduto($larguraProduto){
			$this->larguraProduto = $larguraProduto;
		}

		function setProfundidadeProduto($profundidadeProduto){
			$this->profundidadeProduto = $profundidadeProduto;
		}

		function setMensagem($mensagem){
			array_push($this->mensagem, $mensagem);
		}


		//SAVE
		public function salvarProduto($conn){

			if(empty($this->consultaProduto($conn))):

				try {
					
					//PREPARA O SQL
					$conn = $conn->prepare("INSERT INTO produto (
						codBarrasProduto, nomeProduto, precoCusto, precoVenda, alturaProduto, larguraProduto, profundidadeProduto) 
					VALUES 
						(:codigoBarras, :nomeProduto, :precoCusto, :precoVenda, :alturaProduto, :larguraProduto, :profundidadeProduto)"
					);

					//VERIFICA ANTES DE INSERIR
					$conn->bindParam(':codigoBarras', $this->codBarrasProduto);
					$conn->bindParam(':nomeProduto', $this->nomeProduto);
					$conn->bindParam(':precoCusto', $this->precoCusto);
					$conn->bindParam(':precoVenda', $this->precoVenda);
					$conn->bindParam(':alturaProduto', $this->alturaProduto);
					$conn->bindParam(':larguraProduto', $this->larguraProduto);
					$conn->bindParam(':profundidadeProduto', $this->profundidadeProduto);

					//EXECUTA A QUERY
					$conn->execute();

					$this->setMensagem('Produto salvo com Sucesso');


				} catch (PDOException $e) {
					echo $e->getMessage();
				}
				
				//FECHA A CONEXAO
				$conn = NULL;

			else:
				$this->setMensagem('Produto já cadastrado');
			endif;
		}

		//EDIT
		public function editarProduto(){
			
		}

		//LIST
		public function listarProduto($conn){

			try {
				$conn = $conn->query("SELECT * FROM produto");

				while($linha = $conn->fetch_array()){
					$l[] = $linha;
				}

				return $l;
			} catch (PDOException $e) {
				die($e->getMessage());
			}

			$conn = NULL;

		}

		//DELETE
		public function apagarProduto($conn){
			
			try {

				$conn = $conn->prepare("DELETE FROM produto WHERE idProduto = :id");
				$conn->bindParam(':id',  $this->idProduto);
				
				$conn->execute();

			} catch (PDOException $e) {

				die($this->setMensagem($e->getMessage()));

			}


			$this->setMensagem('Removido com sucesso!');

			//FECHA A CONEXAO
			$conn = NULL;

		}

		public function consultaProduto($conn){

			$sql = "SELECT idProduto FROM produto WHERE nomeProduto = :nomeProduto";
			$conn = $conn->prepare($sql);
			$conn->bindParam(':nomeProduto', $this->nomeProduto, PDO::PARAM_STR);
			$conn->execute();

			return $conn->fetch(PDO::FETCH_ASSOC);
		}

	}