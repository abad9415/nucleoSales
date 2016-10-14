<?php 
$fecha1 =  "2016-09-30"; 
$fecha2 = date("Y-m-d"); 
$diferencia = abs((strtotime($fecha1) - strtotime($fecha2))/86400);  
echo $diferencia;
?>