<?php
include '../../conexionBD.php';
require '../../lib/prospectos.php';
$prospectos = new prospectos($datosConexionBD);


 $check = @getimagesize($_FILES['files']['tmp_name']);
     if ($check !== false) {
        move_uploaded_file($_FILES['files']['tmp_name'], "../../img/vendedores/" . $_FILES['files']['name']);
        //guardar los datos en la bd
        $prospectos->fotoVendedor = $_FILES['files']['name'];
        echo $prospectos->actualizarImagenVendedor();
        
      }else {
        $error = "El archivo no es una imagen o el archivo es muy pesado";
        echo $error;
      }
 ?>
