<?php require("bdd.php"); 

	$id = $_POST['id'];
    $stmt = $bdd->prepare("SELECT CONCAT( contacto.trato,  ' ', contacto.nombre,  ' ', contacto.apellidoP ) AS  'Contacto'
FROM agenda
INNER JOIN contacto ON agenda.idcontacto = contacto.idcontacto
WHERE idcita =?");
     $stmt ->execute(array($id)); 
     //$records = $stmt->fetchAll();
     $row = $stmt->fetch(PDO::FETCH_ASSOC);
	 die ($row['Contacto']);

?>