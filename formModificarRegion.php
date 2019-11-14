<?php

	require 'clases/Conexion.php';
    require 'clases/Region.php';

    $objRegion = new Region;
    $region = $objRegion->verRegionPorID();
    include 'templates/header.php';
?>

    <section class="container">
        <h1>Formulario de modificacion de una nueva región</h1>

        <div class="alert bg-light p-3">
            <form action="modificarRegion.php?regID=<?= $_GET['regID'] ?>" method="post">
                Nombre de la Región:
                <br>
                <input type="text" name="regNombre" class="form-control" value="<?=$region['regNombre'] ?>">
                <br>
                <button class="btn btn-success" name="modificar">Modificar Región</button>
                <a href="adminRegiones.php" class="btn btn-outline-secondary">
                    Volver a admin regiones
                </a>
            </form>
        </div>

    </section>

<?php
    include 'templates/footer.php';

?>