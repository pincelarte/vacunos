<?php
require_once "Madres.php";
require_once "Campo.php";
require_once "menu.php";
require_once "pesoVacunos.php";
require_once "funcionesBuscar.php";

$d = date('d/m/Y');
echo "Hoy es día: $d";

$campo = new Campo("Inza");
echo PHP_EOL;
echo  "Gestionando el ganado: " . $campo->getNombre() . PHP_EOL;
echo "---------------------------------------------" . PHP_EOL;


recuperar($nombreArchivo);
menuInicio($campo, $arrayVacunos);

$campo = new Campo("Inza");
echo PHP_EOL;
echo  "Gestionando el ganado " . $campo->getNombre();


//-------------Persistencia-------------------

function grabar($nombreArchivo, $arrayVacunos)
{
    $datos = json_encode($arrayVacunos);
    file_put_contents($nombreArchivo, $datos);
}

function persistir($nombreArchivo, $arrayVacunos)
{
    //print_r($arrayVacunos);
    $datos = json_encode($arrayVacunos);
    //var_dump($datos);
    file_put_contents($nombreArchivo, $datos);
    return $datos;
}

function setJSON($datos)
{
    $jsonDatos = json_decode($datos);

    //var_dump ($datos);
}

function recuperar($nombreArchivo)
{
    $datos = file_get_contents($nombreArchivo);
    $arrayVacunos = json_decode($datos);

    $madres = [];
    foreach ($arrayVacunos as $madre) {
        $Madre = new Madres($madre->indole, $madre->caravana, $madre->nacimiento, $madre->raza, $madre->ficha, $madre->edad, $madre->peso);
        $madres[] = $Madre;
    }
    return $madres;
}

function leer($nombreArchivo)
{
    $datos = file_get_contents($nombreArchivo);
    setJSON($datos);
}


function agregarMadre($campo, &$arrayVacunos)
{
    $continuar = '';
    echo "\n";

    do {
        echo "¿Qué clase de vacuno desea agregar? \n";
        echo "0)- Volver al menú anterior\n";
        echo "1)- Madre\n";
        echo "2)- Vaquillona\n";
        echo "3)- Novillo\n";
        echo "4)- Ternera\n";
        echo "5)- Ternero\n";
        echo "6)- Toro\n";

        $seleccion = readline();

        switch ($seleccion) {
            case "0":
                menuVacunos($campo, $arrayVacunos);
                break;
            case "1":
                $indole = "Madre";
                break;
            case "2":
                $indole = "Vaquillona";
                break;
            case "3":
                $indole = "Novillo";
                break;
            case "4":
                $indole = "Ternera";
                break;
            case "5":
                $indole = "Ternero";
                break;
            case "6":
                $indole = "Toro";
                break;

            default:
                echo "Opción inválida, ingrese una de las opciones sugeridas a continuación \n";
        }
    } while ($seleccion != '0' && $seleccion != '1' && $seleccion != '2' && $seleccion != '3' && $seleccion != '4' && $seleccion != '5' && $seleccion != '6');

    echo "Agregó $indole al plantel" . PHP_EOL;

    do {
        if ($indole == "Madre" || $indole == "Vaquillona" || $indole == "Ternera") {
            echo "Ingrese el número de caravana de la $indole a agregar al plantel: \n";
        } else if ($indole == "Novillo" || $indole == "Ternero" || $indole == "Toro") {
            echo "Ingrese el número de la caravana del $indole a agregar al plantel \n";
        }

        $caravana = readline();

        $caravanaExistente = false;
        foreach ($arrayVacunos as $madre) {
            if ($madre->getCaravana() == $caravana) {
                $caravanaExistente = true;
                break;
            }
        }

        if ($caravanaExistente) {
            echo "¡Error! La caravana nº $caravana ya existe. Por favor, ingrese una caravana diferente.\n";
            PHP_EOL;
            echo "-----------------------------------------------------------------------------------------";
            menuVacunos($campo, $arrayVacunos);
        }

        if ($indole == "Madre" || $indole == "Vaquillona" || $indole == "Ternera") {
            echo "La fecha de caravaneo de la $indole nº $caravana es el:";
        } else if ($indole == "Novillo" || $indole == "Ternero" || $indole == "Toro") {
            echo "La fecha de caravaneo del $indole nº $caravana es el:";
        }

        date_default_timezone_set('America/Argentina/Buenos_Aires') . PHP_EOL;
        $nacimiento = date('d/m/Y H:i:s');
        echo " $nacimiento" . PHP_EOL;

        if ($indole == "Madre" || $indole == "Vaquillona" || $indole == "Ternera") {
            echo "Ingrese la raza de la $indole: \n";
        } else if ($indole == "Novillo" || $indole == "Ternero" || $indole == "Toro") {
            echo "Ingrese la raza del $indole: \n";
        }

        do {
            if ($indole == "Madre" || $indole == "Vaquillona" || $indole == "Ternera") {
                echo "Para ingresar una $indole Aberdeen-Angus, presione 1. \n";
                echo "Para ingresar una $indole Careta, presione 2. \n";
            } else if ($indole == "Novillo" || $indole == "Ternero" || $indole == "Toro") {
                echo "Para ingresar un $indole Aberdeen-Angus, presione 1. \n";
                echo "Para ingresar un $indole Careta, presione 2. \n";
            }

            $opción = readline();

            switch ($opción) {
                case '1':
                    $raza = "Aberdeen-Angus\n";
                    break;
                case '2':
                    $raza = "Careta\n";
                    break;
                default:
                    echo "Opción inválida, ingrese 1 o 2\n";
                    break;
            }
        } while ($opción != '1' && $opción != '2');

        echo "La raza del $indole es: " . ($raza) .  PHP_EOL;

        // Hacer el campo de peso opcional
        echo "Ingrese el peso de la $indole nº $caravana (opcional, presione Enter para omitir): \n";
        $peso = readline();

        // Si el peso no se ha ingresado, se deja vacío o no se toma en cuenta
        if ($peso === '') {
            $peso = null; // Se asigna null si no se ha ingresado un peso
        } else {
            // Si se ingresa un peso, se valida
            while (!is_numeric($peso) || $peso <= 0) {
                echo "Peso inválido. Por favor, ingrese un peso válido (número mayor que cero): \n";
                $peso = readline();
            }
        }

        echo "El peso de la $indole nº $caravana es: " . ($peso !== null ? $peso . " kg" : "No especificado") . PHP_EOL;

        if ($indole == "Madre" || $indole == "Vaquillona" || $indole == "Ternera") {
            echo "Desea guardar datos adicionales sobre la $indole nº $caravana? \n";
        } else if ($indole == "Novillo" || $indole == "Ternero" || $indole == "Toro") {
            echo "Desea guardar datos adicionales sobre el $indole nº $caravana? \n";
        }

        $ficha = readline();

        echo "------------------------------" . PHP_EOL;

        // Guardamos la instancia con el peso como un valor opcional
        $arrayVacunos[] = new Madres($indole, $caravana, $nacimiento, $raza, $ficha, $peso);

        grabar('Madres.json', $arrayVacunos);

        if ($indole == "Madre" || $indole == "Vaquillona" || $indole == "Ternera") {
            echo "¿Desea agregar otra $indole? (s/n) \n";
        } else if ($indole == "Novillo" || $indole == "Ternero" || $indole == "Toro") {
            echo "¿Desea agregar otro $indole? (s/n) \n";
        }

        $continuar = readline();
    } while ($continuar == 's' || $continuar == 'S');

    //----------------

    $ultimaMadre = end($arrayVacunos);

    echo "Clase: " . $ultimaMadre->getIndole() . "\n";
    echo "Caravana: " . $ultimaMadre->getCaravana() . "\n";
    echo "Año de nacimiento: " . $ultimaMadre->getNacimiento() . "\n";
    echo "Raza: " . $ultimaMadre->getRaza() . "\n";
    echo "Peso: " . ($ultimaMadre->getPeso() !== null ? $ultimaMadre->getPeso() . " kg" : "No especificado") . "\n"; // Si el peso es nulo, muestra un mensaje
    echo "Ficha: " . $ultimaMadre->getFicha() . "\n";
    echo "El animal fue cargado con éxito! \n";
    echo "La cantidad de vacunos en stock es: " . count($arrayVacunos) . PHP_EOL;

    menuPosterior($campo, $arrayVacunos);
}




