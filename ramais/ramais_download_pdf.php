<?php

require_once '../config/conexao.php';
require('fpdf/fpdf.php');

$Colunas = ['#', 'Nome', 'Ramal', 'Senha', 'Permissão', 'Grupo']; //Titulos das Colunas


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


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',11); //Define a Fonte, B de Bold (Negrito) e o Tamanho da Fonte

foreach ($Colunas as $Coluna) {
        $pdf->Cell(38, 12, $Coluna, 1); //Define a Largura, Altura e o Conteudo da Celula
    }

while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
	$pdf->Ln();
	foreach($row as $column)
		$pdf->Cell(38,8,$column,1); //Define a Largura, Altura e o Conteudo da Celula
}
$pdf->Output();
