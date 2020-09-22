<div class="container">
  <h2>Grupo</h2>
  <a class="btn btn-info" href="grupo.php?acao=novo">Novo</a>

  <?php if (count($registros)==0): ?>
<p></p>
    <p>Nenhum Grupo encontrado!</p>
  <?php else: ?>
    <table class="table table-hover table-stripped">
      <thead>
           <th>#</th>
	         <th>Nome</th>
           <th>Ações</th>
      </thead>
      <tbody>
        <?php foreach ($registros as $linha): ?>
          <tr>
      <td><?php echo $linha['id']; ?></td>
	    <td><?php echo $linha['nome']; ?></td>
	          <td>
                <a class="btn btn-primary btn-sm" href="grupo.php?acao=buscar&id=<?php echo $linha['id']; ?>">Editar</a>
                <a class="btn btn-danger btn-sm" href="grupo.php?acao=excluir&id=<?php echo $linha['id']; ?>">Excluir</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>
