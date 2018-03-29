<?php 

require_once $_SERVER["DOCUMENT_ROOT"] . "/prospect/model/LoginModel.php";

$loginModel = new LoginModel();

$acao = $_GET["acao"];

if($acao == "login"){

	$usuario = $_POST["usuario"];
	$senha = $_POST["senha"];

	$autenticacao = $loginModel->login($usuario, $senha);

	if($autenticacao == false){ //revendedor e/ou senha incorretos
		echo "<script type='text/javascript'> alert('Usuário e/ou senha inválidos!'); </script>";
		echo "<script>location.href='/prospect/login.php'</script>";
	}else{
		session_start();
		$_SESSION["NomeVendedor"] = $autenticacao["NomeVendedor"];
		$_SESSION["IdVendedor"] = $autenticacao["IdVendedor"];

		echo "<script>location.href='/prospect/index.php'</script>";
	}

}else if($acao == "logout"){
	session_start();
	session_destroy();
	header ("Location: ../login.php");
	exit();
}

?>