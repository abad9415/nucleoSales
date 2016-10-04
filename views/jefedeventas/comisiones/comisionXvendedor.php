<?php
# Linea 41 empezar con un input type radio para tomar el id
include '../../../conexionBD.php';
//requerimos de la clase prospectos que esta en el siguiente archivo
require '../../../lib/metodos_jefeventas.php';
$vendedor = new jefeventas($datosConexionBD);
$vendedoresRow = $vendedor->obtener_vendedores();

?>
<table class="table table-hover tableEAT">
					<thead>
						<tr>
              <th>Id</th>
							<th>Nombre</th>
							<th>Correo</th>
							<th>Comision</th>
						</tr>
					</thead>
          <tbody>
					<?php
					while($row = $vendedoresRow->fetch_assoc()) {
						?>
						<tr>
							<td>
							  <?=$idVendedor = $row['idvendedor'];?>
							</td>
							<td>
								<?=$row['nombreusuario'] . " " . $row['apellidoP'] . " " . $row['apellidoM'];?>
							</td>
							<td>
								<?=$row['correo'];?>
							</td>
							<td>
								<?php
                  $vendedor->idvendedor= $idVendedor;
                  $comisionXvendedorRow = $vendedor->obtener_configComisionesXidVendedor();
                  while($row2 = $comisionXvendedorRow->fetch_assoc()) {
                    echo $row2['comision'];
                    $idComision = $row2['idcomision'];
                    ?>
                    <input type="radio" value="<?=$idcomision;?>">
                    <?php
                  }
                ?>
							</td>
						</tr>

						<?php
											}
									?>
            </tbody>
				</table>