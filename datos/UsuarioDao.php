<?php

include 'Conexion.php';
include '../entidades/Usuario.php';

class UsuarioDao extends Conexion{

    protected static $cnx;

    private static function getConexion(){
        self::$cnx = Conexion::conectar();

    }

    private static function desconectar(){
        self::$cnx = null;
    }

    /** Metodo Para Validar el Login */
    public static function login($usuario){
        $query = "SELECT * FROM usuarios WHERE usuario = :usuario AND contrasena = :contrasena";   
         
        self::getConexion();
    
      
        $username = $usuario->getUsuario();
        $contrasena = $usuario->getContrasena();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindParam(":usuario", $username);
        $resultado->bindParam(":contrasena", $contrasena); 

        $resultado->execute();

        if($resultado->rowCount() > 0){
            $filas = $resultado->fetch();
            if($filas["usuario"] == $usuario->getUsuario()
                && $filas["contrasena"] ==  $usuario->getContrasena()){
                return true;
            
            }
        }   
    return false; 
    }  

    /** Metodo Para obtener un usuario */
    public static function getUsuario($usuario){
        $query = "SELECT id,nombre,usuario,email FROM usuarios WHERE usuario = :usuario AND contrasena = :contrasena";   
         
        self::getConexion();
    
      
        $username = $usuario->getUsuario();
        $contrasena = $usuario->getContrasena();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindParam(":usuario", $username);
        $resultado->bindParam(":contrasena", $contrasena); 

        $resultado->execute();

        $filas = $resultado->fetch();

        $usuario = new Usuario();
        $usuario->setId($filas["id"]);
        $usuario->setNombre($filas["nombre"]);
        $usuario->setUsuario($filas["usuario"]);
        $usuario->setEmail($filas["email"]);

        return $usuario;
    }    
     /** Metodo que sirve para registrar usuarios **/
    
    public static function registrar($usuario)
    {
        $query = "INSERT INTO usuarios (nombre,email,usuario,contrasena) VALUES (:nombre,:email,:usuario,:contrasena)";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindValue(":nombre", $usuario->getNombre());
        $resultado->bindValue(":email", $usuario->getEmail());
        $resultado->bindValue(":usuario", $usuario->getUsuario());
        $resultado->bindValue(":contrasena", $usuario->getcontrasena());

        if ($resultado->execute()) {
            return true;
        }

        return false;
    }
}