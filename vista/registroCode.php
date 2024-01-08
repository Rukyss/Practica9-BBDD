<?php

include '../controlador/UsuarioControlador.php';
include '../helps/helps.php';

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if(isset($_POST["txtUsuario"]) && isset($_POST["txtEmail"]) && isset($_POST["txtContrasena"])) {

        $nombre = validar_campo($_POST["txtUsuario"]);
        $email = validar_campo($_POST["txtEmail"]);
        $contrasena = validar_campo($_POST["txtContrasena"]);
    
        $resultado = array("estado" => "true");
     
        if (UsuarioControlador::registro($txtUsuario, $txtEmail, $txtContrasena)) {
            $usuario = UsuarioControlador::getUsuario($txtUsuario, $txtContrasena);
            $_SESSION["usuario"] = array(
                "nombre" => $usuario->getNombre(),
                "email" => $usuario->getemail(),
                "contrasena" => $usuario->getContrasena(),
            );
            header("Location: admin.php");

        }
    }
}else {
    header("Location: login.php?error=1");
}
?>