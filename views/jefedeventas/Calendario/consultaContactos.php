<?php
require("bdd.php"); 
    $id = $_POST['id'];
  
    $stmt = $bdd->prepare("SELECT contacto.idcontacto,concat(contacto.nombre,' ',contacto.apellidoP,' ',contacto.apellidoM)as'Nombre' FROM contacto
inner join contactoProspecto on contactoProspecto.idcontacto=contacto.idcontacto
where contactoProspecto.idprospecto=? and contacto.show=0");
     $stmt ->execute(array($id)); 
     
    $Select= '<option selected="selected" disabled="disabled">Contactos</option>';
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
      $Select=$Select.'<option value="'.$row['idcontacto'].'">'.$row['Nombre'].'</option>';
    }
die ($Select);