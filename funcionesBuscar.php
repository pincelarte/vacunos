<?php
function buscarVacuno($caravana, &$arrayVacunos)
{
    global $campo;
    $encontrada = false;
    foreach ($arrayVacunos as $madre) {
        if ($madre->getCaravana() == $caravana) {

            echo "Clase: " . $madre->getIndole() . "\n";
            echo "Caravana nº: " . $madre->getCaravana() . "\n";
            echo "colocada el día: " . $madre->getNacimiento() . "\n";
            echo "Su raza es: " . $madre->getRaza() . "\n";
            echo "Su ficha de historial: " . $madre->getFicha() . "\n";
            echo "Edad: " . $madre->getEdad() . "\n";
            $encontrada = true;
            menuVacunos($campo, $arrayVacunos);
            break;
        }
    }

    if (!$encontrada) {
        echo "*********************************************************\n";
        echo "No se encontró ningún vacuno con el nº $caravana.\n";
        echo "Volviendo al menú de las madres\n";
        echo "**********************************************************\n";
        menuVacunos($campo, $arrayVacunos);
    }
}

function mostrarMadre(&$arrayVacunos)
{
    $count = 0;

    foreach ($arrayVacunos as $vacuno) {
        $indole = $vacuno->getIndole();
        if ($indole == "Madre") {
            echo "Caravana: " . $vacuno->getCaravana() . "\n";
            echo "Raza: " . $vacuno->getRaza() . "\n";
            echo "Ficha: " . $vacuno->getFicha() . "\n";
            echo "------------------------------" . PHP_EOL;
            $count++;
        }
    }

    echo "La cantidad de Madres es: " . $count . PHP_EOL;
}

function mostrarCaravanas($campo, $arrayVacunos)
{

    if (empty($arrayVacunos)) {
        echo "No hay ningun vacuno en stock \n";
    } else {
        foreach ($arrayVacunos as $madre) {
            echo "Vacuno: " . $madre->getIndole() . PHP_EOL . "Caravana nº: " . $madre->getCaravana() . "/// Se asienta el día: " . $madre->getNacimiento() . "\n"  . "Raza: " . $madre->getRaza() . "Ficha: " . $madre->getFicha() . PHP_EOL;
            PHP_EOL;
        }
    }
    echo "El total de vacunos en el establecimiento es de: " . count($arrayVacunos) . "\n";
    menuVacunos($campo, $arrayVacunos);
}
