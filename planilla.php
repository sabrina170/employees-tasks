<?php
require 'fpdf/fpdf.php';
class PDF extends fpdf{
	function header(){
		$this->image('imagen/tecsup.jpg',5,5,20);
		$this->SetFont('Arial','B',15);
		$this->Cell(30);
		$this->Cell(120,10,'Reporte de Empleados',0,0,'C');
		$this->Ln(20);
	}
}
?>