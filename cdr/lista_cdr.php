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
  <h2>CDR</h2>
  <button type="" class="btn">Não Atendido</button>
  <button type="button" class="btn btn-success">Atendido</button>
  <button type="button" class="btn btn-warning">Ocupado</button>
  <button type="button" class="btn btn-danger">Invalida</button>

  <!-- <a href="http://google.com.br" onclick="return confirm('Deseja mesmo acessar o Google?');">Ir para o Google!</a> -->


  <?php if (count($registros)==0): ?>


  <p></p>
    <p>Tabela do CDR Vazia!</p>
  <?php else: ?>
    <table class="table table-hover table-stripped dataTables">
    <!-- <table class="table table-hover table-stripped"> -->
    <!-- <table class="table table-dark"> -->
      <thead class="thead-dark">
    <!-- <th>#</th> -->
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
      <!-- <td><?php echo $linha['uniqueid']; ?></td> -->
	    <td bgcolor="#A9A9A9">
        <?php echo date("d/m/Y H:i:s",strtotime($linha['calldate'])); ?>
      </td>
    <!-- REalizar o ajuste da data e hora para o Padrão Brasileiro -->
      <!-- <?php echo date('d/m/Y H:i:s', strtotime($data)); ?> -->

	    <td><?php echo $linha['src']; ?></td>
      <td><?php echo $linha['dst']; ?></td>
      <td><?php echo $linha['clid']; ?></td>
      <td><?php echo hora($linha['duration']); ?></td>
      <td><?php echo hora($linha['billsec']); ?></td>

      <!-- <td><?php echo $linha['disposition']; ?></td> -->

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




            <!-- <td>
                <a class="btn btn-primary btn-sm" href="ramais.php?acao=buscar&id=<?php echo $linha['id']; ?>">Editar</a>
                <a class="btn btn-danger btn-sm" href="ramais.php?acao=excluir&id=<?php echo $linha['id']; ?>">Excluir</a>
            </td> -->
          </tr>
        <?php endforeach; ?>
      </tbody>

    </table>
  <?php endif; ?>
</div>
