<?php
	session_start();
ini_set('display_errors', 0);

 class validar {


	 public $user;
	 public $password;
	 //Constructo para llamar los datos de la BD
 function __construct($datosConexionBD){
			$this->datosConexionBD=$datosConexionBD;
		 }
				//Metodo Verificar usuario y password en la BD
				public function verificar(){
							$mysqli = new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);
						/* check connection */
						if (mysqli_connect_errno()) {
							printf("Error de conexión: %s\n", mysqli_connect_error());
							exit();
						}
					//Query 
					
						$query = "SELECT * FROM vendedor where user='".$this->user."'and password='".$this->password."';";
						$resultado = $mysqli->query($query);
					//Si no se arroja nungun resultado del query esta incorrecto usario o password
			if( $resultado->num_rows == 0)
		{
			header("Location:../index.php");
		}else{
		
						while ($fila = $resultado->fetch_row()) {
							  
							
						session_start();
            $_SESSION["session"] = $fila[1];
							 $_SESSION["idvendedor"]=$fila[0];
    
							//Si el usuario es Vendedor
								if($fila[1]==1){
										header('Location:../views/vendedor.php');

							}
							//si el usuario es Jefe de ventas
							 if($fila[1]==2){
										header ("Location:../views/jefedeventas/jefeventas.php");



						}
						

						}
		}
					
						$resultado->close();








				}

 }
?>