<?php
include '../../../conexionBD.php';
//requerimos de la clase prospectos que esta en el siguiente archivo
require '../../../lib/metodos_jefeventas.php';
$vendedor = new jefeventas($datosConexionBD);
$consultarconfiguracionesRow = $vendedor->obtener_configComisiones();
while($row = $consultarconfiguracionesRow->fetch_assoc()) {
    $comisionEstablecida = $row['comision'];
  }
?>
<p>Comision Actual: <?=$comisionEstablecida;?>%</p>
<form id="formComisionGeneral">
  <div class="form-group form-inline">
    <div class="input-group">
      <input type="number" step="any" class="form-control" id="CampocomisionGeneral" placeholder="15.3" required>
      <div class="input-group-addon">%</div>
    </div>
  </div>
  <p class="text-danger">Todos los vendedores tendran esta comision</p>
  <button type="submit" class="btn btn-primary">Aplicar Comision</button>
</form>
<script>
  $("#formComisionGeneral").submit(function(e) {
     $.ajax({
               type: "POST",
                url: '/actions/jefeventas/comisiones/comisionGeneral.php',
                data: '&comisionGeneral='+$("#CampocomisionGeneral").val()
              }).done(function(result) {
            //alert(result);
            swal(result + "!", "Para todos los vendedores", "success")
         $("#contentDetalleComision").load("/views/jefedeventas/comisiones/comisionGeneral.php");
     });
    return false;
  }); 
</script>