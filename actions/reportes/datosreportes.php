<?php

//incluimos el archivo de configuracion de la BD
include '../../conexionBD.php';
//requerimos de la clase prospectos que esta en el siguiente archivo
require '../../lib/prospectos.php';
require '../../lib/fpdf/fpdf.php';


//Instaciamos la clase vendedor mandamos parametros de la base de datos 
$rprospecto = new prospectos($datosConexionBD);

$rprospecto->idprospecto=$_POST['Emp'];

$resultado=$rprospecto->consultarProspectoXId();
$resultado1=$rprospecto->todosContactoxProspecto();
$resultado2=$rprospecto->consultartodaoportunidadXprospecto();
$resultado3=$rprospecto->agendaprospecto();


while($row=$resultado->fetch_assoc())
{
  
    $nombre=$row['nombre'];
    $calle=$row['calle'];
   $numerodomicilio=$row['numerodomicilio'];
    $colonia=$row['colonia'];
    $cp=$row['cp'];
    $ciudad=$row['ciudad'];
    $fechadecracion=$row['fechadecreacion'];

  
  
  
}


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
     $this->Image('../../recursos/imagenes/membretado.jpg','0','0','220','298','JPG');	
    // Arial bold 15
    $this->SetFont('Arial','B',20);
    // Movernos a la derecha
   
    $this->Ln(30);
    // Título
    $this->Cell(0,10,'Informacion de Contacto',0,0,'C',false,"red-7.com.mx");
    // Salto de línea
     $this->Cell(80);
        // Título
     $this->SetFont('times','B',10);
    $this->cell(0,29, $fechaHoy, 0,1, 'R');

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
$pdf->SetFont('Arial','',20);

$pdf->Cell(0,10,$nombre,0,0,'C');
$pdf->Ln(20);
$pdf->SetFont('Arial','',20);
$pdf->Cell(0,10,"Ubicacion:",0,0,'');
$pdf->Ln(10);
$pdf->SetFont('times','',13);
$pdf->Cell(60,10,"Av.".$calle." #".$numerodomicilio.", ".$colonia. ",  ".$ciudad."");
$pdf->Ln(10);
$pdf->Cell(60,10, "Fecha de Alta: ".$fechadecracion);
$pdf->Ln(10);
$pdf->SetFont('Arial','',20);
$pdf->Cell(0,10,"Contactos",0,0,'C');
$pdf->Ln(10);
$pdf->SetFont('times','',15);
$i=1;
while($row=$resultado1->fetch_assoc())
{
  
    $pdf->SetFont('times','',13);
    $pdf->Cell(50,10,$i.".- ".$row['nombre']." ".$row['apellidoP']." ".$row['apellidoM'],0,0);
    $pdf->Ln(10);
    $pdf->Cell(8);
    $pdf->Cell(10,10,"Cargo: ".$row['cargo'],0,0);
    $pdf->Ln(10);
    $pdf->Cell(8);
    $pdf->Cell(10,10,"Telefono: ".$row['telefono'],0,0);
      $pdf->Ln(10);
     $i++;

  
  
}
 $pdf->Ln(10);
$pdf->SetFont('Arial','',20);
$pdf->Cell(0,10,"Oportunidades",0,0,'C');
$pdf->Ln(10);
$pdf->SetFont('times','',13);
$i=1;
while($row=$resultado2->fetch_assoc())
{
  
  $pdf->Cell(0,10,$i.".-  ".$row['descripcion']);
  $pdf->Ln(5);
  $pdf->Cell(8);
  $pdf->Cell(10,10,"Monto: ".$row['monto']." ".$row['nombremoneda']);
  $pdf->Ln(5);
  $pdf->Cell(8);
  $pdf->Cell(10,10,"Etapa de Venta: ".$row['nombreetapa']);
  $pdf->Ln(10);
  $i++;
  
}


 $pdf->Ln(10);
$pdf->SetFont('Arial','',20);
$pdf->Cell(0,10,"Citas",0,0,'C');
$pdf->Ln(10);
$pdf->SetFont('times','',13);
$i=1;
while($row=$resultado3->fetch_assoc())
{
    $pdf->Cell(10,10,$i.".- Contacto:  ".$row['nombrecontacto']);

  $pdf->Ln(5);
  $pdf->Cell(8);
 $pdf->Cell(0,10,"Descripcion: ".$row['descripcion']);
  $pdf->Ln(5);
  $pdf->Cell(8);
   $pdf->Cell(10,10,"Fecha y Hora: ".$row['Defecha']." ".$row['Dehora']);
  $pdf->Ln(10);
  $i++;
  
}






$pdf->Output();














?>


