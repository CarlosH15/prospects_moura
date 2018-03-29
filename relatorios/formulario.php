<form method="post" id="formrelatorio" enctype="multipart/form-data" action="/prospect/controller/RelatorioController.php">

	<div class="row">
		<div class="col-sm-4">
			<b><font size="4px"> Selecione o tipo de filtro que deseja: </font></b>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-4">
			<select id="filtro" name="filtro" class="form-control" required>
				<option disabled selected="">Filtro...</option>                
				<option value="1">Segmento</option>
				<option value="2">Subsegmento</option>
				<option value="3">Cidade</option>
				<option value="4">Status da visita</option>
				</select>
			</div>
		</div>

	<br>

	<div class="col-sm-8" id="opcoes"></div>

	<?php

				echo "<script type='text/javascript'>

				$('select#filtro').change(function(){		
					$('#opcoes').load('opcoes.php?filtro='+$('#filtro').val());
				});

				</script>";

				?>

