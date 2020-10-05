<div class="container">
  <h2>Administrador</h2>
  <a class="btn btn-info" href="administrador.php?acao=novo">Novo</a>
  <?php if (count($registros)==0): ?>
    <p>Nenhum Usuario encontrado.</p>
  <?php else: ?>
    <table class="table table-hover table-stripped">
      <thead>
           <th>#</th>
	         <th>Nome</th>
           <th>Usuario</th>
           <!-- <th>Senha</th> -->
           <th>Ações</th>
      </thead>
      <tbody>
        <?php foreach ($registros as $linha): ?>
          <tr>
      <td><?php echo $linha['id']; ?></td>
	    <td><?php echo $linha['nome']; ?></td>
      <td><?php echo $linha['usuario']; ?></td>
      <!-- <td><?php echo $linha['senha']; ?></td> -->

	          <td>
                <a class="btn btn-primary btn-sm" href="administrador.php?acao=buscar&id=<?php echo $linha['id']; ?>">Editar</a>
                <a class="btn btn-danger btn-sm" onclick="return confirm('Deseja mesmo Deletar o Usuario?')" href="administrador.php?acao=excluir&id=<?php echo $linha['id']; ?>">Excluir</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>
