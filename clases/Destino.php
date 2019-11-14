<?php

    class Destino
    {
        private $destID;
        private $destNombre;
        private $regID;
        private $destPrecio;
        private $destAsientos;
        private $destDisponibles;
        private $destActivo;


        public function listarDestinos()
        {
            $link = Conexion::conectar();
            $sql = "SELECT destID, destNombre, destinos.regID ,regiones.regNombre regNombre, destPrecio, destAsientos, destDisponibles FROM destinos 
                    join regiones ON destinos.regID = regiones.regID";
            $stmt = $link->prepare($sql);
            $stmt-> execute();
            $destinos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $destinos;
        }


        public function verDestinoPorID(){

            $destID = $_GET['destID'];

            $link = Conexion::conectar();
            $sql = "SELECT destID, destNombre, d.regID, r.regNombre regNombre, destPrecio, destAsientos, destDisponibles, destActivo 
                    FROM destinos d JOIN regiones r ON d.regID = r.regID 
                    WHERE destID =$destID";
            $stmt = $link->prepare($sql);
            $stmt-> execute();
            $destino = $stmt->fetch(PDO::FETCH_ASSOC);
            return $destino;
        }

        public function agregardestino($destNombre, $destRegion, $destPrecio, $destAsientos, $destDisponibles){
            $link = Conexion::conectar();
            $sql = "INSERT INTO destinos (destNombre, regID, destPrecio, destAsientos, destDisponibles) 
                    VALUES ('$destNombre',$destRegion,$destPrecio,$destAsientos,$destDisponibles)";

            $stmt = $link->prepare($sql);
            $stmt-> execute();
        }

        public function modificarDestino($destNombre='', $destRegion='', $destPrecio='', $destAsientos='', $destDisponibles=''){
            $destinos = $this->verDestinoPorID();
            $destID = $destinos['destID'];
            $link = Conexion::conectar();
            $sql = "UPDATE destinos SET destNombre='$destNombre', regID=$destRegion, destPrecio =$destPrecio, destAsientos=$destAsientos, destDisponibles=$destDisponibles WHERE destID = '$destID'";

            $stmt = $link->prepare($sql);
            $stmt-> execute();
            header('location: adminDestinos.php');
        }


        public function eliminarDestino(){
            $link = Conexion::conectar();
            $destID = $_GET['destID'];
            $sql="DELETE FROM destinos WHERE destID=$destID";
            $stmt = $link->prepare($sql);
            $stmt-> execute();
            header('location: adminDestinos.php');

        }

        ##############################
        
        /**
         * @return mixed
         */
        public function getDestID()
        {
            return $this->destID;
        }

        /**
         * @param mixed $destID
         */
        public function setDestID($destID)
        {
            $this->destID = $destID;
        }

        /**
         * @return mixed
         */
        public function getDestNombre()
        {
            return $this->destNombre;
        }

        /**
         * @param mixed $destNombre
         */
        public function setDestNombre($destNombre)
        {
            $this->destNombre = $destNombre;
        }

        /**
         * @return mixed
         */
        public function getRegID()
        {
            return $this->regID;
        }

        /**
         * @param mixed $regID
         */
        public function setRegID($regID)
        {
            $this->regID = $regID;
        }

        /**
         * @return mixed
         */
        public function getDestPrecio()
        {
            return $this->destPrecio;
        }

        /**
         * @param mixed $destPrecio
         */
        public function setDestPrecio($destPrecio)
        {
            $this->destPrecio = $destPrecio;
        }

        /**
         * @return mixed
         */
        public function getDestAsientos()
        {
            return $this->destAsientos;
        }

        /**
         * @param mixed $destAsientos
         */
        public function setDestAsientos($destAsientos)
        {
            $this->destAsientos = $destAsientos;
        }

        /**
         * @return mixed
         */
        public function getDestDisponibles()
        {
            return $this->destDisponibles;
        }

        /**
         * @param mixed $destDisponibles
         */
        public function setDestDisponibles($destDisponibles)
        {
            $this->destDisponibles = $destDisponibles;
        }

        /**
         * @return mixed
         */
        public function getDestActivo()
        {
            return $this->destActivo;
        }

        /**
         * @param mixed $destActivo
         */
        public function setDestActivo($destActivo)
        {
            $this->destActivo = $destActivo;
        }


    }