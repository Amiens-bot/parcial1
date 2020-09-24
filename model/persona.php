<?php 

class Persona
{
    public $codigo;
    public $nombre;
    public $email;

    public function __construct($c,$n,$e){
        $this->codigo = $c;
        $this->nombre = $n;
        $this->email = $e;
    }
}

?>