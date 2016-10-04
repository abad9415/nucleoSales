<?php
//incluimos el archivo de configuracion de la BD
include '../../../conexionBD.php';
//requerimos de la clase prospectos que esta en el siguiente archivo
require '../../../lib/metodos_jefeventas.php';
//Instaciamos la clase vendedor mandamos parametros de la base de datos 
$vendedor = new jefeventas($datosConexionBD);
$actionComisionSQL = "";
$vendedor->descripcionComision= $_POST['descripcionComisionGeneral'];
$vendedor->comision= $_POST['comisionGeneral'];
//verificamos si existe ya una configuracion dada de alta en caso de no ser asi, en vez de un insert, sera una update
  $configuracionComisionesExistenteRow = $vendedor->verificarExistenciaComisiones();
  while($row = $configuracionComisionesExistenteRow->fetch_assoc()) {
    $totalComisiones = $row['total'];
  }
if($totalComisiones == 0){
  $actionComisionSQL = 'agregarComisionAtodosVendedores';
}else{
  $actionComisionSQL = 'agregarComisionAtodosVendedoresUpdate';
}
  $vendedoresRow = $vendedor->obtener_vendedores();
   while($row = $vendedoresRow->fetch_assoc()) {
            $vendedor->idvendedor = $row['idvendedor'];
            $vendedor->$actionComisionSQL(); // se agrega la comision a todos los vendedores por igual
                  }
 echo "La comision ahora sera de " . $_POST['comisionGeneral'] . "% Por Venta";
?>