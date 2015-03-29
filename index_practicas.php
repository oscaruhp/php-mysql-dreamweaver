<?php

// comentario de una sola línea
#  comentario de una sola línea

/*
	Comentario de varias líneas 
	Más líneas 
		Tips 
		1.- Los comentarios tienen que ser útiles.
		2.- Piensa si un comentario es necesario antes de añadirlo.
		3.- No dejes los comentarios para el final.
		4.- Tabula por igual los comentarios de las líneas consecutivas.
		5.- No comentes si no conces la función a fondo.
		6.- Para los comentarios internos usa marcas especiales como por ejemplo:
		
		TODO: Marca de código
*/

echo "Hola mundo Hostinger";

// Usando variables para almacenar información
/*
	CamelCase: es un tipo de escritura para las variables
	UpperCamelCase: la primera de la variable empieza con mayúscula. Ejemplo: NombreDeLaVariable
	lowerCamelCase: la primera letra es minúscula. Ejemplo: nombreDeLaVariable
*/

echo "<br/>";
$CodigoDeProducto=1284;
echo $CodigoDeProducto;

echo "<br/>";
$NombreDelProducto="Agua Mineral Manantial x 500 ml";
echo $NombreDelProducto;

echo "<br/>";
$Precio=3.75;
echo $Precio;
echo "<br/>";

$Vence=false;
echo $Vence;
echo "<br/>";

$Stock=true;
echo $Stock;
echo "<br/>";

var_dump($NombreDelProducto);
echo "<br/>";

$a=1;$b=2;
$c=$a+$b;
echo $c;

echo "<br/>";

// Ejemplos de constantes
define("PRECIO",25.78);
echo PRECIO;

echo "<br/>";
// versión 5 de php
//const PRECIO_PRODUCTO=25.70;
//echo PRECIO_PRODUCTO;

?>