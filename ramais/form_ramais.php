<?php
    if(isset($registro)) $acao = "ramais.php?acao=atualizar&id=".$registro['id'];
    else $acao = "ramais.php?acao=gravar";?>
<div class="container">
  <form class="" action="<?php echo $acao; ?>" method="post">

    <div class="from-group">
      <label for="name">Nome</label>
      <input id="callerid" class="form-control" type="text" name="callerid"
        value="<?php if(isset($registro)) echo $registro['callerid']; ?>" required>
    </div>

    <div class="from-group">
      <label for="name">Ramal</label>
      <input id="name" class="form-control" type="text" name="name"
        value="<?php if(isset($registro)) echo $registro['name']; ?>" required>
    </div>

    <div class="from-group">
      <label for="username">Username</label>
      <input id="username" class="form-control" type="text" name="username"
        value="<?php if(isset($registro)) echo $registro['username']; ?>" required>
    </div>

    <div class="from-group">
      <label for="secret">Senha</label>
      <input id="secret" class="form-control" type="varchar" name="secret"
        value="<?php if(isset($registro)) echo $registro['secret']; ?>" required>
    </div>

    <div class="from-group">
      <label for="context">Permissão</label>
      <input id="context" class="form-control" type="text" name="context"
        value="<?php if(isset($registro)) echo $registro['context']; ?>" required>
    </div>




    <div class="from-group">
      <label for="id_grupo">Grupo</label>
        <select class="form-control" name="id_grupo" required>
          <option value="">Escolha um grupo da lista</option>
            <?php foreach ($lista_grupo as $item): ?>
          <option value="<?php echo $item['id']; ?>"
            <?php if(isset($registro) && $registro['id_grupo']==$item['id']) echo "selected";?>>
            <?php echo $item['nome']; ?>
          </option>
            <?php endforeach; ?>
        </select>
  </div>
    <br>
    <button class="btn btn-info" type="submit">Enviar</button>
</form>
</div>
