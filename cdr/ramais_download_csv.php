<?php

require_once '../config/conexao.php';

/**
 * Título CSV
 */
$array_titulo = array(
  '#',
  'Nome',
  'Ramal',
  'Senha',
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
r.id,
r.name,
r.username,
r.secret,
r.context,
g.nome AS grupo
FROM
ramais_sip r
INNER JOIN
  grupo g
  ON g.id = r.id_grupo
ORDER BY
r.name ASC");

while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
  fputcsv($output, array(
    $linha['id'],
    utf8_decode($linha['nome']),
    $linha['ramal'],
    $linha['senha'],
    utf8_decode($linha['grupo'])
  ), ';');
}
