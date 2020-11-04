<?php

require_once '../config/conexao.php';

/**
* Título CSV
*/
$array_titulo = array(
  'Nome',
  'Ramal',
  'Permissão',
  'Grupo'
);

// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header("Content-Disposition: attachment; filename=relatorio.csv");

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, $array_titulo, ';');


$consulta = $con->query("SELECT
  r.callerid,
  r.username,
  p.nome as permissao,
  g.nome AS grupo
  FROM
  ramais_sip r
  LEFT JOIN
  grupo g
  ON g.id = r.id_grupo
  LEFT JOIN permissao p
  ON p.id = r.id_permissao
  ORDER BY
  r.name ASC")
  ;

  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    fputcsv($output, array(
      utf8_decode(
        $linha['callerid']),
        $linha['username'],
        $linha['permissao'],
        utf8_decode($linha['grupo'])
      ), ';');
    }
