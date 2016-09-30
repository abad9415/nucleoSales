<?php 
include '../../conexionBD.php';
  //requerimos de la clase prospectos que esta en el siguiente archivo
 	require '../../lib/metodos_jefeventas.php';
	$miVariable= $_POST['variableL'];
	$IDV=$_POST['IDVendedor'];

  //incluimos el archivo de configuracion de la BD

  $et = new jefeventas($datosConexionBD);
  $Listado = $et->Listadototal($miVariable,$IDV);  
?>


	



  <div class="contentList">


    
<table class="table table-hover tableEAT">
           <thead>
             <tr>
							   <th>Nombre Vendedor</th>
                <th>Prospecto</th>
							 	<th>Monto</th>
                <th>Fecha de Etapa</th>
                
              </tr>
           </thead>
                  
           <?php
           while($row = $Listado->fetch_assoc()) { ?>
                <tr>
								<td><?= $row['nombreusuario']; ?></p></a></td>
                <td><?= $row['nombre']; ?></p></a></td>
                <td>$<?=$row['monto'];?></td>
                <td><?=$row['fechadeetapa'];?></td>
              </tr>
           <?php
           } ?>
          </table>

  </div>

