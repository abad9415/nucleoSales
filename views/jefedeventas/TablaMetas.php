<?php require("../../views/Calendario/bdd.php"); 
session_start(); //Iniciamos la Sesion o la Continuamos


$idvendedor=$_SESSION['idvendedor'];
$mes = $_POST['mes'];
$anio=$_POST['anio'];

    $stmt = $bdd->prepare("SELECT Ventas,Prospectos,Citas FROM Metas 
                            WHERE idVendedor=?
                            and MONTH(fecha)=?
                            and YEAR(fecha)=?");
     $stmt ->execute(array($idvendedor,$mes,$anio)); 
     //$records = $stmt->fetchAll();
         $row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "<table  style='border-radius: 5px;' class='table table-striped'>";
    echo "  <thead>
             <tr>
                <th>Ventas</th>
                <th>Prospecto</th>
                <th>Citas</th>
              </tr>
           </thead>";
    echo "<tr>";
    echo "<td><b>";
    echo $row['Ventas'];
    echo "</td></b>";
    echo "<td><b>";
    echo $row['Prospectos'];
    echo "</td></b>";
    echo "<td><b>";
    echo $row['Citas'];
    echo "</td></b>";
    echo "</tr>";
    echo "</table>";

?>