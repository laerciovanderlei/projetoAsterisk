<?php

require_once '../config/conexao.php';

if (!isset($_GET['acao'])) $acao = "listar";
else $acao = $_GET['acao'];

/**
* Ação de listar
*/
if ($acao == "listar") {
  $sql = "SELECT
  r.id,
  r.callerid,
  r.username,
  r.secret,
  r.context,
  r.ipaddr,
  g.nome AS grupo,
  p.nome as permissao
  FROM
  ramais_sip r
  LEFT JOIN
  grupo g
  ON g.id = r.id_grupo
  LEFT JOIN permissao p
  ON p.id = r.id_permissao
  ORDER BY
  r.name ASC";

  $query    = $con->query($sql);
  $registros = $query->fetchAll();

  require_once '../template/cabecalho.php';
  require_once 'lista_ramais.php';
  require_once '../template/rodape.php';
}

/**
* Ação Novo
**/
else if ($acao == "novo") {

  $lista_grupo = getGrupos();
  $lista_permissao = getPermissao();

  require_once '../template/cabecalho.php';
  require_once 'form_ramais.php';
  require_once '../template/rodape.php';
}

/**
* Ação Gravar
**/
else if ($acao == "gravar") {
  $registro = $_POST;

  //var_dump($registro);
  $sql = "INSERT INTO ramais_sip(callerid, name, username, secret, id_permissao, id_grupo) VALUES(:callerid, :name, :username, :secret, :id_permissao, :id_grupo)";

  $query  = $con->prepare($sql);
  $result = $query->execute($registro);
  if ($result) {
//Colocar a mensagem aqui para o alerta
    // header('Location: ./ramais.php');
    echo "<script>alert('Ramal cadastrado com sucesso!')</script>";
    echo "<script>window.location.href='./ramais.php'</script>";
  } else {
    echo "Erro ao tentar inserir o ramal" . print_r($query->errorInfo());
  }
}

/**
* Ação Excluir
**/
else if ($acao == "excluir") {
  $id    = $_GET['id'];
  $sql   = "DELETE FROM ramais_sip WHERE id = :id";
  $query = $con->prepare($sql);

  $query->bindParam(':id', $id);

  $result = $query->execute();
  if ($result) {
    //header('Location: ./ramais.php');
    echo "<script>alert('Ramal removido com sucesso!')</script>";
    echo "<script>window.history.back();</script>";
  } else {
    echo "Erro ao tentar remover o ramal de id: " . $id;
  }
}

/**
* Ação Atualizar
**/
else if ($acao == "buscar") {
  $lista_grupo = getGrupos();
  $lista_permissao = getPermissao();
  $id          = $_GET['id'];
  $sql         = "SELECT * FROM ramais_sip WHERE id = :id";
  $query       = $con->prepare($sql);
  $query->bindParam(':id', $id);

  $query->execute();
  $registro = $query->fetch();

  // var_dump($registro); exit;

  require_once '../template/cabecalho.php';
  require_once 'form_ramais.php';
  require_once '../template/rodape.php';
}

/**
* Ação Atualizar
**/
else if ($acao == "atualizar") {
  $sql = "UPDATE ramais_sip
  SET callerid = :callerid,
  name = :name,
  secret = :secret,
  id_permissao = :id_permissao,
  id_grupo = :id_grupo
  WHERE id = :id";

  $query = $con->prepare($sql);
  $query->bindParam(':id', $_GET['id']);
  $query->bindParam(':callerid', $_POST['callerid']);
  $query->bindParam(':name', $_POST['name']);
  $query->bindParam(':secret', $_POST['secret']);
  $query->bindParam(':id_permissao', $_POST['id_permissao']);
  $query->bindParam(':id_grupo', $_POST['id_grupo']);
  $result = $query->execute();
  if ($result) {
    header('Location: ./ramais.php');
  } else {
    echo "Erro ao tentar atualizar os dados" . print_r($query->errorInfo());
  }
}

//função que retorna a lista de grupos cadastrados no banco
function getGrupos()
{
  $sql         = "SELECT * FROM grupo";
  $query       = $GLOBALS['con']->query($sql);
  $lista_grupo = $query->fetchAll();
  return $lista_grupo;
}

//função que retorna a lista de Permissão cadastrados no banco
function getPermissao()
{
  $sql         = "SELECT * FROM permissao";
  $query       = $GLOBALS['con']->query($sql);
  $lista_permissao = $query->fetchAll();
  return $lista_permissao;
}



?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>

<script>
$(document).ready(function() {
  $('.dataTables').DataTable({
    "language": {
      "decimal": ",",
      "thousands": ".",
      "lengthMenu": "Mostrar _MENU_ resultados",
      "zeroRecords": "Nenhum resultado encontrado.",
      "info": "Página _PAGE_ de _PAGES_",
      "infoEmpty": "Não existem registros.",
      "infoFiltered": "",
      "search": "Pesquisar:",
      "paginate": {
        "previous": "Anterior",
        "next": "Próximo"
      }
    },
  });
});
</script>
