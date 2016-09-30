<?php
session_start();
if (isset($_SESSION["session"])) {
	
	
	if($_SESSION["session"]==2){
			header ("Location:../views/jefedeventas/jefeventas.php");
		
	}else
		if($_SESSION["session"]==1){
				header('Location:../views/vendedor.php');
		}

  die();
}



?>




</html>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
 <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
    
    
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Open+Sans'>

        <link rel="stylesheet" href="/css/indexcss.css">

    
    
    
  </head>

  <body>
		

		

    <div  class="cont" >
  <div class="demo">
    <div class="login">
					<form id="formindex" method="POST" action="actions/login.php">
      <div class="login__check"></div>
      <div class="login__form">
        <div class="login__row">
          <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
          </svg>
				
          <input type="text" class="login__input name" id="user" name="user"placeholder="Usuario"/>
        </div>
        <div class="login__row">
          <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
          </svg>
          <input type="password" class="login__input pass" id="password" name="password" placeholder="Password"/>
        </div>
        <button type="submit"class="login__submit">Conectar</button>
				</form>
				
    
      </div>
    </div>
    
  </div>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="/js/indexjs.js"></script>

    
    
    
  </body>
</html>
