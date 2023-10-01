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
                echo "Vacuno: " . $madre->getIndole() . PHP_EOL . "Caravana nº: " . $madre->getCaravana() ."/// Se asienta el día: ". $madre->getNacimiento() ."\n"  . "Raza: " . $madre->getRaza() ."Ficha: ". $madre->getFicha() . PHP_EOL;
                PHP_EOL;                 
            }
       
     } 
    echo "El total de vacunos en el establecimiento es de: " . count ($arrayVacunos) . "\n";
    
    menuVacunos($campo, $arrayVacunos);
    }





function eliminarVacuno($caravana, &$arrayVacunos) {
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

function buscarVacuno($caravana, &$arrayVacunos) {
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
            menuVacunos($campo, $arrayVacunos);
            break;
            
        }
    }

    if (!$encontrada) {
        echo "*********************************************************\n";
        echo "No se encontró ningún vacuno con el nº $caravana.\n";
        echo "Volviendo al menú de las madres\n";
        echo "**********************************************************\n";
        menuVacunos($campo, $arrayVacunos);
    }
}

function menuVacunos( $campo,  &$arrayVacunos ){

    echo "\n";
    echo "\n";
    echo "MENÚ VACUNOS \n";
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