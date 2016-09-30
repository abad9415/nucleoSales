<?php
date_default_timezone_set('America/Tijuana');
class notas{
	var $idNota;
  var $descripcionNota;
  var $idContacto;
  var $idprospecto;
   function __construct($datosConexionBD){
		 	$this->datosConexionBD=$datosConexionBD;
		 }
  public function altaNota(){
    $fechaSistema = date("Y-m-d");
    $time = date('H:i:s', time());
    $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
						if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
            $query = "INSERT INTO notas 
								(	idNota,
								descripcion,
								idcontacto,
								idprospecto,
								hora,
								fecha)
								VALUES (NULL,
								'".$this->descripcionNota."',
								'".$this->idContacto."',
								'".$this->idprospecto."',
								'".$time."',
								'".$fechaSistema."')";
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
				public function consultarNotas(){
				 /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT * FROM notas WHERE idprospecto ='".$this->idprospecto."' AND idcontacto='".$this->idContacto."'";
						$resultado = $mysqli->query($query);
            if(!$resultado){//If es una condicional
                printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
            }
						$mysqli->close();//cierra la conexion con la BD
									return $resultado;
			}
			
		public function consultarNotaXId(){
				 /* conectamos a la bd */
              $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
						if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT * FROM notas WHERE idNota ='".$this->idNota."' ";//sentencia de SQL para realizar una consulta
						$resultado = $mysqli->query($query);
						if(!$resultado){//If es una condicional
								printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
						}
						$mysqli->close();//cierra la conexion con la BD
									return $resultado;
			}
	
			public function actualizarNota(){
				//$fechaSistema = date("d-m-y");
				$mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
				/* check connection */
				if (mysqli_connect_errno()) {
					printf("Error de conexión: %s\n", mysqli_connect_error());
					exit();
				}
				$query ="
								UPDATE  notas 
									SET 
										descripcion = '".$this->descripcionNota."'
									WHERE idNota = '".$this->idNota."' ";
				
						$resultado = $mysqli->query($query);
				if (!$resultado) {
						 return (printf ("Errormessage: %s\n", $mysqli->error));
					}else{
						/* close connection */
						$mysqli->close();
						return 'Cambio exitoso';
					}
			}
	
	 public function BajaNota(){
			$mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
			/* check connection */
			if (mysqli_connect_errno()) {
				printf("Error de conexión: %s\n", mysqli_connect_error());
				exit();
			}
			$query = "DELETE FROM notas WHERE idNota = '".$this->idNota."' ";
			$resultado = $mysqli->query($query);
			if (!$resultado) {
				printf("Errormessage: %s\n", $mysqli->error);
			}
			
			/* close connection */
			$mysqli->close();
			return "Se ha eliminado la Nota";
		}//LLave del método eliminarUsuario
}
?>