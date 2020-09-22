<div class="container">
  <h2>CDR</h2>
  
  <!-- <a class="btn btn-info" href="ramais.php?acao=novo">Novo</a>
  <a class="btn btn-info" href="ramais_download_csv.php">Download CSV</a>
  <a class="btn btn-info" href="ramais_download_pdf.php" target="_blank">Download PDF</a> -->

  <?php if (count($registros)==0): ?>

  <p></p>
    <p>Tabela do CDR Vazia!</p>
  <?php else: ?>

    <table class="table table-hover table-stripped">
    <!-- <table class="table table-dark"> -->
      <thead class="thead-dark">
    <th>#</th>
	  <th>Data/Hora</th>
	  <th>Origem</th>
    <th>Destino</th>
    <th>CallerID</th>
    <th>Duração</th>
    <th>Status</th>


      </thead>
      <tbody>
        <?php foreach ($registros as $linha): ?>
          <tr>
      <td><?php echo $linha['uniqueid']; ?></td>
	    <td><?php echo $linha['calldate']; ?></td>
	    <td><?php echo $linha['src']; ?></td>
      <td><?php echo $linha['dst']; ?></td>
      <td><?php echo $linha['clid']; ?></td>
      <td><?php echo $linha['duration']; ?></td>
      <td><?php echo $linha['disposition']; ?></td>
            <!-- <td>
                <a class="btn btn-primary btn-sm" href="ramais.php?acao=buscar&id=<?php echo $linha['id']; ?>">Editar</a>
                <a class="btn btn-danger btn-sm" href="ramais.php?acao=excluir&id=<?php echo $linha['id']; ?>">Excluir</a>
            </td> -->
          </tr>
        <?php endforeach; ?>
      </tbody>

    </table>

    <ul class="pagination">
      <li class="page-item disabled"><a class="page-link" href="#">Inicio</a></li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item"><a class="page-link" href="#">Proximo</a></li>
    </ul>

  <?php endif; ?>
</div>
