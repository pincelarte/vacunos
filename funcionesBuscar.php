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

//----------------------------------------------------------------
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

//----------------------------------------------------------------
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

//----------------------------------------------------------------

function mostrarVaquillonas(&$arrayVacunos)
{
    $count = 0;

    foreach ($arrayVacunos as $vacuno) {
        $indole = $vacuno->getIndole();
        if ($indole == "Vaquillona") {
            echo "Caravana: " . $vacuno->getCaravana() . "\n";
            echo "Raza: " . $vacuno->getRaza() . "\n";
            echo "Ficha: " . $vacuno->getFicha() . "\n";
            echo "------------------------------" . PHP_EOL;
            $count++;
        }
    }

    echo "La cantidad de Vaquillonas es: " . $count . PHP_EOL;
}

function mostrarNovillos(&$arrayVacunos)
{
    $count = 0;

    foreach ($arrayVacunos as $vacuno) {
        $indole = $vacuno->getIndole();
        if ($indole == "Novillo") {
            echo "Caravana: " . $vacuno->getCaravana() . "\n";
            echo "Raza: " . $vacuno->getRaza() . "\n";
            echo "Ficha: " . $vacuno->getFicha() . "\n";
            echo "------------------------------" . PHP_EOL;
            $count++;
        }
    }

    echo "La cantidad de Novillos es: " . $count . PHP_EOL;
}

//----------------------------------------------------------------

function mostrarTerneras(&$arrayVacunos)
{
    $count = 0;

    foreach ($arrayVacunos as $vacuno) {
        $indole = $vacuno->getIndole();
        if ($indole == "Ternera") {
            echo "Caravana: " . $vacuno->getCaravana() . "\n";
            echo "Raza: " . $vacuno->getRaza() . "\n";
            echo "Ficha: " . $vacuno->getFicha() . "\n";
            echo "------------------------------" . PHP_EOL;
            $count++;
        }
    }

    echo "La cantidad de Terneras es: " . $count . PHP_EOL;
}

//----------------------------------------------------------------

function mostrarTerneros(&$arrayVacunos)
{
    $count = 0;

    foreach ($arrayVacunos as $vacuno) {
        $indole = $vacuno->getIndole();
        if ($indole == "Ternero") {
            echo "Caravana: " . $vacuno->getCaravana() . "\n";
            echo "Raza: " . $vacuno->getRaza() . "\n";
            echo "Ficha: " . $vacuno->getFicha() . "\n";
            echo "------------------------------" . PHP_EOL;
            $count++;
        }
    }

    echo "La cantidad de Terneros es: " . $count . PHP_EOL;
}

//----------------------------------------------------------------

function mostrarToros(&$arrayVacunos)
{
    $count = 0;

    foreach ($arrayVacunos as $vacuno) {
        $indole = $vacuno->getIndole();
        if ($indole == "Toro") {
            echo "Caravana: " . $vacuno->getCaravana() . "\n";
            echo "Raza: " . $vacuno->getRaza() . "\n";
            echo "Ficha: " . $vacuno->getFicha() . "\n";
            echo "------------------------------" . PHP_EOL;
            $count++;
        }
    }

    echo "La cantidad de Toros es: " . $count . PHP_EOL;
}

//----------------------------------------------------------------

function eliminarVacuno($caravana, &$arrayVacunos)
{
    $encontrada = false;
    foreach ($arrayVacunos as $i => $madre) {
        if ($madre->getCaravana() == $caravana) {
            unset($arrayVacunos[$i]);
            $arrayVacunos = array_values($arrayVacunos);
            $encontrada = true;
            echo "El vacuno numero $caravana º, fue eliminado\n";
            grabar('Madres.json', $arrayVacunos);
            break;
        }
    }

    if (!$encontrada) {
        echo "**********************************************************************\n";
        echo "No se encontró ningún vacuno con el número de caravana $caravana.\n";
        echo "Regresando al menu Vacunos\n";
        echo "***********************************************************************\n";
    }
}


//----------------------------------------------------------------



function modificarFicha($caravana, &$arrayVacunos)
{
    $encontrada = false;
    foreach ($arrayVacunos as $madre) {
        if ($madre->getCaravana() == $caravana) {
            echo "Ingrese el nuevo texto para la ficha del vacuno con caravana nº $caravana: \n";
            $nuevoTexto = readline();
            $madre->setFicha($nuevoTexto);
            $encontrada = true;
            echo "La ficha del vacuno con caravana nº $caravana ha sido actualizada a $nuevoTexto.\n";
            break;
        }
    }

    if (!$encontrada) {
        echo "No se encontró ningún vacuno con el Nº $caravana de caravana.\n";
    }
}