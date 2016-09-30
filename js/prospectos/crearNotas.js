$(document).ready(function(){
  $("#FormNotasDetalle").submit(function(e) {
     $.ajax({
               type: "POST", 	
                url: '../../actions/contactos/crearNota.php',
                data: "descripcionNota="+$("#descripcionNota").val()+
				 							'&idContacto='+$("#idContacto").val()+
               '&idprospecto='+$("#idprospecto").val()
              }).done(function(result) {
            //alert(result);
    $("#conentDetallePros").load("/views/prospectos/vistasDetalle/verNotas.php", {idprospecto: $("#idprospecto").val(), idcontacto: $("#idContacto").val() } );
     });
    return false;
  }); 
  $("#cancelNotas").click(function() {
    //alert("click cancelar")
		document.getElementById("FormNotasDetalle").reset();
     return false;
     });
});