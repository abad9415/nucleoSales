<?php require("bdd.php"); 

	$id = $_POST['id'];
    $stmt = $bdd->prepare("SELECT CONCAT( contacto.trato,  ' ', contacto.nombre,  ' ', contacto.apellidoP ) AS  'Contacto', concat(nombreusuario,' ',vendedor.apellidoP)as'Vendedor'
														FROM agenda
														INNER JOIN contacto ON agenda.idcontacto = contacto.idcontacto
														inner join contactoProspecto on contactoProspecto.idcontacto=contacto.idcontacto
														inner join prospecto on prospecto.idprospecto=contactoProspecto.idprospecto
														inner join vendedor on vendedor.idvendedor=prospecto.idvendedor
														WHERE idcita =?");
     $stmt ->execute(array($id)); 
     //$records = $stmt->fetchAll();
     $row = $stmt->fetch(PDO::FETCH_ASSOC);
	 die ($row['Contacto']."            Vendedor: ".$row['Vendedor']);

?>