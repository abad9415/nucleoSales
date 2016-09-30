<?php 
require_once('../views/Calendario/bdd.php');
session_start(); //Iniciamos la Sesion o la Continuamos
$idvendedor=$_SESSION['idvendedor'];
$anio=$_POST['anio'];
$mes=$_POST['mes'];
$Nmes=0;
switch ($mes) {
    case "Enero":
        $Nmes=1;
        break;
    case "Febrero":
        $Nmes=2;
        break;
        case "Marzo":
        $Nmes=3;
        break;
        case "Abril":
        $Nmes=4;
        break;
        case "Mayo":
        $Nmes=5;
        break;
        case "Junio":
        $Nmes=6;
        break;
        case "Julio":
        $Nmes=7;
        break;
        case "Agosto":
        $Nmes=8;
        break;
        case "Septiembre":
        $Nmes=9;
        break;
        case "Octubre":
        $Nmes=10;
        break;
        case "Noviembre":
        $Nmes=11;
        break;
        case "Diciembre":
        $Nmes=12;
        break;
    default:
    }  



$count=1;
$Total=0;

    $stmt = $bdd->prepare("SELECT prospecto.nombre, monto
                            FROM etapadeventa
                            INNER JOIN oportunidad ON etapadeventa.idetapa = oportunidad.idetapa
                            INNER JOIN prospecto ON oportunidad.idprospecto = prospecto.idprospecto
                            INNER JOIN vendedor ON vendedor.idvendedor = prospecto.idvendedor
                            WHERE etapadeventa.idetapa =6
                            AND vendedor.idvendedor =? and MONTH(fechadeetapa)=? and YEAR(fechadeetapa) =?");

     $stmt ->execute(array($idvendedor,$Nmes,$anio)); 
     $row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "<table  style='border-radius: 5px;' class='table table-hover tableEAT'>";
    echo "  <thead>
             <tr>
                <th></th>
                <th>Nombre Prospecto</th>
							 	<th>Monto</th>
              </tr>
           </thead>";
    echo "<tr>";
    echo "<td>";
    echo $count;
    echo "</td>";
    echo "<td><b>";
    echo $row['nombre'];
    echo "</td></b>";
    echo "<td><b>";
    echo $row['monto']; $Total+=intval($row['monto']);
    echo "</td></b>";
    echo "</tr>";
	 while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
     $count++;
     echo "<tr>"; 
     echo "<td>";
     echo $count;
     echo "</td>";
     
     echo "<td><b>";
     echo $row['nombre'];
     echo "</td></b>";
     echo "<td><b>";
     echo $row['monto'];$Total+=intval($row['monto']);
     echo "</td></b>";
     
     echo "</tr>";
     
    }
		 echo "<tr>"; 
     echo "<td>";
     echo "</td>";
     echo "<td><b>";
		 echo "Total:";
     echo "</td></b>";
     echo "<td><b>";
     echo $Total;
     echo "</td></b>";
     echo "</tr>"; 
     echo "</table>";

?>
