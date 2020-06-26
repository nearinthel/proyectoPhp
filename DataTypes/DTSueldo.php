<?php 

class DTSueldo{
    private $total;//con los descuentos de hora y las extras
    private $hora;
    private $sueldo;

    public function __construct($t) {
        $this->total = $t;
    } 

    public function getSueldo()
    {
        return $this->sueldo;
    }

    public function getHSueldo(){
        return $this->hora;
    }

    public function setSueldo($val){
        //inmoralidad hacer esto
        $this->sueldo = $val;
    }

}



?>