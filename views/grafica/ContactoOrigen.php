<?php require("../../views/Calendario/bdd.php"); 
session_start(); //Iniciamos la Sesion o la Continuamos


$idvendedor=$_SESSION['idvendedor'];
$origen = $_POST['origen'];
$count=1;
    $stmt = $bdd->prepare("SELECT (prospecto.nombre)as'Nombre'
                           FROM prospecto 
                           INNER JOIN origenprospecto ON prospecto.idorigen = origenprospecto.idorigen 
                           INNER JOIN vendedor on vendedor.idvendedor=prospecto.idvendedor 
                           WHERE origenprospecto.nombre = ? and vendedor.idvendedor=?");
     $stmt ->execute(array($origen,$idvendedor)); 
     //$records = $stmt->fetchAll();
     $row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "<table  style='border-radius: 5px;' class='table table-striped'>";
    echo "  <thead>
             <tr>
                <th></th>
                <th>Nombre Prospecto</th>
              </tr>
           </thead>";
    echo "<tr>";
    echo "<td>";
    echo $count;
    echo "</td>";
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
     echo $row['Nombre'];
     echo "</td></b>";
     echo "</tr>";
     
    }
 
echo "</table>";
?>

