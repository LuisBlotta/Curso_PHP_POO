<?php
require 'clases/Conexion.php';
require 'clases/Region.php';
    include 'templates/header.php';
?>

    <section class="container">
        <h1>Formulario de alta de una nueva región</h1>

        <div class="alert bg-light p-3">
            <form action="formAgregarRegion.php" method="post">
                Nombre de la Región:
                <br>
                <input type="text" name="regNombre" class="form-control" placeholder="Nombre Region">
                <br>
                <button class="btn btn-success" name="agregar">Agregar Región</button>
                <a href="adminRegiones.php" class="btn btn-outline-secondary">
                    Volver a admin regiones
                </a>
            </form>
        </div>

    </section>

<?php
    include 'templates/footer.php';


if( isset ($_POST["agregar"])){
    $regNombre = $_POST['regNombre'];
    $objRegion = new Region;
    $objRegion->agregarRegion($regNombre);

}
?>