<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>

<?php 

$num=($_POST)?$_POST['num']:10;

// Estructuras de control  ciclo - for 

echo "Estructuras de control ciclo for <hr/>";
echo "<ul>";
for($i=0;$i<=$num;$i++){
	echo "<li>".$i."</li>";
	}
echo "</ul>";

// Estructura de control ciclo while 
echo "Estructuras de control ciclo while <hr/>";
echo "<ul>";
$i=0;
while($i<=$num){
	echo "<li>".$i."</li>";
	$i++;
	}
echo "</ul>";

// Esctructura de control ciclo do- while
echo "Estructuras de control ciclo do-while <hr/>";
echo "<ul>";

$i=0;
   do {
	echo "<li>".$i."</li>";
	$i++;
	}while($i<=$num);
echo "</ul>";
	// Estructuras de control ciclo foreach
	echo "Estructuras de control foreach <hr/>";
	echo "<ul>";
	$arreglo=array(1,2,3);
	foreach($arreglo as $i){
				echo "<li>".$i."</li>";
				
		}
	echo "</ul>";

?>
<form id="form1" name="form1" method="post" action="">
  <p>
    <label for="num">Núm</label>
    :
    <input type="text" name="num" id="num" />
  </p>
  <p>
    <input type="submit" name="btn_enviar" id="btn_enviar" value="Enviar" />
  </p>
  <p>&nbsp;</p>
</form>
</body>
</html>
