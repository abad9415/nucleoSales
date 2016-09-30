<?php session_start(); //esta linea tiene que ir antes de cualquier cosa, incluso de espacios  


 if(!isset($_SESSION['session']))
   {
        echo "No hay ninguna sesion iniciada";
		header('Location: ../../index.php');
//esto ocurre cuando la sesion caduca.
        
   }
   else
   { 
     session_destroy();
header('Location: ../../index.php');
       
	 }
 ?>