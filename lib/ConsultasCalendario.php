<?php        //Declaramos el método constructor
//include '../../conexionBD.php';


if(!isset($_SESSION['idvendedor']))
   {
        echo "No hay ninguna sesion iniciada";
		header('Location: ../../index.html');
//esto ocurre cuando la sesion caduca.       
   }
	
		 class EventosC{
       
      function __construct($datosConexionBD){
		 	$this->datosConexionBD=$datosConexionBD;
		 }
				public function llenarCalendario(){
					$idvendedor=$_SESSION['idvendedor'];
				 /* conectamos a la bd */
            		$mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
					$query = "SELECT (idcita)as'id', (descripcion)as'title', concat(Defecha,' ',Dehora)as'start', concat(Afecha,' ',Ahora)as'end',prospecto.color  
							FROM agenda
								INNER JOIN contacto ON agenda.idcontacto = contacto.idcontacto
								INNER JOIN prospecto ON agenda.idprospecto=prospecto.idprospecto
								INNER JOIN vendedor ON vendedor.idvendedor =prospecto.idvendedor 
								where contacto.show = 0 and vendedor.idvendedor ='".$idvendedor."'";
						$resultado = $mysqli->query($query);
            if(!$resultado){//If es una condicional
                printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
            }
						$mysqli->close();//cierra la conexion con la BD
              
									return $resultado;
			}
			 public function llenarCalendarioV(){
					
				 /* conectamos a la bd */
            		$mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
					$query = "SELECT (idcita)as'id', (descripcion)as'title', concat(Defecha,' ',Dehora)as'start', concat(Afecha,' ',Ahora)as'end',prospecto.color  
							FROM agenda
								INNER JOIN contacto ON agenda.idcontacto = contacto.idcontacto
								INNER JOIN prospecto ON agenda.idprospecto=prospecto.idprospecto
								INNER JOIN vendedor ON vendedor.idvendedor =prospecto.idvendedor ";
						$resultado = $mysqli->query($query);
            if(!$resultado){//If es una condicional
                printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
            }
						$mysqli->close();//cierra la conexion con la BD
              
									return $resultado;
			}
			 			
			
			 
			 

       
     }


			?>