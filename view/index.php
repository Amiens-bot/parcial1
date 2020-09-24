<?php 

include_once("../model/personaCollection.php");

$db = new PersonaCollection();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parcial n1 - Lab IV </title>
</head>
<body>
    <?php  require_once("../controller/process.php")?>

    <form action="../controller/process.php" method="POST">
        <label for="">Codigo</label><br>
        <?php 
        if($actualizar == true): 
        ?>
            <input type="text" name="personaCodigo" id="" value="<?php echo $codigoEditar; ?>" readonly ><br>
        <?php else: ?>
            <input type="text" name="personaCodigo" id="" value="<?php echo $codigoEditar; ?>"><br>
        <?php endif; ?>
        <label for="">Nombre</label><br>
        <input type="text" name="personaNombre" id="" value="<?php echo $nombreEditar; ?>"><br>
        <label for="">Email</label><br>
        <input type="text" name="personaEmail" id="" value="<?php echo $emailEditar; ?>"><br>

        <?php 
        if($actualizar == true): 
        ?>
            <br><button type="submit" name="actualizar">Actualizar</button><br>
        <?php else: ?>
            <br><button type="submit" name="guardar">Guardar</button><br>
        <?php endif; ?>

        <br><button type="submit" name="cerrar">Cerrar Sesion</button>
    </form>

    <h1>Listado de Personas</h1><br>
    
    <?php $db->listAll(); ?>
    
</body>
</html>