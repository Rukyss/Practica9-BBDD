<?php

class Conexion {

    /**
     * Conexion a la BBDD
     */

    public static function conectar(){
        try{

            $cn = new PDO("mysql:host=localhost;dbname=login-php2","david1","1234");

            return $cn;

        }catch (PDOException $ex){
            die($ex->getMessage());
        }
    }

}
