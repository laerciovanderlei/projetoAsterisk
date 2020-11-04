<?php
if (isset($registro)) $acao = "administrador.php?acao=atualizar&id=" . $registro['id'];
else $acao = "administrador.php?acao=gravar";
?>
<div class="container">
  <form class="" action="<?= $acao; ?>" method="post">

    <input type="hidden" id="idRegistro" name="idRegistro" value="<?php if (isset($registro)) echo $registro['id']; ?>" />

    <div class="from-group">
      <label for="nome">Nome</label>
      <input id="nome" class="form-control" type="text" name="nome" value="<?php if (isset($registro)) echo $registro['nome']; ?>" required>
    </div>

    <div class="from-group">
      <label for="usuario">Usuario</label>
      <input id="usuario" class="form-control" type="text" name="usuario" value="<?php if (isset($registro)) echo $registro['usuario']; ?>" required>
    </div>

    <div class="from-group">
      <label for="senha">Senha</label>

      <input type="hidden" id="oldSenha" name="oldSenha" value="<?php if (isset($registro)) echo $registro['senha']; ?>" />

      <input id="senha" class="form-control" type="password" name="senha" value="">
    </div>
    
    <br>
    <button class="btn btn-info" type="submit">Enviar</button>
  </form>
</div>
