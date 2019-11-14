<?php
require 'clases/Conexion.php';
require 'clases/Destino.php';
require 'clases/Region.php';
$objDestino = new Destino;

$destNombre = $_POST['destNombre'];
$destRegion =  $_POST['region'];
$destPrecio = $_POST['destPrecio'];
$destAsientos = $_POST['destAsientos'];
$destDisponibles = $_POST['destDisponibles'];

$objDestino->modificarDestino($destNombre,$destRegion,$destPrecio,$destAsientos,$destDisponibles);

