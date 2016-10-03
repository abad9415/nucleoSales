<?php
require_once('../views/Calendario/bdd.php');
	
	
  

if ($_POST['vendedor']!="" &$_POST['ventas']!="" &&$_POST['prospectos']!="" &&$_POST['citas']!="" &&$_POST['fecha']!=""){
	
	$idvendedor = $_POST['vendedor'];	
	$ventas = $_POST['ventas'];
	$prospectos =$_POST['prospectos'];
	$citas = $_POST['citas'];
  $fecha = $_POST['fecha'];
	
	$sql ="INSERT INTO Metas (idMetas, idVendedor, Ventas, Prospectos, Citas, fecha) VALUES 
				(NULL,'".$idvendedor."','".$ventas."','".$prospectos."','".$citas."','".$fecha."')";
	
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}else{
	
	}

}




?>
