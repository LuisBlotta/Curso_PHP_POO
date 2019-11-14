<?php

    class Conexion
    {
        private function __construct()
        {}
        static function conectar(){

            $link = new PDO(
                'mysql:host=localhost:3307;dbname=agencia',
                'root',
                '',
                [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']
            );
            $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            return $link;
        }
    }