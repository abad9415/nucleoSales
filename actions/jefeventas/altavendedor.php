<?php

//incluimos el archivo de configuracion de la BD
include '../../conexionBD.php';
//requerimos de la clase prospectos que esta en el siguiente archivo
require '../../lib/metodos_jefeventas.php';


//Instaciamos la clase vendedor mandamos parametros de la base de datos 
$vendedor = new jefeventas($datosConexionBD);

$vendedor->nombre= $_POST['nombre'];
$vendedor->apm= $_POST['apm'];
$vendedor->app= $_POST['app'];
$vendedor->correo= $_POST['correo'];
$vendedor->calle= $_POST['calle'];
$vendedor->numero= $_POST['numero'];
$vendedor->colonia= $_POST['colonia'];
$vendedor->ciudad= $_POST['ciudad'];
$vendedor->user= $_POST['user'];
$vendedor->password= $_POST['password'];
$vendedor->agregarvendedor();

//PARTE COMISIONES
$ultimoVendedorRow = $vendedor->ultimoVendedor();
while($row = $ultimoVendedorRow->fetch_assoc()) {
          $ultimoVendedor = $row['idvendedor'];
                }
$vendedor->idvendedor = $ultimoVendedor;
$vendedor->comision= $_POST['comision'];
$vendedor->altaComisionVendedorNuevo();
//PARTE COMISIONES



?>


