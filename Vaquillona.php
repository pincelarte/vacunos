<?php

$arrayVaquillona = [];
global $arrayVaquillona;
  

class Vaquillona{

    private $caravanaVaquillona;
    private $nacimientoVaquillona;
    private $razaVaquillona;
    private $fichaVaquillona;

    public function __construct($caravanaVaquillona, $nacimientoVaquillona, $razaVaquillona, $fichaVaquillona){

        $this->caravanaVaquillona = $caravanaVaquillona;
        $this->nacimientoVaquillona = $nacimientoVaquillona;
        $this->razaVaquillona = $razaVaquillona; 
        $this->fichaVaquillona = $fichaVaquillona;
    }



        public function getCaravanaVaquillona(){
            return $this->caravanaVaquillona;
        }

     
        public function getNacimientoVaquillona(){
            return $this->nacimientoVaquillona;
        }

        public function getRazaVaquillona(){
            return $this->razaVaquillona; 
        }

        public function getFichaVaquillona(){
            return $this->fichaVaquillona;
        }



}

function agregarVaquillona(&$arrayVaquillona){

    global $arrayVaquillona;
   

    do{

    echo "Ingrese el número de caravana de la vaquillona a agregar al plantel: \n";
    $caravanaVaquillona = readline();
    echo "El número ingresado es: " . ($caravanaVaquillona) . PHP_EOL;

    echo "Ingrese el año de nacimiento: \n";
    $nacimientoVaquillona = readline();
    echo "El año de nacimiento de la vaquillona ingresado es: " . ($nacimientoVaquillona) .  PHP_EOL;

    echo "Ingrese la raza de la vaquillona: \n";
    $razaVaquillona = readline();
    echo "La raza de la vaquillona es: " . ($razaVaquillona) .  PHP_EOL;

    echo "Desea guardar datos adicionales sobre el animal? \n";
    $fichaVaquillona = readline();

    echo "------------------------------" . PHP_EOL;

    $arrayVaquillona[] =new Vaquillona($caravanaVaquillona, $nacimientoVaquillona, $razaVaquillona, $fichaVaquillona);

    echo "¿Desea agregar otra vaquillona? (s/n) \n";
    $continuar = readline();
    } while ($continuar=='s' || $continuar=='S');    


    var_dump($arrayVaquillona);
    echo "La cantidad de vaquillonas en stock es: " . count($arrayVaquillona) . PHP_EOL;
    
    

    $ultimaVaquillona = end($arrayVaquillona);
    
    echo "Caravana: " . $ultimaVaquillona->getCaravanaVaquillona() . "\n";
    echo "Año de nacimiento: " . $ultimaVaquillona->getNacimientoVaquillona() . "\n";
    echo "Raza: " . $ultimaVaquillona->getRazaVaquillona() . "\n";
    echo "Ficha: " . $ultimaVaquillona->getFichaVaquillona() . "\n";
   
    
    menuPosteriorVaquillona();

}

function menuPosteriorVaquillona(){
        
    global $campo;
 

    echo "¿Desea agregar otra vaquillona?". "\n"; 
    echo "S/N" . "\n";

    $opcion = readline();

        switch($opcion){
    case "s":
        agregarVaquillona($arrayVaquillona);
        break;
    case "n":
        menuInicio($campo);
        break; 
    default:
        echo "tecla incorrecta, por favor ingresa n/s";
        menuPosteriorVaquillona();    
        break;
}          
}
