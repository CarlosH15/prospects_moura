	<?php

	require_once $_SERVER["DOCUMENT_ROOT"] . "/prospect/config/BancoDados.php";

	if (!isset($_SESSION)) {
		session_start();
	}

	class ProspectModel{

		private $bd;

		function __construct(){
			$this->bd = BancoDados::obterConexao();
		}

		public function inserirProspect($cnpj, $razaosocial, $nomefantasia, $idsubsegmento, $logradouro, $numero, $bairro, $idcidade, $idcnae, $email, $idvendedor, $codresposta, $codsegmento, $observacao, $idstatusvisita, $quantidadecontatos){
			$insercao = $this->bd->prepare("INSERT INTO clienteprospect(CNPJ, RazaoSocial, NomeFantasia, IdSubSegmento, Logradouro, Numero, Bairro, IdCidade, IdCNAE, Email, IdVendedor, CodResposta, CodSegmento, Observacao, IdStatusVisita, QuantidadeContatos) VALUES (:cnpj, :razaosocial, :nomefantasia, :idsubsegmento, :logradouro, :numero, :bairro, :idcidade, :idcnae, :email, :idvendedor, :codresposta, :codsegmento, :observacao, :idstatusvisita, :quantidadecontatos)");

			$insercao->bindParam(":cnpj", $cnpj);
			$insercao->bindParam(":razaosocial", $razaosocial);
			$insercao->bindParam(":nomefantasia", $nomefantasia);
			$insercao->bindParam(":idsubsegmento", $idsubsegmento);
			$insercao->bindParam(":logradouro", $logradouro);
			$insercao->bindParam(":numero", $numero);
			$insercao->bindParam(":bairro", $bairro);
			$insercao->bindParam(":idcidade", $idcidade);
			$insercao->bindParam(":idcnae", $idcnae);
			$insercao->bindParam(":email", $email);
			$insercao->bindParam(":idvendedor", $idvendedor);
			$insercao->bindParam(":codresposta", $codresposta);
			$insercao->bindParam(":codsegmento", $codsegmento);
			$insercao->bindParam(":observacao", $observacao);
			$insercao->bindParam(":idstatusvisita", $idstatusvisita);
			$insercao->bindParam(":quantidadecontatos", $quantidadecontatos);

			$insercao->execute();
		}

		public function editarProspect($idclienteprospect, $cnpj, $razaosocial, $nomefantasia, $idsubsegmento, $logradouro, $numero, $bairro, $idcidade, $idcnae, $email, $idvendedor, $codresposta, $codsegmento, $observacao, $idstatusvisita, $quantidadecontatos){
			$edicao = $this->bd->prepare("UPDATE clienteprospect SET CNPJ = :cnpj, RazaoSocial = :razaosocial, NomeFantasia = :nomefantasia, IdSubSegmento = :idsubsegmento, Logradouro = :logradouro, Numero = :numero, Bairro = :bairro, IdCidade = :idcidade, IdCNAE = :idcnae, Email = :email, IdVendedor = :idvendedor, CodResposta = :codresposta, CodSegmento = :codsegmento, Observacao = :observacao, IdStatusVisita = :idstatusvisita, QuantidadeContatos = :quantidadecontatos WHERE IdClienteProspect = :idclienteprospect");

			$edicao->bindParam(":idclienteprospect", $idclienteprospect);
			$edicao->bindParam(":cnpj", $cnpj);
			$edicao->bindParam(":razaosocial", $razaosocial);
			$edicao->bindParam(":nomefantasia", $nomefantasia);
			$edicao->bindParam(":idsubsegmento", $idsubsegmento);
			$edicao->bindParam(":logradouro", $logradouro);
			$edicao->bindParam(":numero", $numero);
			$edicao->bindParam(":bairro", $bairro);
			$edicao->bindParam(":idcidade", $idcidade);
			$edicao->bindParam(":idcnae", $idcnae);
			$edicao->bindParam(":email", $email);
			$edicao->bindParam(":idvendedor", $idvendedor);
			$edicao->bindParam(":codresposta", $codresposta);
			$edicao->bindParam(":codsegmento", $codsegmento);
			$edicao->bindParam(":observacao", $observacao);
			$edicao->bindParam(":idstatusvisita", $idstatusvisita);
			$edicao->bindParam(":quantidadecontatos", $quantidadecontatos);

			$edicao->execute();
		}

		public function consultarProspectUnicoPorCNPJ($cnpj){
			$consulta = $this->bd->prepare("SELECT * FROM clienteprospect WHERE CNPJ = :cnpj and IdVendedor = :vendedor");

			$consulta->bindParam(":cnpj", $cnpj);
			$consulta->bindParam(":vendedor", $_SESSION["IdVendedor"]);

			$consulta->execute();

			$resultado = $consulta->fetch();

			return $resultado;			
		}

		public function listarSegmentos(){
			$consulta = $this->bd->query("SELECT * FROM segmento ");

			$segmentos = $consulta->fetchAll();

			return $segmentos;
		}

		public function listarSubSegmentos($segmento){
			$consulta = $this->bd->prepare("SELECT * FROM subsegmento where CodSegmento = :segmento order by DescricaoSubSegmento");

			$consulta->bindParam(":segmento", $segmento);

			$consulta->execute();

			$subsegmentos = $consulta->fetchAll();

			return $subsegmentos;
		}

		public function listarCidades(){
			$consulta = $this->bd->query("SELECT * FROM cidade");

			$cidades = $consulta->fetchAll();

			return $cidades;
		}

		public function listarCnaes(){
			$consulta = $this->bd->query("SELECT * FROM cnae");

			$cnaes = $consulta->fetchAll();

			return $cnaes;
		}

		public function listarResponsaveis(){
			$consulta = $this->bd->query("SELECT * FROM vendedor");

			$responsaveis = $consulta->fetchAll();

			return $responsaveis;
		}

		public function listarStatusVisita(){
			$consulta = $this->bd->query("SELECT * FROM visita");

			$status = $consulta->fetchAll();

			return $status;
		}

	}