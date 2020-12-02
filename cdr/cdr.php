<?php

require_once '../config/conexao.php';

/**
* Requests
*/
if (!isset($_GET['acao'])) $acao = "listar";
else $acao = $_GET['acao'];

if(isset($_GET['pesquisa'])){
  $pesquisa = $_GET['pesquisa'];
}else{
  $pesquisa = "";
}

/**
* Ação de listar
*/

if ($acao == "listar") {
  /**
  * Se a variável `$pesquisa` tiver algum resultado, realiza a pesquisa com base
  * nesta variável
  */
  $sql_pesquisa = "";

  if($pesquisa != ""){
    $sql_pesquisa = "WHERE disposition = '".$pesquisa."' ";
  }

  $sql = "SELECT calldate, src, dst, clid, duration, billsec, clid, disposition FROM cdr $sql_pesquisa ORDER BY calldate DESC";


  $query    = $con->query($sql);
  $registros = $query->fetchAll();

  require_once '../template/cabecalho.php';
  require_once 'lista_cdr.php';
  require_once '../template/rodape.php';
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
    "order": [
      [0, "desc"]
    ],
  });
});
</script>
