$(document).ready( function() {
   $("#formAgenda").submit(function(e){
     if($("#actionBtn").val() == "Agendar"){
       urlAction = "../../../actions/contactos/altaAgenda.php";
     }else{
       urlAction = "../../../actions/contactos/actualizarAgenda.php";
     }
          $.ajax({
               type: "POST", 	
                url: urlAction,
                data:"deFecha="+$("#deFecha").val()+
                      '&deHora='+$("#deHora").val()+
                    '&aFecha='+$("#aFecha").val()+
                    '&aHora='+$("#aHora").val()+
                      '&descripcionAgenda='+$("#descripcionAgenda").val()+
                      '&idprospecto='+$("#idprospecto").val()+
                      '&idcita='+$("#idcita").val()+
                      '&idContacto='+$("#idContacto").val()
              }).done(function(result) {
            alert(result);
            
            $("#conentDetallePros").load("/views/prospectos/vistasDetalle/verCitas.php?idprospecto=" + $("#idprospecto").val());
            });
              return false;
      });
});