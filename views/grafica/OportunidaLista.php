<?php require("../../views/Calendario/bdd.php"); 

	$idProspecto = $_POST['idProspecto'];
	$idEtapa = $_POST['idEtapa'];
    $stmt = $bdd->prepare("SELECT * FROM oportunidad WHERE idetapa = ? and idprospecto =?");
     $stmt ->execute(array($idEtapa,$idProspecto)); 
     $row = $stmt->fetch(PDO::FETCH_ASSOC);
	$descripcion=$row['descripcion'];
	$des=explode("-SEP-", $descripcion);
	
		echo $des[0];
	
?>
