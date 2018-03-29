<?php 
require_once $_SERVER["DOCUMENT_ROOT"] . "/prospect/model/RelatorioModel.php";
$relatorioModel = new RelatorioModel();

$filtro = $_GET["filtro"];

$resultado = $relatorioModel->retornaResultadoDoFiltroPorSegmento(1);

?>


<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Cliente</th>
      <th scope="col">Subsegmento</th>
      <th scope="col">Cidade</th>
      <th scope="col">Status Visita</th>
    </tr>
  </thead>
  <tbody>
    <?php $cont = 1; foreach ($resultado as  $r) { ?>

    <tr>
      <th scope="row"><?$cont?></th>
      <td><?php $r["RazaoSocial"] ?></td>
      <td><?php $r["DescricaoSubSegmento"] ?></td>
      <td><?php $r["NomeCidade"] ?></td>
      <td><?php $r["DescricaoVisita"] ?></td>
    </tr>

    <?php $cont +=1; } ?>

  </tbody>
</table>