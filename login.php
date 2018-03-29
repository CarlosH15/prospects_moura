<?php ob_start(); 

$acao = "login";

?>

<form method="post" id="formlogin" action="/prospect/controller/LoginController.php?acao=<?=$acao?>">
	<div class="row">
		<div class="col-sm-8">		
			<b><font size="4px"> Acesso ao sistema de controle de prospects. </font></b><br><br>
		</div>
	</div>


	<div class="row">
		<div class="col-sm-4">		
			<b><font size="4px"> Usuário:   </font></b><input class="form-control" class="fonte" type="text" placeholder="Usuário" id="usuario" name="usuario" required><br>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-4">		
			<b><font size="4px"> Senha:   </font></b><input class="form-control" class="fonte" type="password" placeholder="Senha" name="senha" required><br>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-4">					
			<input class="btn btn-default btn-lg" class="fonte" type="submit"></button>
		</div>
	</div>
</form>


</div>

<?php  
$conteudo = ob_get_contents();
ob_end_clean();
$titulo = "Login";
include "\layout.php";
?>