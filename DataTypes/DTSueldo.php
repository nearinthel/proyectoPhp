<?php 

class DTSueldo{
    private $total;//con los descuentos de hora y las extras
    private $hora;
    private $sueldo;

    public function __construct($t) {
        
        
        $this->sueldo = $t;
        $valorDia=$t/30;
        $this->hora=$valorDia/8;
        $this->total=0;
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
    
    function getTotal() {
        return $this->total;
    }

    function getHora() {
        return $this->hora;
    }

    function setTotal($total) {
        $this->total = $total;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }



}



?>