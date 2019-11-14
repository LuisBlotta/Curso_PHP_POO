<?php
require 'clases/Conexion.php';
require 'clases/Region.php';
$objRegion = new Region;
$regNombre = $_POST['regNombre'];
$objRegion->modificarRegion($regNombre);

