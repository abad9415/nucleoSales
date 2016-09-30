	<?php 

	include '../../conexionBD.php';
	//requerimos de la clase prospectos que esta en el siguiente archivo
	require '../../lib/prospectos.php';
	require '../../lib/fpdf/fpdf.php';

	

	$filtro=$_POST['filtro'];

	//Instaciamos la clase vendedor mandamos parametros de la base de datos 
	$rcitas = new prospectos($datosConexionBD);

//semana
switch($filtro){
	case 1:
						$year=date('Y');
						$month=date('n');
						$day=date('j');
						# Obtenemos el numero de la semana
						$semana=date("W",mktime(0,0,0,$month,$day,$year));

						# Obtenemos el día de la semana de la fecha dada
						$diaSemana=date("w",mktime(0,0,0,$month,$day,$year));

						# el 0 equivale al domingo...
						if($diaSemana==0)
								$diaSemana=7;

						# A la fecha recibida, le restamos el dia de la semana y obtendremos el lunes
						$primerDia=date("Y-m-d",mktime(0,0,0,$month,$day-$diaSemana+1,$year));
						//$primerDia=date("d-m-Y",mktime(0,0,0,$month,$day-$diaSemana+1,$year));

						# A la fecha recibida, le sumamos el dia de la semana menos siete y obtendremos el domingo
						$ultimoDia=date("Y-m-d",mktime(0,0,0,$month,$day+(7-$diaSemana),$year));

						//echo "<br>Semana: ".$semana." - año: ".$year;
						//echo "<br>Primer día ".$primerDia;
						//echo "<br>Ultimo día ".$ultimoDia;
				$rcitas->primeraFecha = $primerDia;
					$rcitas->ultimaFecha = $ultimoDia;
						
	$resultado= $rcitas->citasdevendedor();
		break;
		//mes
	case 2:
						$month = date('m');
						$year = date('Y');
						$day = date("d", mktime(0,0,0, $month+1, 0, $year));

						$ultimoDia = date('Y-m-d', mktime(0,0,0, $month, $day, $year));

					/** Actual month first day **/
							$month = date('m');
							$year = date('Y');
							$primerDia = date('Y-m-d', mktime(0,0,0, $month, 1, $year));
		
			$rcitas->primeraFecha = $primerDia;
					$rcitas->ultimaFecha = $ultimoDia;
						
	$resultado= $rcitas->citasdevendedor();
		break;
		//año
	case 3:
			$year = date('Y');
			$primerDia = $year . "-" . "01" . "-" . "01";
			$ultimoDia = $year . "-" . "12" . "-" . "31";
	$rcitas->primeraFecha = $primerDia;
	$rcitas->ultimaFecha = $ultimoDia;
						
	$resultado= $rcitas->citasdevendedor();
		//echo $primerDia;
		break;
}


while($row=$resultado->fetch_assoc())
	{
		echo $row["nombrecontacto"] ;
		
	}











/*


	class PDF extends FPDF
	{
		
	// Cabecera de página
	function Header()
	{
		// Logo
		//$this->Image('logo_pb.png',10,8,33);
		$this->Image('../../recursos/imagenes/membretado.jpg','0','0','220','298','JPG');	

		// Arial bold 15
		$this->SetFont('Arial','B',20);
		// Movernos a la derecha
		$this->Ln(30);
		// Título
		$this->Cell(0,10,'Citas de Vendedor ',0,0,'C');
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
		$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
	}
	}

	// Creación del objeto de la clase heredada
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->SetAutoPageBreak(true ,35);
	$pdf->AddPage();
	$pdf->SetFont('Times','',12);
	$i=1;
	while($row=$resultado->fetch_assoc())
	{
		$pdf->SetFont('Arial','',15);
		$pdf->Cell(0,10,"Cita: ".$i,0,1);
		$pdf->SetFont('Times','',12);
		$pdf->Cell(0,10,"Prospecto. ".$row["prospecto"],0,1);
		$pdf->Cell(0,10,"Contacto: ".$row["nombrecontacto"]."  Asunto: ".$row["descripcion"],0,1);
		$pdf->Cell(0,10,"Fecha:  ".$row["Defecha"]."  Hora:".$row["Dehora"],0,1);


	 $i++;
	}
	$pdf->Output();


*/



	?>