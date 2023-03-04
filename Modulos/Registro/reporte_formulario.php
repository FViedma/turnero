<?php
include "conexion.php";

require('lib/fpdf.php');

class PDF extends FPDF
{
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->SetTextColor(90, 90, 90);
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '', 0, 0, 'L');
    }

    function Header()
    {
        $this->Image('img/123.png', 20, 8, 20);

        $this->SetFont('Arial', 'B', 12);
        $this->SetTextColor(90, 90, 90);
        $this->Cell(0, 10, utf8_decode("FORMULARIO CONTRAREFERENCIA"), 0, 0, 'C');
        $this->Ln(6);
        $this->Cell(0, 10, utf8_decode("D7a"), 0, 0, 'C');
        $this->Ln(4);

        $this->SetFont('Arial', 'B', 8);
        $this->SetTextColor(90, 90, 90);

        $this->SetFont('Arial', 'B', 8);
        $this->SetTextColor(90, 90, 90);
        include "conexion.php";
        $consulta = "SELECT * FROM contraref1";
        if(isset($_POST['reimpresion'])){
            $ci = $_POST['ci'];
            $fecha=$_POST['fecha_formulario'];
            $consulta=sprintf("SELECT * FROM contraref WHERE ci=%d AND fecha_registro='%s'", $ci,$fecha);
        } 
        //En una variable guardamos el array que regresa el método
        $res = mysqli_query($conexion, $consulta);

        date_default_timezone_set("America/La_Paz");
        while ($datos = mysqli_fetch_assoc($res)) {
            if(isset($datos['id_contraref'])){
                $nro_contraref = $datos['id_contraref'];
            } else {
                $nro_contraref=$datos['id_contraref1'];
            }
            $this->Cell(0, 10, utf8_decode("N° CONTRAREFERENCIA:" . $nro_contraref), 0, 0, 'R');
        }


        $Object = new DateTime();
        $fech = $Object->format("d-m-Y h:i:s a");

        $this->ln();
        $this->Cell(0, 5, utf8_decode("FORMULARIO D7a CONTRAREFERENCIA"), 0, 0, 'C');
        $this->Cell(0, 5, utf8_decode("Fecha y Hora: " . $fech), 0, 0, 'R');
        $this->Ln(5);
    }
}

$pdf = new PDF('P', 'mm', 'Letter');
$pdf->SetMargins(15, 10);
$pdf->AliasNbPages();
$pdf->AddPage();


/*---------------------PRIMERA INFO----------------------------*/
$consulta = "SELECT * FROM contraref1";
if(isset($_POST['reimpresion'])){
    $ci = $_POST['ci'];
    $fecha=$_POST['fecha_formulario'];
    $consulta=sprintf("SELECT * FROM contraref WHERE ci=%d AND fecha_registro='%s'", $ci,$fecha);
}
//En una variable guardamos el array que regresa el método
$res = mysqli_query($conexion, $consulta);


while ($datos = mysqli_fetch_assoc($res)) {
    $pdf->SetFont('Arial', 'B', 7);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->Cell(0, 3, utf8_decode("DATOS DEL ESTABLECIMIENTO DE SALUD AL QUE SE CONTRAREFIERE(C1)"), 0, 0, 'C', TRUE);

    $pdf->Ln(2);
    $pdf->SetFont('Arial', 'B', 6);
    $pdf->SetTextColor(90, 90, 90);
    $pdf->Cell(40, 5, utf8_decode("NOMBRE DEL ESTABLECIMIENTO:"), 0, 0, 'C');
    $pdf->Cell(35, 5, utf8_decode($datos['establecimiento_salud']), 0, 0, 'C');

    $pdf->Cell(5, 5, utf8_decode("SERVICIO:"), 0, 0, 'C');
    $pdf->Cell(48, 5, utf8_decode($datos['Servicio']), 0, 0, 'C');

    $pdf->Cell(5, 5, utf8_decode("RED DE SALUD:"), 0, 0, 'C');
    $pdf->Cell(35, 5, utf8_decode($datos['red_salud']), 0, 0, 'C');


    $pdf->Ln(2);
    $pdf->Cell(16, 5, utf8_decode("MUNICIPIO:"), 0, 0, 'C');
    $pdf->Cell(35, 5, utf8_decode($datos['municipio']), 0, 0, 'C');

    $pdf->Cell(18, 5, utf8_decode("TELEFONO DE CONTACTO:"), 0, 0, 'C');
    $pdf->Cell(35, 5, utf8_decode($datos['telefono_contacto']), 0, 0, 'C');

    $pdf->Cell(5, 5, utf8_decode("NIVEL DE EESS:"), 0, 0, 'C');
    $pdf->Cell(35, 5, utf8_decode($datos['nivel_eess_c1']), 0, 0, 'C');
    $pdf->Ln(4);
    /*(C2)*/

    $pdf->SetFont('Arial', 'B', 7);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->Cell(0, 3, utf8_decode("IDENTIFICACION DEL PACIENTE (C2)"), 0, 0, 'C', TRUE);
    $pdf->Ln(2);
    $pdf->SetFont('Arial', 'B', 6);
    $pdf->SetTextColor(90, 90, 90);
    $pdf->Cell(30, 5, utf8_decode("NOMBRES Y APELLIDOS:"), 0, 0, 'C');
    $pdf->Cell(68, 5, utf8_decode($datos['paciente']), 0, 0, 'C');

    $pdf->Cell(5, 5, utf8_decode("CI:"), 0, 0, 'C');
    $pdf->Cell(35, 5, utf8_decode($datos['ci']), 0, 0, 'C');

    $pdf->Cell(5, 5, utf8_decode("DOMICILIO:"), 0, 0, 'C');
    $pdf->Cell(35, 5, utf8_decode($datos['domicilio']), 0, 0, 'C');

    $pdf->Ln(2);
    $pdf->Cell(14.5, 5, utf8_decode("TEL / CEL:"), 0, 0, 'C');
    $pdf->Cell(35, 5, utf8_decode($datos['tel_cel']), 0, 0, 'C');

    $pdf->Cell(18, 5, utf8_decode("EDAD:"), 0, 0, 'C');
    $pdf->Cell(35, 5, utf8_decode($datos['edad']), 0, 0, 'C');

    $pdf->Cell(5, 5, utf8_decode("SEXO:"), 0, 0, 'C');
    $pdf->Cell(35, 5, utf8_decode($datos['sexo']), 0, 0, 'C');

    $pdf->Ln(2);
    $pdf->Cell(37.5, 5, utf8_decode("PERSONA CON DISCAPACIDAD:"), 0, 0, 'C');
    $pdf->Cell(48, 5, utf8_decode($datos['per_disc']), 0, 0, 'C');

    $pdf->Cell(18, 5, utf8_decode("TIPO DE DISCAPACIDAD:"), 0, 0, 'C');
    $pdf->Cell(35, 5, utf8_decode($datos['tipo_disc']), 0, 0, 'C');

    $pdf->Cell(5, 5, utf8_decode("GRADO DE DISCAPACIDAD:"), 0, 0, 'C');
    $pdf->Cell(35, 5, utf8_decode($datos['grado_disc']), 0, 0, 'C');
    /*(C3)*/
    $pdf->Ln(4);
    $pdf->SetFont('Arial', 'B', 7);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->Cell(0, 3, utf8_decode("DATOS CLINICOS DE ALTA (C3)"), 0, 0, 'C', TRUE);
    $pdf->Ln(2);
    $pdf->SetFont('Arial', 'B', 6);
    $pdf->SetTextColor(90, 90, 90);
    $pdf->Cell(28.5, 5, utf8_decode("DIAS DE INTERNACION:"), 0, 0, 'C');
    $pdf->Cell(35, 5, utf8_decode($datos['dias_inter']), 0, 0, 'C');

    $pdf->Cell(20, 5, utf8_decode("PESO:"), 0, 0, 'C');
    $pdf->Cell(35, 5, utf8_decode($datos['peso']), 0, 0, 'C');

    $pdf->Cell(20, 5, utf8_decode("I.M.C.:"), 0, 0, 'C');
    $pdf->Cell(35, 5, utf8_decode($datos['imc']), 0, 0, 'C');
    $pdf->Ln(2);
    $pdf->Cell(20.5, 5, utf8_decode("TEMPERATURA:"), 0, 0, 'C');
    $pdf->Cell(35, 5, utf8_decode($datos['temperatura']), 0, 0, 'C');

    $pdf->Cell(20, 5, utf8_decode("PRESION ARTERIAL:"), 0, 0, 'C');
    $pdf->Cell(35, 5, utf8_decode($datos['presion_arterial']), 0, 0, 'C');

    $pdf->Cell(20, 5, utf8_decode("FRECUENCIA CARDIACA:"), 0, 0, 'C');
    $pdf->Cell(35, 5, utf8_decode($datos['frecuencia_cardiaca']), 0, 0, 'C');
    $pdf->Ln(2);
    $pdf->Cell(35.5, 5, utf8_decode("FRECUENCIA RESPIRATORIA:"), 0, 0, 'C');
    $pdf->Cell(35, 5, utf8_decode($datos['frecuencia_respiratoria']), 0, 0, 'C');

    $pdf->Cell(20, 5, utf8_decode("SATURACION DE OXIGENO:"), 0, 0, 'C');
    $pdf->Cell(35, 5, utf8_decode($datos['saturación_de_oxígeno']), 0, 0, 'C');

    /*(C4)*/
    $pdf->Ln(4);
    $pdf->SetFont('Arial', 'B', 7);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->Cell(0, 3, utf8_decode("DIAGNOSTICO(S) DE INGRESO (C4):"), 0, 0, 'C', TRUE);
    $pdf->Ln(2);


    $pdf->SetFont('Arial', 'B', 6);
    $pdf->SetTextColor(90, 90, 90);
    $pdf->Cell(8, 5, utf8_decode("1)"), 0, 0, 'C');
    $pdf->Cell(90, 5, utf8_decode($datos['diagnostico_ingr1']), 0, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode("CIE - 10"), 0, 0, 'C');
    $pdf->Cell(35, 5, utf8_decode($datos['cie1']), 0, 0, 'C');
    $pdf->Ln(2);
    $pdf->Cell(8, 5, utf8_decode("2)"), 0, 0, 'C');
    $pdf->Cell(90, 5, utf8_decode($datos['diagnostico_ingr2']), 0, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode("CIE - 10"), 0, 0, 'C');
    $pdf->Cell(35, 5, utf8_decode($datos['cie2']), 0, 0, 'C');
    $pdf->Ln(2);
    $pdf->Cell(8, 5, utf8_decode("3)"), 0, 0, 'C');
    $pdf->Cell(90, 5, utf8_decode($datos['diagnostico_ingr3']), 0, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode("CIE - 10"), 0, 0, 'C');
    $pdf->Cell(35, 5, utf8_decode($datos['cie3']), 0, 0, 'C');
    $pdf->Ln(2);
    $pdf->Cell(8, 5, utf8_decode("4)"), 0, 0, 'C');
    $pdf->Cell(90, 5, utf8_decode($datos['diagnostico_ingr4']), 0, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode("CIE - 10"), 0, 0, 'C');
    $pdf->Cell(35, 5, utf8_decode($datos['cie4']), 0, 0, 'C');
    $pdf->Ln(4);

    /*(C5)*/
    $pdf->SetFont('Arial', 'B', 7);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->Cell(0, 3, utf8_decode("DIAGNOSTICO (S) DE EGRESO SEGUN CIE-10 (C5):"), 0, 0, 'C', TRUE);
    $pdf->Ln(2);


    $pdf->SetFont('Arial', 'B', 6);
    $pdf->SetTextColor(90, 90, 90);
    $pdf->Cell(8, 5, utf8_decode("1)"), 0, 0, 'C');
    $pdf->Cell(90, 5, utf8_decode($datos['diagnostico_egr1']), 0, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode("CIE - 10"), 0, 0, 'C');
    $pdf->Cell(35, 5, utf8_decode($datos['cie5']), 0, 0, 'C');
    $pdf->Ln(2);
    $pdf->Cell(8, 5, utf8_decode("2)"), 0, 0, 'C');
    $pdf->Cell(90, 5, utf8_decode($datos['diagnostico_egr2']), 0, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode("CIE - 10"), 0, 0, 'C');
    $pdf->Cell(35, 5, utf8_decode($datos['cie6']), 0, 0, 'C');
    $pdf->Ln(2);
    $pdf->Cell(8, 5, utf8_decode("3)"), 0, 0, 'C');
    $pdf->Cell(90, 5, utf8_decode($datos['diagnostico_egr3']), 0, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode("CIE - 10"), 0, 0, 'C');
    $pdf->Cell(35, 5, utf8_decode($datos['cie7']), 0, 0, 'C');
    $pdf->Ln(2);
    $pdf->Cell(8, 5, utf8_decode("4)"), 0, 0, 'C');
    $pdf->Cell(90, 5, utf8_decode($datos['diagnostico_egr4']), 0, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode("CIE - 10"), 0, 0, 'C');
    $pdf->Cell(35, 5, utf8_decode($datos['cie8']), 0, 0, 'C');
    $pdf->Ln(2);
    $pdf->SetFont('Arial', 'B', 6);
    $pdf->Ln(2);
    /*(C6)*/
    $pdf->SetFont('Arial', 'B', 7);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->Cell(0, 3, utf8_decode("EVOLUCION, COMPLICACIONES (C6):"), 0, 0, 'C', TRUE);
    $pdf->Ln(2);
    $pdf->SetFont('Arial', 'B', 6);
    $pdf->SetTextColor(90, 90, 90);
    $pdf->Cell(170, 5, utf8_decode($datos['evolu_compli']), 0, 0, 'C');
    $pdf->Ln(12);

    $pdf->SetFont('Arial', 'B', 7);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->Cell(0, 3, utf8_decode("EXAMENES COMPLEMENTARIOS DE DIAGNOSTICO (C7):"), 0, 0, 'C', TRUE);
    $pdf->Ln(2);
    $pdf->SetFont('Arial', 'B', 6);
    $pdf->SetTextColor(90, 90, 90);
    $pdf->Cell(170, 5, utf8_decode($datos['exam_comple']), 0, 0, 'C');

    $pdf->Ln(12);

    $pdf->SetFont('Arial', 'B', 7);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->Cell(0, 3, utf8_decode("OTROS EXAMENES E INTERCONSULTAS (C8):"), 0, 0, 'C', TRUE);
    $pdf->Ln(2);
    $pdf->SetFont('Arial', 'B', 6);
    $pdf->SetTextColor(90, 90, 90);
    $pdf->Cell(170, 5, utf8_decode($datos['otros_exam_iter']), 0, 0, 'C');
    $pdf->Ln(12);

      $pdf->SetFont('Arial','B',7);
      $pdf->SetTextColor(255,255,255);
      $pdf->Cell(0,3,utf8_decode("TRATAMIENTOS REALIZADOS (C9):"),0,0,'C',TRUE);
      $pdf->Ln(2);
      $pdf->SetFont('Arial','B',6);
      $pdf->SetTextColor(90,90,90);
       $pdf->Cell(170,5,utf8_decode($datos['tratamiento_rea']),0,0,'C');
      $pdf->Ln(12);
  
      $pdf->SetFont('Arial','B',7);
      $pdf->SetTextColor(255,255,255);
      $pdf->Cell(0,3,utf8_decode("RECOMENDACIONES PARA EL PACIENTE (C10):"),0,0,'C',TRUE);
      $pdf->Ln(4);
      $pdf->SetFont('Arial','B',6);
      $pdf->SetTextColor(90,90,90);
       $pdf->Cell(170,5,utf8_decode($datos['recom_pac']),0,0,'C');
  
       $pdf->Ln(12);
  
       $pdf->SetFont('Arial','B',7);
      $pdf->SetTextColor(255,255,255);
      $pdf->Cell(0,3,utf8_decode("OTROS ANEXOS O ESTUDIO PENDIENTES (C11):"),0,0,'C',TRUE);
      $pdf->Ln(4);
      $pdf->SetFont('Arial','B',6);
      $pdf->SetTextColor(90,90,90);
       $pdf->Cell(170,5,utf8_decode($datos['otros_anexos']),0,0,'C');
  
       $pdf->Ln(12);
  
       $pdf->SetFont('Arial','B',7);
       $pdf->SetTextColor(255,255,255);
       $pdf->Cell(0,3,utf8_decode("OBSERVACIONES / RECOMENDACIONES A LA CONTRAREFERENCIA (C12):"),0,0,'C',TRUE);
       $pdf->Ln(4);
       $pdf->SetFont('Arial','B',6);
       $pdf->SetTextColor(90,90,90);
        $pdf->Cell(170,5,utf8_decode($datos['obs_recom']),0,0,'C');
   
        $pdf->Ln(12);
  
        $pdf->SetFont('Arial','B',7);
       $pdf->SetTextColor(255,255,255);
       $pdf->Cell(0,3,utf8_decode(" ESTABLECIMIENTOS DE SALUD AL QUE SE REALIZA A CONTRAREFERENCIA(C13):"),0,0,'C',TRUE);
       $pdf->Ln(2);
       $pdf->SetFont('Arial','B',6);
       $pdf->SetTextColor(90,90,90);
       $pdf->Cell(35,5,utf8_decode("ESTABLECIMIENTO DE SALUD:"),0,0,'C');
        $pdf->Cell(35,5,utf8_decode($datos['estable_salud']),0,0,'C');
  
        $pdf->Cell(10,5,utf8_decode("MUNICIPIO:"),0,0,'C');
        $pdf->Cell(35,5,utf8_decode($datos['municipio2']),0,0,'C');
    
        $pdf->Cell(5,5,utf8_decode("NIVEL DE EESS:"),0,0,'C');
        $pdf->Cell(35,5,utf8_decode($datos['nivel_eess2']),0,0,'C');
       $pdf->Ln(3);
  
       $pdf->Cell(19,5,utf8_decode("RED DE SALUD:"),0,0,'C');
        $pdf->Cell(45,5,utf8_decode($datos['red_salud2']),0,0,'C');
  
       $pdf->Cell(5,5,utf8_decode("SE CONTACTO AL ESTABLECIMIIENTO:"),0,0,'C');
       $pdf->Cell(48,5,utf8_decode($datos['secontac']),0,0,'C');
   
       $pdf->Cell(18,5,utf8_decode("POR TELESALUD:"),0,0,'C');
        $pdf->Cell(35,5,utf8_decode($datos['telesalud']),0,0,'C');
        $pdf->Ln(3);
  
        $pdf->Cell(81,5,utf8_decode("CONTACTO DEL ESTABLECIMIENTO QUE RECIBE LA CONTRAREFERENCIA:"),0,0,'C');
        $pdf->Cell(35,5,utf8_decode($datos['contacto_estable']),0,0,'C');
  
       
       $pdf->Ln(3);
       $pdf->Cell(56,5,utf8_decode("NOMBRE DEL ACOMPAÑANTE, FAMILIAR U OTROS:"),0,0,'C');
       $pdf->Cell(48,5,utf8_decode($datos['nombre_acompa']),0,0,'C');
       $pdf->Ln(11);
      ;
     
      
      $pdf->Cell(60,20,utf8_decode(''),1,0,'C');
      $pdf->Text(20,230,utf8_decode($datos['nombre_medico']));
      $pdf->Cell(60,20,utf8_decode(''),1,0,'C');
      $pdf->Cell(60,20,utf8_decode(''),1,0,'C');
      $pdf->setLineWidth(0.2);
      
      $pdf->Ln();
      $pdf->SetFont('Arial','B',6);
      $pdf->Cell(55,5,utf8_decode("NOMBRE Y FIRMA MEDICO QUE CONTRAREFIERE"),0,0,'C');
      $pdf->Cell(68,5,utf8_decode("SELLO MEDICO"),0,0,'C');
  
      $pdf->Cell(55,5,utf8_decode("FIRMA Y NOMBRE DE PACIENTE O ACOMPAÑANTE"),0,0,'C');
      $pdf->Ln(3);
      $pdf->SetFont('Arial','B',5);
  
      $pdf->Ln(7);
      $pdf->Ln(2);
      $pdf->SetFont('Arial','B',6);
      $pdf->Cell(30,5,utf8_decode("RECUERDE:"),0,0,'C');
      $pdf->Cell(100,5,utf8_decode("a) original, para el establecimiento de salud receptor - Expediente Clinico"),0,0,'C');
      $pdf->Ln(2);
      $pdf->Cell(182,5,utf8_decode("b) Copia 1, para el establecimiento de salud receptor - Comite de Referencia y Contrareferencia"),0,0,'C');
      $pdf->Ln(2);
      $pdf->Cell(135,5,utf8_decode("c) Copia 2, para tramites administrativos del SUS"),0,0,'C');
      $pdf->Ln(2);
      $pdf->Cell(166,5,utf8_decode("d) Copia 3, para el establecimiento que realiza la referencia - Expediente Clinico"),0,0,'C');
      $pdf->Ln(2);
      $pdf->Cell(169,5,utf8_decode("e) Copia 4, para el establecimiento que realiza la referencia - Comite de Referencia"),0,0,'C');
      $pdf->Ln(2);
    ;
   
    }

    $pdf->SetFillColor(255,255,0);
    $pdf->SetTextColor(90,90,90);
    $pdf->SetDrawColor(90,90,90);

    $pdf->setLineWidth(0.2);


    $pdf->ln(7);


    $pdf->SetFont('Arial','',7);
 	//$pdf->AddPage();
 	
 	$pdf->Ln(10);

    $pdf->setLineWidth(0.2);
    $pdf->line(10,245,200,245);
    
 	$pdf->Output();
    
?>
