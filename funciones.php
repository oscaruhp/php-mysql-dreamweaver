<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php 

//Ejemplo de funciones definidas por el usuario
function Sumar($a,$b) {
	echo "La suma de a y b es:".($a+$b);
}
function Restar($a,$b) {
	echo "La Resta de a y b es:".($a-$b);
}
function Datos($nombre, $edad=25, $sexo='F') {
	echo "Nombre: ".$nombre." Edad: ".$edad." Sexo: ".$sexo;

}
function DatosConRetorno($nombre){
	return $nombre;
}

// llamando a las funciones
Sumar(3,4);
echo "<br/>";
Restar(5,3);
echo "<br/>";
Datos("Oscar"); // Datos opcionales en caso de no poner edad ni sexo este se agregan por default
echo "<br/>";
echo DatosConRetorno("Develoteca"); // necesito imprimirlo para mostrar la información.
echo "<br/>";

//Ejemplo de funciones nativas
$variableFraseOriginal="Develoteca - integrando y compartiendo conocimiento";
echo "Texto Original: ".$variableFraseOriginal;
$variableFrasereemplazo=str_replace("-","está",$variableFraseOriginal);
echo "<br/>";
echo "Texto Reemplazo: ".$variableFrasereemplazo;

echo "<br/>";
echo "<br/>";

$variableOFraseMayuscula=strtoupper($variableFrasereemplazo);
echo "<br/>";
echo "Cadena a mayúscula:".$variableOFraseMayuscula;
echo "<br/>";
$variableOFrasePrimeraMayuscula=strtolower ($variableOFraseMayuscula);
echo "Cadena a minúsculas :".$variableOFrasePrimeraMayuscula;

echo "<br/>";
echo "<br/>";

//Adjuntar un archivo al servidor y enviar un correo

if(isset($_POST['submit'])){

$NombreArchivoServidor= $_FILES['Archivo']['name'];

if (move_uploaded_file($_FILES['Archivo']['tmp_name'], $NombreArchivoServidor)){

echo "Se copio el archivo";

//Enviar un correo 
$para      = 'oscaruh@develoteca.com';
$titulo    = 'Mensaje de alerta';

$mensaje   = "Alguien subio una archivo al servidor.El archivo se llama ".$_FILES['Archivo']['name']." y pesa ".$_FILES['Archivo']['size'];

$cabeceras = 'From: admin@develoteca.com' . "\r\n" .'Reply-To: oscaruh@develoteca.com' . "\r\n" .'X-Mailer: PHP/' . phpversion();

if(mail($para, $titulo, $mensaje, $cabeceras)){
	echo "<br/>";
    echo "<br/>";

	echo "<strong>Se envío un correo</strong>";
	}




}else{ echo "Hay algo mal";}
print_r($_FILES);


}


?>

<form action="?" method="post" enctype="multipart/form-data">
    Seleccionar archivo:
    <input type="file" name="Archivo" id="Archivo">
    <input type="submit" value="Subir Imagen" name="submit">
</form>



</body>
</html>
