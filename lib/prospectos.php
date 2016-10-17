<?php
session_start(); //Iniciamos la Sesion o la Continuamos


if(!isset($_SESSION['idvendedor']))
   {
        echo "No hay ninguna sesion iniciada";
		header('Location: ../index.php');
//esto ocurre cuando la sesion caduca.
        
   }

	date_default_timezone_set('America/Tijuana');
    class prospectos{
				var $idprospecto;
        var $nombreEmpresa;
        var $rfcEmpresa;
        var $calleEmpresa;
        var $numeroEmpresa;
        var $coloniaEmpresa;
        var $cpEmpresa;
        var $ciudadEmpresa;
        var $origenProspecto;
        var $colorProspecto;
				var $estadoProspecto;
			
			var $idven;
			
			var $montoOportunidad;
			var $cargoContacto;
			var $monedaOportunidad;
			var $etapaOportunidad;
			var $descripcionOportunidad;
			
			var $primeraFecha;
			var $ultimaFecha;
			var $idOportunidad;
			var $costoOportunidad;
      var $limit;
			var $nroLotes;
			var $descripcionCot;
			var $caracteristicasCot;
			var $extrasCot;
			var $despedidaCot;
			var $idVendedor;
			var $firmaCot;
			var $idconfigCotizacion;
			var $idContacto;
			var $costoInstalacion;
			var $periodosPagos;
			var $comision;
			var $fechaSistemaDesdeAction;
			var $fotoVendedor;
			var $ultimoIdOportunidad;
			var $archivo;
        
          //Declaramos el método constructor
		 function __construct($datosConexionBD){
		 	$this->datosConexionBD=$datosConexionBD;
		 }
			
			public function obtenerOrigenes(){
				$mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT * FROM origenprospecto";
						$resultado = $mysqli->query($query);
            if(!$resultado){//If es una condicional
                printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
            }
						$mysqli->close();//cierra la conexion con la BD
									return $resultado;
			}
			
			public function obtenerEstados(){
				$mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT * FROM EstadoProspecto";
						$resultado = $mysqli->query($query);
            if(!$resultado){//If es una condicional
                printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
            }
						$mysqli->close();//cierra la conexion con la BD
									return $resultado;
				}
			
				public function obtenerEtapas(){
				$mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT * FROM etapadeventa";
						$resultado = $mysqli->query($query);
            if(!$resultado){//If es una condicional
                printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
            }
						$mysqli->close();//cierra la conexion con la BD
									return $resultado;
				}
        
			public function obtenerMonedas(){
				$mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT * FROM Moneda";
						$resultado = $mysqli->query($query);
            if(!$resultado){//If es una condicional
                printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
            }
						$mysqli->close();//cierra la conexion con la BD
									return $resultado;
				}
			
        public function altaProspecto(){
						//$fechaSistema = date("d-m-y");
					$idvendedor=$_SESSION['idvendedor'];
            /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "INSERT INTO prospecto 
						(idprospecto,
						nombre,
						rfc,
						calle,
						numerodomicilio,
						ciudad,
						colonia,
						cp,
						fechadecreacion,
						idvendedor,
						idorigen,
						idestado,
						color)
						VALUES (NULL,
						'".$this->nombreEmpresa."',
						'".$this->rfcEmpresa."',
						'".$this->calleEmpresa."',
						'".$this->numeroEmpresa."',
						'".$this->ciudadEmpresa."',
						'".$this->coloniaEmpresa."',
						'".$this->cpEmpresa."',
						NULL,
						'".$idvendedor."',
						'".$this->origenProspecto."',
						'".$this->estadoProspecto."',
						'".$this->colorProspecto."')";
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
			public function ultimoIdProspecto(){
				/* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT MAX(idprospecto) AS idprospecto FROM prospecto";
						$resultado = $mysqli->query($query);
            if(!$resultado){//If es una condicional
                printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
            }
						$mysqli->close();//cierra la conexion con la BD
									return $resultado;
			}
			
			public function altaRelacionContactoProspecto(){
						/* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "INSERT INTO contactoProspecto
								(idprospecto,
								idcontacto)
								VALUES (
								'".$this->ultimoIdProspecto."',
								'".$this->ultimoIdContacto."')";
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
			public function consultarUltimoProspecto(){
				 /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT * FROM prospecto WHERE idprospecto ='".$this->ultimoIdProspecto."'";
						$resultado = $mysqli->query($query);
            if(!$resultado){//If es una condicional
                printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
            }
						$mysqli->close();//cierra la conexion con la BD
									return $resultado;
			}
			
			public function actualizarProspecto(){
				//$fechaSistema = date("d-m-y");
				$mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
				/* check connection */
				if (mysqli_connect_errno()) {
					printf("Error de conexión: %s\n", mysqli_connect_error());
					exit();
				}
				$query ="
								UPDATE  prospecto 
									SET 
										nombre = '".$this->nombreEmpresa."',
										rfc = '".$this->rfcEmpresa."',
										calle = '".$this->calleEmpresa."',
										numerodomicilio = '".$this->numeroEmpresa."', 
										ciudad = '".$this->ciudadEmpresa."', 
										colonia = '".$this->coloniaEmpresa."', 
										cp = '".$this->cpEmpresa."',
										idorigen = '".$this->origenProspecto."',
										color = '".$this->colorProspecto."',
										idestado = '".$this->estadoProspecto."'
									WHERE idprospecto = '".$this->idprospecto."' ";
				
						$resultado = $mysqli->query($query);
				if (!$resultado) {
						 return (printf ("Errormessage: %s\n", $mysqli->error));
					}else{
						/* close connection */
						$mysqli->close();
						return 'Cambio exitoso';
					}
			}
			
			 public function consultarProspectos(){
				 $idvendedor=$_SESSION['idvendedor'];
             /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
						if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT * FROM prospecto WHERE idvendedor = '".$idvendedor."' ";//sentencia de SQL para realizar una consulta
						$resultado = $mysqli->query($query);
						if(!$resultado){//If es una condicional
								printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
						}
						$mysqli->close();//cierra la conexion con la BD
									return $resultado;
				}
			
			 public function consultarProspectosXfecha(){
				 $idvendedor=$_SESSION['idvendedor'];
             /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
						if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT * FROM prospecto WHERE idvendedor = '".$idvendedor."' AND fechadecreacion BETWEEN '".$this->primeraFecha."' AND '".$this->ultimaFecha."' ";//sentencia de SQL para realizar una consulta
						$resultado = $mysqli->query($query);
						if(!$resultado){//If es una condicional
								printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
						}
						$mysqli->close();//cierra la conexion con la BD
									return $resultado;
				}
			
			public function nombreProspectoXId(){
             /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
						if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT nombre FROM origenprospecto WHERE idorigen ='".$this->origenProspecto."' ";//sentencia de SQL para realizar una consulta
						$resultado = $mysqli->query($query);
						if(!$resultado){//If es una condicional
								printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
						}
						$mysqli->close();//cierra la conexion con la BD
									return $resultado;
				}
			
			public function nombreEstadoXId(){
             /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
						if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT nombre FROM EstadoProspecto WHERE idestado ='".$this->estadoProspecto."' ";//sentencia de SQL para realizar una consulta
						$resultado = $mysqli->query($query);
						if(!$resultado){//If es una condicional
								printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
						}
						$mysqli->close();//cierra la conexion con la BD
									return $resultado;
				}
			
			
				public function nombreEtapaXId(){
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
				
						if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT nombre FROM etapadeventa WHERE idetapa ='".$this->etapaProspecto."' ";//sentencia de SQL para realizar una consulta
						$resultado = $mysqli->query($query);
						if(!$resultado){//If es una condicional
								printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
						}
						$mysqli->close();//cierra la conexion con la BD
									return $resultado;
				} 
			
			public function consultarEmpresaXId(){
             /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
						if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT * FROM prospecto WHERE idprospecto ='".$this->idprospecto."' ";//sentencia de SQL para realizar una consulta
						$resultado = $mysqli->query($query);
						if(!$resultado){//If es una condicional
								printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
						}
						$mysqli->close();//cierra la conexion con la BD
									return $resultado;
				}
			
			public function consultarRelacionDeProspectosContactos(){
             /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
						if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT idcontacto FROM contactoProspecto WHERE idprospecto ='".$this->idprospecto."' ";//sentencia de SQL para realizar una consulta
						$resultado = $mysqli->query($query);
						if(!$resultado){//If es una condicional
								printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
						}
						$mysqli->close();//cierra la conexion con la BD
									return $resultado;
				}
			
			public function consultarProspectosesteAno(){
             /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
						if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						//$query = "SELECT * FROM prospecto WHERE MONTH(fechadecreacion) = 10 AND YEAR(fechadecreacion) = 2016";//sentencia de SQL para realizar una consulta
						$query = "SELECT * FROM prospecto WHERE YEAR(fechadecreacion) = 2014";
						$resultado = $mysqli->query($query);
						if(!$resultado){//If es una condicional
								printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
						}
						$mysqli->close();//cierra la conexion con la BD
									return $resultado;
				}
			
			 public function altaOportunidad(){
						$fechaSistema = date("Y-m-d");
            /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "INSERT INTO oportunidad 
						(idoportunidad,
						descripcion,
						periodosPagos,
						monto,
						idmoneda,
						idprospecto,
						idetapa,
						idcontacto,
						fechadeetapa,
						comision)
						VALUES (NULL,
						'".$this->descripcionOportunidad."',
						'".$this->periodosPagos."',
						'".$this->montoOportunidad."',
						'".$this->monedaOportunidad."',
						'".$this->ultimoIdProspecto."',
						'".$this->etapaOportunidad."',
						'".$this->idContacto."',
						'".$fechaSistema."',
						'".$this->comision."')";
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
			
			public function consultarOportunidadesXprospecto(){
				 /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT * FROM oportunidad WHERE idprospecto ='".$this->idprospecto."'";
						$resultado = $mysqli->query($query);
            if(!$resultado){//If es una condicional
                printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
            }
						$mysqli->close();//cierra la conexion con la BD
									return $resultado;
			}
			
				public function consultartodaoportunidadXprospecto(){
				 /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT  oportunidad.descripcion , oportunidad.monto , Moneda.nombre as nombremoneda, etapadeventa.nombre as nombreetapa  FROM oportunidad 
											inner join Moneda  ON oportunidad.idmoneda = Moneda.idmoneda
											inner join etapadeventa ON oportunidad.idetapa = etapadeventa.idetapa 
											where oportunidad.idprospecto=".$this->idprospecto;
						$resultado = $mysqli->query($query);
            if(!$resultado){//If es una condicional
                printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
            }
						$mysqli->close();//cierra la conexion con la BD
									return $resultado;
			}
			
			public function consultarProspectoXId(){
				 /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT * FROM prospecto WHERE idprospecto ='".$this->idprospecto."'";
						$resultado = $mysqli->query($query);
            if(!$resultado){//If es una condicional
                printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
            }
						$mysqli->close();//cierra la conexion con la BD
									return $resultado;
			}
			public function todosContactoxProspecto(){
				 /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT contacto.nombre , contacto.apellidoP, contacto.apellidoM , contacto.cargo,contacto.telefono , contacto.correo FROM  contacto  
											INNER JOIN contactoProspecto ON  contacto.idcontacto = contactoProspecto.idcontacto 
											INNER JOIN prospecto ON prospecto.idprospecto = contactoProspecto.idprospecto 
											where prospecto.idprospecto=".$this->idprospecto." and contacto.show=0;";
						$resultado = $mysqli->query($query);
            if(!$resultado){//If es una condicional
                printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
            }
						$mysqli->close();//cierra la conexion con la BD
									return $resultado;
			}
			
			public function consultarOportunidadXiD(){
				 /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT * FROM oportunidad WHERE idoportunidad ='".$this->idOportunidad."'";
						$resultado = $mysqli->query($query);
            if(!$resultado){//If es una condicional
                printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
            }
						$mysqli->close();//cierra la conexion con la BD
									return $resultado;
			}
			
			public function agendaprospecto(){
				 /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT contacto.nombre as nombrecontacto , agenda.descripcion , agenda.Defecha , agenda.Dehora FROM agenda 
											inner join contacto on agenda.idcontacto = contacto.idcontacto
											WHERE idprospecto =".$this->idprospecto;
						$resultado = $mysqli->query($query);
            if(!$resultado){//If es una condicional
                printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
            }
						$mysqli->close();//cierra la conexion con la BD
									return $resultado;
			}
			public function obtenerMonedaXId(){
				$mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT * FROM Moneda WHERE idmoneda ='".$this->idmoneda."'";
						$resultado = $mysqli->query($query);
            if(!$resultado){//If es una condicional
                printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
            }
						$mysqli->close();//cierra la conexion con la BD
									return $resultado;
				}
			
			public function actualizarOportunidad(){
				//$fechaSistema = date("d-m-y");
				$mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
				/* check connection */
				if (mysqli_connect_errno()) {
					printf("Error de conexión: %s\n", mysqli_connect_error());
					exit();
				}
				$query ="
								UPDATE oportunidad 
									SET 
										descripcion = '".$this->descripcionOportunidad."',	
										periodosPagos = '".$this->periodosPagos."',
										monto = '".$this->montoOportunidad."',
										idmoneda = '".$this->monedaOportunidad."', 
										idcontacto = '".$this->idContacto."', 
										idetapa = '".$this->etapaOportunidad."',
										fechadeetapa = '".$this->fechaSistemaDesdeAction."',
										comision = '".$this->comision."'
									WHERE idoportunidad = '".$this->idOportunidad."' ";
				
						$resultado = $mysqli->query($query);
				if (!$resultado) {
						 return (printf ("Errormessage: %s\n", $mysqli->error));
					}else{
						/* close connection */
						$mysqli->close();
						return 'Cambio exitoso';
					}
			}
			
			 public function consultarTotaldeTodoslosProspectosXfecha(){
				 $idvendedor=$_SESSION['idvendedor'];
					$mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]); //Instanciamos la clase mysqli donde le mandamos los parámetros de conección alojados en config.php

									if(mysqli_connect_errno()) //Se condiciona si al conectar con la BD hay error
									{ //funcion reservada de php que me regresa el número de error de mysqli
										return (printf("Error de conexión: %s\n", mysqli_connect_errno())); //%s te imprime una cadena donde describe el error que se presente
										exit(); //función que te saca de la aplicación
									}
									$query = "SELECT COUNT(idprospecto) as total FROM prospecto WHERE idvendedor ='".$idvendedor."' AND fechadecreacion BETWEEN '".$this->primeraFecha."' AND '".$this->ultimaFecha."' ";
				 
									$resultado = $mysqli->query($query); //Se vacían el resultado o conjunto de tados dentro una variable $resultado para luego ser condicionada
									if(!$resultado) 
									{
										return(printf("Errormessage: %s\n", $mysqli->error)); //Si no hay datos en resultados devolverá un mensaje de error
									}
									else
									{
										$row = $resultado->fetch_assoc();
										return $row["total"];
										$mysqli->close(); //Función para cerrar la BD, o sirve para desconectar la aplicación de la BD
									}
				} 
			public function consultarTotaldeTodoslosProspectos(){
				 $idvendedor=$_SESSION['idvendedor'];
					$mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]); //Instanciamos la clase mysqli donde le mandamos los parámetros de conección alojados en config.php

									if(mysqli_connect_errno()) //Se condiciona si al conectar con la BD hay error
									{ //funcion reservada de php que me regresa el número de error de mysqli
										return (printf("Error de conexión: %s\n", mysqli_connect_errno())); //%s te imprime una cadena donde describe el error que se presente
										exit(); //función que te saca de la aplicación
									}
									$query = "SELECT COUNT(idprospecto) as total FROM prospecto WHERE idvendedor ='".$idvendedor."'";
				 
									$resultado = $mysqli->query($query); //Se vacían el resultado o conjunto de tados dentro una variable $resultado para luego ser condicionada
									if(!$resultado) 
									{
										return(printf("Errormessage: %s\n", $mysqli->error)); //Si no hay datos en resultados devolverá un mensaje de error
									}
									else
									{
										$row = $resultado->fetch_assoc();
										return $row["total"];
										$mysqli->close(); //Función para cerrar la BD, o sirve para desconectar la aplicación de la BD
									}
				} 
			public function consultarProspectosConLimites(){
				$limit = $this->limit;
				$nroLotes = $this->nroLotes;
					$idvendedor=$_SESSION['idvendedor'];
					try {
							$conexion = new PDO('mysql:host=localhost;dbname='.$this->datosConexionBD[3], $this->datosConexionBD[1], $this->datosConexionBD[2]);

							$resultado = $conexion->prepare("SELECT * FROM prospecto WHERE idvendedor = $idvendedor LIMIT $limit, $nroLotes");
						$resultado->execute();
							return $resultado;

					} catch (PDOException $e) {
							return false;
					}
				}
			
			
			public function consultarProspectosConLimitesXfechas(){
				$limit = $this->limit;
				$nroLotes = $this->nroLotes;
				$primeraFecha = $this->primeraFecha;
				$ultimaFecha = $this->ultimaFecha;
					$idvendedor=$_SESSION['idvendedor'];
					try {
							$conexion = new PDO('mysql:host=localhost;dbname='.$this->datosConexionBD[3], $this->datosConexionBD[1], $this->datosConexionBD[2]);

							$resultado = $conexion->prepare("SELECT * FROM prospecto WHERE idvendedor = $idvendedor AND fechadecreacion BETWEEN '$primeraFecha' AND '$ultimaFecha' LIMIT $limit, $nroLotes");
						$resultado->execute();
							return $resultado;

					} catch (PDOException $e) {
							return false;
					}
				}
			 public function altaConfigCotizacion(){
						//$fechaSistema = date("d-m-y");
					$idvendedor=$_SESSION['idvendedor'];
            /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "INSERT INTO configCotizacion 
						(idconfigCotizacion,
						descripcion,
						caracteristicas,
						extras,
						despedida,
						firma,
						idvendedor)
						VALUES (NULL,
						'".$this->descripcionCot."',
						'".$this->caracteristicasCot."',
						'".$this->extrasCot."',
						'".$this->despedidaCot."',
						'".$this->firmaCot."',
						'".$idvendedor."')";
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
			public function consultarConfigCotizacionXvendedor(){
					$idvendedor=$_SESSION['idvendedor'];
					try {
							$conexion = new PDO('mysql:host=localhost;dbname='.$this->datosConexionBD[3], $this->datosConexionBD[1], $this->datosConexionBD[2]);

							$resultado = $conexion->prepare("SELECT * FROM configCotizacion WHERE idvendedor = $idvendedor ");
						$resultado->execute();
							return $resultado;

					} catch (PDOException $e) {
							return false;
					}
				}
			
				public function actualizarConfigCotizacion(){
				//$fechaSistema = date("d-m-y");
				$mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
				/* check connection */
				if (mysqli_connect_errno()) {
					printf("Error de conexión: %s\n", mysqli_connect_error());
					exit();
				}
				$query ="
								UPDATE  configCotizacion 
									SET 
										descripcion = '".$this->descripcionCot."',						
										caracteristicas = '".$this->caracteristicasCot."',
										extras = '".$this->extrasCot."', 
										despedida = '".$this->despedidaCot."', 
										firma = '".$this->firmaCot."'
									WHERE idconfigCotizacion = '".$this->idconfigCotizacion."' ";
				
						$resultado = $mysqli->query($query);
				if (!$resultado) {
						 return (printf ("Errormessage: %s\n", $mysqli->error));
					}else{
						/* close connection */
						$mysqli->close();
						return 'Cambio exitoso';
					}
			}
			
				public function citasdevendedor(){
					$vendedor=$_SESSION['idvendedor'];
				 /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT prospecto.nombre as prospecto, contacto.nombre as nombrecontacto , agenda.descripcion , agenda.Defecha , agenda.Dehora FROM agenda 
											inner join contacto on agenda.idcontacto = contacto.idcontacto
											inner join contactoProspecto on contacto.idcontacto = contactoProspecto.idcontacto
											inner join prospecto on contactoProspecto.idprospecto = prospecto.idprospecto
											WHERE contacto.show = 0 and prospecto.idvendedor=".$vendedor." and agenda.Defecha BETWEEN ".$this->primeraFecha." and ".$this->ultimaFecha ;
						$resultado = $mysqli->query($query);
            if(!$resultado){//If es una condicional
                printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
            }
						$mysqli->close();//cierra la conexion con la BD
									return $resultado;
			}
				public function prospectosxvendedor(){
					$vendedor=$_SESSION['idvendedor'];
				 /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT * from prospecto where idvendedor = ".$this->idven ;
						$resultado = $mysqli->query($query);
            if(!$resultado){//If es una condicional
                printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
            }
						$mysqli->close();//cierra la conexion con la BD
									return $resultado;
			}
			
			
			public function validarRFC(){
					$rfcEmpresa = $this->rfcEmpresa;
					try {
							$conexion = new PDO('mysql:host=localhost;dbname='.$this->datosConexionBD[3], $this->datosConexionBD[1], $this->datosConexionBD[2]);

							$resultado = $conexion->prepare("SELECT * FROM prospecto WHERE rfc = '$rfcEmpresa' ");
						$resultado->execute();
							return $resultado;

					} catch (PDOException $e) {
							return false;
					}
				}
			
			/*COMISIONES OPORTUNIDADES*/
			public function consultarcomisionXidVendedor(){
				 /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT * FROM configComisiones WHERE idvendedor ='".$this->idVendedor."'";
						$resultado = $mysqli->query($query);
            if(!$resultado){//If es una condicional
                printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
            }
						$mysqli->close();//cierra la conexion con la BD
									return $resultado;
			}
			/*COMISIONES OPORTUNIDADES*/
			
					public function actualizarImagenVendedor(){
				//$fechaSistema = date("d-m-y");
						$vendedor=$_SESSION['idvendedor'];
				$mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
				/* check connection */
				if (mysqli_connect_errno()) {
					printf("Error de conexión: %s\n", mysqli_connect_error());
					exit();
				}
				$query ="
								UPDATE vendedor 
									SET 
										foto = '".$this->fotoVendedor."'
									WHERE idvendedor = '".$vendedor."' ";
				
						$resultado = $mysqli->query($query);
				if (!$resultado) {
						 return (printf ("Errormessage: %s\n", $mysqli->error));
					}else{
						/* close connection */
						$mysqli->close();
						return 'Cambio exitoso';
					}
			}
			
			 public function consultarVendedorXId(){
				 $idvendedor=$_SESSION['idvendedor'];
             /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
						if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT * FROM vendedor WHERE idvendedor = '".$idvendedor."' ";//sentencia de SQL para realizar una consulta
						$resultado = $mysqli->query($query);
						if(!$resultado){//If es una condicional
								printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
						}
						$mysqli->close();//cierra la conexion con la BD
									return $resultado;
				}
			
			public function ultimoIdOportunidad(){
				/* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT MAX(idoportunidad) AS idoportunidad FROM oportunidad";
						$resultado = $mysqli->query($query);
            if(!$resultado){//If es una condicional
                printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
            }
						$mysqli->close();//cierra la conexion con la BD
									return $resultado;
			}
			
			 public function altaArchivoOportunidad(){
            /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "INSERT INTO archivosOportunidad
						(idarchivosOportunidad,
						idoportunidad,
						archivo)
						VALUES (NULL,
						'".$this->ultimoIdOportunidad."',
						'".$this->archivo."')";
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
			
			public function consultarArchivosCotizacion(){
				$limit = $this->limit;
				$nroLotes = $this->nroLotes;
				$idOportunidad = $this->idOportunidad;
					$idvendedor=$_SESSION['idvendedor'];
					try {
							$conexion = new PDO('mysql:host=localhost;dbname='.$this->datosConexionBD[3], $this->datosConexionBD[1], $this->datosConexionBD[2]);

							$resultado = $conexion->prepare("SELECT * FROM archivosOportunidad WHERE idoportunidad = $idOportunidad");
						$resultado->execute();
							return $resultado;

					} catch (PDOException $e) {
							return false;
					}
				}
			
    }
?>