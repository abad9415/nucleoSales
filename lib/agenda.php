<?php
 class agenda{
   var $deFecha;
   var $deHora;
   var $aFecha;
   var $aHora;
   var $descripcionAgenda;
   var $idprospecto;
   var $idContacto;
	 var $idCita;
   
    //Declaramos el método constructor
		 function __construct($datosConexionBD){
		 	$this->datosConexionBD=$datosConexionBD;
		 }
   
   public function altaAgenda(){
     /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
						if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
            $query = "INSERT INTO agenda 
								(idcita,
								Defecha,
								Dehora,
								Afecha,
								AHora,
								descripcion,
								idcontacto,
								idprospecto)
								VALUES (NULL,
								'".$this->deFecha."',
								'".$this->deHora."',
								'".$this->aFecha."',
								'".$this->aHora."',
								'".$this->descripcionAgenda."',
								'".$this->idContacto."',
								'".$this->idprospecto."')";
							$resultado=$mysqli->query($query);
							if (!$resultado) {
								 return (printf ("Errormessage: %s\n", $mysqli->error));
							}
							else{
								/* close connection */
								$mysqli->close();
								return 'Alta exitosa';
							}
   	}
	 		public function consultarAgendaXUsuario(){
				 /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT * FROM agenda WHERE idcontacto ='".$this->idContacto."' AND idprospecto ='".$this->idprospecto."'";
						$resultado = $mysqli->query($query);
            if(!$resultado){//If es una condicional
                printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
            }
						$mysqli->close();//cierra la conexion con la BD
									return $resultado;
			}
	 
	 public function BajaCita(){
			$mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
			/* check connection */
			if (mysqli_connect_errno()) {
				printf("Error de conexión: %s\n", mysqli_connect_error());
				exit();
			}
			$query = "DELETE FROM agenda WHERE idcita = '".$this->idcita."' ";
			$resultado = $mysqli->query($query);
			if (!$resultado) {
				printf("Errormessage: %s\n", $mysqli->error);
			}
			
			/* close connection */
			$mysqli->close();
			return "Se ha eliminado la cita";
		}//LLave del método eliminarUsuario
	 
	 public function consultarCitaXId(){
				 /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT * FROM agenda WHERE idcita ='".$this->idCita."'";
						$resultado = $mysqli->query($query);
            if(!$resultado){//If es una condicional
                printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
            }
						$mysqli->close();//cierra la conexion con la BD
									return $resultado;
			}
	 
	 public function actualizarAgenda(){
				//$fechaSistema = date("d-m-y");
				$mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
				/* check connection */
				if (mysqli_connect_errno()) {
					printf("Error de conexión: %s\n", mysqli_connect_error());
					exit();
				}
				$query ="
								UPDATE  agenda 
									SET 
										Defecha = '".$this->deFecha."',						
										Dehora = '".$this->deHora."',
										Afecha = '".$this->aFecha."', 
										AHora = '".$this->aHora."', 
										descripcion = '".$this->descripcionAgenda."', 
										idcontacto = '".$this->idContacto."'
									WHERE idcita = '".$this->idCita."' ";
				
						$resultado = $mysqli->query($query);
				if (!$resultado) {
						 return (printf ("Errormessage: %s\n", $mysqli->error));
					}else{
						/* close connection */
						$mysqli->close();
						return 'Cambio exitoso';
					}
			}
 }
?>