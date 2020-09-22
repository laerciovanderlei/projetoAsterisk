<?php

require_once '../config/conexao.php';


if (!isset($_GET['acao'])) $acao = "listar";
else $acao = $_GET['acao'];

/**
 * Ação de listar
 */

 if ($acao == "listar") {
     $sql = "SELECT uniqueid, calldate, src, dst, clid, duration, clid, disposition FROM cdr";


    $query    = $con->query($sql);
    $registros = $query->fetchAll();

    require_once '../template/cabecalho.php';
    require_once 'lista_cdr.php';
    require_once '../template/rodape.php';
}

?>
