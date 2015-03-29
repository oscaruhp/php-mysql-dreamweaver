<?php

// 1.- $NombreVector[indice]=ValorVectorIndice;

$NombresPersonas=array("Pedro","Juan","Jos&eacute;","Juli&aacute;n");

print_r($NombresPersonas);

echo $NombresPersonas[2];

// 2.- los índices son definidos por el programador
$NombresPersonasConIndece[0]="Pedro";
$NombresPersonasConIndece[1]="Juan";
$NombresPersonasConIndece[2]="Jos&eacute;";
$NombresPersonasConIndece[3]="Jul&aacute;an";

echo "\n";
echo $NombresPersonasConIndece[3];

// 3.- Los índices pueden ser strings

$NombresPersonasConIndiceString=array("Gerente"=>"Pedro","Empleado"=>"Juan","duenio"=>"Jos&eacute;","Supervisor"=>"Juli&aacute;n");
print_r($NombresPersonasConIndiceString);

echo $NombresPersonasConIndiceString["Empleado"];

echo "\n";

var_dump($NombresPersonasConIndiceString);

// 2.- Matriz bidimencional

echo "\n Matriz bidimencional \n";


$Empleados["Empleado"][0]="Pedro";
$Empleados["Empleado"][1]="Juan";
$Empleados["Empleado"][2]="Jos&eacute;";
$Empleados["Empleado"][3]="Jul&aacute;n";

$Empleados["Gerente"][0]="Pedro1";
$Empleados["Gerente"][1]="Juan1";
$Empleados["Gerente"][2]="Jos&eacute;1";
$Empleados["Gerente"][3]="Juli&aacute;n1";

print_r($Empleados);

// 3.- Matriz multidimencional
$Trabajadores["Tienda1"]["Empleado"][345]="Pedro";
$Trabajadores["Tienda2"][1][345]="Juan";

print_r($Trabajadores);



?>