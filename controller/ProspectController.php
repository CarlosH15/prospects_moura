<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/prospect/model/ProspectModel.php";

$prospectModel = new ProspectModel();

$acao = $_GET["acao"];

$cnpj = $_POST["cnpj"];

$cnpj = str_replace(".", "", $cnpj);
$cnpj = str_replace("/", "", $cnpj);
$cnpj = str_replace("-", "", $cnpj);

$razaoSocial = $_POST["razaoSocial"];
$segmento = $_POST["segmento"];
$subsegmento = $_POST["subsegmento"];
$logradouro = $_POST["logradouro"];
$bairro = $_POST["bairro"];
$cidade = $_POST["cidade"];
$cnae = $_POST["cnae"];
$responsavel = $_POST["responsavel"];

if(isset($_POST["nomeFantasia"])){
	$nomeFantasia = NULL;
}else{
	$nomeFantasia = $_POST["nomeFantasia"];
}

if(!isset($_POST["numero"])){
	$numero = NULL;
}else{
	$numero = $_POST["numero"];
}

if(!isset($_POST["email"])){
	$email = NULL;
}else{
	$email = $_POST["email"];
}

if(!isset($_POST["resposta"])){
	$resposta = NULL;
}else{
	$resposta = $_POST["resposta"];
}

if(!isset($_POST["observacao"])){
	$observacao = NULL;
}else{
	$observacao = $_POST["observacao"];
}

if(!isset($_POST["statusvisita"])){
	$statusvisita = NULL;
}else{
	$statusvisita = $_POST["statusvisita"];
}

if(!isset($_POST["quantidadeContatos"])){
	$quantidadeContatos = NULL;
}else{
	$quantidadeContatos = $_POST["quantidadeContatos"];
}

$clienteprospect = $prospectModel->consultarProspectUnicoPorCNPJ($cnpj);

if($acao == "update"){
	$prospectModel->editarProspect($clienteprospect["IdClienteProspect"], $cnpj, $razaoSocial, $nomeFantasia, $subsegmento, $logradouro, $numero, $bairro, $cidade, $cnae, $email, $responsavel, $resposta, $segmento, $observacao, $statusvisita, $quantidadeContatos);

	echo "<script type='text/javascript'> alert('Prospect editado com sucesso'); </script>";

}else if($acao == "create"){
	$prospectModel->inserirProspect($cnpj, $razaoSocial, $nomeFantasia, $subsegmento, $logradouro, $numero, $bairro, $cidade, $cnae, $email, $responsavel, $resposta, $segmento, $observacao, $statusvisita, $quantidadeContatos);

	echo "<script type='text/javascript'> alert('Prospect cadastrado com sucesso'); </script>";
}

echo "<script>location.href = '../clientes/index.php';</script>";

?>