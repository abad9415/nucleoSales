<?php

//incluimos el archivo de configuracion de la BD
include '../../conexionBD.php';
//requerimos de la clase prospectos que esta en el siguiente archivo
require '../../lib/metodos_jefeventas.php';


//Instaciamos la clase vendedor mandamos parametros de la base de datos 
$vendedor = new jefeventas($datosConexionBD);

$vendedor->idvendedor= $_POST['idven'];
$resultado=$vendedor->vendedorid();

while($row=$resultado->fetch_assoc())
{
  
    echo $nombre=$row['nombreusuario']." ".$row['apellidoM']." ".$row['apellidoP'];
   	echo  $domicilio = $row['calle']." #".$row['numerodomicilio']." ".$row['colonia']." ".$row['ciudad'];

  
}

//header('Location: ../views/jefedeventas/jefeventas.php');


?>


