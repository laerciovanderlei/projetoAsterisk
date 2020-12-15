<?php

require_once '../config/conexao.php';


if (!isset($_GET['acao'])) $acao = "listar";
else $acao = $_GET['acao'];

/**
 * Ação de listar
 */
 if ($acao == "listar") {

    require_once '../template/cabecalho.php';
    require_once 'lista_dashboard.php';
    require_once '../template/rodape.php';
}

?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
