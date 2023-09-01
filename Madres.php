<?php

$arrayVacunos =[];
$fechaNacimiento = null;
$d = date('d/m/Y');
//leer($arrayVacunos);


$arrayVacunos = recuperar('Madres.json');
//var_dump($arrayVacunos);


class Madres{

    public $indole;
    public $caravana;
    public $nacimiento;
    public $raza;
    public $ficha;
    
    


    public function __construct($indole, $caravana, $nacimiento, $raza, $ficha){

            $this->indole = $indole;
            $this->caravana = $caravana;
            $this->nacimiento = $nacimiento;
            $this->raza =$raza;
            $this->ficha = $ficha;
            
    }

    public function getIndole(){
        return $this->indole;
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

      

    public function setIndole(){
        $this->indole = $indole;
    }


    public function setCaravana($caravana){
        $this->caravana = $caravana;
      }

    public function setNacimiento($nacimiento){
        $this->nacimiento = $nacimiento;
      }

    public function setRaza($raza){
        $this->raza = $raza;
      }

    public function setFicha($ficha){
        $this->ficha = $ficha;
      }
    

}

$nombreArchivo = 'Madres.json';


function mostrarCaravanas($campo, $arrayVacunos){
    
           
            if ( empty($arrayVacunos)){
            echo "No hay ningun vacuno en stock \n";
         } else {
            foreach ($arrayVacunos as $madre) {
                echo "Vacuno: " . $madre->getIndole() . PHP_EOL . "Caravana nº: " . $madre->getCaravana() ."/// Caravaneada el día: ". $madre->getNacimiento() ."\n"  . "Raza: " . $madre->getRaza() ."Ficha: ". $madre->getFicha() . PHP_EOL;
                PHP_EOL;                 
            }
       
     } 
    echo "El total de vacunos en el establecimiento es de: " . count ($arrayVacunos) . "\n";
    
    menuMadres($campo, $arrayVacunos);
    }


//menu posterior, al finalizar la carga de madre.
//------------------------------------------------------------------------------------------------
function menuPosterior($campo, &$arrayVacunos){
        
    
 
    echo "\n";
    echo "¿Desea agregar otro vacuno?". "\n"; 
    echo "S/N" . "\n";

    $opcion = readline();

        switch($opcion){
    case "s":
        agregarMadre($campo, $arrayVacunos);
        break;
    case "n":
        menuMadres($campo, $arrayVacunos);
        break; 
    default:
        echo "tecla incorrecta, por favor ingresa n/s";
        menuPosterior($campo, $arrayVacunos);    
        break;
}          
}

function agregarMadre($campo, &$arrayVacunos){

    
    $continuar = '';
    echo "\n";
    
        do{
            echo "¿Que clase de vacuno desea agregar? \n";
            echo "0)- Volver al menú anterior\n";
            echo "1)- Ternero\n";
            echo "2)- Ternera\n";
            echo "3)- Novillo\n";
            echo "4)- Vaquillona\n";
            echo "5)- Madre\n";
            echo "6)- Toro\n";
            
        
            $seleccion =readline();

            switch ($seleccion) {
                case "0":
                    menuMadres($campo, $arrayVacunos);
                    break;
                case "1":
                    $indole = "Ternero";
                    break;
                case "2":
                    $indole = "Ternera";
                    break;
                case "3": 
                    $indole = "Novillo";
                    break;
                case "4":
                    $indole = "Vaquillona";
                    break;
                case "5":
                    $indole = "Madre";
                    break;    
                case "6":
                    $indole = "Toro";     
                    break;   
                                
                default:
                    echo "Opción inválida, ingrese una de las opciones sugeridas a continuación \n";
                    
            }    
        }while ($seleccion != '0' && $seleccion != '1' && $seleccion != '2' && $seleccion != '3' && $seleccion != '4' && $seleccion != '5' && $seleccion != '6');
              
             
    echo "Agregó $indole al plantel" . PHP_EOL;    
    
    do{

    echo "Ingrese el número de caravana del vacuno a agregar al plantel: \n";
    $caravana = readline();
   

    //verificación
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
      menuMadres($campo, $arrayVacunos);
    }
   
    echo "La fecha de caravaneo del vacuno nº $caravana es el:";
    date_default_timezone_set('America/Argentina/Buenos_Aires') . PHP_EOL;
    $nacimiento = date('d/m/Y H:i:s');
    echo $nacimiento . PHP_EOL;

    echo "Ingrese la raza del vacuno: \n";
  
    
    do {
        echo "Para ingresar un vacuno Aberdeen-Angus, presione 1. \n";
        echo "Para ingresar un vacuno Careta, presione 2. \n";
       
    
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
    
    echo "La raza del vacuno es: " . ($raza) .  PHP_EOL;

    echo "Desea guardar datos adicionales sobre el animal? \n";
    $ficha = readline();

    echo "------------------------------" . PHP_EOL;

    $arrayVacunos[] =new Madres($indole, $caravana, $nacimiento, $raza, $ficha);
    

    grabar('Madres.json', $arrayVacunos);
   
    //------------------
    echo "¿Desea agregar otro vacuno? (s/n) \n";
    $continuar = readline();
    } while ($continuar =='s' || $continuar =='S');    

    
     //----------------
    

    $ultimaMadre = end($arrayVacunos);

    echo "Clase" . $ultimaMadre->getCaravana() . "\n";
    echo "Caravana: " . $ultimaMadre->getCaravana() . "\n";
    echo "Año de nacimiento: " . $ultimaMadre->getNacimiento() . "\n";
    echo "Raza: " . $ultimaMadre->getRaza() . "\n";
    echo "Ficha: " . $ultimaMadre->getFicha() . "\n";
    echo "El animal fue cargada con éxito! \n";
    echo "La cantidad de vacunos en stock es: " . count($arrayVacunos) . PHP_EOL;
    
    

    menuPosterior($campo, $arrayVacunos);

}

function eliminarMadre($caravana, &$arrayVacunos) {
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

function buscarMadre($caravana, &$arrayVacunos) {
    globaL $campo;
    $encontrada = false;
    foreach ($arrayVacunos as $madre) {
        if ($madre->getCaravana() == $caravana) {

            echo "Clase: " . $madre->getIndole() . "\n";
            echo "Caravana nº: " . $madre->getCaravana() . "\n";
            echo "colocada el día: ". $madre->getNacimiento() . "\n";
            echo "Su raza es: " . $madre->getRaza() . "\n";
            echo "Su ficha de historial: " . $madre->getFicha() . "\n";
            $encontrada = true;
            menuMadres($campo, $arrayVacunos);
            break;
            
        }
    }

    if (!$encontrada) {
        echo "*********************************************************\n";
        echo "No se encontró ningún vacuno con el nº $caravana.\n";
        echo "Volviendo al menú de las madres\n";
        echo "**********************************************************\n";
        menuMadres($campo, $arrayVacunos);
    }
}

function menuMadres( $campo, &$arrayVacunos ){

    echo "\n";
    echo "\n";
    echo "MENÚ MADRES \n";
    echo "---------------------\n";
    echo "0)- VOLVER AL MENU DE INICIO \n";
    echo "1)- TOTAL DE VACUNOS \n";
    echo "2)- AGREGAR VACUNO \n";
    echo "3)- QUITAR VACUNO \n";
    echo "4)- BUSCAR VACUNO \n";

    $opción = readline();

    switch($opción){
        case "0":
            echo "Volviendo al menu inicial\n";
            menuInicio($campo, $arrayVacunos);
            PHP_EOL;
            break;

        case "1":
            mostrarCaravanas($campo, $arrayVacunos);
            PHP_EOL;
            break;
           
        case "2":
            echo "VACUNOS". PHP_EOL;
            agregarMadre($campo, $arrayVacunos);
            PHP_EOL;
            break; 
          
        case "3":
            echo "¿QUE NÚMERO DE CARAVANA TIENE EL VACUNO QUE DESEA ELIMINAR? \n";
            $caravana = readline();
            PHP_EOL;
            eliminarMadre($caravana, $arrayVacunos);
            menuMadres($campo, $arrayVacunos);
            PHP_EOL;
            break; 
        case "4":
            echo "INGRESE LA CARAVANA DEL VACUNO QUE DESEA VER\n";
            $caravana =readline();
            buscarMadre($caravana, $arrayVacunos);
            PHP_EOL;
            break;    

        default:
        echo "Opción inválida, por favor seleccione una de las opciones mostradas \n";
        echo "_________________________________" .PHP_EOL;
        menuMadres($campo, $arrayVacunos);
        PHP_EOL;
        break;    
    }
}



//para consultar errores

//print_r(debug_backtrace()); die(__file__.':'.__LINE__);