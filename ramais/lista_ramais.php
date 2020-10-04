<div class="container">
  <h2>Ramais</h2>
  <a class="btn btn-info" href="ramais.php?acao=novo">Novo</a>
  <a class="btn btn-info" href="ramais_download_csv.php">Download CSV</a>
  <a class="btn btn-info" href="ramais_download_pdf.php" target="_blank">Download PDF</a>

  <?php if (count($registros)==0): ?>

  <p></p>
    <p>Nenhum Ramal encontrado!</p>
  <?php else: ?>

    <table class="table table-hover table-stripped">
      <thead>
    <th>#</th>
	  <th>Nome</th>
	  <th>Ramal</th>
    <th>Senha</th>
    <th>Permissão</th>
    <th>Grupo</th>
    <th>Ações</th>
      </thead>
      <tbody>
        <?php foreach ($registros as $linha): ?>
          <tr>
      <!-- <td><?php echo $linha['id']; ?></td>
	    <td><?php echo $linha['name']; ?></td>
	    <td><?php echo $linha['username']; ?></td>
      <td><?php echo $linha['secret']; ?></td>
      <td><?php echo $linha['context']; ?></td>
      <td><?php echo $linha['grupo']; ?></td> -->

      <td><?php echo $linha['id']; ?></td>
      <td><?php echo $linha['callerid']; ?></td>
      <td><?php echo $linha['username']; ?></td>
      <td><?php echo $linha['secret']; ?></td>
      <td><?php echo $linha['context']; ?></td>
      <td><?php echo $linha['grupo']; ?></td>


            <td>
                <a class="btn btn-primary btn-sm" href="ramais.php?acao=buscar&id=<?php echo $linha['id']; ?>">Editar</a>
                <a class="btn btn-danger btn-sm" href="ramais.php?acao=excluir&id=<?php echo $linha['id']; ?>">Excluir</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>
