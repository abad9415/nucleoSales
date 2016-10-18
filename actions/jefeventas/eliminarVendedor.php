<?php

//incluimos el archivo de configuracion de la BD
include '../../conexionBD.php';
//requerimos de la clase prospectos que esta en el siguiente archivo
require '../../lib/metodos_jefeventas.php';


//Instaciamos la clase vendedor mandamos parametros de la base de datos 
$vendedor = new jefeventas($datosConexionBD);

$vendedor->idvendedor= $_POST['idven'];
$vendedor->eliminarVendedor();