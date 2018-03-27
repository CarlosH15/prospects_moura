<?php 
	ob_start(); 
?>

		<div class="row">
			<div class="offset-sm-1 col-sm-8 offset-sm-1">
				<p> Você está logado como - aqui virá o nome do vendedor - .</p>
				<p> Controle de prospects </p>
				<p> Escolha uma das opções no Menu acima. </p>
			</div>
		</div>


<?php

$conteudo = ob_get_contents();
ob_end_clean();
$titulo = "Prospecção";
include "/layout.php";

?>