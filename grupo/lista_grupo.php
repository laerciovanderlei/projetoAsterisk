<div class="container">
  <br></br>
  <h2>Grupo de Ramais</h2>
  <a class="btn btn-info" href="grupo.php?acao=novo">Novo</a>

  <?php if (count($registros)==0 ): ?>

    <p>Nenhum Grupo encontrado!</p>

  <?php else: ?>
    <p></p>
    <table class="table table-hover table-stripped dataTables">
      <thead>
        <th style="width: 20px;">Nome</th>
        <th style="width: 120px;">Ações</th>
      </thead>
      <tbody>
        <?php foreach ($registros as $linha): ?>
          <tr>
            <td>
              <?php echo $linha[ 'nome']; ?>
            </td>
            <td>
              <a class="btn btn-primary btn-sm" href="grupo.php?acao=buscar&id=<?php echo $linha['id']; ?>">Editar</a>
              <a class="btn btn-danger btn-sm" onclick="return confirm('Deseja mesmo Deletar o Grupo?')" href="grupo.php?acao=excluir&id=<?php echo $linha['id']; ?>">Excluir</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>
