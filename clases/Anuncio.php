<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Anuncios
 *
 * @author Alberto Damelles
 */
include_once "FuncionarioMarca.php";
class Anuncio implements SplSubject{
    
    private $fm;//funcionario marca
    private $descripcion;// de que se trata el anuncio
    private $nroAnuncio;//numero que se usa en la empresa para ese anuncio ejemplo exrta 4
    private $justificacion;//porque lo usaron
    private $id = 0;//probar 
    private $estado;
    private $storage;
    
    
    public function __construct($nro, $desc) {
    //la descripcion es para que usarlo el nro es el que se usa id el identificador
    //para que lo cree el jefe just va en null
        $this->nroAnuncio = $nro;
        $this->descripcion=$desc;
        $this->storage = new SplObjectStorage;
//        $this->estado=$this->nroAnuncio."".$this->getDescripcion();
//        $this->notify();
    }
    
    public function ingresarAnuncio($nro, $just)
    {
        //obtengo la descripcion de la base de datos
        $this->id++;
        $this->justificacion = $just;
        //cuando se encuentra el nro anuncio en la base de datos se devuelve la descp
        $desc="";
        $a = new Anuncio($nro,$desc);
        
   
        
        $this->storage = new SplObjectStorage;
        $this->estado=$this->nroAnuncio."".$this->getDescripcion();
        $this->notify();
        
        return $a;   
        
    }


    public function getDescripcion() {
        return $this->descripcion;
        
    }

    public function getNroAnuncio() {
        return $this->nroAnuncio;
    }

    public function getFM(){
        return $this->fm;
    }
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
        echo $this->descripcion;
       // $this->storage = new SplObjectStorage;
        $this->estado=$this->nroAnuncio."".$this->getDescripcion();
        $this->notify();

    }

    public function setNroAnuncio($nroAnuncio) {
        $this->nroAnuncio = $nroAnuncio;
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function borrarInconsistencia() {
        $this->fm->removerIncosistencia();        
    }
    
    public function attach(SplObserver $observer)
    {
        $this->storage->attach($observer);
    }
    public function detach(SplObserver $observer)
    {
        $this->storage->detach($observer);
    }
    public function notify()
    {
        foreach ($this->storage as $observer) {
            $observer->update($this);
        }
    }

    public function modificarSueldo(){
        //obtengo la hra de la marca la del horario y hago la cuenta
        $horario = $this->fm->getInconsistencia()->getHora();//hora del turno
        $hmarca=$this->fm->getInconsistencia()->getDTM()->getHora();//hora de la marca
        //tipo date preciso el dia
        $func=$this->fm->getFuncionario();
        $marca=$horario->diff($hmarca);
        $marcaH=$llego->format('%h');//se queda con la hora que llego
        $marcaM=$llego->format('%i');
        if($hmarca->getDTM()->getTipo() == 0){//entrada
            if($hmarca>$horario){//y llego tarde
            $hadesc = $func->getCargo()->getSueldo()->getHSueldo(); 
            $val = ($hadesc*$llegoH)+($hadesc*$llegom/60);//le cuento los minutos
            $func->setSueldo($func->getSueldo()-$val);//se lo mando al sueldo deberia ser al total
            }
        }elseif ($hmarca>$horario) {//salida y marco mas tarde
            $hext = $func->getCargo()->getSueldo()->getHSueldo(); 
            $val = ($hadesc*$llegoH)+($hadesc*$llegom/60);//le cuento los minutos
            $func->setSueldo($func->getSueldo()+$val);//se lo mando al sueldo deberia ser al total
        }else {//se fue antes
            $hadesc = $func->getCargo()->getSueldo()->getHSueldo(); 
            $val = ($hadesc*$llegoH)+($hadesc*$llegom/60);//le cuento los minutos
            $func->setSueldo($func->getSueldo()-$val);//se lo mando al sueldo deberia ser al total
        }
}

    public function licencia($dia,$func)
    {   
        //creo las marcas de entrada y salidara para el func
        //el dia debe ser un string siguiendo el formato
        $entrada = new DateTime($dia." 08:00:00 AM");
        $salida =new DateTime($dia." 16:00:00 AM");
        // $this->fm->crearMarca($entrada, enumES::Entrada,$func);
        // $this->fm->crearMarca($salida, enumES::Salida,$func);
        $func->ingresarMarca($entrada,enumES::Entrada);
        $func->ingresarMarca($salida,enumES::Entrada);
    }

    public function descanso($marcaE,$marcaS ,$func){
        //recibe 2 dtm y devuelve sumado al sueldo a ese funcionario
        $horas= $marcaS->diff($marcaE);

        $subT= $func->getCargo()->getSueldo()->getHSueldo() * $horas* 2;
        $func->getCargo()->getSueldo()->setSueldo($subT +$func->getCargo()->getSueldo()->getHSueldo() );

    }
    public function setJustificacion($just)
    {
        $this->justificacion = $just;
    }
     
    public function getJustificacion()
    {
        return $this->justificacion;
    }
    
    function getEstado() {
        return $this->estado;
    }



}
