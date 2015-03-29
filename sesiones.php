<?php
if(isset($_POST['login'])){
	
	if(isset($_POST['recordar'])){
			
			setcookie("Usuario",$_POST['Usuario']);
			setcookie("contrasenia",$_POST['contrasenia']);
	}
 
 // Recibir datos para login
	if(($_POST['Usuario']=='test')&&($_POST['contrasenia']=='123')){
		session_start();
		$_SESSION['Usuario']= $_POST['Usuario'];
		$_SESSION['contrasenia']= $_POST['contrasenia'];
		echo " Sesión iniciada para el usuario test";
		echo "<script> window.location='sesiones2.php'</script>";
		}
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<form method="post">
  <p>Usuario:
    <input type="text" name="Usuario" value="<?php if($_COOKIE['Usuario']==''){ echo $_POST['Usuario'];}else{echo $_COOKIE['Usuario']; } ?>" />
    Constraseña:<input type="password" name="contrasenia" value="<?php if($_COOKIE['contrasenia']==''){ echo $_POST['contrasenia'];}else{echo $_COOKIE['contrasenia']; } ?>"  />
  <input name="login" value="Iniciar sesión" type="submit"/>
    
    
  </p>
  <p>
    <input type="checkbox" name="recordar" id="recordar" />
    <label for="recordar">Recordar contraseña</label>
  </p>
  <p>&nbsp;</p>
</form>


</body>
</html>
