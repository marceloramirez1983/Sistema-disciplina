
<?php
require('conexion.php');
require('../PDFphp/fpdf/fpdf.php');

	class PDF extends FPDF
	{
		// function AcceptPageBreak()
		// {
		// 	$this->Addpage();
		// 	$this->SetFillColor(65,105,225);
		// 	$this->SetFont('Arial','B',12);
		// 	$this->SetX(10);
		// 	$this->Cell(30,6,'FECHA',1,0,'C',1);
		// 	$this->SetX(40);
		// 	$this->Cell(100,6,'FALTA',1,0,'C',1);
		// 	$this->SetX(140);
		// 	$this->Cell(30,6,'PUNTOS',1,0,'C',1);
		// 	$this->SetX(170);
		// 	$this->Cell(30,6,'TIPO',1,0,'C',1);
		// 	$this->Ln();
		// }

		// function Header()
		// {
		// 	// tipo de letra
	  //   $this->setFont('Arial','I',12);
	  //   //mover a la derecha
	  //   $this->Cell(60);
	  //   //Titulo
	  //   $this->Cell(60,10,'S.I.D.E.S.',0,0,'C');
	  //   $this->Ln(5);//SALTO DE LINEA DE 20 PUNTOS
	  //   $this->Cell(60);
	  //   $this->Cell(60,10,'Sistema Disciplinario de la Escuela Militar de Sargentos',0,0,'C');
	  //   $this->Ln(8);//SALTO DE LINEA DE 20 PUNTOS
		// 	$this->setFont('Arial','B',18);
		// 	$this->Cell(60);
	  //   $this->Cell(60,10,'DATOS PERSONALES INSTRUCTORES',0,0,'C');
		// 	$this->SetLineWidth(0.6);
	  //   $this->Line(10,35,200,35);
	  //   //Logo
	  //   $this->Image('../images/logo.png',170,5,30);
	  //   //Salto de linea
	  //   $this->Ln(20);//SALTO DE LINEA DE 20 PUNTOS
		// }

		function Footer()
		{
			//posicion a 1.5 del final
		  $this->SetY(-20);
		  //Arial italic 8
			//$this->SetLineWidth(0.6);
			//$this->Line(10,262,200,262);
		  $this->SetFont('Arial','I','12');
		  $this->Cell(0,14,''.$this->PageNo().' - {nb}',0,0,'C');
		}
	}

	$id_ci = $_GET['id'];
	$query="SELECT * FROM usuario WHERE id_ci= $id_ci";
	$instructor=$mysqli->query($query);
	$fila = $instructor->fetch_assoc();

	$idg=$fila['id_grado'];
	$idarma=$fila['id_grado'];

	$query2="SELECT descripcion FROM grado WHERE id_grado= $idg";
	$grado=$mysqli->query($query2);
	$grado= $grado->fetch_assoc();

	$query1="SELECT descripcion FROM arma WHERE id_arma= $idarma";
	$arma=$mysqli->query($query1);
	$arma= $arma->fetch_assoc();

	$pdf = new PDF('P','mm','Letter');
	$pdf->AliasNbPages();
	$pdf->Addpage();
	$pdf->SetFillColor(65,105,225);
	$pdf->SetFont('Arial','B',9);

	$pdf->SetX(50);
	$pdf->Cell(10,6,'DEPARTAMENTO VI EDUCACION',0,0,'C',0);
	$pdf->Ln(4);

	$pdf->SetX(50);
	$pdf->Cell(10,6,'ESCUELA MILITAR DE SARGENTOS DEL EJERCITO',0,0,'C',0);
	$pdf->Ln(4);

	$pdf->SetX(50);
	$pdf->Cell(10,6,'"SGTO MAXIMILIANO PAREDES TEJERINA"',0,0,'C',0);
	$pdf->Ln(4);

	$pdf->SetX(50);
	$pdf->Cell(10,6,'BOLIVIA',0,0,'C',0);
	$pdf->Ln();

	$pdf->SetLineWidth(0.6);
	$pdf->Line(49,27,61,27);
	$pdf->Ln(9);

	$pdf->SetFont('Arial','B',16);
	$pdf->SetX(50);
	$pdf->Cell(120,6,'FILIACION PERSONAL INSTRUCTORES',0,0,'C',0);
	$pdf->Ln(15);

	$pdf->SetLineWidth(0.6);
	$pdf->Line(57,43,163,43);
	//$pdf->Ln(9);


	$pdf->Image('../images/placeholder_profile.jpg',160,50,40,40);
	$pdf->SetFont('Arial','B',12);
	$pdf->SetX(20);
	$pdf->Cell(50,6,'GRADO',0,0,'L',0);
	$pdf->SetX(70);
	$pdf->Cell(10,6,':',0,0,'L',0);
	$pdf->SetFont('Arial','I',12);
	$pdf->Cell(100,6,utf8_decode($grado['descripcion']),0,0,'L',0);
	$pdf->Ln(10);

	$pdf->SetFont('Arial','B',12);
	$pdf->SetX(20);
	$pdf->Cell(50,6,'ARMA',0,0,'L',0);
	$pdf->SetX(70);
	$pdf->Cell(10,6,':',0,0,'L',0);
	$pdf->SetFont('Arial','I',12);
	$pdf->Cell(100,6,utf8_decode($arma['descripcion']),0,0,'L',0);
	$pdf->Ln(10);

	$pdf->SetFont('Arial','B',12);
	$pdf->SetX(20);
	$pdf->Cell(50,6,'CEDULA DE IDENTIDAD',0,0,'L',0);
	$pdf->SetX(70);
	$pdf->Cell(10,6,':',0,0,'L',0);
	$pdf->SetFont('Arial','I',12);
	$pdf->Cell(100,6,utf8_decode($fila['id_ci']),0,0,'L',0);
	$pdf->Ln(10);

	$pdf->SetFont('Arial','B',12);
	$pdf->SetX(20);
	$pdf->Cell(50,6,'NOMBRE',0,0,'L',0);
	$pdf->SetX(70);
	$pdf->Cell(10,6,':',0,0,'L',0);
	$pdf->SetFont('Arial','I',12);
	$pdf->Cell(100,6,utf8_decode($fila['nombre'].' '.$fila['paterno'].' '. $fila['materno']),0,0,'L',0);
	$pdf->Ln(10);

	$pdf->SetFont('Arial','B',12);
	$pdf->SetX(20);
	$pdf->Cell(50,6,'SEXO',0,0,'L',0);
	$pdf->SetX(70);
	$pdf->Cell(10,6,':',0,0,'L',0);
	$pdf->SetFont('Arial','I',12);
	$pdf->Cell(100,6,utf8_decode($fila['sexo']),0,0,'L',0);
	$pdf->Ln(10);

	$pdf->SetFont('Arial','B',12);
	$pdf->SetX(20);
	$pdf->Cell(50,6,'CORREO',0,0,'L',0);
	$pdf->SetX(70);
	$pdf->Cell(10,6,':',0,0,'L',0);
	$pdf->SetFont('Arial','I',12);
	$pdf->Cell(100,6,utf8_decode($fila['correo']),0,0,'L',0);
	$pdf->Ln(10);

	$pdf->SetFont('Arial','B',12);
	$pdf->SetX(20);
	$pdf->Cell(50,6,'FECHA NACIMIENTO',0,0,'L',0);
	$pdf->SetX(70);
	$pdf->Cell(10,6,':',0,0,'L',0);
	$pdf->SetFont('Arial','I',12);
	$pdf->Cell(100,6,utf8_decode($fila['fecha_nac']),0,0,'L',0);
	$pdf->Ln(10);

	$pdf->SetFont('Arial','B',12);
	$pdf->SetX(20);
	$pdf->Cell(50,6,'LUGAR NACIMIENTO',0,0,'L',0);
	$pdf->SetX(70);
	$pdf->Cell(10,6,':',0,0,'L',0);
	$pdf->SetFont('Arial','I',12);
	$pdf->Cell(100,6,utf8_decode($fila['lugar_nac']),0,0,'L',0);
	$pdf->Ln(10);

	$pdf->SetFont('Arial','B',12);
	$pdf->SetX(20);
	$pdf->Cell(50,6,'CELULAR',0,0,'L',0);
	$pdf->SetX(70);
	$pdf->Cell(10,6,':',0,0,'L',0);
	$pdf->SetFont('Arial','I',12);
	$pdf->Cell(100,6,utf8_decode($fila['celular']),0,0,'L',0);
	$pdf->Ln(10);

	$pdf->SetFont('Arial','B',12);
	$pdf->SetX(20);
	$pdf->Cell(50,6,'DIRECCION',0,0,'L',0);
	$pdf->SetX(70);
	$pdf->Cell(10,6,':',0,0,'L',0);
	$pdf->SetFont('Arial','I',12);
	$pdf->Cell(100,6,utf8_decode($fila['direccion']),0,0,'L',0);
	$pdf->Ln(15);
	//
	// $pdf->SetFont('Arial','B',16);
	// //$pdf->SetX(10);
	// $pdf->Cell('',9,'DATOS DEL TUTOR',1,1,'C',1);
	// $pdf->Ln(10);
	//
	// $pdf->SetFont('Arial','B',12);
	// $pdf->SetX(10);
	// $pdf->Cell(50,6,'C.I. TUTOR',0,0,'L',0);
	// $pdf->SetX(60);
	// $pdf->Cell(10,6,':',0,0,'L',0);
	// $pdf->SetFont('Arial','I',12);
	// $pdf->Cell(100,6,utf8_decode($fila['ci_tutor']),0,0,'L',0);
	// $pdf->Ln(10);
	//
	// $pdf->SetFont('Arial','B',12);
	// $pdf->SetX(10);
	// $pdf->Cell(50,6,'NOMBRE TUTOR',0,0,'L',0);
	// $pdf->SetX(60);
	// $pdf->Cell(10,6,':',0,0,'L',0);
	// $pdf->SetFont('Arial','I',12);
	// $pdf->Cell(100,6,utf8_decode($fila['nombre_tutor']),0,0,'L',0);
	// $pdf->Ln(10);
	//
	// $pdf->SetFont('Arial','B',12);
	// $pdf->SetX(10);
	// $pdf->Cell(50,6,'CELULAR TUTOR',0,0,'L',0);
	// $pdf->SetX(60);
	// $pdf->Cell(10,6,':',0,0,'L',0);
	// $pdf->SetFont('Arial','I',12);
	// $pdf->Cell(100,6,utf8_decode($fila['telefono_tutor']),0,0,'L',0);
	// $pdf->Ln(10);
	//
	// $pdf->SetFont('Arial','B',12);
	// $pdf->SetX(10);
	// $pdf->Cell(50,6,'DIRECCION TUTOR',0,0,'L',0);
	// $pdf->SetX(60);
	// $pdf->Cell(10,6,':',0,0,'L',0);
	// $pdf->SetFont('Arial','I',12);
	// $pdf->Cell(100,6,utf8_decode($fila['direccion_tutor']),0,0,'L',0);
	// $pdf->Ln(10);

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
