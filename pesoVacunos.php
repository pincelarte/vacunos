<?php
function ingresarPeso($caravana, $arrayVacunos)
{
    $encontrado = false;
    foreach ($arrayVacunos as $madre) {
        if ($madre->getCaravana() == $caravana) {
            echo "Ingrese el peso para el animal con caravana nº $caravana: ";
            $peso = readline();
            $madre->setPeso($peso);
            $encontrado = true;
            echo "El peso del animal con caravana nº $caravana ha sido registrado como $peso kg.\n";
            break;
        }
    }

    if (!$encontrado) {
        echo "No se encontró ningún animal con la caravana nº $caravana.\n";
    }
}


function eliminarPeso($caravana, $arrayVacunos)
{
    $encontrado = false;
    foreach ($arrayVacunos as $madre) {
        if ($madre->getCaravana() == $caravana) {
            $madre->setPeso(null);
            $encontrado = true;
            echo "El peso del animal con caravana nº $caravana ha sido eliminado.\n";
            break;
        }
    }

    if (!$encontrado) {
        echo "No se encontró ningún animal con la caravana nº $caravana.\n";
    }
}


function modificarPeso($caravana, $nuevoPeso, $arrayVacunos)
{
    $encontrado = false;
    foreach ($arrayVacunos as $madre) {
        if ($madre->getCaravana() == $caravana) {
            $madre->setPeso($nuevoPeso);
            $encontrado = true;
            echo "El peso del animal con caravana nº $caravana ha sido modificado a $nuevoPeso kg.\n";
            break;
        }
    }

    if (!$encontrado) {
        echo "No se encontró ningún animal con la caravana nº $caravana.\n";
    }
}


function historialPeso($caravana, $arrayVacunos)
{
    $encontrado = false;
    foreach ($arrayVacunos as $madre) {
        if ($madre->getCaravana() == $caravana) {
            if ($madre->getPeso() !== null) {
                echo "Historial de peso del animal con caravana nº $caravana:\n";
                // Aquí podrías implementar una lógica para mostrar el historial de peso,
                // si tienes un registro de los pesos anteriores.
            } else {
                echo "El animal con caravana nº $caravana no tiene registrado un peso.\n";
            }
            $encontrado = true;
            break;
        }
    }

    if (!$encontrado) {
        echo "No se encontró ningún animal con la caravana nº $caravana.\n";
    }
}


function gananciaDiaria($caravana, $arrayVacunos)
{
    $encontrado = false;
    foreach ($arrayVacunos as $madre) {
        if ($madre->getCaravana() == $caravana) {
            // Aquí podrías implementar la lógica para calcular la ganancia diaria de peso
            // comparando el peso actual con el peso registrado anteriormente.
            $encontrado = true;
            break;
        }
    }

    if (!$encontrado) {
        echo "No se encontró ningún animal con la caravana nº $caravana.\n";
    }
}