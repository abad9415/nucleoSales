<?php
# Linea 41 empezar con un input type radio para tomar el id
include '../../../../conexionBD.php';
//requerimos de la clase prospectos que esta en el siguiente archivo
require '../../../../lib/metodos_jefeventas.php';
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
						$i = 0;
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
                    $idComision = $row2['idcomision'];
                    ?>
										<label for="idVendedor<?=$i;?>">
												<div class="contentComisionVendedor<?=$idComision;?>"><p><?=$row2['comisionxinstalacion'];?>%</p></div>
										</label>
                    <input id="idVendedor<?=$i;?>" type="radio" value="<?=$idComision;?>" class="inputRadio">
                    <?php
                  }
									$i++;
                ?>
							</td>
						</tr>

						<?php
											}
									?>
            </tbody>
				</table>
<script>
	var dbclick = 1;
	var valorAnterior;
$("input:radio").click(function() {
	if(valorAnterior === $(this).val()){ //validamos que sea el mismo click anterior
		if(dbclick === 1){ //validamos que de dos clicks
			dbclick = 2;//aqui es el doble click
			var id = ".contentComisionVendedor" + $( this ).val();
			$(id).load("/views/jefedeventas/comisiones/instalaciones/formComisionXvendedorInstalacion.php", {idComision: $(this).val()} );
		}else{
			dbclick = 1;
		}
	}else{
		dbclick = 1;
	}
	valorAnterior = $(this).val();
  //$("#content2").load("../../views/pedidos/prueba.php?idSeccion=" + $(this).val());
}); 
</script>