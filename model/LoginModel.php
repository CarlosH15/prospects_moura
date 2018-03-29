<?php 

require_once $_SERVER["DOCUMENT_ROOT"] . "/prospect/config/BancoDados.php";

class LoginModel{

	private $bd;

	function __construct(){
		$this->bd = BancoDados::obterConexao();
	}

	public function login($usuario, $senha){
		$senhaCripto = sha1($senha);

		$consulta = $this->bd->prepare("SELECT * FROM vendedor WHERE NomeVendedor = :usuario and SenhaVendedor = :senha");

		$consulta->bindParam(":usuario", $usuario);
		$consulta->bindParam(":senha", $senhaCripto);

		$consulta->execute();

		$usuario = $consulta->fetch();

		return $usuario;
	}

}

?>