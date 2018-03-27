<?php 
require_once $_SERVER["DOCUMENT_ROOT"] . "/prospect/model/ProspectModel.php";
$prospectModel = new ProspectModel();
$segmentos = $prospectModel->listarSegmentos();
$cidades = $prospectModel->listarCidades();
$cnaes = $prospectModel->listarCnaes();
$responsaveis = $prospectModel->listarResponsaveis();
$status = $prospectModel->listarStatusVisita();

$acao = "create";
$cnpj = "";
$nomeFantasia = "";
$razaoSocial = "";
$segmento = "";
$subsegmento = "";
$logradouro = "";
$bairro = "";
$numero = "";
$cidade = "";
$cnae = "";
$email = "";
$responsavel = "";
$resposta = "";
$statusvisita = "";
$quantidadeContatos = "";
$observacao = "";

if(isset($_GET["cnpjPesquisa"])){
	$acao = "update";

	$cnpjAPesquisar = $_GET["cnpjPesquisa"];
	$cnpjAPesquisar = str_replace(".", "", $cnpjAPesquisar);
	$cnpjAPesquisar = str_replace("/", "", $cnpjAPesquisar);
	$cnpjAPesquisar = str_replace("-", "", $cnpjAPesquisar);

	$pModel = new ProspectModel();
	$prospect = $pModel->consultarProspectUnicoPorCNPJ($cnpjAPesquisar);

	$cnpj = $prospect["CNPJ"];
	$nomeFantasia = $prospect["NomeFantasia"];
	$razaoSocial = $prospect["RazaoSocial"];
	$segmento = $prospect["CodSegmento"];
	$subsegmento = $prospect["IdSubSegmento"];
	$logradouro = $prospect["Logradouro"];
	$bairro = $prospect["Bairro"];
	$numero = $prospect["Numero"];
	$cidade = $prospect["IdCidade"];
	$cnae = $prospect["IdCNAE"];
	$email = $prospect["Email"];
	$responsavel = $prospect["IdVendedor"];
	$resposta = $prospect["CodResposta"];
	$statusvisita = $prospect["IdStatusVisita"];
	$quantidadeContatos = $prospect["QuantidadeContatos"];
	$observacao = $prospect["Observacao"];
}

?>

<form method="post" id="formprospect" enctype="multipart/form-data" action="/prospect/controller/ProspectController.php?acao=<?=$acao?>">
	<div class="row">
		<div class="col-sm-8">
			<b><font size="4px"> Digite CNPJ do cliente para consultar ou editar seus dados: </font></b>
			<div class="input-group">
				<input class="form-control" class="fonte" type="text" placeholder="Pesquise o cliente pelo número do CNPJ" id="cnpjPesquisa" maxlength="14" autocomplete="off" name="cnpjPesquisa">
				<span class="input-group-btn">
					<button class="btn btn-default" id="btnConsultar">
						<span>Consultar</span>
					</button>
				</span>
			</div>
		</div>	
	</div>
	
	<div class="row">
		<div class="col-sm-4">
			<br><b><font size="4px"> CNPJ: </font></b>
		</div>

		<div class="col-sm-4">
			<br><b><font size="4px"> Nome Fantasia: </font></b>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-4">
			<input class="form-control" class="fonte" type="text" placeholder="CNPJ" id="cnpj" name="cnpj" autocomplete="off" required maxlength="14" value="<?=$cnpj?>">
		</div>
		
		<div class="col-sm-4">
			<input class="form-control" class="fonte" type="text" placeholder="Nome Fantasia" id="nomeFantasia" name="nomeFantasia" autocomplete="off" maxlength="80" value="<?=$nomeFantasia?>">
		</div>
	</div>

	<div class="row">
		<div class="col-sm-8">
			<br><b><font size="4px"> Razão Social: </font></b>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-8">
			<input class="form-control" class="fonte" type="text" placeholder="Razão Social" name="razaoSocial" autocomplete="off" required maxlength="100" value="<?=$razaoSocial?>"><br>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-4">
			<b><font size="4px"> Segmento: </font></b>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-4">
			<select id="segmento" name="segmento" class="form-control" required>
				<option disabled selected="">Selecione o segmento...</option>                
			<?php 

			foreach($segmentos as $sg): 

			if($segmento == $sg["CodSegmento"]){	?>
			
			<option selected value="<?= $sg["CodSegmento"]?>"> <?= $sg["DescricaoSegmento"]?>  </option>

			<?php }else{ ?>

			<option value="<?= $sg["CodSegmento"]?>"> <?= $sg["DescricaoSegmento"]?>  </option>

		<?php } endforeach; ?>

	</select>
	</div>

	<div class="col-sm-4" id="subsegmento"></div>
</div>

<div class="row">
	<div class="col-sm-8">
		<br><b><font size="4px"> Logradouro: </font></b>
	</div>
</div>

<div class="row">
	<div class="col-sm-8">
		<input class="form-control" class="fonte" type="text" placeholder="Logradouro" name="logradouro" autocomplete="off" required maxlength="150" value="<?=$logradouro?>">
	</div>
</div>

<div class="row">
	<div class="col-sm-4">
		<br><b><font size="4px"> Bairro: </font></b>
	</div>

	<div class="col-sm-4">
		<br><b><font size="4px"> Número: </font></b>
	</div>
</div>

<div class="row">
	<div class="col-sm-4">
		<input class="form-control" class="fonte" type="text" placeholder="Bairro" id="bairro" name="bairro" autocomplete="off" required maxlength="40" value="<?=$bairro?>">
	</div>

	<div class="col-sm-4">
		<input class="form-control" class="fonte" type="text" placeholder="Número" id="numero" name="numero" autocomplete="off" maxlength="10" value="<?=$numero?>">
	</div>
</div>

<div class="row">
	<div class="col-sm-3">
		<br><b><font size="4px"> Cidade: </font></b>
	</div>

	<div class="col-sm-5">
		<br><b><font size="4px"> CNAE: </font></b>
	</div>
</div>

<div class="row">
	<div class="col-sm-3">
		<select id="cidade" name="cidade" class="form-control" required>
			<option disabled selected="">Selecione a cidade...</option>                
			<?php 

			foreach($cidades as $c): 

			if($cidade == $c["IdCidade"]){	?>
			
			<option selected value="<?= $c["IdCidade"]?>"> <?= $c["NomeCidade"]?>  </option>

			<?php }else{ ?>

			<option value="<?= $c["IdCidade"]?>"> <?= $c["NomeCidade"]?>  </option>

		<?php } endforeach; ?>

	</select>
</div>

<div class="col-sm-5">
	<select id="cnae" name="cnae" class="form-control" required>
		<option disabled selected="">Selecione o CNAE...</option>                
			<?php 

			foreach($cnaes as $cn): 

			if($cnae == $cn["IdCNAE"]){	?>
			
			<option selected value="<?= $cn["IdCNAE"]?>"> <?= $cn["DescricaoCNAE"]?>  </option>

			<?php }else{ ?>

			<option value="<?= $cn["IdCNAE"]?>"> <?= $cn["DescricaoCNAE"]?>  </option>

		<?php } endforeach; ?>

	</select>
</div>
</div>

<div class="row">
	<div class="col-sm-8">
		<br><b><font size="4px"> Email: </font></b>
	</div>
</div>

<div class="row">
	<div class="col-sm-8">
		<input class="form-control" class="fonte" type="email" placeholder="Email" name="email" autocomplete="off" maxlength="150" value="<?=$email?>">
	</div>
</div>

<div class="row">
	<div class="col-sm-4">
		<br><b><font size="4px"> Responsável: </font></b>
	</div>

	<div class="col-sm-4">
		<br><b><font size="4px"> Cliente vende baterias? </font></b>
	</div>
</div>

<div class="row">
	<div class="col-sm-4">
		<select id="responsavel" name="responsavel" class="form-control" required>
			<option disabled selected="">Selecione o responsável...</option>                
			<?php 

			foreach($responsaveis as $r): 

			if($responsavel == $r["IdVendedor"]){	?>
			
			<option selected value="<?= $r["IdVendedor"]?>"> <?= $r["NomeVendedor"]?>  </option>

			<?php }else{ ?>

			<option value="<?= $r["IdVendedor"]?>"> <?= $r["NomeVendedor"]?>  </option>

		<?php } endforeach; ?>

	</select>
</div>

<div class="col-sm-4">
	<select id="resposta" name="resposta" class="form-control">
		<option disabled selected="">Resposta...</option>
		<option value="S">Sim</option>
		<option value="N">Não</option>
	</select>
</div>
</div>

<div class="row">
	<div class="col-sm-4">
		<br><b><font size="4px"> Status da visita: </font></b>
	</div>

	<div class="col-sm-4">
		<br><b><font size="4px"> Quantidade de vezes que o cliente foi contactado: </font></b>
	</div>
</div>


<div class="row">
	<div class="col-sm-4">
		<select id="statusvisita" name="statusvisita" class="form-control">
			<option disabled selected="">Selecione o status da visita...</option>                
			<?php 

			foreach($status as $st): 

			if($statusvisita == $st["IdStatusVisita"]){	?>
			
			<option selected value="<?= $st["IdStatusVisita"]?>"> <?= $st["DescricaoVisita"]?>  </option>

			<?php }else{ ?>

			<option value="<?= $st["IdStatusVisita"]?>"> <?= $st["DescricaoVisita"]?>  </option>

		<?php } endforeach; ?>

	</select>
</div>

<div class="col-sm-4">
	<select id="quantidadeContatos" name="quantidadeContatos" class="form-control">
		<option disabled selected="">Selecione...</option>
		<option value="0">0</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
	</select>
</div>
</div>

<div class="row">
	<div class="col-sm-8">
		<br><b><font size="4px"> Observação: </font></b>
	</div>
</div>

<div class="row">
	<div class="col-sm-8">
		<input class="form-control" class="fonte" type="text" placeholder="Digite aqui sua observação sobre esse prospect..." name="observacao" autocomplete="off" maxlength="300" value="<?=$observacao?>">
	</div>
</div>

<br>

<div class="row">
	<div class="col-sm-4">					
		<input class="btn btn-default btn-lg" class="fonte" type="submit"></button>
	</div>
</div>
</form>
</div>

<?php

echo "<script type='text/javascript'>
$('select#segmento').change(function(){					
	$('#subsegmento').load('subsegmentos.php?segmento='+$('#segmento').val());
})

jQuery(function($){
	$('#cnpjPesquisa').mask('99.999.999/9999-99');
});

jQuery(function($){
	$('#cnpj').mask('99.999.999/9999-99');
});

$('button#btnConsultar').click(function(){
	$('#formulario').load('formulario.php?cnpjPesquisa='+$('#cnpjPesquisa').val());
})

</script>";

?>