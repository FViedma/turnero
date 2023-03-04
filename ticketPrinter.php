<?php
require  __DIR__ . '/vendor/autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

function printTicket($fecha, $turno, $letra ) {
	try {
		//ES NECESARIO TENER LA IMPRESORA COMPARTIDA PARA USAR ESTE
        // $ip = $_SERVER['REMOTE_ADDR'];
		// $connector = new WindowsPrintConnector("smb://".$ip."/EPSON20");
        //ASIGNAR AL PUERTO LPT1 con el instalador de la carpeta instaladores Y USAR ESTE 
        $connector = new WindowsPrintConnector("LPT1");
		$printer = new Printer($connector);
		$printer -> setJustification(Printer::JUSTIFY_CENTER);
		$printer -> selectPrintMode(Printer::MODE_EMPHASIZED);
		$printer -> selectPrintMode(Printer::MODE_DOUBLE_HEIGHT);
		$printer -> text("HOSPITAL CLINICO VIEDMA\n");
		$printer -> selectPrintMode(Printer::MODE_FONT_B);
		$printer -> setJustification(Printer::JUSTIFY_CENTER);
		$printer -> text("Bienvenido\n");
		$printer -> setJustification(Printer::JUSTIFY_LEFT);
		$printer -> text("Emisión:".$fecha."\n");
		$printer -> setJustification(Printer::JUSTIFY_CENTER);
		$printer -> selectPrintMode(Printer::MODE_EMPHASIZED + Printer::MODE_DOUBLE_HEIGHT + Printer::MODE_DOUBLE_WIDTH);
		$printer -> setTextSize(5, 2);
		$printer -> text($letra."$turno"."\n");
		$printer -> setJustification(Printer::JUSTIFY_CENTER);
		$printer -> selectPrintMode(Printer::MODE_FONT_B + Printer::MODE_UNDERLINE);
		$printer -> text("http://www.hospitalclinicoviedma.org"."\n");
		$printer -> feed();
		$printer -> cut();
		/* Close printer */
		$printer -> close();
		
	} catch(Exception $e) {
		echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
	}
}
