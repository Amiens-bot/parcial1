<?php 
include_once("../model/personaCollection.php");

$db = new PersonaCollection();

$actualizar = false;
$codigoEditar = "";
$nombreEditar = "";
$emailEditar = "";

if(isset($_POST["guardar"])){
    $db->createPersona($_POST);
}

if (isset($_POST["cerrar"])) {
    $db->closeSession();
}

if (isset($_GET["eliminar"])) {
    $db->deletePersona($_GET["eliminar"]);  // le pasamos el valor de &eliminar.
}

if (isset($_GET["editar"])) {
    $actualizar = true;

    $key1 = $db->checkCodigo($_GET["editar"]);

    $personaEditar = $_SESSION["list"][$key1];
    
    $codigoEditar = $personaEditar->codigo;
    $nombreEditar = $personaEditar->nombre;
    $emailEditar = $personaEditar->email;
}

if (isset($_POST["actualizar"])) {
    $db->editPersona($_POST);
}

?>