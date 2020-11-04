<style>
/*comentário do status do ramal*/
.dot-status{
  height: 12px;
  width: 12px;
  background-color: red;
  border-radius: 50%;
  display: inline-block;
}
.online{
  background-color: green !important;
}
</style>

<div class="container">
<br></br>
  <h2>Lista de Ramais</h2>

  <a class="btn btn-info" href="ramais.php?acao=novo">Novo</a>
  <a class="btn btn-primary" href="ramais_download_csv.php">Download CSV</a>
  <a class="btn btn-success" href="ramais_download_pdf.php"  target="_blank">Download PDF</a>

  <?php if (count($registros)==0): ?>
    <p></p>
    <p>Nenhum Ramal encontrado!</p>
  <?php else: ?>

<p></p>
    <table class="table table-hover table-stripped dataTables">
      <thead>
        <th style="width: 20px;">Nome</th>
                            <th>Ramal</th>
                            <th>Senha</th>
                            <th>Permissão</th>
                            <th>Grupo</th>
                            <th>Ip</th>

        <th style="width: 120px;">Ações</th>
      </thead>
      <tbody>
        <?php foreach ($registros as $linha): ?>
          <tr>
            <td><?php echo $linha['callerid']; ?></td>
            <td><?php echo $linha['username']; ?></td>
            <td><?php echo $linha['secret']; ?></td>
            <td><?php echo $linha['permissao']; ?></td>
            <td><?php echo $linha['grupo']; ?></td>
            <td>
              <?php
              $status_online="";
              if($linha['ipaddr']!=""){
                $status_online="online";
              }
              ?>
              <span class="dot-status <?php echo $status_online;?>"></span> <span><?php echo $linha['ipaddr']; ?></span>
            </td>


            <td>
              <a class="btn btn-primary btn-sm" href="ramais.php?acao=buscar&id=<?php echo $linha['id']; ?>">Editar</a>
              <a class="btn btn-danger btn-sm" onclick="return confirm('Deseja mesmo Deletar o Ramal?')" href="ramais.php?acao=excluir&id=<?php echo $linha['id']; ?>">Excluir</a>

            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>
