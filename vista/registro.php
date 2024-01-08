<?php
// Incluir la conexión a la base de datos
include '../datos/Conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $contrasena = password_hash($_POST["contrasena"], PASSWORD_DEFAULT);

    try {
        $stmt = $conn->prepare("INSERT INTO usuarios (nombre, email, contrasena) VALUES (:nombre, :email, :contrasena)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':contrasena', $contrasena);

        $stmt->execute();

        echo "Cuenta creada exitosamente";
    } catch (PDOException $e) {
        echo "Error al crear la cuenta: " . $e->getMessage();
    }
}
?>