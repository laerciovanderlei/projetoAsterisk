<?php

require_once '../config/conexao.php';
require('fpdf/fpdf.php');

$Colunas = ['Nome', 'Ramal', 'Permissão', 'Grupo']; //Titulos das Colunas


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



// SELECT
// -- r.id,
// r.callerid,
// r.username,
// -- r.secret,
// r.context,
// g.nome AS grupo
// FROM
// ramais_sip r
// INNER JOIN
//   grupo g
//   ON g.id = r.id_grupo
// ORDER BY
// r.name ASC");


$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

$pdf->SetFont('Arial','B',11); //Define a Fonte, B de Bold (Negrito) e o Tamanho da Fonte

foreach ($Colunas as $Coluna) {
        $pdf->Cell(38, 12, utf8_decode($Coluna), 1); //Define a Largura, Altura e o Conteudo da Celula
    }

while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
	$pdf->Ln();
	foreach($row as $column)
		$pdf->Cell(38,8,$column,1); //Define a Largura, Altura e o Conteudo da Celula
}

$pdf->Output();
