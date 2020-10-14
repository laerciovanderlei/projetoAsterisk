<?php

require_once '../config/conexao.php';


if (!isset($_GET['acao'])) $acao = "listar";
else $acao = $_GET['acao'];

/**
 * Ação de listar
 */

 // if ($acao == "listar") {
 //     $sql = "SELECT calldate, src, dst, clid, duration, billsec, clid, disposition FROM cdr ORDER BY calldate DESC";
 //
 //
 //    $query    = $con->query($sql);
 //    $registros = $query->fetchAll();

    require_once '../template/cabecalho.php';
    require_once 'lista_dashboard.php';
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
        });
    });
</script>
