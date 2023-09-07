<?php
$d=date('d/m/Y');

//***********Menu de Inicio**********************************

function menuInicio($campo, &$arrayVacunos){
    
    echo "Menu de Inicio" . PHP_EOL;
    echo "\n";
    echo "Establecimiento: " . $campo->getNombre() . PHP_EOL;
    echo "0)-SALIR DEL GESTOR". PHP_EOL;
    echo "1)-VACUNOS". PHP_EOL;
    echo "2)-indefinido" . PHP_EOL;
    echo "3)-indefinido" . PHP_EOL;
    echo "4)-indefinido" . PHP_EOL;
    echo "5)-TOTAL" . PHP_EOL;

    $opcion = readline();

    switch($opcion){
        case "0":
            persistir('Madres.json', $arrayVacunos);
            grabar('Madres.json', $arrayVacunos);
            echo "EL GESTOR A FINALIZADO.\n";
            exit();
            break;
        case "1":
            echo "________________________". PHP_EOL;
            menuMadres($campo, $arrayVacunos);
            break;    
       /* case "2":
            echo "¿QUE NÚMERO DE CARAVANA TIENE LA MADRE QUE DESEA ELIMINAR? \n";
            $eliminarCaravana = readline();
            echo "LA MADRE NÚMERO $caravana FUÉ ELIMINADA CON ÉXITO \n";  
            Madre($caravana, $arrayVacunos);
            menuInicio($campo);    
            break;    
        case "3":
            mostrarCaravanas( $campo, $arrayVacunos);
            break;
        case "4":
            agregarNovillo($arrayNovillo);
            break;    
        case "7":
            agregarVaquillona($arrayVaquillona);
            break;    */
    }

}
//***************************Menu de clase********************************* */


