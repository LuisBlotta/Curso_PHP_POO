<?php
require 'clases/Conexion.php';
require 'clases/Region.php';
require 'clases/Destino.php';

$objDestino = new Destino;
$objRegion = new region;
$regiones = $objRegion->listarRegiones();
    include 'templates/header.php';
?>

    <section class="container">
        <h1>Formulario de modificacion de destinos</h1>

        <div class="alert bg-light p-3">
            <form action="formAgregarDestino.php" method="post">
                Nombre del Destino:
                <br>
                <input type="text" name="destNombre" class="form-control">
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
                <input type="text" name="destPrecio" class="form-control" >
                <br>
                Asientos:
                <br>
                <input type="text" name="destAsientos" class="form-control" >
                <br>
                Asientos Disponibles:
                <br>
                <input type="text" name="destDisponibles" class="form-control" >
                <br>




                <button class="btn btn-success" name="agregar">Agregar Destino</button>
                <a href="adminDestinos.php" class="btn btn-outline-secondary">
                    Volver a admin destinos
                </a>
            </form>
        </div>

    </section>

<?php
    include 'templates/footer.php';


if( isset ($_POST["agregar"])){
    $destNombre = $_POST['destNombre'];
    $destRegion =  $_POST['region'];
    $destPrecio = $_POST['destPrecio'];
    $destAsientos = $_POST['destAsientos'];
    $destDisponibles = $_POST['destDisponibles'];


    $objDestino = new Destino;
    $objDestino->agregarDestino($destNombre,$destRegion,$destPrecio,$destAsientos,$destDisponibles);

}
?>