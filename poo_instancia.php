<?php include("poo_clase.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Instancia</title>
</head>
<body>
<?php 

$objPersona= new Persons();
$objPersona->setNombre("Pedro");
$objPersona->setEdad(30);

echo $objPersona->getEdad();
echo "<br/>";
echo $objPersona->getNombre();


echo "<br/>";

// Objeto Estudiante Herencia de Persons

$objEstudiante= new Estudiante();
$objEstudiante->setCarrera("Informática");
$objEstudiante->setMatricula("03080578");
echo $objEstudiante->getCarrera();
echo "<br/>";
echo $objEstudiante->getMatricula();

echo "<br/>";
// Objeto Estudiante Herencia de Persons
$objOtroEstudiante= new Estudiante();
$objOtroEstudiante->setCarrera("Informática");
$objOtroEstudiante->setMatricula("03080598");
echo $objOtroEstudiante->getCarrera();
echo "<br/>";
echo $objOtroEstudiante->getMatricula();

?>
</body>
</html>
