<?php

require_once '../config/conexao.php';



if(!isset($_GET['acao'])) $acao="listar";
else $acao = $_GET['acao'];


/**
* Ação de listar
*/
if($acao=="listar"){
  $sql   = "SELECT * FROM grupo";
  $query = $conn->query($sql);

  //$registros = $query->fetchAll();
  $registros = $query->fetch_all(MYSQLI_ASSOC);

  require_once '../template/cabecalho.php';
  require_once 'lista_grupo.php';
  require_once '../template/rodape.php';
}


/**
* Ação Novo
**/
else if($acao == "novo"){
  require_once '../template/cabecalho.php';
  require_once 'form_grupo.php';
  require_once '../template/rodape.php';
}
/**
* Ação Gravar
**/
else if($acao == "gravar"){
  $registro = $_POST;

  //var_dump($registro);
  $nome = $registro["nome"];
  $sql = "INSERT INTO grupo(nome) VALUES(:nome)";
  $query = $con->prepare($sql);
  $result = $query->execute($registro);

  if ($result){
    header('Location: ./grupo.php');
  } else {
    echo "Erro ao tentar inserir o Grupo: " .$nome;
  }
}

/**
* Ação Excluir
**/
else if($acao == "excluir"){
  $id= $_GET['id'];
  $sql   = "DELETE FROM grupo WHERE id = :id";
  $query = $con->prepare($sql);

  $query->bindParam(':id', $id);

  $result = $query->execute();
  if($result){
    header('Location: ./grupo.php');
  }else{
    echo "Erro ao tentar remover o grupo de id: " . $id;
  }
}
/**
* Ação Excluir
**/
else if($acao == "buscar"){
  $id= $_GET['id'];
  $sql   = "SELECT * FROM grupo WHERE id = :id";
  $query = $con->prepare($sql);
  $query->bindParam(':id', $id);

  $query->execute();
  $registro = $query->fetch();

  // var_dump($registro); exit;

  require_once '../template/cabecalho.php';
  require_once 'form_grupo.php';
  require_once '../template/rodape.php';

}
/**
* Ação Atualizar
**/
else if($acao == "atualizar"){
  $sql   = "UPDATE grupo SET nome = :nome WHERE id = :id";
  $query = $con->prepare($sql);

  $query->bindParam(':id', $_GET['id']);
  $query->bindParam(':nome', $_POST['nome']);
  $result = $query->execute();



  if($result){
    header('Location: ./grupo.php');
  }else{
    echo "Erro ao tentar atualizar os dados do grupo";
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
