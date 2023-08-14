<?php


function menuInicio($campo){
    global $arrayMadre;

    
    if ($campo === NULL) {
        echo "Error: campo no debe ser nulo.";
        return;
    }

    /*if ($arrayNovillo === NULL) {
        echo "Error: campo no debe ser nulo.";
        return;
    }*/

    echo "Menu de Inicio" . PHP_EOL;
    echo "\n";
    echo "Establecimiento: " . $campo->getNombre() . PHP_EOL;
    echo "0)-SALIR". PHP_EOL;
    echo "1)-MADRES". PHP_EOL;
    echo "2)-NOVILLOS" . PHP_EOL;
    echo "3)-VAQUILLONAS" . PHP_EOL;
    echo "4)-TOROS" . PHP_EOL;


    

    $opcion = readline();

    switch($opcion){
        case "0":
            echo "EL GESTOR A FINALIZADO.\n";
            exit();
            break;
        case "1":
            echo "MADRES". PHP_EOL;
            agregarMadre($arrayMadre, $campo);
            break;    
        case "2":
            echo "NOVILLOS \n";
            $caravana = readline();
            echo "LA MADRE NÚMERO $caravana FUÉ ELIMINADA CON ÉXITO \n";  
            eliminarMadre($caravana, $arrayMadre);
            menuInicio($campo);    
            break;    
        case "3":
            echo "VAQUILLONAS \n";
            mostrarCaravanas($arrayMadre, $campo);
            break;
        case "4":
            echo "TOROS";
            agregarNovillo($arrayNovillo);
            break;    
        
            
    }
           

}
