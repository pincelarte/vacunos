<?php


$arrayMadres = array();
$fechaNacimiento = null;
$d = date('d/m/Y');


class Madres{

    private $caravana;
    private $nacimiento;
    private $raza;
    private $ficha;
    
    
  

    public function __construct($caravana, $nacimiento, $raza, $ficha){

            $this->caravana = $caravana;
            $this->nacimiento = $nacimiento;
            $this->raza =$raza;
            $this->ficha = $ficha;
        
    }


    public function getCaravana(){
        return $this->caravana;
    }

    public function getNacimiento(){
        return $this->nacimiento;
    }

    public function getRaza(){
        return $this->raza;
    }

    public function getFicha(){
        return $this->ficha;
    }


}    

//Muestra la cantidad de madres en stock.
//------------------------------------------------------------------------------------------------

function mostrarCaravanas($campo, $arrayMadres){
           
            //$sumaCaravanas = 0;

         if ( empty($arrayMadres)){
            echo "No hay ninguna madre en stock \n";
         } else {
            foreach ($arrayMadres as $madre) {
                echo "Madre nº: " . $madre->getCaravana() . " " . $madre->getRaza() ." ". $madre->getFicha() . PHP_EOL;
                                
            }
       
     } 
    echo "El total de madres es: " . count ($arrayMadres) . PHP_EOL;
    menuMadres($campo, $arrayMadres);

}

//menu posterior, al finalizar la carga de madre.
//------------------------------------------------------------------------------------------------
function menuPosterior($campo, &$arrayMadres){
        
    //global $campo;
 

    echo "¿Desea agregar otra madre?". "\n"; 
    echo "S/N" . "\n";

    $opcion = readline();

        switch($opcion){
    case "s":
        agregarMadre($campo, $arrayMadres);
        break;
    case "n":
        menuMadres($campo, $arrayMadres);
        break; 
    default:
        echo "tecla incorrecta, por favor ingresa n/s";
        menuposterior($campo, $arrayMadres);    
        break;
}          
}

//Pedido de datos para agregar una madre
//---------------------------------------------------------------------------------



function agregarMadre( $campo, &$arrayMadres){
    

 
   

    do{
        

    echo "Ingrese el número de caravana de la madre a agregar al plantel: \n";
    $caravana = readline();
    echo "El número ingresado es: " . ($caravana) . PHP_EOL;

    //verificación
    $caravanaExistente = false;
    foreach ($arrayMadres as $madre) {
      if ($madre->getCaravana() == $caravana) {
        $caravanaExistente = true;
        break;
      }
    }

    if ($caravanaExistente) {
      echo "¡Error! La caravana ya existe. Por favor, ingrese una caravana diferente.\n";
      continue;
    }
    //hasta acá verificación.




    echo "La fecha de caravaneo de la madre nº $caravana es el:";
    date_default_timezone_set('America/Argentina/Buenos_Aires') . PHP_EOL;
    $nacimiento = date('d/m/Y H:i:s');
    echo $nacimiento . PHP_EOL;

    echo "Ingrese la raza de la madre: \n";
  
    
    do {
        echo "Para ingresar una madre angus, presione 1. \n";
        echo "Para ingresar una madre careta, presione 2. \n";
       
    
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

    echo "La raza de la madre es: " . ($raza) .  PHP_EOL;

    echo "Desea guardar datos adicionales sobre el animal? \n";
    $ficha = readline();

    echo "------------------------------" . PHP_EOL;

    $arrayMadres[] =new Madres($caravana, $nacimiento, $raza, $ficha);

     

    echo "¿Desea agregar otra madre? (s/n) \n";
    $continuar = readline();
    } while ($continuar=='s' || $continuar=='S');    


     
    

    $ultimaMadre = end($arrayMadres);
    
    echo "Caravana: " . $ultimaMadre->getCaravana() . "\n";
    echo "Año de nacimiento: " . $ultimaMadre->getNacimiento() . "\n";
    echo "Raza: " . $ultimaMadre->getRaza() . "\n";
    echo "Ficha: " . $ultimaMadre->getFicha() . "\n";
    echo "La madre fue cargada con éxito! \n";
    echo "La cantidad de madres en stock es: " . count($arrayMadres) . PHP_EOL;
   
    
    menuPosterior($campo, $arrayMadres);

}

function eliminarMadre($caravana, &$arrayMadres) {
    $encontrada = false;
    foreach ($arrayMadres as $i => $madre) {
        if ($madre->getCaravana() == $caravana) {
            unset($arrayMadres[$i]);
            $arrayMadres = array_values($arrayMadres);
            $encontrada = true;
            echo "La madre numero $caravana º, fue eliminada\n";
            break;
        }
    }

    if (!$encontrada) {
        echo "No se encontró ninguna madre con el número de caravana proporcionado.\n";
    }
}

function buscarMadre($caravana, &$arrayMadres) {
    $encontrada = false;
    foreach ($arrayMadres as $madre) {
        if ($madre->getCaravana() == $caravana) {
            echo "Caravana: " . $madre->getCaravana() . "colocada: ". $nacimiento . "\n";
            echo "Raza: " . $madre->getRaza() . "\n";
            echo "Ficha: " . $madre->getFicha() . "\n";
            
            $encontrada = true;
            break;
        }
    }

    if (!$encontrada) {
        echo "No se encontró ninguna madre con el número de caravana proporcionado.\n";
    }
}

function menuMadres($campo, &$arrayMadres ){

    global $d;
    

    if ($campo === NULL) {
        echo "Error: campo = no debe ser nulo.";
        return;
    }

    if ($arrayMadres === NULL) {
        echo "Error: arrayMadre no debe ser nulo.";
        return;
    }


    echo "MENÚ MADRES \n";
    echo "---------------------\n";
    echo "0)- VOLVER AL MENU DE INICIO \n";
    echo "1)- TOTAL MADRES \n";
    echo "2)- AGREGAR MADRE \n";
    echo "3)- QUITAR MADRE \n";
    echo "4)- BUSCAR MADRE \n";

    $opción = readline();

    switch($opción){
        case "0":
            echo "Volviendo al menu inicial\n";
            menuInicio($campo, $arrayMadres );
            break;

        case "1":
            mostrarCaravanas($campo, $arrayMadres);
            break;
           
        case "2":
            echo "MADRES". PHP_EOL;
            agregarMadre( $campo, $arrayMadres);
            break; 
          
        case "3":
            echo "¿QUE NÚMERO DE CARAVANA TIENE LA MADRE QUE DESEA ELIMINAR? \n";
            $caravana = readline();
            eliminarMadre($caravana, $arrayMadres);
            menuMadres($campo, $arrayMadres);    
            break; 
        case "4":
            echo "Ingrese la caravana de la madre que desea ver\n";
            $caravana =readline();
            buscarMadre($caravana, $arrayMadres);
            break;    

        default:
        echo "Opción inválida, por favor seleccione una de las opciones mostradas \n";
        echo "_________________________________" .PHP_EOL;
        menuMadres($campo, $arrayMadres);
        break;    
    }


}




