<?php        //Declaramos el método constructor
session_start(); //Iniciamos la Sesion o la Continuamos


if(!isset($_SESSION['idvendedor']))
   {
        echo "No hay ninguna sesion iniciada";
		header('Location: ../../index.html');
//esto ocurre cuando la sesion caduca.       
   }
	
		 class Setapas{
       
      function __construct($datosConexionBD){
		 	$this->datosConexionBD=$datosConexionBD;
		 }
						public function consultarEtapas(){
				 /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT *FROM  `etapadeventa` ";
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
											
											$query = "SELECT COUNT( oportunidad.idetapa ) AS  'Netapas' 
											FROM etapadeventa 
											INNER JOIN oportunidad ON etapadeventa.idetapa = oportunidad.idetapa 
											INNER JOIN prospecto ON oportunidad.idprospecto = prospecto.idprospecto  
											WHERE etapadeventa.idetapa ='".$idetapaP."'";
									
						$resultado = $mysqli->query($query);
            if(!$resultado){//If es una condicional
                printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
            }
						$mysqli->close();//cierra la conexion con la BD
              
									return $resultado;
			}
			 
			 
			 
			 
			 			public function totalEtapa($idetapaP){
				 /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
						$idvendedor=$_SESSION['idvendedor'];
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT COUNT( oportunidad.idetapa ) AS  'Netapas' 
											FROM etapadeventa 
											INNER JOIN oportunidad ON etapadeventa.idetapa = oportunidad.idetapa 
											INNER JOIN prospecto ON oportunidad.idprospecto = prospecto.idprospecto 
											INNER JOIN vendedor on vendedor.idvendedor=prospecto.idvendedor 
											WHERE etapadeventa.idetapa ='".$idetapaP."' and vendedor.idvendedor='".$idvendedor."'";
						$resultado = $mysqli->query($query);
            if(!$resultado){//If es una condicional
                printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
            }
						$mysqli->close();//cierra la conexion con la BD
              
									return $resultado;
			}
			 		public function condicion(){
				 /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
						$idvendedor=$_SESSION['idvendedor'];
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT COUNT(monto) AS  'Netapas'
											FROM etapadeventa
											INNER JOIN oportunidad ON etapadeventa.idetapa = oportunidad.idetapa
											INNER JOIN prospecto ON oportunidad.idprospecto = prospecto.idprospecto
											INNER JOIN vendedor ON vendedor.idvendedor = prospecto.idvendedor
											WHERE vendedor.idvendedor='".$idvendedor."'";
						$resultado = $mysqli->query($query);
            if(!$resultado){//If es una condicional
                printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
            }
						$mysqli->close();//cierra la conexion con la BD
              
									return $resultado;
			}
			 
			 
			 	 			public function Listado($Etapa){
				 /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						$idvendedor=$_SESSION['idvendedor'];
						/* check connection */
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = 
							"SELECT oportunidad.monto, oportunidad.fechadeetapa, prospecto.nombre,prospecto.idprospecto
								FROM oportunidad 
								INNER JOIN etapadeventa ON oportunidad.idetapa = etapadeventa.idetapa 
								INNER JOIN prospecto ON oportunidad.idprospecto = prospecto.idprospecto 
								INNER JOIN vendedor on vendedor.idvendedor=prospecto.idvendedor 
								WHERE vendedor.idvendedor= '".$idvendedor."' AND etapadeventa.nombre ='".$Etapa."'";
						$resultado = $mysqli->query($query);
            if(!$resultado){//If es una condicional
                printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
            }
						$mysqli->close();//cierra la conexion con la BD
              
									return $resultado;
			}
			 
			 public function ListadoJefe(){
				 /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						$idvendedor=$_SESSION['idvendedor'];
						/* check connection */
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = 
							"SELECT oportunidad.fechadeetapa, (prospecto.nombre)AS 'Nombre', prospecto.idprospecto,CONCAT( nombreusuario,  ' ', apellidoM )  'Vendedor'
								FROM oportunidad
								INNER JOIN etapadeventa ON oportunidad.idetapa = etapadeventa.idetapa
								INNER JOIN prospecto ON oportunidad.idprospecto = prospecto.idprospecto
								INNER JOIN vendedor ON vendedor.idvendedor = prospecto.idvendedor
								WHERE etapadeventa.idetapa BETWEEN 1 AND 3";
						$resultado = $mysqli->query($query);
            if(!$resultado){//If es una condicional
                printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
            }
						$mysqli->close();//cierra la conexion con la BD
              
									return $resultado;
			}
			 
       			
     
     			public function DatosPie(){
				 /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT nombre FROM origenprospecto";
						$resultado = $mysqli->query($query);
            if(!$resultado){//If es una condicional
                printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
            }
						$mysqli->close();//cierra la conexion con la BD
              
									return $resultado;
			}
			 
			 		public function totalOrigen($Origen){
				 /* conectamos a la bd */
						$idvendedor=$_SESSION['idvendedor'];
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT COUNT( origenprospecto.nombre ) AS  'Total' 
											FROM prospecto 
											INNER JOIN origenprospecto ON prospecto.idorigen = origenprospecto.idorigen 
											INNER JOIN vendedor on vendedor.idvendedor=prospecto.idvendedor 
											WHERE origenprospecto.nombre = '".$Origen."' and vendedor.idvendedor='".$idvendedor."'";
						$resultado = $mysqli->query($query);
            if(!$resultado){//If es una condicional
                printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
            }
						$mysqli->close();//cierra la conexion con la BD
              
									return $resultado;
			}
			 public function totalOrigenJefe($Origen,$ID){
				 /* conectamos a la bd */
						
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
				 switch($ID){
					 case '0':
						$query = "SELECT COUNT( origenprospecto.nombre ) AS  'Total' 
											FROM prospecto 
											INNER JOIN origenprospecto ON prospecto.idorigen = origenprospecto.idorigen 
											INNER JOIN vendedor on vendedor.idvendedor=prospecto.idvendedor 
											WHERE origenprospecto.nombre = '".$Origen."'";
						 break;
					 default:
						 	$query = "SELECT COUNT( origenprospecto.nombre ) AS  'Total' 
											FROM prospecto 
											INNER JOIN origenprospecto ON prospecto.idorigen = origenprospecto.idorigen 
											INNER JOIN vendedor on vendedor.idvendedor=prospecto.idvendedor 
											WHERE origenprospecto.nombre = '".$Origen."' and vendedor.idvendedor='".$ID."'";
						 break;
				 	}
						$resultado = $mysqli->query($query);
            if(!$resultado){//If es una condicional
                printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
            }
						$mysqli->close();//cierra la conexion con la BD
              
									return $resultado;
			}
			 
			 public function condicionContactos($IDs){
				 /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
						$idvendedor=$_SESSION['idvendedor'];
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
				 switch($IDs){
					 case '0':
											$query = "SELECT COUNT( origenprospecto.nombre ) AS  'Total' 
											FROM prospecto 
											INNER JOIN origenprospecto ON prospecto.idorigen = origenprospecto.idorigen 
											INNER JOIN vendedor on vendedor.idvendedor=prospecto.idvendedor ";
						 break;
						 					
					 default:
						 $query = "SELECT COUNT( origenprospecto.nombre ) AS  'Total' 
											FROM prospecto 
											INNER JOIN origenprospecto ON prospecto.idorigen = origenprospecto.idorigen 
											INNER JOIN vendedor on vendedor.idvendedor=prospecto.idvendedor
											where vendedor.idvendedor='".$IDs."'";
						 break;
				 }
						$resultado = $mysqli->query($query);
            if(!$resultado){//If es una condicional
                printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
            }
						$mysqli->close();//cierra la conexion con la BD
              
									return $resultado;
			}
			 
			 			public function Ventas($Mes,$anio){
								
				 /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
							$idvendedor=$_SESSION['idvendedor'];
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}//
							//		
						$query = "SELECT sum(monto) AS monto 
											FROM oportunidad
											INNER JOIN prospecto ON oportunidad.idprospecto = prospecto.idprospecto 
											INNER JOIN vendedor on vendedor.idvendedor=prospecto.idvendedor
											where idetapa=6 and MONTH(fechadeetapa)='".$Mes."' and YEAR(fechadeetapa) ='".$anio."' 
											and  vendedor.idvendedor='".$idvendedor."'
											group by MONTH(fechadeetapa)";
						$resultado = $mysqli->query($query);
            if(!$resultado){//If es una condicional
                printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
            }
						$mysqli->close();//cierra la conexion con la BD
              
									return $resultado;
			}
			 public function ComisionVendedor($Mes,$anio){
								
				 /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
							$idvendedor=$_SESSION['idvendedor'];
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}//
							//		
						$query = "SELECT sum(comision) AS comision 
											FROM oportunidad
											INNER JOIN prospecto ON oportunidad.idprospecto = prospecto.idprospecto 
											INNER JOIN vendedor on vendedor.idvendedor=prospecto.idvendedor
											where idetapa=6 and MONTH(fechadeetapa)='".$Mes."' and YEAR(fechadeetapa) ='".$anio."' 
											and  vendedor.idvendedor='".$idvendedor."'
											group by MONTH(fechadeetapa)";
						$resultado = $mysqli->query($query);
            if(!$resultado){//If es una condicional
                printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
            }
						$mysqli->close();//cierra la conexion con la BD
              
									return $resultado;
			}
			 			public function VentasJefe($Mes,$anio,$op){
								
				 /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
							
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}//
							switch($op){		
								case 0:
						$query = "SELECT sum(monto) AS monto 
											FROM oportunidad
											INNER JOIN prospecto ON oportunidad.idprospecto = prospecto.idprospecto 
											INNER JOIN vendedor on vendedor.idvendedor=prospecto.idvendedor
											where idetapa=6 and MONTH(fechadeetapa)='".$Mes."' and YEAR(fechadeetapa) ='".$anio."'
											group by MONTH(fechadeetapa)";
								break;
								default:
								$query = "SELECT sum(monto) AS monto 
											FROM oportunidad
											INNER JOIN prospecto ON oportunidad.idprospecto = prospecto.idprospecto 
											INNER JOIN vendedor on vendedor.idvendedor=prospecto.idvendedor
											where idetapa=6 and MONTH(fechadeetapa)='".$Mes."' and YEAR(fechadeetapa) ='".$anio."' and  vendedor.idvendedor='".$op."'
											group by MONTH(fechadeetapa)";
								break;
								}
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
						$idvendedor=$_SESSION['idvendedor'];
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
											and YEAR(oportunidad.fechadeetapa)='".$anio."' 
											and vendedor.idvendedor='".$idvendedor."'";
						$resultado = $mysqli->query($query);
            if(!$resultado){//If es una condicional
                printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
            }
						$mysqli->close();//cierra la conexion con la BD
              
									return $resultado;
			}	
			 
			 			 public function CVentas($mes,$anio,$idvendedor){
				 /* conectamos a la bd */
            $mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
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
						$idvendedor=$_SESSION['idvendedor'];
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
											and YEAR(Defecha)='".$anio."'
											and vendedor.idvendedor ='".$idvendedor."'";
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
						$idvendedor=$_SESSION['idvendedor'];
					  if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
						$query = "SELECT count(nombre)as'Prospectos' FROM prospecto
											inner join vendedor on vendedor.idvendedor=prospecto.idvendedor
											WHERE MONTH(fechadecreacion) ='".$mes."'
											and YEAR(fechadecreacion)='".$anio."'
											and vendedor.idvendedor='".$idvendedor."'";
						$resultado = $mysqli->query($query);
            if(!$resultado){//If es una condicional
                printf("Error Message: %s\n", $mysqli->error);//Imprime un string con el problema generado a partir de $query
            }
						$mysqli->close();//cierra la conexion con la BD
              
									return $resultado;
			}
			 //Metas-->
     }


			?>