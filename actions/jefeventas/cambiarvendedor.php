<?PHP
include '../../conexionBD.php';
//requerimos de la clase prospectos que esta en el siguiente archivo
require '../../lib/metodos_jefeventas.php';
require("../../views/Calendario/bdd.php"); 


//Instaciamos la clase vendedor mandamos parametros de la base de datos 
$vendedor = new jefeventas($datosConexionBD);

$vendedor->idvendedor=$_POST["idvendedor"];
$vendedor->idprospecto=$_POST["idprospecto"];
$vendedor->cambiarvendedor();

 $stmt = $bdd->prepare("SELECT prospecto.rfc,prospecto.nombre,prospecto.ciudad,vendedor.correo
												FROM prospecto INNER JOIN vendedor on prospecto.idvendedor=vendedor.idvendedor 
												WHERE vendedor.idvendedor ='".$_POST["idvendedor"]."'  
												AND prospecto.idprospecto= '".$_POST["idprospecto"]."'");
     $stmt ->execute(array($idEtapa,$idProspecto)); 
     $row = $stmt->fetch(PDO::FETCH_ASSOC);

	$Nombre=$row['nombre'];
	$Correo=$row['correo'];
	$RFC=$row['rfc'];
	$Ciudad=$row['ciudad'];
	echo $Nombre;
	echo "*";
	echo $Correo;
	echo "*";
	echo $RFC;
	echo "*";
	echo $Ciudad;

?>
