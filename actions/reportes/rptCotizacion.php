<?php
#####################################
# Todo estatico hay que psar variablesde la bd#
# Se necesita crear los campos de la oportunidad primero#
####################################
//setlocale(LC_TIME, 'es_ES.UTF-8');
setlocale(LC_MONETARY, 'en_US');
$idprospecto=(isset($_REQUEST['idprospecto']))?$_REQUEST['idprospecto']:"";
$idOportunidad=(isset($_REQUEST['idOportunidad']))?$_REQUEST['idOportunidad']:"";
$idcontacto=(isset($_REQUEST['idcontactoMod']))?$_REQUEST['idcontactoMod']:"";

  // Incluimos el archivo de configuración
	include '../../conexionBD.php';
	// Requerimos la clase de prospectos
	require '../../lib/prospectos.php';
  //Instanciamos nuestra clase prospectos
  require '../../lib/contactos.php';

$contactos = new contactos($datosConexionBD);
$prospectos = new prospectos($datosConexionBD);

$contactos->idcontacto = $idcontacto;
$consultarContactoXId = $contactos->consultarContactoXId();

				 while($row = $consultarContactoXId->fetch_assoc()) {
								 $tratoContacto = $row['trato'];
								 $nombreContacto = $row['nombre'];
								 $apePaternoContacto = $row['apellidoP'];
								 $apeMaternoContacto = $row['apellidoM'];
							 }
$prospectos->idprospecto = $idprospecto;
$consultarProspectoXIdRow = $prospectos->consultarProspectoXId();
while($row = $consultarProspectoXIdRow->fetch_assoc()) {
								 $nombrePros = strtoupper($row['nombre']); //strtoupper devuelve mayusculas
							 }

$consultarConfigCotizacionRow = $prospectos->consultarConfigCotizacionXvendedor();
$resultados = $consultarConfigCotizacionRow->fetchAll();
	foreach($resultados as $row){
		$descripcionCot = $row['descripcion'];
		$caracteristicasCot = $row['caracteristicas'];
		$extras = $row['extras'];
		$despedida = $row['despedida'];
		$firma = $row['firma'];
	}
$prospectos->idOportunidad = $idOportunidad;
$consultarOportunidadXiDRow = $prospectos->consultarOportunidadXiD();
 while($row = $consultarOportunidadXiDRow->fetch_assoc()) {
								 $periodosPagos = $row['periodosPagos'];
								 $descripcionOportunidad = $row['descripcion'];
								 $costoPorOportunidad = $row['costoPorOportunidad'];
								 $costoInstalacionYcotizacionPorOportunidad = $row['costoInstalacion'];
								 $idMonedaOportunidad = $row['idmoneda'];
							 }
//obtener el nombre de la moneda por el Id
$prospectos->idmoneda = $idMonedaOportunidad;
$obtenerMonedaXId = $prospectos->obtenerMonedaXId();
 while($row = $obtenerMonedaXId->fetch_assoc()) {
								 $nombreMonedaOportunidad = $row['nombre'];
							 }

//separando las descripciones y costos
$descripcionesOportunidadSeparadas = explode("-SEP-", $descripcionOportunidad);
$costosOportunidadSeparados = explode("-SEP-", $costoPorOportunidad);

$cantidadDescripcionesOportunidad = count($descripcionesOportunidadSeparadas);
$cantidadCostosOportunidad = count($costosOportunidadSeparados);


require('../../recursos/fpdf/fpdf.php');
$nombreContacto = $tratoContacto . " " . $nombreContacto . " " . $apePaternoContacto . " " . $apeMaternoContacto;
//Cargamos nuestros datos de la BD 
$nombreContacto = utf8_decode($nombreContacto);

$nombreProspecto = utf8_decode($nombrePros);

$descripcionCot = utf8_decode($descripcionCot);

$caracteristicasCot = utf8_decode($caracteristicasCot);

$costoTratado = utf8_decode($periodosPagos);
/*$oportunidad = utf8_decode('10 Mbps Simétricos:                 $3,500.00 m.n.
20 Mbps Simétricos:                 $7,000.00 m.n.
30 Mbps Simétricos:                 $10,000.00 m.n.
50 Mbps Simétricos:                 $15,000.00 m.n.'); */

//money_format('%i', $costosOportunidadSeparados[$i]) 
$precioContratoeInstalacion = utf8_decode('Costo por Contratación e Instalación $ '.money_format('%i', $costoInstalacionYcotizacionPorOportunidad). " " .strtoupper($nombreMonedaOportunidad));

$extras = utf8_decode($extras);

$despedida = utf8_decode($despedida . $nombreProspecto);
$firma = utf8_decode($firma);

class PDF extends FPDF
{
    
    // Cabecera de página
    function Header()
    {
        $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 
        $dias = date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
        
        $hoy = 'Fecha actual: '.strftime("%A, %d de %B de %Y"); 
        $fechaHoy = "Mexicali, Baja California " . $dias;
        // Logo
        $this->Image('../../recursos/imagenes/membretado.jpg','0','0','210','298','JPG');	
        //hacemos salto de linea
        $this->Ln(32);
        // Arial bold 15
        $this->SetFont('Arial','B',10);
        $this->SetXY(130.2,30);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->cell(0,29, $fechaHoy, 0,1, 'R');
        //$this->Cell(30,10,'Hola',1,0,'C');
        // Salto de línea
        //$this->Ln(20);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
       // $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C'); 
    }
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',10);
//imprimimos el nombre del usuario
$pdf->cell(0,0, $nombreContacto, 0,0);
$pdf->Ln(4);
$pdf->cell(0,0, $nombreProspecto, 0,0);

$pdf->SetFont('Times','',10);
$pdf->Ln(5);
//MultiCell imprime un parrafo
$pdf->MultiCell(0,5, $descripcionCot);

$pdf->SetFont('Times','B',11);
$pdf->Ln(5);
$pdf->cell(0,0, utf8_decode("Características:"), 0,0);
$pdf->Ln(5);
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,5, $caracteristicasCot);

$pdf->SetFont('Times','B',11);
$pdf->Ln(10);
$pdf->cell(0,0, utf8_decode("COSTOS:"), 0,0);
$pdf->Ln(5);
$pdf->cell(0,0, $costoTratado, 0,0);
$pdf->Ln(2);
$pdf->SetFont('Times','',10);
$cantidadDescripcionesOportunidad = $cantidadDescripcionesOportunidad - 1;
$i=0;


while($i<=$cantidadDescripcionesOportunidad){
	$costosOportunidadSeparados[$i] = money_format('%i', $costosOportunidadSeparados[$i]) . "\n";
	$pdf->Cell(17,10,$descripcionesOportunidadSeparadas[$i],0,0);
	$pdf->Cell(140,10,"$ " . $costosOportunidadSeparados[$i] . strtoupper($nombreMonedaOportunidad),0,1,'R');
	$pdf->Ln(-5);
	//$pdf->SetXY(15, 15);
	$i++;
}

$pdf->Ln(5);
$pdf->MultiCell(0,5,$precioContratoeInstalacion,0,'C');
$pdf->Ln(5);
$pdf->MultiCell(0,5,$extras);
$pdf->Ln(5);
$pdf->MultiCell(0,5,$despedida);
$pdf->SetFont('Times','B',10);
$pdf->Ln(15);
$pdf->MultiCell(0,2,"ATENTAMENTE",0,'C');
$pdf->SetFont('Times','',10);
$pdf->Ln(2);
$pdf->MultiCell(0,5,$firma,0,'C');

$hoy = date("m-d-y");
$modo="I"; 
$nombre_archivo="$nombreProspecto $hoy.pdf"; 
$pdf->Output($nombre_archivo,$modo);
?>