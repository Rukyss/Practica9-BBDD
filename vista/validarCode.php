<?php

include '../controlador/UsuarioControlador.php';
include '../helps/helps.php';



header('Content-type: application/json');
$resultado = array();
    
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST["txtUsuario"]) && isset($_POST["txtContrasena"])) {

        $txtUsuario = validar_campo($_POST["txtUsuario"]);
        $txtContrasena = validar_campo($_POST["txtContrasena"]);

        $resultado = array("estado"=>"true");
        
        if( UsuarioControlador::login($txtUsuario, $txtContrasena)){
           
           $usuario = UsuarioControlador::getUsuario($txtUsuario, $txtContrasena);
           $_SESSION["usuario"] = array(
            "id"=>$usuario->getId(),
            "nombre"=>$usuario->getNombre(),
            "usuario"=>$usuario->getUsuario(),
            "email"=>$usuario->getEmail(),
           );
           return print(json_encode($resultado));
        }
    }
}
    
    $resultado = array("estado"=>"false");
    return print(json_encode($resultado));
