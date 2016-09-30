<?php
  // Incluimos el archivo de configuración
	include '../conexionBD.php';
	require '../lib/Setapas.php';
  //Instaciamos la clase prospectos
  $Setapas = new Setapas($datosConexionBD);
  $consultarEtapa1 = $Setapas->consultarEtapa1();
  $row = $consultarEtapa1->fetch_assoc();                
  $etapa1N= $row['nombre'];
	$etapa1= $row['Netapas'];
  
  $consultarEtapa2 = $Setapas->consultarEtapa2();
  $row = $consultarEtapa2->fetch_assoc();                
	$etapa2N= $row['nombre'];
  $etapa2= $row['Netapas'];

  $consultarEtapa3 = $Setapas->consultarEtapa3();
  $row = $consultarEtapa3->fetch_assoc();                
	$etapa3N= $row['nombre'];
  $etapa3= $row['Netapas'];

  $consultarEtapa4 = $Setapas->consultarEtapa4();
  $row = $consultarEtapa4->fetch_assoc();                
	$etapa4N= $row['nombre'];
  $etapa4= $row['Netapas'];

  $consultarEtapa5 = $Setapas->consultarEtapa5();
  $row = $consultarEtapa5->fetch_assoc();                
	$etapa5N= $row['nombre'];
  $etapa5= $row['Netapas'];

  $consultarEtapa6 = $Setapas->consultarEtapa6();
  $row = $consultarEtapa6->fetch_assoc();                
	$etapa6N= $row['nombre'];
  $etapa6= $row['Netapas'];

$mes1='Ene';
$mes2='Feb';
$mes3='Mar';

	$consultarEtapa6 = $Setapas->consultarContacto1();
  $row = $consultarEtapa6->fetch_assoc();                
	$Correo= $row['Norigen'];
  
	$consultarEtapa6 = $Setapas->consultarContacto2();
  $row = $consultarEtapa6->fetch_assoc();                
	$Telefono= $row['Norigen'];

	$consultarEtapa6 = $Setapas->consultarContacto3();
  $row = $consultarEtapa6->fetch_assoc();                
	$Cambaceo= $row['Norigen'];

	$consultarEtapa6 = $Setapas->consultarContacto4();
  $row = $consultarEtapa6->fetch_assoc();                
	$Directo= $row['Norigen'];

	$consultarEtapa6 = $Setapas->consultarContacto5();
  $row = $consultarEtapa6->fetch_assoc();                
	$Ref_Rec= $row['Norigen'];

 	$consultarEtapa6 = $Setapas->consultarContacto6();
  $row = $consultarEtapa6->fetch_assoc();                
	$Otros= $row['Norigen'];
  
  
?>
<input type="hidden" value="<?php echo $mes1?>" id="mes1">
<input type="hidden" value="<?php echo $mes2?>" id="mes2">
<input type="hidden" value="<?php echo $mes3?>" id="mes3">


<? /*Datos de Grafica de etapas*/?>
<input type="hidden" value="<?php echo $etapa1N?>" id="Etapa1N">
<input type="hidden" value="<?php echo $etapa1?>" id="Etapa1">
<input type="hidden" value="<?php echo $etapa2N?>" id="Etapa2N">
<input type="hidden" value="<?php echo $etapa2?>" id="Etapa2">
<input type="hidden" value="<?php echo $etapa3N?>" id="Etapa3N">
<input type="hidden" value="<?php echo $etapa3?>" id="Etapa3">
<input type="hidden" value="<?php echo $etapa4N?>" id="Etapa4N">
<input type="hidden" value="<?php echo $etapa4?>" id="Etapa4">
<input type="hidden" value="<?php echo $etapa5N?>" id="Etapa5N">
<input type="hidden" value="<?php echo $etapa5?>" id="Etapa5">
<input type="hidden" value="<?php echo $etapa6N?>" id="Etapa6N">
<input type="hidden" value="<?php echo $etapa6?>" id="Etapa6">