<?php
    session_start(); //DEVE SER A PRIMEIRA LINHA
    $_SESSION['logado'] = 0; //Começa zerado para validação caso quando eu estiver logado vai constar como 1 e caso contrar zero, se zero vai para tela de login

    //Finaliza a sessão logado da Aplicação
    if(isset($_GET['acao']) && $_GET['acao']=="sair"){
        unset($_SESSION['logado']);
    }

    if(isset($_POST)){
        require_once './config/conexao.php';
        $sql   = "SELECT * FROM usuario WHERE usuario = :usuario AND senha = :senha";
        $query = $con->prepare($sql);
        $query->bindParam('usuario', $_POST['usuario']);

        //Colocar a senha como md5 utilizando a função md5()
        if(isset($_POST['usuario']) && isset($_POST['senha'])){
          $senha = md5($_POST['senha']);

          $query->bindParam('senha', $senha);
          $query->execute();
          if($query->rowCount()==1){
              $usuario = $query->fetch();
              $_SESSION['logado'] = array("nome"=>$usuario['nome'], 'id'=>$usuario['id']);
              header('Location: index.php');
          }else{
              $msg = "Usuário ou senha não conferem";
          }
        }
    }
 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Login da Aplicação</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">


    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="./template/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form action="login.php" method="post" class="form-signin">
      <?php if (isset($msg)) { ?>
        <div class="alert alert-danger" role="alert">
          <?= $msg; ?>
        </div>
      <?php } ?>
      <img class="mb-4" src="/projetoAsterisk/template/Asterisk_Logo.png">
      <h1 class="h3 mb-3 font-weight-normal">Informe seus dados</h1>
      <label for="inputUsuario" class="sr-only">Usuario</label>
      <input name="usuario" type="usuario" id="inputUsuario" class="form-control" placeholder="Usuario" required autofocus>
      <label for="inputPassword" class="sr-only">Senha</label>
      <input name="senha" type="password" id="inputPassword" class="form-control" placeholder="Senha" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
      <p class="mt-5 mb-3 text-muted">&copy; Projeto Integrador II 2020 - CAMPUS CASCA - UPF</p>
    </form>
  </body>
</html>
