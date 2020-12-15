<?php

require_once '../config/conexao.php';



if(!isset($_GET['acao'])) $acao="listar";
else $acao = $_GET['acao'];


/**
* Ação de listar
*/
if($acao == "listar"){
  $sql = "SELECT * FROM permissao";
  $query = $conn->query($sql);
  $registros = $query->fetch_all(MYSQLI_ASSOC);

  require_once '../template/cabecalho.php';
  require_once 'lista_permissao.php';
  require_once '../template/rodape.php';
}

/**
* Ação Novo
**/
else if($acao == "novo"){
  require_once '../template/cabecalho.php';
  require_once 'form_permissao.php';
  require_once '../template/rodape.php';
}

/**
* Ação Gravar
**/
else if($acao == "gravar"){
  $registro = $_POST;

  //var_dump($registro);
  $nome = $registro["nome"];
  $sql = "INSERT INTO permissao(nome) VALUES(:nome)";
  $query = $con->prepare($sql);
  $result = $query->execute($registro);

  if($result){

    echo "<script>alert('Permissão cadastrada com sucesso!')</script>";
    echo "<script>window.location.href='./permissao.php'</script>";
  }else{
    echo "Erro ao tentar inserir a Permissão!" .$nome;
  }
}

/**
* Ação Excluir
**/
else if($acao == "excluir"){
  $id= $_GET['id'];
// pesquisando para econtrar o NOME!
  $sql = "SELECT * FROM permissao WHERE id = :id";
  $query = $con->prepare($sql);
  $query->bindParam(':id', $id);

  $query->execute();
  $registro = $query->fetch();

// SQL para deletar!
  $sql = "DELETE FROM permissao WHERE id = :id";
  $query = $con->prepare($sql);

  $query->bindParam(':id', $id);

  $result = $query->execute();
  if($result){
    //header('Location: ./permissao.php');
    echo "<script>alert('Permissão removida com sucesso!')</script>";
    echo "<script>window.history.back();</script>";
  }else{
    echo "<script>alert('Erro ao tentar remover a Permissão: ".$registro["nome"]."')</script>";
    echo "<script>window.history.back();</script>";
  }
}
/**
* Ação Excluir
**/
else if($acao == "buscar"){
  $id= $_GET['id'];
  $sql = "SELECT * FROM permissao WHERE id = :id";
  $query = $con->prepare($sql);
  $query->bindParam(':id', $id);

  $query->execute();
  $registro = $query->fetch();


  require_once '../template/cabecalho.php';
  require_once 'form_permissao.php';
  require_once '../template/rodape.php';

}
/**
* Ação Atualizar
**/
else if($acao == "atualizar"){
  $sql = "UPDATE permissao SET nome = :nome WHERE id = :id";
  $query = $con->prepare($sql);

  $query->bindParam(':id', $_GET['id']);
  $query->bindParam(':nome', $_POST['nome']);
  $result = $query->execute();

  if($result){
    header('Location: ./permissao.php');
  }else{
    echo "Erro ao tentar atualizar os dados da Permissão";
  }
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
