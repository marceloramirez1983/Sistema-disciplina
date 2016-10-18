
<?php
require('conexion.php');
require('../PDFphp/fpdf/fpdf.php');

	class PDF extends FPDF
	{
		function AcceptPageBreak()
		{
			$this->Addpage();
			$this->SetFillColor(65,105,225);
			$this->SetFont('Arial','B',12);
			$this->SetX(10);
			$this->Cell(30,6,'FECHA',1,0,'C',1);
			$this->SetX(40);
			$this->Cell(100,6,'FALTA',1,0,'C',1);
			$this->SetX(140);
			$this->Cell(30,6,'PUNTOS',1,0,'C',1);
			$this->SetX(170);
			$this->Cell(30,6,'TIPO',1,0,'C',1);
			$this->Ln();
		}

		function Header()
		{
			// tipo de letra
	    $this->setFont('Arial','I',12);
	    //mover a la derecha
	    $this->Cell(60);
	    //Titulo
	    $this->Cell(60,10,'S.I.D.E.S.',0,0,'C');
	    $this->Ln(5);//SALTO DE LINEA DE 20 PUNTOS
	    $this->Cell(60);
	    $this->Cell(60,10,'Sistema Disciplinario de la Escuela Militar de Sargentos',0,0,'C');
	    $this->Ln(8);//SALTO DE LINEA DE 20 PUNTOS
			$this->setFont('Arial','B',18);
			$this->Cell(60);
	    $this->Cell(60,10,'REPORTE INDIVIDUAL DISCIPLINARIO',0,0,'C');
			$this->SetLineWidth(0.6);
	    $this->Line(10,35,200,35);
	    //Logo
	    $this->Image('../images/logo.png',170,5,30);
	    //Salto de linea
	    $this->Ln(20);//SALTO DE LINEA DE 20 PUNTOS
		}

		function Footer()
		{
			//posicion a 1.5 del final
		  $this->SetY(-20);
		  //Arial italic 8
			$this->SetLineWidth(0.6);
			$this->Line(10,262,200,262);
		  $this->SetFont('Arial','I','8');
		  $this->Cell(0,14,''.$this->PageNo().' - {nb}',0,0,'C');
		}
	}

	$DATE_ONE1 = $_POST['date_one'];
	$DATE_TWO1 = $_POST['date_two'];
	echo $DATE_ONE1;
	echo $DATE_TWO1;
	//$id_ci = $_GET['id'];
	//echo $id_ci;

	// $query="select sancion.id_falta,sancion.fecha,sancion.puntos,sancion.tipo,falta.nombre from sancion
	// inner join falta on falta.id_falta=sancion.id_falta WHERE sancion.ci_alumno='$id_ci';";
	// $resultado=$mysqli->query($query);
	//
	//
	//
	//
	// $consulta ="SELECT nombre,paterno,materno,sexo,correo,direccion,celular FROM `usuario` WHERE id_ci='$id_ci';";
	// $filas=$mysqli->query($consulta);
	// $fila = $filas->fetch_assoc();
	//
	$pdf = new PDF('P','mm','Letter');
	$pdf->AliasNbPages();
	$pdf->Addpage();
	$pdf->SetFillColor(65,105,225);
	$pdf->SetFont('Arial','B',12);
	$pdf->Image('../images/placeholder_profile.jpg',160,40,40);
	//
	// $pdf->SetX(10);
	// $pdf->Cell(30,6,'GRADO',0,0,'L',0);
	// $pdf->SetX(40);
	// $pdf->Cell(10,6,':',0,0,'L',0);
	// $pdf->SetX(50);
	// $pdf->SetFont('Arial','I',12);
	// $pdf->Cell(100,6,'ALUMNO',0,0,'L',0);
	// $pdf->Ln();
	//
	// $pdf->SetFont('Arial','B',12);
	// $pdf->SetX(10);
	// $pdf->Cell(30,6,'NOMBRE',0,0,'L',0);
	// $pdf->SetX(40);
	// $pdf->Cell(10,6,':',0,0,'L',0);
	// $pdf->SetFont('Arial','I',12);
	// $pdf->Cell(100,6,utf8_decode($fila['nombre'].' '.$fila['paterno'].' '. $fila['materno']),0,0,'L',0);
	//
	//
	// $pdf->Ln();
	//
	// $pdf->SetFont('Arial','B',12);
	// $pdf->SetX(10);
	// $pdf->Cell(30,6,'SEXO',0,0,'L',0);
	// $pdf->SetX(40);
	// $pdf->Cell(10,6,':',0,0,'L',0);
	// $pdf->SetFont('Arial','I',12);
	// $pdf->Cell(100,6,utf8_decode($fila['sexo']),0,0,'L',0);
	// $pdf->Ln();
	//
	// $pdf->SetFont('Arial','B',12);
	// $pdf->SetX(10);
	// $pdf->Cell(30,6,'CORREO',0,0,'L',0);
	// $pdf->SetX(40);
	// $pdf->Cell(10,6,':',0,0,'L',0);
	// $pdf->SetFont('Arial','I',12);
	// $pdf->Cell(100,6,utf8_decode($fila['correo']),0,0,'L',0);
	// $pdf->Ln();
	//
	// $pdf->SetFont('Arial','B',12);
	// $pdf->SetX(10);
	// $pdf->Cell(30,6,'DIRECCION',0,0,'L',0);
	// $pdf->SetX(40);
	// $pdf->Cell(10,6,':',0,0,'L',0);
	// $pdf->SetFont('Arial','I',12);
	// $pdf->Cell(100,6,utf8_decode($fila['direccion']),0,0,'L',0);
	// $pdf->Ln();
	//
	// $pdf->SetFont('Arial','B',12);
	// $pdf->SetX(10);
	// $pdf->Cell(30,6,'CELULAR',0,0,'L',0);
	// $pdf->SetX(40);
	// $pdf->Cell(10,6,':',0,0,'L',0);
	// $pdf->SetFont('Arial','I',12);
	// $pdf->Cell(100,6,utf8_decode($fila['celular']),0,0,'L',0);
	// $pdf->Ln();
	//
	// $pdf->Ln(10);
	//
	// $pdf->SetFont('Arial','B',12);
	// $pdf->SetX(10);
	// $pdf->Cell(30,6,'FECHA',1,0,'C',1);
	// $pdf->SetX(40);
	// $pdf->Cell(100,6,'FALTA',1,0,'C',1);
	// $pdf->SetX(140);
	// $pdf->Cell(30,6,'PUNTOS',1,0,'C',1);
	// $pdf->SetX(170);
	// $pdf->Cell(30,6,'TIPO',1,0,'C',1);
	// $pdf->Ln();
	// $PERDIDOS=0;
	// $GANADOS=0;
	// while($row = $resultado->fetch_assoc())
	// {
	// 	$pdf->SetFont('Arial','',12);
	// 	$pdf->SetX(10);
	// 	$pdf->Cell(30,6, utf8_decode($row['fecha']),1,0,'C',0);
	//
	// 	if ($row['tipo']=='M') {
	// 		$id1=$row['id_falta'];
	// 		$merito="select * from merito WHERE id_merito ='$id1';";
	// 		$resultado2=$mysqli->query($merito);
	// 		$row2 = $resultado2->fetch_assoc();
	// 		$pdf->SetX(40);
	// 		$pdf->Cell(100,6,utf8_decode($row2['nombre_merito']),1,0,'L',0);
	// 	}else {
	// 	$pdf->SetX(40);
	// 	$pdf->Cell(100,6,utf8_decode($row['nombre']),1,0,'L',0);
	// 	}
	// 	$pdf->SetX(140);
	// 	$pdf->Cell(30,6,utf8_decode($row['puntos']),1,0,'C',0);
	// 	$pdf->SetX(170);
	// 	$pdf->Cell(30,6,utf8_decode($row['tipo']),1,0,'C',0);
	// 	$pdf->Ln();
	// 	if ($row['tipo']=='D') {
	// 		$PERDIDOS=$PERDIDOS+$row['puntos'];
	// 	}
	// 	if ($row['tipo']=='M') {
	// 		$GANADOS=$GANADOS+$row['puntos'];
	// 	}
	// }
	//
	// $NOTA=100-(($PERDIDOS-$GANADOS)*0.98);
	// if ($NOTA > 100) {
	// 	$NOTA=100;
	// }
	// $pdf->Ln(10);
	// $pdf->SetFont('Arial','B',12);
	// $pdf->SetX(20);
	// $pdf->Cell(70,6,'TOTAL DEMERITOS',0,0,'R',0);
	// $pdf->SetX(90);
	// $pdf->Cell(10,6,':',0,0,'L',0);
	// $pdf->SetFont('Arial','B',20);
	// $pdf->SetX(100);
	// $pdf->Cell(10,6,$PERDIDOS,0,0,'C',0);
	//
	// $pdf->Ln(10);
	// $pdf->SetFont('Arial','B',12);
	// $pdf->SetX(20);
	// $pdf->Cell(70,6,'TOTAL MERITOS',0,0,'R',0);
	// $pdf->SetX(90);
	// $pdf->Cell(10,6,':',0,0,'L',0);
	// $pdf->SetFont('Arial','B',20);
	// $pdf->SetX(100);
	// $pdf->Cell(10,6,$GANADOS,0,0,'C',0);
	//
	// $pdf->Ln(10);
	// $pdf->SetFont('Arial','B',12);
	// $pdf->SetX(20);
	// $pdf->Cell(70,6,'NOTA FINAL',0,0,'R',0);
	// $pdf->SetX(90);
	// $pdf->Cell(10,6,':',0,0,'L',0);
	// $pdf->SetFont('Arial','B',20);
	// $pdf->SetX(100);
	// $pdf->Cell(10,6,$NOTA,0,0,'L',0);
	$pdf->Output();
?>
