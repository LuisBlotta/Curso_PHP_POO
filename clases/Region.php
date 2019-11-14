<?php

    class Region
    {
        private $regID;
        private $regNombre;

        public function listarRegiones()
        {
            $link = Conexion::conectar();
            $sql = "SELECT regID, regNombre FROM regiones";
            $stmt = $link->prepare($sql);
            $stmt-> execute();
            $regiones = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $regiones;
        }

        public function verRegionPorID(){

            $regID = $_GET['regID'];
            $link = Conexion::conectar();
            $sql = "SELECT regID, regNombre FROM regiones WHERE regID =$regID";
            $stmt = $link->prepare($sql);
            $stmt-> execute();
            $region = $stmt->fetch(PDO::FETCH_ASSOC);
            return $region;

        }

        public function agregarRegion($regNombre){
            $link = Conexion::conectar();
            $sql = "INSERT INTO `regiones` (`regNombre`) VALUES"."('$regNombre')";
            $stmt = $link->prepare($sql);
            $stmt-> execute();
        }

        public function modificarRegion($regNombre){
            $link = Conexion::conectar();
            $region= $this->verRegionPorID();
            $regID = $region['regID'];
            $sql = "UPDATE regiones SET regNombre='$regNombre' WHERE regID = '$regID'";
            $stmt = $link->prepare($sql);
            $stmt-> execute();
            header('location: adminRegiones.php');
        }

        public function eliminarRegion(){
            $link = Conexion::conectar();
            $region= $this->verRegionPorID();
            $regID = $region['regID'];
            $sql = "DELETE FROM regiones WHERE regID = '$regID'";
            $stmt = $link->prepare($sql);
            $stmt-> execute();
            header('location: adminRegiones.php');
        }


        #######################
        ### getters y setters
        public function getRegID()
        {
            return $this->regID;
        }
        public function setRegID($regID)
        {
            $this->regID = $regID;
        }

        public function getRegNombre()
        {
            return $this->regNombre;
        }
        public function setRegNombre($regNombre)
        {
            $this->regNombre = $regNombre;
        }


    }