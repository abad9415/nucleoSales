			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>


<script>
  function correo(){
    alert('entre');
       $.ajax({
         type: "POST",
         url: "PHPMailer/email.php",
         cache: false,
         data: "Correo=edgar.nok@gmail.com"+"&Prospecto=Edgar"+"&rfc=HEHE931102CC0"+"&ciudad=Mexicali"+"&mensaje=Se te Asigno Nuevo prospecto",
         success: function(datos){
          alert(datos);				
         }
       });
    }
  </script>
<input type="button" value="send" onclick="correo();">