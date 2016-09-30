<?php
$idprospecto=(isset($_REQUEST['idprospecto']))?$_REQUEST['idprospecto']:"";
$idcontacto=(isset($_REQUEST['idcontacto']))?$_REQUEST['idcontacto']:"";
$idNota=(isset($_REQUEST['idNota']))?$_REQUEST['idNota']:"";
include '../../../conexionBD.php';
require '../../../lib/notas.php';

$notas = new notas($datosConexionBD);

$notas->idNota = $idNota;
$consultarNotasRow = $notas->consultarNotaXId();

while($row = $consultarNotasRow->fetch_assoc()) {
		$idNotaNotas = $row['idNota'];
		$descripcionNotas = $row['descripcion'];
		$horaNotas = $row['hora'];
		$fechaNotas = $row['fecha'];
	}
?>
<input type="hidden" value="<?=$idprospecto;?>" id="idprospecto">
<input type="hidden" value="<?=$idcontacto;?>" id="idcontacto">
<form action="#" id="formNotasGuardadas" method="post">
	
  <p><textarea type="text" class="textareaDisfrasada" id="descripcionNotaPhp"><?=$descripcionNotas;?></textarea></p>

    <div class='btnsNotasGuardadas'> 
      <input type="hidden" value="<?=$idNota;?>" id="idNota">
          <input type="submit" value="Guardar" class="button eliminarNota">
          <a class='button' id="cancelarNota">Cancelar</a>
    </div>
</form>
<script>
$(document).ready( function() {
   $("#formNotasGuardadas").submit(function(e){
     //alert($("#descripcionNotaPhp").val())
          $.ajax({
               type: "POST", 	
                url: "../../../actions/prospectos/actualizarNotas.php",
                data:"idNota="+$("#idNota").val()+
                      '&descripcionNota='+$("#descripcionNotaPhp").val()
                      //'&idcontacto='+$("#idcontacto").val()
              }).done(function(result) {
            //alert(result);
            $("#conentDetallePros").load("/views/prospectos/vistasDetalle/verNotas.php", {idprospecto: $("#idprospecto").val(), idcontacto: $("#idcontacto").val() } );
            //$("#content").load( "../../../views/prospectos/actualizarProspectos.php" );
            //$("#conentDetallePros").load("../../../views/prospectos/vistasDetalle/verOportunidades.php?idprospecto=" + $("#idprospecto").val());
            });
              return false;
      });
	$("#cancelarNota").click(function(){
		$("#conentDetallePros").load("/views/prospectos/vistasDetalle/verNotas.php", {idprospecto: $("#idprospecto").val(), idcontacto: $("#idcontacto").val() } );
	});
});
</script>