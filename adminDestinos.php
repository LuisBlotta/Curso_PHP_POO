<?php
    require 'clases/Conexion.php';
    require 'clases/Destino.php';
    $objDestino = new Destino;
    $destinos = $objDestino->listarDestinos();
    include 'templates/header.php';
?>

    <section class="container">
        <h1>Panel de administración de Destinos</h1>

        <table class="table table-bordered table-hover table-stripped">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Nombre destino</th>
                    <th>Region</th>
                    <th>Precio</th>
                    <th>Asientos</th>
                    <th>Disponibles</th>
                    <th colspan="2">
                        <a href="formAgregarDestino.php" class="btn btn-success">
                            Agregar
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
<?php
            foreach( $destinos as $destino ){
?>
                <tr>
                    <td><?= $destino['destID']; ?></td>
                    <td><?= $destino['destNombre']; ?></td>
                    <td><?= $destino['regNombre']; ?></td>
                    <td><?= $destino['destPrecio']; ?></td>
                    <td><?= $destino['destAsientos']; ?></td>
                    <td><?= $destino['destDisponibles']; ?></td>
                    <td>
                        <a href="formModificarDestino.php?destID=<?= $destino['destID']; ?>" class="btn btn-warning">
                            Modificar
                        </a>
                    </td>
                    <td>
                        <a href="eliminarDestino.php?destID=<?= $destino['destID']; ?>" class="btn btn-danger">
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