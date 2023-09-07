<?php
require_once "Madres.php";
require_once "Campo.php";
require_once "menu.php";
require_once "Novillos.php";
require_once "leer.php";


$d = date('d/m/Y');

echo "Hoy es día: $d";


$campo = new Campo("Inza");
echo PHP_EOL; 
echo  "Gestionando el ganado: " . $campo->getNombre() . PHP_EOL;
echo"---------------------------------------------" . PHP_EOL;


recuperar($nombreArchivo);
//print_r($datos);

menuInicio($campo, $arrayVacunos);

$campo = new Campo("Inza");
echo PHP_EOL; 
echo  "Gestionando el ganado " . $campo->getNombre();


//-------------Persistencia-------------------

function grabar($nombreArchivo, $arrayVacunos) {
    $datos = json_encode($arrayVacunos);
    file_put_contents($nombreArchivo, $datos);
}

function persistir($nombreArchivo, $arrayVacunos){
    //print_r($arrayVacunos);
    $datos = json_encode($arrayVacunos);
    //var_dump($datos);
    file_put_contents($nombreArchivo, $datos);
    return $datos;
}

function setJSON($datos) {
    $jsonDatos = json_decode($datos);

    //var_dump ($datos);
}

function recuperar($nombreArchivo) {
    $datos = file_get_contents($nombreArchivo);
    $arrayVacunos = json_decode($datos);

    $madres = [];
    foreach ($arrayVacunos as $madre) {
        $Madre = new Madres($madre->indole, $madre->caravana, $madre->nacimiento, $madre->raza, $madre->ficha);
        $madres[] = $Madre;
    }
    return $madres;
}

function leer($nombreArchivo) {
    $datos = file_get_contents($nombreArchivo);
    setJSON($datos);
}

//------------------------------------------------------------------------------------------