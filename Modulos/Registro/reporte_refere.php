<?php
//$titulo="Administrar Grupo Empresas";
include "conexion.php";
//include('conexion/verificar_gestion.php');

/*------------------VERIFICAR QUE SEAL EL ADMINISTRADOR------------------------*/


/*----------------------FIN VERIFICACION------------------------------------*/

require('lib/fpdf.php');

class PDF extends FPDF
{
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->SetTextColor(90,90,90);
        $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'',0,0,'L');
    }

    function Header()
    {	
         $this->Image('img/123.png',20,8,20);
    
        $this->SetFont('Arial','B',12)
        ;
        $this->SetTextColor(90,90,90);
        $this->Cell(0,10,utf8_decode("FORMULARIO REFERENCIA"),0,0,'C');
        $this->Ln(6);
        $this->Cell(0,10,utf8_decode("D7b"),0,0,'C');
        $this->Ln(4);

        $this->SetFont('Arial','B',8);
        $this->SetTextColor(90,90,90);
        
       
        $this->SetFont('Arial','B',8);
        $this->SetTextColor(90,90,90);
        include "conexion.php";
        $consulta = "SELECT * FROM referen1 ";
        if(isset($_POST['reimpresion'])){
            $ci = $_POST['ci'];
            $fecha=$_POST['fecha_formulario'];
            $consulta=sprintf("SELECT * FROM referen WHERE ci=%d AND fecha='%s'", $ci,$fecha);
        }
    //En una variable guardamos el array que regresa el método
    $res = mysqli_query($conexion,$consulta) ;

    date_default_timezone_set("America/La_Paz");
    while ($datos = mysqli_fetch_assoc($res)) {
        if(isset($datos['id_referen1'])){
            $nro_referencia = $datos['id_referen1'];
        } else {
            $nro_referencia=$datos['id_referen'];
        }
        $this->Cell(0,10,utf8_decode("N° REFERENCIA:".$nro_referencia),0,0,'R');
        }

        
        $Object = new DateTime();  
        $fech = $Object->format("d-m-Y h:i:s a");
       
        $this->ln();
        $this->Cell(0,5,utf8_decode("FORMULARIO D7b REFERENCIA"),0,0,'C');
        $this->Cell(0,5,utf8_decode("Fecha y Hora: ".$fech),0,0,'R');
        $this->Ln(5);
    }
}

    $pdf=new PDF('P','mm','Letter');
    $pdf->SetMargins(15,10);
    $pdf->AliasNbPages();
    $pdf->AddPage();

   
    /*---------------------PRIMERA INFO----------------------------*/
    if(isset($_POST['reimpresion'])){
        $ci = $_POST['ci'];
        $fecha=$_POST['fecha_formulario'];
        $consulta=sprintf("SELECT * FROM referen WHERE ci=%d AND fecha='%s'", $ci,$fecha);
    } else {
        $consulta = "SELECT * FROM referen1 ";
    }
    //En una variable guardamos el array que regresa el método
    $res = mysqli_query($conexion,$consulta) ;


    while ($datos = mysqli_fetch_assoc($res)) {
    $pdf->SetFont('Arial','B',7);
    $pdf->SetTextColor(255,255,255);
     $pdf->Ln(1);
    $pdf->Cell(0,3,utf8_decode("DATOS DEL ESTABLECIMIENTO DE SALUD QUE REFIERE(C1)"),0,0,'C',true);
    $pdf->Ln(3.5);
    $pdf->SetFont('Arial','B',6);
    $pdf->SetTextColor(90,90,90);
    $pdf->Cell(55,5,utf8_decode("NOMBRE DEL ESTABLECIMIENTO QUE REFIERE:"),0,0,'C');
    $pdf->Cell(40,5,utf8_decode($datos['establecimiento_salud']),0,0,'C');

    
    $pdf->Cell(5,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(5,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(5,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(20,5,utf8_decode(""),0,0,'C');
  
    $pdf->Cell(45,15,utf8_decode('SELLO DEL EESS QUE REFIERE -->'),1,0,'R');
   
    
    $pdf->Ln(2);
    
    $pdf->Cell(21,5,utf8_decode("NIVEL DE EESS:"),0,0,'C');
    $pdf->Cell(48,5,utf8_decode($datos['nivel_eess_c1']),0,0,'C');

    $pdf->Cell(5,5,utf8_decode("RED DE SALUD:"),0,0,'C');
    $pdf->Cell(35,5,utf8_decode($datos['red_salud']),0,0,'C');
    $pdf->Ln(2);
    $pdf->Cell(11,5,utf8_decode("MUNICIPIO:"),0,0,'C');
     $pdf->Cell(35,5,utf8_decode($datos['municipio']),0,0,'C');

    $pdf->Cell(5,5,utf8_decode("FECHA:"),0,0,'C');
    $pdf->Cell(35,5,utf8_decode($datos['fecha']),0,0,'C');
    $pdf->Cell(5,5,utf8_decode("HORA:"),0,0,'C');
    $pdf->Cell(35,5,utf8_decode($datos['hora']),0,0,'C');
    $pdf->Ln(2);
    $pdf->Cell(18,5,utf8_decode("FECHA DE ENVIO:"),0,0,'C');
     $pdf->Cell(35,5,utf8_decode($datos['fecha_envio']),0,0,'C');

    $pdf->Cell(5,5,utf8_decode("HORA DE ENVIO:"),0,0,'C');
    $pdf->Cell(35,5,utf8_decode($datos['hora_envio']),0,0,'C');
    $pdf->Cell(5,5,utf8_decode("TEL/CEL DEL EESS:"),0,0,'C');
    $pdf->Cell(35,5,utf8_decode($datos['tel_eess']),0,0,'C');
    $pdf->Ln(10);
    /*(C2)*/
    
    $pdf->SetFont('Arial','B',7);
    $pdf->SetTextColor(255,255,255);
    $pdf->Cell(0,3,utf8_decode("IDENTIFICACION DEL PACIENTE(C2)"),0,0,'C',true);
    $pdf->Ln(2);
    $pdf->SetFont('Arial','B',6);
    $pdf->SetTextColor(90,90,90);
    $pdf->Cell(26,5,utf8_decode("NOMBRES Y APELLIDOS:"),0,0,'C');
     $pdf->Cell(68,5,utf8_decode($datos['paciente']),0,0,'C');

    $pdf->Cell(5,5,utf8_decode("FECHA DE NACIMIENTO:"),0,0,'C');
    $pdf->Cell(35,5,utf8_decode($datos['fecha_nacimiento']),0,0,'C');

    $pdf->Cell(5,5,utf8_decode("CI:"),0,0,'C');
    $pdf->Cell(35,5,utf8_decode($datos['ci']),0,0,'C');

    $pdf->Ln(2);
    $pdf->Cell(12,5,utf8_decode("DOMICILIO:"),0,0,'C');
    $pdf->Cell(35,5,utf8_decode($datos['domicilio']),0,0,'C');

    $pdf->Cell(18,5,utf8_decode("TEL/CEL:"),0,0,'C');
     $pdf->Cell(35,5,utf8_decode($datos['tel_cel']),0,0,'C');

    $pdf->Cell(5,5,utf8_decode("N° DE H.C.:"),0,0,'C');
    $pdf->Cell(35,5,utf8_decode($datos['nro_hist_clini']),0,0,'C');

    $pdf->Ln(2);
    
    $pdf->Cell(16,5,utf8_decode("PROCEDENCIA:"),0,0,'C');
    $pdf->Cell(48,5,utf8_decode($datos['procedencia']),0,0,'C');

    $pdf->Cell(18,5,utf8_decode("EDAD:"),0,0,'C');
     $pdf->Cell(35,5,utf8_decode($datos['edad']),0,0,'C');

    $pdf->Cell(5,5,utf8_decode("SEXO:"),0,0,'C');
    $pdf->Cell(35,5,utf8_decode($datos['sexo']),0,0,'C');
    $pdf->Ln(2);
    $pdf->Cell(32.8,5,utf8_decode("PERSONA CON DISCAPACIDAD:"),0,0,'C');
    $pdf->Cell(48,5,utf8_decode($datos['per_disc']),0,0,'C');

    $pdf->Cell(18,5,utf8_decode("TIPO DE DISCAPACIDAD:"),0,0,'C');
     $pdf->Cell(35,5,utf8_decode($datos['tipo_disc']),0,0,'C');

    $pdf->Cell(5,5,utf8_decode("GRADO DE DISCAPACIDAD:"),0,0,'C');
    $pdf->Cell(35,5,utf8_decode($datos['grado_disc']),0,0,'C');
    $pdf->Ln(2);
    $pdf->Cell(32,5,utf8_decode("NOMBRE DEL ACOMPAÑANTE:"),0,0,'C');
    $pdf->Cell(48,5,utf8_decode($datos['nombre_acompa']),0,0,'C');

    $pdf->Cell(18,5,utf8_decode("PARENTESCO:"),0,0,'C');
     $pdf->Cell(35,5,utf8_decode($datos['parentesco']),0,0,'C');

    $pdf->Cell(5,5,utf8_decode("TEL/CEL ACOMP.:"),0,0,'C');
    $pdf->Cell(35,5,utf8_decode($datos['tel_paren']),0,0,'C');
    $pdf->Ln(4);

    $pdf->SetFont('Arial','B',7);
    $pdf->SetTextColor(255,255,255);
    $pdf->Cell(0,3,utf8_decode("DATOS CLINICOS Y SIGNOS VITALES(C3)"),0,0,'C',TRUE);
    $pdf->Ln(2);
    $pdf->SetFont('Arial','B',6);
    $pdf->SetTextColor(90,90,90);
    $pdf->Cell(5,5,utf8_decode("F.C.:"),0,0,'C');
    $pdf->Cell(35,5,utf8_decode($datos['frecuencia_cardiaca']),0,0,'C');

    $pdf->Cell(20,5,utf8_decode("F.R.:"),0,0,'C');
    $pdf->Cell(35,5,utf8_decode($datos['frecuencia_respiratoria']),0,0,'C');

    $pdf->Cell(20,5,utf8_decode("P.A.:"),0,0,'C');
    $pdf->Cell(35,5,utf8_decode($datos['presion_arterial']),0,0,'C');
    $pdf->Ln(2);
    $pdf->Cell(17,5,utf8_decode("TEMPERATURA:"),0,0,'C');
    $pdf->Cell(35,5,utf8_decode($datos['temperatura']),0,0,'C');

    $pdf->Cell(20,5,utf8_decode("PESO:"),0,0,'C');
    $pdf->Cell(35,5,utf8_decode($datos['peso']),0,0,'C');

    $pdf->Cell(20,5,utf8_decode("TALLA:"),0,0,'C');
    $pdf->Cell(35,5,utf8_decode($datos['talla']),0,0,'C');
    $pdf->Ln(2);
    $pdf->Cell(12,5,utf8_decode("GLASGOW:"),0,0,'C');
    $pdf->Cell(35,5,utf8_decode($datos['glasgow']),0,0,'C');

    $pdf->Cell(20,5,utf8_decode("SPO2:"),0,0,'C');
    $pdf->Cell(35,5,utf8_decode($datos['spo2']),0,0,'C');
    $pdf->Cell(20,5,utf8_decode("I.M.C.:"),0,0,'C');
    $pdf->Cell(35,5,utf8_decode($datos['imc']),0,0,'C');
    $pdf->Ln(4);
    $pdf->SetFont('Arial','B',7);
    $pdf->SetTextColor(255,255,255);
    $pdf->Cell(0,3,utf8_decode("RESUMEN DE ANAMNESIS Y EXAMEN FISICO(C4):"),0,0,'C',TRUE);
    $pdf->Ln(2);


    $pdf->SetFont('Arial','B',6);
    $pdf->SetTextColor(90,90,90);
    $pdf->Cell(23,5,utf8_decode("ESTUVO INTERNADO)"),0,0,'C');
    $pdf->Cell(100,5,utf8_decode($datos['internado']),0,0,'C');
    $pdf->Cell(1,5,utf8_decode("DIAS DE INTERNACION"),0,0,'C');
    $pdf->Cell(35,5,utf8_decode($datos['dias_inter']),0,0,'C');
    $pdf->Ln(2);
    $pdf->Cell(22,5,utf8_decode("FECHA DE INGRESO"),0,0,'C');
    $pdf->Cell(35,5,utf8_decode($datos['fecha_ingreso']),0,0,'C');
    $pdf->Ln(2);
    $pdf->Cell(1,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(155,5,utf8_decode($datos['o_tros']),0,0,'L');
    $pdf->Ln(10);
    $pdf->SetFont('Arial','B',9);
/*(C5)*/
    $pdf->SetFont('Arial','B',7);
    $pdf->SetTextColor(255,255,255);
    $pdf->Cell(0,3,utf8_decode("REALIZO EXAMENES COMPLEMENTARIOS DE DIAGNOSTICO(C5):"),0,0,'C',TRUE);
    $pdf->Ln(2);
    $pdf->SetFont('Arial','B',6);
    $pdf->SetTextColor(90,90,90);
    $pdf->Cell(19,5,utf8_decode("EXAMEN COMPL."),0,0,'C');
    $pdf->Cell(80,5,utf8_decode("DESCRIPCION DE HALLASGOS LLAMATIVOS"),0,0,'C');
    $pdf->Ln(2);
    $pdf->Cell(29,5,utf8_decode("HALLAZGOS LLAMATIVOS"),0,0,'C');
    $pdf->Cell(50,5,utf8_decode($datos['hallazgos_llamativos']),0,0,'C');
    $pdf->Ln(2);
    $pdf->Cell(11,5,utf8_decode("RAYOS X"),0,0,'C');
    $pdf->Cell(50,5,utf8_decode($datos['rayosx']),0,0,'C');
    $pdf->Ln(2);
    $pdf->Cell(17,5,utf8_decode("LABORATORIO"),0,0,'C');
    $pdf->Cell(50,5,utf8_decode($datos['laboratorio']),0,0,'C');
    $pdf->Ln(2);
    $pdf->Cell(14,5,utf8_decode("ECOGRAFIA"),0,0,'C');
    $pdf->Cell(50,5,utf8_decode($datos['ecografia']),0,0,'C');
    $pdf->Ln(2);
    $pdf->Cell(22,5,utf8_decode("OTROS(especifique)"),0,0,'C');
    $pdf->Cell(50,5,utf8_decode($datos['otros']),0,0,'C');
    $pdf->Ln(4);
    $pdf->SetFont('Arial','B',7);
    $pdf->SetTextColor(255,255,255);
    $pdf->Cell(0,3,utf8_decode("DIAGNOSTICOS (C5):"),0,0,'C',TRUE);
    $pdf->Ln(2);
    $pdf->SetFont('Arial','B',7);
    $pdf->SetTextColor(90,90,90);
    $pdf->Cell(5,5,utf8_decode("a)"),0,0,'C');
    $pdf->Cell(135,5,utf8_decode($datos['diagnostico_pres1']),0,0,'L');
    $pdf->Cell(1,5,utf8_decode("CIE - 10"),0,0,'R');
    $pdf->Cell(35,5,utf8_decode($datos['cie1']),0,0,'C');
    $pdf->Ln(2);
    $pdf->Cell(5,5,utf8_decode("b)"),0,0,'C');
    $pdf->Cell(135,5,utf8_decode($datos['diagnostico_pres2']),0,0,'L');
    $pdf->Cell(1,5,utf8_decode("CIE - 10"),0,0,'R');
    $pdf->Cell(35,5,utf8_decode($datos['cie2']),0,0,'C');
    $pdf->Ln(2);
    $pdf->Cell(5,5,utf8_decode("c)"),0,0,'C');
    $pdf->Cell(135,5,utf8_decode($datos['diagnostico_pres3']),0,0,'L');
    $pdf->Cell(1,5,utf8_decode("CIE - 10"),0,0,'R');
    $pdf->Cell(35,5,utf8_decode($datos['cie3']),0,0,'C');
    $pdf->Ln(4);
    $pdf->SetFont('Arial','B',7);
    $pdf->SetTextColor(255,255,255);
    $pdf->Cell(0,3,utf8_decode("TRATAMIENTO RECIBIDO(C6):"),0,0,'C',TRUE);
    $pdf->Ln(2);
    $pdf->SetFont('Arial','B',6);
    $pdf->SetTextColor(90,90,90);
     $pdf->Cell(170,5,utf8_decode($datos['tratamiento']),0,0,'C');
    $pdf->Ln(12);
    $pdf->Cell(17,5,utf8_decode("OTROS ANEXOS"),0,0,'C');
    $pdf->Cell(100,5,utf8_decode($datos['otros_anexos']),0,0,'C');
    $pdf->Cell(1,5,utf8_decode("CUALES"),0,0,'C');
    $pdf->Cell(35,5,utf8_decode($datos['cuales']),0,0,'C');
    $pdf->Ln(4);
    $pdf->SetFont('Arial','B',7);
    $pdf->SetTextColor(255,255,255);
    $pdf->Cell(0,3,utf8_decode("OBSERVACIONES(C7):"),0,0,'C',TRUE);
    $pdf->Ln(2);
    $pdf->SetFont('Arial','B',6);
    $pdf->SetTextColor(90,90,90);
     $pdf->Cell(170,5,utf8_decode($datos['observaciones']),0,0,'C');
     $pdf->Ln();
     $pdf->Cell(35,5,utf8_decode("MOTIVO DE REFERENCIA:"),0,0,'C');
     $pdf->Cell(170,5,utf8_decode($datos['motivo_transferencia']),0,0,'C');
    $pdf->Ln(6);
    $pdf->SetFont('Arial','B',7);
    $pdf->SetTextColor(255,255,255);
    $pdf->Cell(0,3,utf8_decode("CONSENTIMIENTO INFORMADO PARA EL TRASLADO(C8):"),0,0,'C',TRUE);
    $pdf->Ln(2);
    $pdf->SetFont('Arial','B',6);
    $pdf->SetTextColor(90,90,90);
     $pdf->Cell(5,5,utf8_decode("Yo "),0,0,'L');
     $pdf->Cell(45,5,utf8_decode($datos['consentimiento']),0,0,'L');
     $pdf->Cell(35,5,utf8_decode("de"),0,0,'C');
     $pdf->Cell(10,5,utf8_decode($datos['consentimiento1']),0,0,'L');
     $pdf->Cell(25,5,utf8_decode("años de edad, en calidad de "),0,0,'L');
     $pdf->Cell(45,5,utf8_decode($datos['consentimiento2']),0,0,'C');
     $pdf->Ln(2);
     $pdf->Cell(104,5,utf8_decode("habiendome informado sobre el cuadro clinico, autorizo al medico tratante y personal de salud del establecimiento,realizar la referencia, teniendo en cuenta que he sido "),0,0,'L');
     $pdf->Cell(49,5,utf8_decode(""),0,0,'C');
     $pdf->Ln(2);
     $pdf->Cell(49,5,utf8_decode("informado claramente sobre los riesgos, el traslado y posibles tratamientos,durante el traslado e internacion"),0,0,'L');
     $pdf->Cell(85,5,utf8_decode($datos['consentimiento3']),0,0,'R');
     $pdf->Ln(2);
     $pdf->Cell(39.5,5,utf8_decode("y beneficios que se puede presentar."),0,0,'R');
     $pdf->Ln(3);
     $pdf->Cell(35,5,utf8_decode("FIRMA PACIENTE:"),0,0,'L');
     $pdf->Cell(15,5,utf8_decode("CI:"),0,0,'C');
     $pdf->Cell(10,5,utf8_decode($datos['ci']),0,0,'C');
     $pdf->Cell(67,5,utf8_decode("FIRMA ACOMPAÑANTE:"),0,0,'L');
     $pdf->Cell(25,5,utf8_decode("CI:"),0,0,'R');
     $pdf->Cell(15,5,utf8_decode($datos['ci2']),0,0,'R');
    $pdf->Ln(7);
    $pdf->SetFont('Arial','B',7);
    $pdf->SetTextColor(255,255,255);
    $pdf->Cell(0,3,utf8_decode("NOMBRE Y CARGO DE QUIEN ENVIA AL PACIENTE O RESPONSABLEDEL ESTABLECIMIENTO DE SALUD QUE TRANSFIERE(C9):"),0,0,'C',TRUE);
    $pdf->Ln(4);
    $pdf->SetFont('Arial','B',6);
    $pdf->SetTextColor(90,90,90);
    $pdf->Cell(16,5,utf8_decode("NOMBRE:"),0,0,'L');
     $pdf->Cell(40,5,utf8_decode($datos['nombre_medico']),0,0,'L');
    
    $pdf->Cell(45,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(5,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(5,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(5,5,utf8_decode(""),0,0,'C');
  
  
    $pdf->Cell(50,15,utf8_decode(''),1,0,'R');
   
    
    $pdf->Ln(2);
    $pdf->Cell(10,5,utf8_decode("GARGO:"),0,0,'C');
    $pdf->Cell(48,5,utf8_decode($datos['cargo_med']),0,0,'C');
    $pdf->Ln(2); 
    $pdf->Cell(59,5,utf8_decode("NRO. DE TEL/CEL CONTACTO DEL MEDICO QUE ENVIO:"),0,0,'C');
    $pdf->Cell(35,5,utf8_decode($datos['nro_tel_med']),0,0,'C');
    $pdf->Ln(2);
    $pdf->Cell(58,5,utf8_decode("NOMBRE DEL PERSONAL DE SALUD QUE ACOMPAÑA:"),0,0,'C');
     $pdf->Cell(35,5,utf8_decode($datos['nombre_personal']),0,0,'C');
     $pdf->Ln(10);
     $pdf->SetFont('Arial','B',7);
     $pdf->SetTextColor(255,255,255);
     $pdf->Cell(0,3,utf8_decode("MOTIVO DE REFERENCIA(C11)SOLO MARQUE UNO(10):"),0,0,'C',TRUE);
     $pdf->Ln(2);
     $pdf->SetFont('Arial','B',7);
     $pdf->SetTextColor(90,90,90);
     $pdf->Cell(10,5,utf8_decode(""),0,0,'C');
     $pdf->Cell(10,5,utf8_decode($datos['motivo_transde']),0,0,'L');
     $pdf->Cell(85,5,utf8_decode("SERVICIOS / ESPECIALIDAD:"),0,0,'C');
     $pdf->Cell(35,5,utf8_decode($datos['serv_espe']),0,0,'C');
     $pdf->Cell(25,5,utf8_decode("POR TELESALUD:"),0,0,'C');
     $pdf->Cell(35,5,utf8_decode($datos['telesalud']),0,0,'C');
     $pdf->Ln(7);
     $pdf->SetFont('Arial','B',7);
     $pdf->SetTextColor(255,255,255);
     $pdf->Cell(0,3,utf8_decode("ESTABLECIMIENTO DE SALUD RECEPTOR(C11):"),0,0,'C',TRUE);
     $pdf->Ln(2);
    $pdf->SetFont('Arial','B',6);
    $pdf->SetTextColor(90,90,90);
    $pdf->Cell(37,5,utf8_decode("NOMBRE DEL ESTABLECIMIENTO:"),0,0,'C');
     $pdf->Cell(345,5,utf8_decode($datos['estable_salud']),0,0,'C');

    $pdf->Cell(5,5,utf8_decode("NIVEL:"),0,0,'C');
    $pdf->Cell(48,5,utf8_decode($datos['nivel2']),0,0,'C');

    $pdf->Cell(5,5,utf8_decode("SUBSECTOR:"),0,0,'C');
    $pdf->Cell(35,5,utf8_decode($datos['subsector']),0,0,'C');
    $pdf->Ln(2);
    $pdf->Cell(44.5,5,utf8_decode("NOMBRE DE LA PERSONA CONTACTADA:"),0,0,'C');
    $pdf->Cell(35,5,utf8_decode(""),0,0,'C');

    $pdf->Cell(18,5,utf8_decode("MEDIO DE COMUNICACION:"),0,0,'C');
     $pdf->Cell(35,5,utf8_decode(""),0,0,'C');

    $pdf->Cell(5,5,utf8_decode("REPORTADO AL CCESA-DA:"),0,0,'C');
    $pdf->Cell(35,5,utf8_decode(""),0,0,'C');
    $pdf->Ln(2);
    $pdf->SetFont('Arial','B',6);
    $pdf->Cell(45,5,utf8_decode("NOMBRE DE QUIEN RECIBE AL PACIENTE:"),0,0,'C');
     $pdf->Cell(35,5,utf8_decode(""),0,0,'C');

    $pdf->Cell(5,5,utf8_decode("FECHA DE RECEPCION:"),0,0,'C');
    $pdf->Cell(48,5,utf8_decode(""),0,0,'C');

    $pdf->Cell(5,5,utf8_decode("HORA DE RECEPCION:"),0,0,'C');
    $pdf->Cell(35,5,utf8_decode(""),0,0,'C');
    $pdf->Ln(2);
    $pdf->Cell(127,5,utf8_decode("MEDICO RESPONSABLE DEL ESTABLECIMIENTO DE SALUD RECEPTOR QUE AVALUA LOS CRITERIOS DE CALIDAD A.J.O:"),0,0,'C');
    $pdf->Cell(35,5,utf8_decode($datos['medico_respon']),0,0,'C');
    $pdf->Ln(2);
    $pdf->Cell(24,5,utf8_decode("PACIENTE ADMITIDO:"),0,0,'C');
     $pdf->Cell(35,5,utf8_decode(""),0,0,'C');

    $pdf->Cell(5,5,utf8_decode("MOTIVO:"),0,0,'C');
    $pdf->Cell(35,5,utf8_decode(""),0,0,'C');
    $pdf->Ln(7);
    $pdf->Cell(5,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(60,20,utf8_decode(''),1,0,'C');
    $pdf->setLineWidth(0.2);
    $pdf->SetFont('Arial','B',6);
    $pdf->SetTextColor(255,255,255);
    $pdf->Cell(100,3,utf8_decode("CALIFICACION POR EL ESTABLECIMIENTO RECEPTOR Colocar SI o NO"),0,0,'C',TRUE);
    $pdf->Ln(3);
    $pdf->SetFont('Arial','B',6);
    $pdf->SetTextColor(90,90,90);
    $pdf->Cell(210,3,utf8_decode("A                   J               O"),0,0,'C');
    $pdf->Ln(3);
    $pdf->Cell(90,3,utf8_decode(""),0,0,'C');
    $pdf->Cell(10,10,utf8_decode(''),1,0,'R');
    $pdf->Cell(10,10,utf8_decode(''),1,0,'C');
    $pdf->Cell(10,10,utf8_decode(''),1,0,'C');
    $pdf->setLineWidth(0.1);
    $pdf->Ln(15);
    $pdf->SetFont('Arial','B',6);
    $pdf->SetTextColor(90,90,90);
    $pdf->Cell(60,5,utf8_decode("FIRMA, SELLO DEL MEDICO RESPONSABE"),0,0,'C');
    $pdf->Ln(2);
    $pdf->Cell(60,5,utf8_decode("SELLO DEL ESTABLECIMIENTO RECEPTOR"),0,0,'C');

   








    $pdf->Ln(3);
    $pdf->SetFont('Arial','B',5);
    $pdf->Ln(2);
    $pdf->SetFont('Arial','B',6);
    $pdf->Cell(30,5,utf8_decode("RECUERDE:"),0,0,'C');
    $pdf->Cell(100,5,utf8_decode("a) original, para el establecimiento de salud receptor - Expediente Clinico"),0,0,'C');
    $pdf->Ln(2);
    $pdf->Cell(182,5,utf8_decode("b) Copia 1, para el establecimiento de salud receptor - Comite de Referencia y Contrareferencia"),0,0,'C');
    $pdf->Ln(2);
    $pdf->Cell(166,5,utf8_decode("c) Copia 3, para el establecimiento que realiza la referencia - Expediente Clinico"),0,0,'C');
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
