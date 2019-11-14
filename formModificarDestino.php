<?php

require 'clases/Conexion.php';
require 'clases/Region.php';
require 'clases/Destino.php';

$objDestino = new Destino;
$destino = $objDestino->verDestinoPorID();

$objRegion = new region;
$regiones = $objRegion->listarRegiones();

include 'templates/header.php';
?>

    <section class="container">
        <h1>Formulario de modificacion de destinos</h1>

        <div class="alert bg-light p-3">
            <form action="modificarDestino.php?destID=<?= $_GET['destID'] ?>" method="post">
                Nombre del Destino:
                <br>
                <input type="text" name="destNombre" class="form-control" value="<?=$destino['destNombre'] ?>">
                <br>
                Region:
                <br>
                <select name="region" class="custom-select mr-sm-2">
                    <?php

                    foreach ($regiones as $region){
                        echo"<option value=".$region['regID'].">".$region['regNombre']."</option> ";
                    }
                    ?>

                </select>
                <br> <br>
                Precio:
                <br>
                <input type="text" name="destPrecio" class="form-control" value="<?=$destino['destPrecio'] ?>">
                <br>
                Asientos:
                <br>
                <input type="text" name="destAsientos" class="form-control" value="<?=$destino['destAsientos'] ?>">
                <br>
                Asientos Disponibles:
                <br>
                <input type="text" name="destDisponibles" class="form-control" value="<?=$destino['destDisponibles'] ?>">
                <br>




                <button class="btn btn-success" name="modificar">Modificar Región</button>
                <a href="adminDestinos.php" class="btn btn-outline-secondary">
                    Volver a admin destinos
                </a>
            </form>
        </div>

    </section>

<?php
include 'templates/footer.php';

?><?php
