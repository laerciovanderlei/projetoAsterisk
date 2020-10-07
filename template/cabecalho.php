<?php
    session_start(); //DEVE SER A PRIMEIRA LINHA

    define('BASE_URL', 'http://localhost/projetoAsterisk');

    // //Finaliza a sessão logado da Aplicação
    // if(isset($_GET['acao']) && $_GET['acao']=="sair"){
    //     unset($_SESSION['logado']);
    // }
    //Finaliza a sessão logado da Aplicação
    if (isset($_GET['acao']) && $_GET['acao'] == "sair") {
      session_destroy();
    }

    if (empty($_SESSION['logado'])) {
      header("Location: " . BASE_URL . "/login.php ");
    }

?>


<?php define('BASE_URL', 'http://localhost/projetoAsterisk'); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Asterisk</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="<?= BASE_URL; ?>/album.css" rel="stylesheet">


    <style>
    .menu-text {
      padding-left: 20px;
    }
  </style>
  
  </head>

  <body>

    <header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
              <h4 class="text-white">Sobre</h4>
              <p class="text-muted">
                Aplicação para auxiliar na tarefa de gerenciar Ramais no Asterisk.
              </p>
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
              <h4 class="text-white">Ações</h4>
              <ul class="list-unstyled">
                <li><a href="<?= BASE_URL; ?>/ramais/ramais.php" class="text-white">Ramais</a></li>
                <li><a href="<?= BASE_URL; ?>/grupo/grupo.php" class="text-white">Grupo</a></li>
                <li><a href="<?= BASE_URL; ?>/permissao/permissao.php" class="text-white">Permissão</a></li>
                <li><a href="<?= BASE_URL; ?>/cdr/cdr.php" class="text-white">CDR</a></li>
                <li><a href="<?= BASE_URL; ?>/administrador/administrador.php" class="text-white">Administrador</a></li>
                <li><a href="<?= BASE_URL; ?>/login.php" class="text-white">Sair</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
          <a href="<?php echo BASE_URL; ?>" class="navbar-brand d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
            <strong>Asterisk</strong>
          </a>
          <div>
            <a href="<?= BASE_URL; ?>/ramais/ramais.php" class="text-white menu-text">Ramais</a>
            <a href="<?= BASE_URL; ?>/grupo/grupo.php" class="text-white menu-text">Grupo</a>
            <a href="<?= BASE_URL; ?>/permissao/permissao.php" class="text-white menu-text">Permissão</a>
            <a href="<?= BASE_URL; ?>/cdr/cdr.php" class="text-white menu-text">CDR</a>
            <a href="<?= BASE_URL; ?>/administrador/administrador.php" class="text-white menu-text">Administrador</a>
            <a href="<?= BASE_URL; ?>/login.php" class="text-white menu-text">Sair</a>
          </div>



          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </header>

    <main role="main">
