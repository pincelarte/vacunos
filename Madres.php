<?php

$arrayVacunos = [];
$d = date('d/m/Y');
$arrayVacunos = recuperar('Madres.json');

class Madres
{

    public $indole;
    public $caravana;
    public $nacimiento;
    public $raza;
    public $ficha;
    public $edad;
    public $peso;

    public function __construct($indole, $caravana, $nacimiento, $raza, $ficha = "No definido", $peso = "No definido")
    {

        $this->indole = $indole;
        $this->caravana = $caravana;
        $this->nacimiento = $nacimiento;
        $this->raza = $raza;
        $this->ficha = $ficha;
        $this->peso = $peso;
    }

    public function getIndole()
    {
        return $this->indole;
    }

    public function getCaravana()
    {
        return $this->caravana;
    }

    public function getNacimiento()
    {
        return $this->nacimiento;
    }

    public function getRaza()
    {
        return $this->raza;
    }

    public function getFicha()
    {
        return $this->ficha;
    }

    public function setIndole($indole)
    {
        $this->indole = $indole;
    }


    public function setCaravana($caravana)
    {
        $this->caravana = $caravana;
    }

    public function setNacimiento($nacimiento)
    {
        $this->nacimiento = $nacimiento;
    }

    public function setRaza($raza)
    {
        $this->raza = $raza;
    }

    public function setFicha($ficha)
    {
        $this->ficha = $ficha;
    }

    public function setEdad($edad)
    {
        $this->edad = $edad;
    }


    public function getEdad()
    {
        $nacimiento = DateTime::createFromFormat('d/m/Y H:i:s', $this->nacimiento);

        if ($nacimiento === false) {
            throw new Exception("Fecha de nacimiento inválida: {$this->nacimiento}");
        }
        $fechaActual = new DateTime();
        $intervalo = $nacimiento->diff($fechaActual);
        $edad = $intervalo->y . " años, " . $intervalo->m . " meses, " . $intervalo->d . " días";
        return $edad;
    }

    public function setPeso($peso)
    {
        $this->peso = $peso;
    }

    public function getPeso()
    {
        return $this->peso;
    }

}

$nombreArchivo = 'Madres.json';




