<?php 
include_once("persona.php");
session_start();

class PersonaCollection
{
    public function __construct(){

        // Inserta un array $list en $_SESSION si es que no existe. Si existe no hace nada.
        $list = array();
        if (!isset($_SESSION["list"]))
        {
            $_SESSION["list"]=$list;
        }
    }

    public function closeSession(){
        session_destroy();
        header('Location: http://localhost/parcial1/view/index.php');
    }

    // lista todo los objetos en $_SESSION["list"]
    public function listAll(){
        foreach ($_SESSION["list"] as $key => $value) {
            echo "<a href='../view/index.php?editar=".$value->codigo."'>Editar</a>"." - "."<a href='../controller/process.php?eliminar=".$value->codigo."'>Eliminar</a>"." - ".$key." - ".$value->codigo." - ".$value->nombre." - ".$value->email."</br>";  
        }

        // var_dump($_SESSION["list"]);
    }

    // Crea un objeto Persona y lo pushea a $_SESSION["list"]
    public function createPersona($values){
        $persona = new Persona($values['personaCodigo'],$values['personaNombre'],$values['personaEmail']);
        array_push($_SESSION["list"], $persona);
        header('Location: http://localhost/parcial1/view/index.php');
    }

    public function deletePersona($codigoValue){
        $key = $this->checkCodigo($codigoValue);
        unset($_SESSION["list"][$key]); // elimino en la posicion $key en el array $_SESSION["list"]
        header('Location: http://localhost/parcial1/view/index.php');
    }

    public function editPersona($codigoValue){
        $key1 = $this->checkCodigo($codigoValue["personaCodigo"]);
        $_SESSION["list"][$key1] = new Persona($codigoValue['personaCodigo'],$codigoValue['personaNombre'],$codigoValue['personaEmail']);
        header('Location: http://localhost/parcial1/view/index.php');
    }

    // si existe un elemento en el array $_SESSION["list"] con el codigo igual a $c devuelve su key.
    public function checkCodigo($c){
        foreach ($_SESSION["list"] as $key => $value) {
            if ($value->codigo == $c) {
                return $key;
            }
        } 
    }

    





    
}

?>