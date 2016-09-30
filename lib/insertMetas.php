<?php
require_once('../views/Calendario/bdd.php');
	include '../conexionBD.php';
	require 'Setapas.php';
  $Setapas = new Setapas($datosConexionBD);

if ($_POST['vendedor']!="" &$_POST['ventas']!="" &&$_POST['prospectos']!="" &&$_POST['citas']!="" &&$_POST['fecha']!=""){
	
	$idvendedor = $_POST['vendedor'];	
	$ventas = $_POST['ventas'];
	$prospectos =$_POST['prospectos'];
	$citas = $_POST['citas'];
  $fecha = $_POST['fecha'];
	$fechs = explode("-", $fecha);
	$entrar=False;

  $CVentas = $Setapas->CVentas($fechs[1],$fechs[0]);  
	$ventasV=$CVentas->fetch_assoc();
  
	if(intval($ventasV['Ventas'])==0&&intval($ventasV['Prospectos'])==0&&intval($ventasV['Citas'])==0){
	$sql ="INSERT INTO Metas (idMetas, idVendedor, Ventas, Prospectos, Citas, fecha) VALUES 
				(NULL,'".$idvendedor."','".$ventas."','".$prospectos."','".$citas."','".$fecha."')";
		$entrar=True;
  }else{
	if(intval($ventasV['Ventas'])<=$ventas&&intval($ventasV['Prospectos'])<=$prospectos&&intval($ventasV['Citas'])<=$citas){
		$sql ="UPDATE Metas SET Ventas =  '".$ventas."', Prospectos ='".$prospectos."', Citas = '".$citas."'
					WHERE MONTH( fecha ) ='".$fechs[1]."' AND YEAR( fecha ) ='".$fechs[0]."' AND idVendedor ='".$idvendedor."'";
		$entrar=True;
	}}
	if($entrar){
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
}

header('Location: ../views/vendedor.php');


?>
