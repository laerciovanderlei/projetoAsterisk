<?php

require_once '../config/conexao.php';
require('fpdf/fpdf.php');

class PDF extends FPDF
{
  // Page header
  function Header()
  {
      // Logo
      //$this->Image('logo.png',10,6,30);
      // Arial bold 15
      $this->SetFont('Arial','B',22);
      // Move to the right
      $this->Cell(80);
      // Title
      $this->Cell(30,10,'Relatorio de Ramais',0,0,'C');
      // Line break
      $this->Ln(20);
  }

  // Page footer
  function Footer()
  {
      // Position at 1.5 cm from bottom
      $this->SetY(-15);
      // Arial italic 8
      $this->SetFont('Arial','I',8);
      // Page number
      // $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
  }
}

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




  $pdf = new PDF('P','mm','A4');

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
