<?php
$d=date('d/m/Y');

function menuInicio($campo, &$arrayMadres){
    //global $arrayMadres;
    //global $arrayNovillos;
   
  //  $arrayMadres = [];
var_dump ($arrayMadres);
    
    
   
    echo "Menu de Inicio" . PHP_EOL;
    echo "\n";
    echo "Establecimiento: " . $campo->getNombre() . PHP_EOL;
    echo "0)-SALIR DEL GESTOR". PHP_EOL;
    echo "1)-MADRES". PHP_EOL;
    echo "2)-NOVILLOS" . PHP_EOL;
    echo "3)-VAQUILLONAS" . PHP_EOL;
    echo "4)-TOROS" . PHP_EOL;
    echo "5)-TOTAL" . PHP_EOL;


     


    $opcion = readline();

    switch($opcion){
        case "0":
            persistir('Madres.json', $arrayMadres);
            grabar('Madres.json', $arrayMadres);
            echo "EL GESTOR A FINALIZADO.\n";
            exit();
            break;
        case "1":
            echo "________________________". PHP_EOL;
            menuMadres($campo, $arrayMadres);
            break;    
        case "2":
            echo "¿QUE NÚMERO DE CARAVANA TIENE LA MADRE QUE DESEA ELIMINAR? \n";
            $eliminarCaravana = readline();
            echo "LA MADRE NÚMERO $caravana FUÉ ELIMINADA CON ÉXITO \n";  
            Madre($caravana, $arrayMadres);
            menuInicio($campo);    
            break;    
        case "3":
            mostrarCaravanas( $campo, $arrayMadres);
            break;
        case "4":
            agregarNovillo($arrayNovillo);
            break;    
        case "7":
            agregarVaquillona($arrayVaquillona);
            break;    

            
    }
           

}



