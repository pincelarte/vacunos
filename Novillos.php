<?php

$arrayNovillos = [];
global $arrayNovillos;
  

class Novillo{

    private $caravanaNovillo;
    private $nacimientoNovillo;
    private $razaNovillo;
    private $fichaNovillo;

    public function __construct($caravanaNovillo, $nacimientoNovillo, $razaNovillo, $fichaNovillo){

        $this->caravanaNovillo = $caravanaNovillo;
        $this->nacimientoNovillo = $nacimientoNovillo;
        $this->razaNovillo = $razaNovillo; 
        $this->fichaNovillo = $fichaNovillo;
    }



        public function getCaravanaNovillo(){
            return $this->caravanaNovillo;
        }

     
        public function getNacimientoNovillo(){
            return $this->nacimientoNovillo;
        }

        public function getRazaNovillo(){
            return $this->razaNovillo; 
        }

        public function getFichaNovillo(){
            return $this->fichaNovillo;
        }



}

function menuNovillos($campo, &$arrayMadres, &$arrayNovillos){
    


    echo "MENÚ NOVILLOS \n";
    echo "---------------------\n";
    echo "0)- VOLVER AL MENU DE INICIO \n";
    echo "1)- TOTAL NOVILLOS \n";
    echo "2)- AGREGAR NOVILLO \n";
    echo "3)- QUITAR NOVILLO \n";
    echo "4)- BUSCAR NOVILLO \n";

    $opción = readline();

    switch($opción){
        case "0":
            echo "Volviendo al menu inicial\n";
            menuInicio($campo, $arrayMadres, $arrayNovillos);

        case "1":
            mostrarCaravanas($campo, $arrayNovillos);
            break;
           
        case "2":
            echo "NOVILLOS". PHP_EOL;
            agregarNovillos( $campo, $arrayNovillos);
            break; 
          
        case "3":
            echo "¿QUE NÚMERO DE CARAVANA TIENE EL NOVILLO QUE DESEA ELIMINAR? \n";
            $caravana = readline();
            echo "EL NOVILLO NÚMERO $caravana FUÉ ELIMINADO CON ÉXITO \n";  
            eliminarNovillo($caravana, $arrayNovillos);
            menuNovillo($campo, $arrayNovillos);    
            break; 

        default:
        echo "Opción inválida, por favor seleccione una de las opciones mostradas \n";
        echo "_________________________________" .PHP_EOL;
        menuNovillos($campo, $arrayNovillos);
        break;    
    }


}



function agregarNovillos(&$arrayNovillos){

    global $arrayNovillos;
   

    do{

    echo "Ingrese el número de caravana del novillo a agregar al plantel: \n";
    $caravanaNovillo = readline();
    echo "El número ingresado es: " . ($caravanaNovillo) . PHP_EOL;

    echo "Ingrese el año de nacimiento: \n";
    $nacimientoNovillo = readline();
    echo "El año de nacimiento del novillo ingresado es: " . ($nacimientoNovillo) .  PHP_EOL;

    echo "Ingrese la raza del novillo: \n";
    $razaNovillo = readline();
    echo "La raza del novillo es: " . ($razaNovillo) .  PHP_EOL;

    echo "Desea guardar datos adicionales sobre el animal? \n";
    $fichaNovillo = readline();

    echo "------------------------------" . PHP_EOL;

    $arrayNovillos[] =new Novillo($caravanaNovillo, $nacimientoNovillo, $razaNovillo, $fichaNovillo);

    echo "¿Desea agregar otro novillo? (s/n) \n";
    $continuar = readline();
    } while ($continuar=='s' || $continuar=='S');    


    var_dump($arrayNovillos);
    
    
    

    $ultimoNovillo = end($arrayNovillos);
    
    echo "Caravana: " . $ultimoNovillo->getCaravanaNovillo() . "\n";
    echo "Año de nacimiento: " . $ultimoNovillo->getNacimientoNovillo() . "\n";
    echo "Raza: " . $ultimoNovillo->getRazaNovillo() . "\n";
    echo "Ficha: " . $ultimoNovillo->getFichaNovillo() . "\n";
    echo "El novillo fue cargado con éxito!! \n ";
    echo "La cantidad total de novillos en stock es: " . count($arrayNovillos) . PHP_EOL;
    
    menuPosteriorNovillo();

}

function menuPosteriorNovillo($campo, $arrayNovillos){
        
    global $campo;
 

    echo "¿Desea agregar otro novillo?". "\n"; 
    echo "S/N" . "\n";

    $opcion = readline();

        switch($opcion){
    case "s":
        agregarNovillo($campo, $arrayNovillos);
        break;
    case "n":
        menuInicio($campo, $arrayNovillos);
        break; 
    default:
        echo "tecla incorrecta, por favor ingresa n/s";
        menuPosteriorNovillo($campo, $arrayNovillos);    
        break;
}          
}

