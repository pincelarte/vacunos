<?php
$d = date('d/m/Y');

//***********Menu de Inicio**********************************



function menuInicio($campo, &$arrayVacunos)
{
    do {
        echo "Menu de Inicio" . PHP_EOL;
        echo "\n";
        echo "Establecimiento: " . $campo->getNombre() . PHP_EOL;
        echo "0)-SALIR DEL GESTOR" . PHP_EOL;
        echo "1)-VACUNOS" . PHP_EOL;
        echo "2)-MADRES" . PHP_EOL;
        echo "3)-VAQUILLONAS" . PHP_EOL;
        echo "4)-NOVILLOS" . PHP_EOL;
        echo "5)-TERNERAS" . PHP_EOL;
        echo "6)-TERNEROS" . PHP_EOL;
        echo "7)-TOROS" . PHP_EOL;

        $opcion = readline();

        switch ($opcion) {
            case "0":
                persistir('Madres.json', $arrayVacunos);
                grabar('Madres.json', $arrayVacunos);
                echo "EL GESTOR A FINALIZADO.\n";
                exit();
                break;
            case "1":
                echo "________________________" . PHP_EOL;
                menuVacunos($campo, $arrayVacunos);
                echo "________________________" . PHP_EOL;
                break;
            case "2":
                echo "________________________" . PHP_EOL;
                mostrarMadre($arrayVacunos);
                break;
            case "3":
                echo "________________________" . PHP_EOL;
                mostrarVaquillonas($arrayVacunos);
                break;
            case "4":
                echo "________________________" . PHP_EOL;
                mostrarNovillos($arrayVacunos);
                break;
            case "5":
                echo "________________________" . PHP_EOL;
                mostrarTerneras($arrayVacunos);
                break;
            case "6":
                echo "________________________" . PHP_EOL;
                mostrarTerneros($arrayVacunos);
                break;
            case "7":
                echo "________________________" . PHP_EOL;
                mostrarToros($arrayVacunos);
                break;
            default:
                echo "La opción ingresada no es válida, ingrese una opción correcta. /n";
                break;
        }
    } while ($opcion != '0');
}





function menuPosterior($campo, &$arrayVacunos)
{

    echo "\n";
    echo "¿Desea agregar otro animal?" . "\n";
    echo "S/N" . "\n";

    $opcion = readline();

    switch ($opcion) {
        case "s":
            agregarMadre($campo, $arrayVacunos);
            break;
        case "n":
            menuVacunos($campo, $arrayVacunos);
            break;
        default:
            echo "tecla incorrecta, por favor ingresa n/s";
            menuPosterior($campo, $arrayVacunos);
            break;
    }
}

function menuVacunos($campo,  &$arrayVacunos)
{

    echo "\n";
    echo "\n";
    echo "MENÚ VACUNOS \n";
    echo "---------------------\n";
    echo "0)- VOLVER AL MENU DE INICIO \n";
    echo "1)- TOTAL DE VACUNOS \n";
    echo "2)- AGREGAR VACUNO \n";
    echo "3)- QUITAR VACUNO \n";
    echo "4)- BUSCAR VACUNO \n";
    echo "5)- MODIFICAR FICHA\n";


    $opción = readline();

    switch ($opción) {
        case "0":
            echo "Volviendo al menu inicial\n";
            menuInicio($campo, $arrayVacunos);
            PHP_EOL;
            break;

        case "1":
            mostrarCaravanas($campo, $arrayVacunos) . PHP_EOL;
            PHP_EOL;
            break;

        case "2":
            echo "VACUNOS" . PHP_EOL;
            agregarMadre($campo, $arrayVacunos);
            PHP_EOL;
            break;

        case "3":
            echo "¿QUE NÚMERO DE CARAVANA TIENE EL VACUNO QUE DESEA ELIMINAR? \n";
            $caravana = readline();
            PHP_EOL;
            eliminarVacuno($caravana, $arrayVacunos);
            menuVacunos($campo, $arrayVacunos);
            PHP_EOL;
            break;
        case "4":
            echo "INGRESE LA CARAVANA DEL VACUNO QUE DESEA VER.\n";
            $caravana = readline();
            buscarVacuno($caravana, $arrayVacunos);
            PHP_EOL;
            break;
        case "5":
            echo "¿QUE FICHA DESEA MODIFICAR? INGRESE LA CARAVANA.\n";
            $caravana = readline() . PHP_EOL;
            modificarFicha($caravana, $arrayVacunos) . PHP_EOL;
            break;


        default:
            echo "Opción inválida, por favor seleccione una de las opciones mostradas \n";
            echo "_________________________________" . PHP_EOL;
            menuVacunos($campo, $arrayVacunos);
            PHP_EOL;
            break;
    }
}