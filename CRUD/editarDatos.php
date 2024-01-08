<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: ../vista/login.php");
    exit;
} else {
    include_once('../datos/Conexion.php');

    $id = isset($_POST['Id']) ? $_POST['Id'] : null;
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
    $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : null;
    $generacion = isset($_POST['generacion']) ? $_POST['generacion'] : null;

    // Verifica si el ID está presente antes de ejecutar la consulta
    if ($id !== null) {
        $sql = "UPDATE pokemons SET 
        nombre = :nombre,
        tipo = :tipo,
        generacion = :generacion
        WHERE id = :id";

        $cn = Conexion::conectar();
        $stmt = $cn->prepare($sql);

        // Enlaza los parámetros
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':tipo', $tipo, PDO::PARAM_STR);
        $stmt->bindParam(':generacion', $generacion, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Ejecuta la consulta
        try {
            $stmt->execute();
            header('Location: ../vista/admin.php');
            exit; // Agrega exit después de redireccionar para asegurarte de que el script no continúe ejecutándose
        } catch (PDOException $e) {
            echo "Error en la ejecución de la consulta: " . $e->getMessage();
        }
    } else {
        echo "ID no proporcionado.";
    }
    header("Location: ../admin.php");
    exit;
}
?>
