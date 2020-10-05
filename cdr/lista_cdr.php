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

    <table class="table table-hover table-stripped">
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
	    <td><?php echo $linha['calldate']; ?></td>
	    <td><?php echo $linha['src']; ?></td>
      <td><?php echo $linha['dst']; ?></td>
      <td><?php echo $linha['clid']; ?></td>
      <td><?php echo $linha['duration']; ?></td>
      <td><?php echo $linha['billsec']; ?></td>
      <td><?php echo $linha['disposition']; ?></td>
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
