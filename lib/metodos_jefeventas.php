<?php

class jefeventas{
	
  var $nombre;
	var $apm;
	var $app;
	var $correo;
	var $calle;
	var $numero;
	var $colonia;
	var $ciudad;
	var $user;
	var $password;
	var $idvendedor;
	var $idprospecto;
	var $descripcionComision;
	var $comision;
	var $idComision;
	var $telefono;
	var $telefono2;


	
function __construct($datosConexionBD){
			$this->datosConexionBD=$datosConexionBD;
		 }
  
  	public function obtener_vendedores(){
			 $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
						if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT * FROM vendedor";//sentencia de SQL para realizar una consulta
						$resultado = $mysqli->query($query);
						if(!$resultado){//If es una condicional
								printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
						}
						$mysqli->close();//cierra la conexion con la BD
									return $resultado;
  
  
  
}
		public function vendedorid(){
			 $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
						if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT * FROM vendedor where idvendedor=".$this->idvendedor;//sentencia de SQL para realizar una consulta
						$resultado = $mysqli->query($query);
						if(!$resultado){//If es una condicional
								printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
						}
						$mysqli->close();//cierra la conexion con la BD
									return $resultado;
  
  
  
}
	public function eliminarVendedor(){
			 $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
						if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "DELETE FROM vendedor where idvendedor=".$this->idvendedor;//sentencia de SQL para realizar una consulta
						$resultado = $mysqli->query($query);
						if(!$resultado){//If es una condicional
								printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
						}
						$mysqli->close();//cierra la conexion con la BD
									return $resultado;
  
  
  
}
	
		public function editarvendedor(){
			 $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
						if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "UPDATE vendedor 
											SET nombreusuario='".$this->nombre."', 
													apellidoM='".$this->apm."',
													apellidoP='".$this->app."',
													correo='".$this->correo."',
													calle='".$this->calle."',
													numerodomicilio='".$this->numero."',
													colonia='".$this->colonia."',
													ciudad='".$this->ciudad."',
													user='".$this->user."',
													password='".$this->password."',
													telefono='".$this->telefono."',
													telefono2='".$this->telefono2."'
													
													
													Where idvendedor=".$this->idvendedor;//sentencia de SQL para realizar una consulta
						$resultado = $mysqli->query($query);
						if(!$resultado){//If es una condicional
								printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
						}
						$mysqli->close();//cierra la conexion con la BD
									return $resultado;
  
  
  
}
	
	
	
	public function agregarvendedor(){
		
			 $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
						if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "INSERT INTO vendedor (nombreusuario,apellidoM,apellidoP,correo,calle,numerodomicilio,colonia,ciudad,user,password,telefono,telefono2,idtipousuario)
						VALUES (
						'".$this->nombre."',
						'".$this->apm."',
						'".$this->app."',
						'".$this->correo."',
						'".$this->calle."',
						'".$this->numero."',
						'".$this->colonia."',
						'".$this->ciudad."',
						'".$this->user."',
						'".$this->password."',
						'".$this->telefono."',
						'".$this->telefono2."',
						
						1);";//sentencia de SQL para realizar una consulta
						$resultado = $mysqli->query($query);
						if(!$resultado){//If es una condicional
								printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
						}
						$mysqli->close();//cierra la conexion con la BD
								
  
	
	
}
	public function Listadototal($Etapa,$IDV){
				 /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);

						/* check connection */
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
					switch ($IDV){
						case 0:
									$query = "SELECT prospecto.idprospecto,vendedor.nombreusuario, prospecto.nombre, oportunidad.fechadeetapa, oportunidad.monto
									FROM oportunidad
									INNER JOIN etapadeventa ON oportunidad.idetapa = etapadeventa.idetapa
									INNER JOIN prospecto ON oportunidad.idprospecto = prospecto.idprospecto
									INNER JOIN vendedor ON vendedor.idvendedor = prospecto.idvendedor
									WHERE etapadeventa.nombre ='".$Etapa."'";
							break;
						default:
							$query = "SELECT vendedor.nombreusuario, prospecto.nombre, oportunidad.fechadeetapa, oportunidad.monto
									FROM oportunidad
									INNER JOIN etapadeventa ON oportunidad.idetapa = etapadeventa.idetapa
									INNER JOIN prospecto ON oportunidad.idprospecto = prospecto.idprospecto
									INNER JOIN vendedor ON vendedor.idvendedor = prospecto.idvendedor
									WHERE etapadeventa.nombre ='".$Etapa."' and vendedor.idvendedor='".$IDV."'";
							break;
				 				}
						$resultado = $mysqli->query($query);
            if(!$resultado){//If es una condicional
                printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
            }
						$mysqli->close();//cierra la conexion con la BD
              
									return $resultado;
			}
		public function consultarEtapas(){
				 /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT * FROM  etapadeventa ";
						$resultado = $mysqli->query($query);
            if(!$resultado){//If es una condicional
                printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
            }
						$mysqli->close();//cierra la conexion con la BD
              
									return $resultado;
			}
	
		public function etapasvendedores($idetapaP,$IDV){
				 /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
			
						
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						switch($IDV){
										case 0:
											
											$query = "SELECT COUNT( oportunidad.idetapa ) AS  'Netapas' 
											FROM etapadeventa 
											INNER JOIN oportunidad ON etapadeventa.idetapa = oportunidad.idetapa 
											INNER JOIN prospecto ON oportunidad.idprospecto = prospecto.idprospecto  
											WHERE etapadeventa.idetapa ='".$idetapaP."'";
										break;
										default:
											
											$query = "SELECT COUNT( oportunidad.idetapa ) AS  'Netapas' 
											FROM etapadeventa 
											INNER JOIN oportunidad ON etapadeventa.idetapa = oportunidad.idetapa 
											INNER JOIN prospecto ON oportunidad.idprospecto = prospecto.idprospecto  
											INNER JOIN vendedor on vendedor.idvendedor=prospecto.idvendedor 
											WHERE etapadeventa.idetapa ='".$idetapaP."' and vendedor.idvendedor='".$IDV."'";
										break;
											}
						$resultado = $mysqli->query($query);
            if(!$resultado){//If es una condicional
                printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
            }
						$mysqli->close();//cierra la conexion con la BD
              
									return $resultado;
			}
	
		public function selectVendedores(){
				 /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
			
						
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT idvendedor,concat(nombreusuario,' ',apellidoP,' ',apellidoM)As'Nombre' FROM vendedor
											WHERE idtipousuario =1";
						$resultado = $mysqli->query($query);
            if(!$resultado){//If es una condicional
                printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
            }
						$mysqli->close();//cierra la conexion con la BD
              
									return $resultado;
			}
	
	//<--Metas
			 public function CGanado($mes,$anio){
				 /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
						
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT COUNT( oportunidad.idetapa ) AS  'TotalV' 
											FROM etapadeventa 
											INNER JOIN oportunidad ON etapadeventa.idetapa = oportunidad.idetapa 
											INNER JOIN prospecto ON oportunidad.idprospecto = prospecto.idprospecto 
											INNER JOIN vendedor on vendedor.idvendedor=prospecto.idvendedor 
											WHERE etapadeventa.idetapa =6 and MONTH(oportunidad.fechadeetapa) ='".$mes."' 
											and YEAR(oportunidad.fechadeetapa)='".$anio."'";
						$resultado = $mysqli->query($query);
            if(!$resultado){//If es una condicional
                printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
            }
						$mysqli->close();//cierra la conexion con la BD
              
									return $resultado;
			}	
			 
			 			 public function CVentas($mes,$anio){
				 /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
						$idvendedor=$_SESSION["idvendedor"];
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT Metas.Ventas,Metas.Ventas, Metas.Ventas, Metas.Citas, Metas.Prospectos
											FROM Metas 
											INNER JOIN vendedor on vendedor.idvendedor=Metas.idVendedor 
											WHERE MONTH(Metas.fecha) ='".$mes."'
											and YEAR(Metas.fecha)='".$anio."'
											and vendedor.idvendedor='".$idvendedor."'";
						$resultado = $mysqli->query($query);
            if(!$resultado){//If es una condicional
                printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
            }
						$mysqli->close();//cierra la conexion con la BD
              
									return $resultado;
			}
       
			 public function Ccitas($mes,$anio){
				 /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
						
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT count(descripcion)as'Citas'
											FROM agenda
											INNER JOIN contacto ON agenda.idcontacto = contacto.idcontacto
											INNER JOIN prospecto ON agenda.idprospecto=prospecto.idprospecto
											INNER JOIN vendedor ON vendedor.idvendedor =prospecto.idvendedor 
											where contacto.show = 0 
											and MONTH(Defecha) ='".$mes."'
											and YEAR(Defecha)='".$anio."'";
						$resultado = $mysqli->query($query);
            if(!$resultado){//If es una condicional
                printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
            }
						$mysqli->close();//cierra la conexion con la BD
              
									return $resultado;
			}
			 
			 			 public function Cprospecto($mes,$anio){
				 /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
						
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT count(nombre)as'Prospectos' FROM prospecto
											inner join vendedor on vendedor.idvendedor=prospecto.idvendedor
											WHERE MONTH(fechadecreacion) ='".$mes."'
											and YEAR(fechadecreacion)='".$anio."'";
						$resultado = $mysqli->query($query);
            if(!$resultado){//If es una condicional
                printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
            }
						$mysqli->close();//cierra la conexion con la BD
              
									return $resultado;
			}
			 //Metas-->
	
		public function cambiarvendedor(){
			 $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
						if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "UPDATE prospecto SET idvendedor=".$this->idvendedor." WHERE idprospecto=".$this->idprospecto;//sentencia de SQL para realizar una consulta
						$resultado = $mysqli->query($query);
						if(!$resultado){//If es una condicional
								printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
						}
						$mysqli->close();//cierra la conexion con la BD
									return $resultado;
			}
	######################## 	C	O	M	I	S	I	O	N	E	S     C	O	M	I	S	I	O	N	E	S   C	O	M	I	S	I	O	N	E	S ############################
		public function agregarComisionAtodosVendedores(){
			 $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
						if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "INSERT INTO configComisiones (idvendedor,comision)
						VALUES (
						'".$this->idvendedor."',
						'".$this->comision."');";//sentencia de SQL para realizar una consulta
						$resultado = $mysqli->query($query);
						if(!$resultado){//If es una condicional
								printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
						}
						$mysqli->close();//cierra la conexion con la BD
			}
	
	public function verificarExistenciaComisiones(){
			 $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
						if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "select count(*) as total from configComisiones";//sentencia de SQL para realizar una consulta
						$resultado = $mysqli->query($query);
						if(!$resultado){//If es una condicional
								printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
						}
						$mysqli->close();//cierra la conexion con la BD
									return $resultado;
	}
	
		public function agregarComisionAtodosVendedoresUpdate(){
			 $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
						if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "UPDATE configComisiones 
											SET comision='".$this->comision."'
													Where idvendedor=".$this->idvendedor;//sentencia de SQL para realizar una consulta
						$resultado = $mysqli->query($query);
						if(!$resultado){//If es una condicional
								printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
						}
						$mysqli->close();//cierra la conexion con la BD
									return $resultado;
		}
	
	public function obtener_configComisiones(){
			 $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
						if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT * FROM configComisiones";//sentencia de SQL para realizar una consulta
						$resultado = $mysqli->query($query);
						if(!$resultado){//If es una condicional
								printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
						}
						$mysqli->close();//cierra la conexion con la BD
									return $resultado;
		}	
	public function obtener_configComisionesXidVendedor(){
			 $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
						if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT * FROM configComisiones where idvendedor=".$this->idvendedor;
						$resultado = $mysqli->query($query);
						if(!$resultado){//If es una condicional
								printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
						}
						$mysqli->close();//cierra la conexion con la BD
									return $resultado;
		}
	public function cambiarComisionXvendedor(){
			 $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
						if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "UPDATE configComisiones 
											SET comision='".$this->comision."'
													Where idcomision=".$this->idComision;//sentencia de SQL para realizar una consulta
						$resultado = $mysqli->query($query);
						if(!$resultado){//If es una condicional
								printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
						}
						$mysqli->close();//cierra la conexion con la BD
									return "Cambio Exitoso";
		}
		public function ultimoVendedor(){
				/* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT MAX(idvendedor) AS idvendedor FROM vendedor";
						$resultado = $mysqli->query($query);
            if(!$resultado){//If es una condicional
                printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
            }
						$mysqli->close();//cierra la conexion con la BD
									return $resultado;
			}
	
		public function altaComisionVendedorNuevo(){
					 $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
						if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "INSERT INTO configComisiones (idvendedor,comision)
						VALUES (
						'".$this->idvendedor."',
						'".$this->comision."');";//sentencia de SQL para realizar una consulta
						$resultado = $mysqli->query($query);
						if(!$resultado){//If es una condicional
								printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
						}
						$mysqli->close();//cierra la conexion con la BD
			}
	######################## 	/C	O	M	I	S	I	O	N	E	S     /C	O	M	I	S	I	O	N	E	S   /C	O	M	I	S	I	O	N	E	S ######################
	
}

?>