<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: ../vista/login.php");
    exit;
}else {

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $generacion = $_POST['generacion'];

    // Conectar a la base de datos
    require("../datos/Conexion.php");
    $cn = Conexion::conectar();

    if (!$cn) {
        die("Error al conectar a la base de datos");
    }

    // Sentencia SQL con marcadores de posición
    $sql = "INSERT INTO personajes (nombre, tipo, generacion) VALUES (:nombre, :tipo, :generacion)";

    // Preparar la sentencia
    $consulta = $cn->prepare($sql); // Aquí cambiamos $conexion a $cn

    // Vincular parámetros
    $consulta->bindParam(':nombre', $nombre);
    $consulta->bindParam(':tipo', $tipo);
    $consulta->bindParam(':generacion', $generacion);

    // Ejecutar la consulta
    $resultado = $consulta->execute();

    header('Location: ../vista/admin.php');
}

header("Location: ../vista/admin.php");
    exit;
}
?>