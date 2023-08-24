<?php
require_once "Madres.php";
require_once "Campo.php";
require_once "menu.php";
require_once "Novillos.php";
require_once "Vaquillona.php";
require_once "leer.php";


$d = date('d/m/Y');

echo "Hoy es día: $d";


$campo = new Campo("Inza");
echo PHP_EOL; 
echo  "Gestionando el ganado: " . $campo->getNombre() . PHP_EOL;
echo"---------------------------------------------" . PHP_EOL;


recuperar($nombreArchivo);
//print_r($datos);

menuInicio($campo, $arrayMadres);

$campo = new Campo("Inza");
echo PHP_EOL; 
echo  "Gestionando el ganado " . $campo->getNombre();


//--------persistencia--------







/*

function recuperar($nombreArchivo) {
    $datos = file_get_contents($nombreArchivo);
    return json_decode($datos);
    foreach ($arrayMadres as $madre) {
        $Madre = new Madre($caravana->caravana, $nacimiento->nacimiento, $raza->raza, $ficha->ficha);
        $this->agregarPersistencia($nuevaMadre);
    }

}



function recuperar($nombreArchivo) {
    if (file_exists($nombreArchivo)) {
        $datos = file_get_contents($nombreArchivo);
        $arrayMadres = json_decode($datos);

        if ($arrayMadres !== null) {
            foreach ($arrayMadres as $madre) {
                $caravana = $madre->caravana;
                $nacimiento = $madre->nacimiento;
                $raza = $madre->raza;
                $ficha = $madre->ficha;
    
                $Madre = new Madres($caravana, $nacimiento, $raza, $ficha);
                persistir($nombreArchivo, $Madre);
            }
        } else {
            echo "Contenido JSON inválido en el archivo.";
        }
    } else {
        echo "Archivo '$nombreArchivo' no encontrado.";
    }
}


function recuperar($nombreArchivo) {
    $datos = file_get_contents($nombreArchivo);
    $arrayMadres = json_decode($datos);

    foreach ($arrayMadres as $madre) {
        $caravana = $madre->caravana;
        $nacimiento = $madre->nacimiento;
        $raza = $madre->raza;
        $ficha = $madre->ficha;

        $Madre = new Madres($caravana, $nacimiento, $raza, $ficha);
        persistir($nombreArchivo, $Madre);
    }
}
*/