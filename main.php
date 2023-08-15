<?php
require_once "Madres.php";
require_once "Campo.php";
require_once "menu.php";
require_once "Novillos.php";
require_once "Vaquillona.php";
//require_once "menuPrincipal";

//d = fecha actual
$d = date('d/m/Y');

echo "Hoy es día: $d";


$campo = new Campo("Inza");
echo PHP_EOL; 
echo  "Gestionando el ganado: " . $campo->getNombre() . PHP_EOL;
echo"---------------------------------------------" . PHP_EOL;



menuInicio($campo, $arrayMadres, $d, $nacimiento);

$campo = new Campo("Inza");
echo PHP_EOL; 
echo  "Gestionando el ganado " . $campo->getNombre();






 










    

    