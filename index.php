<?php 
	session_start();

	if(isset($_SESSION["IdVendedor"]) == false){
		header ("Location: login.php");
		exit();
	}

	ob_start(); 
?>

		<div class="row">
			<div class="offset-sm-1 col-sm-8 offset-sm-1">
				<p> -- Sistema para controle de prospects -- </p>
				<p> Seja bem-vindo(a) <?php echo $_SESSION["NomeVendedor"] ?> .</p>
				<p> Escolha uma das opções no menu acima. </p>
			</div>
		</div>


<?php

$conteudo = ob_get_contents();
ob_end_clean();
$titulo = "Prospecção";
include "/layout.php";

?>