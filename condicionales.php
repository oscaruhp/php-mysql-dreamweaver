<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<body>
<?php 

if($_POST){
$a=$_POST['valora'];
if($a==30){
	echo "Tienes 30 a&ntilde;os";
	}
else{
	
	echo "No tienes 30 a&ntilde;os,";
	
		switch($a){
			
			case 40: echo "Tienes 40 años";
			break;
			
			case 50: echo "Tienes 50 años";
			break;
			
			case 60: echo "Tienes 60 años";
			break;
			
			default: echo "No tiene ni 30, 40, 50, 60 años";
			break;
			
			}
			

	
			
	
	
	}
	
}


?>

<form id="form1" name="form1" method="post" action="">
  <p>&nbsp;</p>
  <p>
    <label for="valora">Edad:</label>
    <input type="text" name="valora" id="valora" />
  </p>
  <p>
    <input type="submit" name="btnenviar" id="btnenviar" value="Evaluar" />
  </p>
  <p>&nbsp;</p>
</form>


</body>
</html>
