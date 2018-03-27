<?php 

require_once $_SERVER["DOCUMENT_ROOT"] . "/prospect/model/ProspectModel.php";

$prospectModel = new ProspectModel();

$acao = $_GET["acao"];

$cnpj = $_POST["cnpj"];
$nomeFantasia = $_POST["nomeFantasia"];
$razaoSocial = $_POST["razaoSocial"];
$segmento = $_POST["segmento"];
$subsegmento = $_POST["subsegmento"];
$logradouro = $_POST["logradouro"];
$bairro = $_POST["bairro"];
$numero = $_POST["numero"];
$cidade = $_POST["cidade"];
$cnae = $_POST["cnae"];
$email = $_POST["email"];
$responsavel = $_POST["responsavel"];
$resposta = $_POST["resposta"];
$statusvisita = $_POST["statusvisita"];
$quantidadeContatos = $_POST["quantidadeContatos"];
$observacao = $_POST["observacao"];

$autenticaCnpj = $prospectModel->verificaExistenciaDoCadastroNoBanco($cnpj);

if($acao = "update"){
	$prospectModel->alterarProspect('parametros');
}else if($acao = "create"){
	$prospectModel->inserirProspect($cnpj, $razaoSocial, $nomeFantasia, $subsegmento, $logradouro, $numero, $bairro, $cidade, $cnae, $email, $responsavel, $resposta, $segmento, $observacao, $statusvisita, $quantidadeContatos);
}

echo "<script type='text/javascript'> alert('Prospect cadastrado com sucesso'); </script>";
echo "<script>location.href = '../index.php';</script>";


































?>