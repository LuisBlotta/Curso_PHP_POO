<?php
    require 'clases/Conexion.php';
    require 'clases/Region.php';
    $objRegion = new Region;
    $regiones = $objRegion->listarRegiones();


    include 'templates/header.php';
?>

    <section class="container">
        <h1>Panel de administración de Regiones</h1>

        <table class="table table-bordered table-hover table-stripped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Región</th>
                    <th colspan="2">
                        <a href="formAgregarRegion.php" class="btn btn-success">
                            Agregar
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
<?php
            foreach( $regiones as $region ){
?>
                <tr>
                    <td><?= $region['regID']; ?></td>
                    <td><?= $region['regNombre']; ?></td>
                    <td>
                        <a href="formModificarRegion.php?regID=<?= $region['regID']; ?>" class="btn btn-warning">
                            Modificar
                        </a>
                    </td>
                    <td>
                        <a href="eliminarRegion.php?regID=<?= $region['regID']; ?>" name="eliminar" class="btn btn-danger">
                            Eliminar
                        </a>
                    </td>
                </tr>
<?php
            }
?>
            </tbody>
        </table>

    </section>

<?php
    include 'templates/footer.php';
?>