<?php require("../../Calendario/bdd.php"); 

$origen = $_POST['origen'];
$ID= $_POST['IDProspecto'];
$count=1;
		switch($ID){
				case 0;
    $stmt = $bdd->prepare("SELECT (prospecto.nombre)as'Nombre',(vendedor.nombreusuario)as'NombreV'
                           FROM prospecto 
                           INNER JOIN origenprospecto ON prospecto.idorigen = origenprospecto.idorigen 
                           INNER JOIN vendedor on vendedor.idvendedor=prospecto.idvendedor 
                           WHERE origenprospecto.nombre ='".$origen."'");
				break;
				default:
				$stmt = $bdd->prepare("SELECT (prospecto.nombre)as'Nombre',(vendedor.nombreusuario)as'NombreV'
                           FROM prospecto 
                           INNER JOIN origenprospecto ON prospecto.idorigen = origenprospecto.idorigen 
                           INNER JOIN vendedor on vendedor.idvendedor=prospecto.idvendedor 
                           WHERE origenprospecto.nombre ='".$origen."' and vendedor.idvendedor='".$ID."'");
				break;
				}
     $stmt ->execute(); 
     //$records = $stmt->fetchAll();
     $row = $stmt->fetch(PDO::FETCH_ASSOC);
		
    echo "<table  style='border-radius: 5px;' class='table table-hover tableEAT'>";
    echo "  <thead>
             <tr>
                <th></th>
								<th>Nombre Vendedor</th>
                <th>Nombre Prospecto</th>
              </tr>
           </thead>";
    echo "<tr>";
    echo "<td>";
    echo $count;
    echo "</td>";
		echo "<td><b>";
    echo $row['NombreV'];
    echo "</td></b>";
    echo "<td><b>";
    echo $row['Nombre'];
    echo "</td></b>";
    echo "</tr>";
	 while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
     $count++;
     echo "<tr>"; 
     echo "<td>";
     echo $count;
     echo "</td>";
     echo "<td><b>";
     echo $row['NombreV'];
     echo "</td></b>";     
     echo "<td><b>";
     echo $row['Nombre'];
     echo "</td></b>";
     echo "</tr>";
     
    }
 
echo "</table>";

?>