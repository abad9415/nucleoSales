<?php
    class contactos{
				var $idcontacto;
        var $sexoContacto;
        var $nombreContacto;
        var $apePaternoContacto;
        var $apeMaternoContacto;
        var $telefonoContacto;
				var $correoContacto;
        var $cargoContacto;
				var $ultimoIdContacto;
				var $facebookContacto;
				var $twitterContacto;
				var $correoalternativo;
        var $celular;
        //Declaramos el método constructor
		 function __construct($datosConexionBD){
		 	$this->datosConexionBD=$datosConexionBD;
		 }
        
        public function altaContacto(){
            /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
						if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
								$query = "INSERT INTO contacto 
								(idcontacto,
								trato,
								nombre,
								apellidoM,
								apellidoP,
								telefono,
								correo,
								cargo,
								correoalternativo,
								facebook,
								twitter,
								celular)
								VALUES (NULL,
								'".$this->sexoContacto."',
								'".$this->nombreContacto."',
								'".$this->apeMaternoContacto."',
								'".$this->apePaternoContacto."',
								'".$this->telefonoContacto."',
								'".$this->correoContacto."',
								'".$this->cargoContacto."',
								'".$this->correoalternativo."',
								'".$this->facebookContacto."',
								'".$this->twitterContacto."',
								'".$this->celular."')";
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
				public function ultimoIdContacto(){
					/* conectamos a la bd */
							$mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
							/* check connection */
							if (mysqli_connect_errno()) {
								printf("Error de conexión: %s\n", mysqli_connect_error());
								exit();
							}
							$query = "SELECT MAX(idcontacto) AS idcontacto FROM contacto";
							$resultado = $mysqli->query($query);
							if(!$resultado){//If es una condicional
									printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
							}
							$mysqli->close();//cierra la conexion con la BD
										return $resultado;
				}
				public function consultarUltimoContacto(){
				 /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT * FROM contacto WHERE idcontacto ='".$this->ultimoIdContacto."'";
						$resultado = $mysqli->query($query);
            if(!$resultado){//If es una condicional
                printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
            }
						$mysqli->close();//cierra la conexion con la BD
									return $resultado;
			}
			
				public function consultarContactoXId(){
             /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
						if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT * FROM contacto WHERE idcontacto ='".$this->idcontacto."' ";//sentencia de SQL para realizar una consulta
						$resultado = $mysqli->query($query);
						if(!$resultado){//If es una condicional
								printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
						}
						$mysqli->close();//cierra la conexion con la BD
									return $resultado;
				}
			
			//UPDATE  `nucleoSales`.`contacto` SET  `show` =  '1' WHERE  `contacto`.`idcontacto` =98;
		
			
				public function bajaContacto(){
					//$borrado = '1';
					/* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
					$query ="UPDATE  `nucleoSales`.`contacto` 
									SET  `show` =  '1' 
									WHERE  `contacto`.`idcontacto` ='".$this->idcontacto."';";
				
							$resultado = $mysqli->query($query);
					if (!$resultado) {
							 return (printf ("Errormessage: %s\n", $mysqli->error));
						}else{
							/* close connection */
							$mysqli->close();
							return 'Contacto Eliminado';
						}
			}
			
			public function actualizarContacto(){
				//$fechaSistema = date("d-m-y");
				$mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
				/* check connection */
				if (mysqli_connect_errno()) {
					printf("Error de conexión: %s\n", mysqli_connect_error());
					exit();
				}
				$query ="
								UPDATE  contacto 
									SET 
										trato = '".$this->sexoContacto."',						
										nombre = '".$this->nombreContacto."',
										apellidoM = '".$this->apeMaternoContacto."', 
										apellidoP = '".$this->apePaternoContacto."', 
										telefono = '".$this->telefonoContacto."', 
										correo = '".$this->correoContacto."',
										cargo = '".$this->cargoContacto."',
										correoalternativo = '".$this->correoalternativo."', 
										facebook = '".$this->facebookContacto."',
										twitter = '".$this->twitterContacto."',
										celular = '".$this->celular."'
									WHERE idcontacto = '".$this->idcontacto."' ";
				
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