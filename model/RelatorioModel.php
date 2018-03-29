<?php 

require_once $_SERVER["DOCUMENT_ROOT"] . "/prospect/config/BancoDados.php";

if (!isset($_SESSION)) {
	session_start();
}

class RelatorioModel{

	private $bd;

	function __construct(){
		$this->bd = BancoDados::obterConexao();
	}

	public function retornaResultadoDoFiltroPorSegmento($segmento){
		$consulta = $this->bd->prepare("SELECT cp.RazaoSocial, ss.DescricaoSubSegmento, c.NomeCidade, v.DescricaoVisita FROM clienteprospect AS cp
			INNER JOIN subsegmento AS ss ON cp.IdSubSegmento = ss.IdSubSegmento
			INNER JOIN cidade AS c on cp.IdCidade = c.IdCidade
			INNER JOIN visita AS v on cp.IdStatusVisita = v.IdStatusVisita
			WHERE CodSegmento = :segmento and IdVendedor = :vendedor");

		$consulta->bindParam(":segmento", $segmento);
		$consulta->bindParam(":vendedor", $_SESSION["IdVendedor"]);

		$consulta->execute();

		$segmentos = $consulta->fetchAll();

		return $segmentos;
	}

}

?>