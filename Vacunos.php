<?php

$arrayVacunos =[];
$fechaNacimiento = null;
$d = date('d/m/Y');

$arrayVacunos = recuperar('Vacunos.json');

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

$nombreArchivo = 'Vacunos.json';


function mostrarCaravanas($campo, $arrayVacunos){
    
           
            if ( empty($arrayVacunos)){
            echo "No hay ningun vacuno en stock \n";
         } else {
            foreach ($arrayVacunos as $vacuno) {
                echo "Vacuno: " . $arrayVacunos->getIndole() . PHP_EOL . "Caravana nº: " . $arrayVacunos->getCaravana() ."/// Caravaneado el día: ". $arrayVacunos->getNacimiento() ."\n"  . "Raza: " . $arrayVacunos->getRaza() ."Ficha: ". $arrayVacunos->getFicha() . PHP_EOL;
                PHP_EOL;                 
            }
       
     } 
    echo "El total de vacunos en el establecimiento es de: " .  count($arrayVacunos) . "\n";
    
    menuVacunos($campo, $arrayVacunos);
    }



function agregarVacuno($campo, &$arrayVacunos){

    
    $continuar = '';
    echo "\n";
    
        do{
            echo "¿Que clase de vacuno desea agregar? \n";
            echo "0)- Volver al menú anterior\n";
            echo "1)- Ternero\n";
            echo "2)- Ternera\n";
            echo "3)- Novillo\n";
            echo "4)- Vaquillona\n";
            echo "5)- Madres\n";
            echo "6)- Toro\n";
            
        
            $seleccion =readline();

            switch ($seleccion) {
                case "0":
                    menuVacunos($campo, $arrayVacunos);
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

    $caravanaExistente = false;
    foreach ($arrayVacunos as $arrayVacunos) {
      if ($arrayVacunos->getCaravana() == $caravana) {
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

    $arrayVacunos[] = new madre ($indole, $caravana, $nacimiento, $raza, $ficha);
    

    grabar('Vacunos.json', $arrayVacunos);
   
    
    echo "¿Desea agregar otro vacuno? (s/n) \n";
    $continuar = readline();
    } while ($continuar =='s' || $continuar =='S');    
    
    $ultimoVacuno = end($arrayVacunos);

    echo "Clase" . $ultimoVacuno->getCaravana() . "\n";
    echo "Caravana: " . $ultimoVacuno->getCaravana() . "\n";
    echo "Año de nacimiento: " . $ultimoVacuno->getNacimiento() . "\n";
    echo "Raza: " . $ultimoVacuno->getRaza() . "\n";
    echo "Ficha: " . $ultimoVacuno->getFicha() . "\n";
    echo "El animal fue cargada con éxito! \n";
    echo "La cantidad de vacunos en stock es: " . count($arrayVacunos) . PHP_EOL;
    
    

    menuPosterior($campo, $arrayVacunos);

}

function eliminarVacuno($caravana, &$arrayVacunos) {
    $encontrada = false;
    foreach ($arrayVacunos as $i => $arrayVacunos) {
        if ($arrayVacunos->getCaravana() == $caravana) {
            unset($arrayVacunos[$i]);
            $arrayVacunos = array_values($arrayVacunos);
            $encontrada = true;
            echo "El vacuno numero $caravana º, fue eliminado\n";
            grabar('Vacunos.json', $arrayVacunos);
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

function buscarVacuno($caravana, &$arrayVacunos) {
    globaL $campo;
    $encontrada = false;
    foreach ($arrayVacunos as $arrayVacunos) {
        if ($arrayVacunos->getCaravana() == $caravana) {

            echo "Clase: " . $arrayVacunos->getIndole() . "\n";
            echo "Caravana nº: " . $arrayVacunos->getCaravana() . "\n";
            echo "colocada el día: ". $arrayVacunos->getNacimiento() . "\n";
            echo "Su raza es: " . $arrayVacunos->getRaza() . "\n";
            echo "Su ficha de historial: " . $arrayVacunos->getFicha() . "\n";
            $encontrada = true;
            menuVacunos($campo, $arrayVacunos);
            break;
            
        }
    }

    if (!$encontrada) {
        echo "*********************************************************\n";
        echo "No se encontró ningún vacuno con el nº $caravana.\n";
        echo "Volviendo al menú de las vacuno$arrayVacunos\n";
        echo "**********************************************************\n";
        menuVacunos($campo, $arrayVacunos);
    }
}

function menuVacunos( $campo, &$arrayVacunos ){

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
            agregarVacuno($campo, $arrayVacunos);
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
            echo "INGRESE LA CARAVANA DEL VACUNO QUE DESEA VER\n";
            $caravana =readline();
            buscarVacuno($caravana, $arrayVacunos);
            PHP_EOL;
            break;    

        default:
        echo "Opción inválida, por favor seleccione una de las opciones mostradas \n";
        echo "_________________________________" .PHP_EOL;
        menuVacunos($campo, $arrayVacunos);
        PHP_EOL;
        break;    
    }
}



//para consultar errores

//print_r(debug_backtrace()); die(__file__.':'.__LINE__);