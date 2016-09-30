	<?php
	class validaremail{

		public	$email;


	 function __construct($datosConexionBD){
				$this->datosConexionBD=$datosConexionBD;
			 }

		function generarLinkTemporal($idusuario, $username){

		$cadena = $idusuario.$username.rand(1,9999999).date('Y-m-d');
		$token = sha1($cadena);
		
				$conexion= new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);

		$sql = "INSERT INTO tblreseteopass (idusuario, username, token, creado) VALUES($idusuario,'$username','$token',NOW());";

		$resultado = $conexion->query($sql);
		if($resultado){
				$enlace = "http://preview.nxsa5082c6snstt95ps0izgmja3gzaorriw906f9e1giudi.box.codeanywhere.com/lib/restablecer.php?idusuario=".sha1($idusuario).'&token='.$token;
			return $enlace;
		}
		else
			return FALSE;
	}

		function enviarEmail( $email, $link ){

			$mensaje = '<html>
			<head>
				<title>Restablece tu contraseña</title>
			</head>
			<body>
				<p>Hemos recibido una petición para restablecer la contraseña de tu cuenta.</p>
				<p>Si hiciste esta petición, haz clic en el siguiente enlace, si no hiciste esta petición puedes ignorar este correo.</p>
				<p>
					<strong>Enlace para restablecer tu contraseña</strong><br>
					<a href="'.$link.'"> Restablecer contraseña </a>
				</p>
			</body>
			</html>';

			$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
			$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$cabeceras .= 'From: Codedrinks <mimail@codedrinks.com>' . "\r\n";

			mail($this->email, "Recuperar contraseña", $mensaje, $cabeceras);
		}


		function buscar(){
		$respuesta = new stdClass();

		if($this->email != "" ){   
				$conexion= new mysqli($this->datosConexionBD[0], $this->datosConexionBD[1], $this->datosConexionBD[2], $this->datosConexionBD[3]);

				$sql = " SELECT idvendedor, user FROM vendedor INNER JOIN usuario WHERE vendedor.correo = '".$this->email."' and vendedor.idusuario = usuario.idusuario ;";
				$resultado = $conexion->query($sql);

				if($resultado->num_rows > 0){
						$usuario = $resultado->fetch_assoc();
					
				$primero=$usuario['idvendedor'];
			  $segundo=$usuario['user'];

					
					$linkTemporal = $this->generarLinkTemporal($primero , $segundo);
						if($linkTemporal){
							$this->enviarEmail( $this->email, $linkTemporal );
							$respuesta->mensaje = '<div class="alert alert-info"> Un correo ha sido enviado a su cuenta de email con las instrucciones para restablecer la contraseña </div>';
						}
				}
				else
					$respuesta->mensaje = '<div class="alert alert-warning"> No existe una cuenta asociada a ese correo. </div>';
		}
		else
				$espuesta->mensaje= "Debes introducir el email de la cuenta";
		echo json_encode( $respuesta );
		}
	}