<?php
 include '../../conexionBD.php';
//requerimos de la clase prospectos que esta en el siguiente archivo
require '../../lib/notas.php';

//Instaciamos la clase prospectos
$notas = new notas($datosConexionBD);

$notas->idNota = $_POST['idNota'];
$notas->descripcionNota = $_POST['descripcionNota'];

//mandamos llamar las clases para guardar los datos
echo $notas->actualizarNota();

?>