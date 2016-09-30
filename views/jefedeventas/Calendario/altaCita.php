<?php
require("bdd.php"); 


    $idContacto = $_POST['idContacto'];
    $idEmpresa = $_POST['idEmpresa'];
    $deFecha = $_POST['deFecha'];
    $deHora = $_POST['deHora'];
    $aFecha = $_POST['aFecha'];
    $aHora = $_POST['aHora'];
    $Cita = $_POST['Cita'];
  
    $sql = "INSERT INTO agenda
    (idcita,Defecha,Dehora,Afecha,AHora,descripcion,idcontacto,idprospecto) 
    VALUES (NULL, '$deFecha', '$deHora', '$aFecha', '$aHora', '$Cita', '$idContacto', '$idEmpresa')";
    
    $stmt = $bdd->prepare($sql);
     $stmt ->execute(); 

    if ($stmt == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}