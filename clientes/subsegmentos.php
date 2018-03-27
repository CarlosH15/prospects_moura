<?php 
require_once $_SERVER["DOCUMENT_ROOT"] . "/prospect/model/ProspectModel.php";
$prospectModel = new ProspectModel();
?>
<select class="form-control" name="subsegmento">
	<option disabled selected>Selecione o subsegmento...</option>
	<?php
	$segmento = $_GET["segmento"];
	$subsegmentos = $prospectModel->listarSubsegmentos($segmento);

	foreach($subsegmentos as $sb): 

		if($segmento == $sb["IdSubSegmento"]){	?>

		<option selected value="<?= $sb["IdSubSegmento"]?>"> <?= $sb["DescricaoSubSegmento"]?>  </option>

		<?php }else{ ?>

		<option value="<?= $sb["IdSubSegmento"]?>"> <?= $sb["DescricaoSubSegmento"]?>  </option>

		<?php } endforeach; ?>

	</select>