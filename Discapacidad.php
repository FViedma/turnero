<?php
require('fpdf185/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('img/descarga.jpg',10,8,8);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(17);
    // Título
    $this->Cell(5,5,'Ficha');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'http://hospitalviedma.org/',0,0,'C');

}
}

// Creación del objeto de la clase heredada
$time = time();
$fecha = time();
$pdf = new PDF('L', 'mm', array(70,70));
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->Ln(-16);
$pdf->Cell(15,0);
$pdf->Cell(0,8,''.date ( "j/n/20y - h:i:s" , $fecha ),0,1);
$pdf->SetFont('Times','',14);
$pdf->Ln(-2);
$pdf->Cell(15,0);
$pdf->Cell(0,8,'Bienvenido',0,1);
$pdf->SetFont('Arial', '', 40);
$pdf->Ln(5);
$pdf->Cell(11,2);
$pdf->Cell(0,8,'D-{nb}',0,1);
$pdf->SetFont('Times','',12);
$pdf->Ln(3);
$pdf->Cell(9,0);
$pdf->Output();
?>