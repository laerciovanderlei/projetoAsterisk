
<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// session_start(); //DEVE SER A PRIMEIRA LINHA
//
// //Finaliza a sessão logado da Aplicação
// if(isset($_GET['acao']) && $_GET['acao']=="sair"){
//     unset($_SESSION['logado']);
// }

require_once 'template/cabecalho.php'; ?>

<section class="jumbotron text-center">
  <div class="container">
    <h1 class="jumbotron-heading">Projeto Asterisk</h1>
    <p class="lead text-muted">
      Aplicação para cadastrar, listar exluir ramais do asterisk.
    </p>
    <p>
        <img class="mb-4" src="/projetoAsterisk/template/Asterisk_Logo.png">
      <!-- <a href="#" class="btn btn-primary my-2">Main call to action</a>
      <a href="#" class="btn btn-secondary my-2">Secondary action</a> -->
    </p>
  </div>
</section>

<?php require_once 'template/rodape.php'; ?>
