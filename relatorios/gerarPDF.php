<?php

include './fpdf/fpdf.php';
require_once '../config/conexao.php';

$ramais = selectAllRamais();

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(190,10,utf8_decode('Relatório de Ramais'),0,0,"C");
$pdf->Ln(15);

$pdf->SetFont("Arial","I",10);
$pdf->Cell(50,7,"Nome",1,0,"C");
$pdf->Cell(40,7,"Ramal",1,0,"C");
$pdf->Cell(40,7,"Grupo",1,0,"C");
$pdf->Ln();

foreach ($ramais as $ramais){
    $pdf->Cell(50,7,utf8_decode($ramais["nome"]),1,0,"C");
    $pdf->Cell(40,7,  formatoData($ramais["ramal"]),1,0,"C");
    $pdf->Cell(40,7,$ramais["grupo"],1,0,"C");
    $pdf->Ln();
}

$pdf->Output();
