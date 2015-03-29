<?php
session_start();
print_r($_SESSION);

if(($_SESSION['Usuario']=='test')&&($_SESSION['contrasenia']=='123')){
		
		echo "<br/>Bienvenido al sistema:".$_SESSION['Usuario'];
		
	}
	
?>
