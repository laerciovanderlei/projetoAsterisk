<?php
function hora($seg)
{
  $hora = floor($seg / 3600);
  $seg -= $hora * 3600;

  $minuto = floor($seg / 60);
  $seg -= $minuto * 60;

  if ($hora < 10)
  $hora = "0" . $hora;
  if ($minuto < 10)
  $minuto = "0" . $minuto;
  if ($seg < 10)
  $seg = "0" . $seg;

  return $hora . ":" . $minuto . ":" . $seg;
}
?>



<div class="container">

    <br></br>
  <h2>Registro de Chamadas Telefonicas</h2>
  <button type="button" class="btn">Não Atendido</button>
  <button type="button" class="btn btn-success">Atendido</button>
  <button type="button" class="btn btn-warning">Ocupado</button>
  <button type="button" class="btn btn-danger">Invalida</button>

  <?php if (count($registros)==0): ?>


    <p></p>
    <p>Tabela do CDR Vazia!</p>
  <?php else: ?>
    <p></p>
    <table class="table table-hover table-stripped dataTables">

      <thead class="thead-dark">

        <th>Data/Hora</th>
        <th>Origem</th>
        <th>Destino</th>
        <th>CallerID</th>
        <th>Duração Total</th>
        <th>Duração em Conversação</th>
        <th>Status</th>


      </thead>
      <tbody>
        <?php foreach ($registros as $linha): ?>
          <tr>
            <td data-sort="<?=$linha['calldate']?>" bgcolor="#A9A9A9">
              <?php echo date("d/m/Y H:i:s",strtotime($linha['calldate'])); ?>
            </td>
            <td><?php echo $linha['src']; ?></td>
            <td><?php echo $linha['dst']; ?></td>
            <td><?php echo $linha['clid']; ?></td>
            <td><?php echo hora($linha['duration']); ?></td>
            <td><?php echo hora($linha['billsec']); ?></td>

            <?php
            if ($linha['disposition'] == "NO ANSWER") {
              $status_txt = "Não Atendido";
              $status_color = "background-color:#f2f1f0;";
            }else if ($linha['disposition'] == "ANSWERED") {
              $status_txt = "Atendido";
              $status_color = "background-color:#28a745;";
            }else if ($linha['disposition'] == "BUSY") {
              $status_txt = "Ocupado";
              $status_color = "background-color:#ffc107;";
            }
            ?>

            <td style="<?php echo $status_color; ?>"><?php echo $status_txt; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>

    </table>
  <?php endif; ?>
</div>
