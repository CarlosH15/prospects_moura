<?php
	session_start();

	if(isset($_SESSION["IdVendedor"]) == false){
		header ("Location: /prospect/login.php");
		exit();
	}

	ob_start();
?>
	
	<div id="formulario">
		<?php include "formulario.php"; ?>
	</div>

<?php
	$conteudo = ob_get_contents();
	ob_end_clean();
	$titulo = "Relatórios";
	include '../layout.php';
?>