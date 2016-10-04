<?php
session_start(); //Iniciamos la Sesion o la Continuamos


if(!isset($_SESSION['idvendedor']))
   {
        echo "No hay ninguna sesion iniciada";
		header('Location: ../index.php');
//esto ocurre cuando la sesion caduca.
        
   }

	date_default_timezone_set('America/Tijuana');
    class usuarios{
				var $idvendedor;
        var $foto;
        
          //Declaramos el método constructor
		 function __construct($datosConexionBD){
		 	$this->datosConexionBD=$datosConexionBD;
		 }
			public function actualizarFotoVendedor(){
        
      }
    }
?>