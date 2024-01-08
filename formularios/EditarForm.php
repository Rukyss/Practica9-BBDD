<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center" style="background-color:black; color:white;"> Editar Productos</h1>

    <form action="../CRUD/editarDatos.php" method="POST" class="container">

    <?php
        include('../datos/Conexion.php');

        $cn = Conexion::conectar();

        $id = isset($_GET['Id']) ? $_GET['Id'] : null;

        if ($id === null) {
            header("Location: ../vista/admin.php");
            exit;
        }

        $sql = "SELECT * FROM pokemons WHERE id = :id";
        $stmt = $cn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>

    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" class="form-control" name="nombre" value="<?php echo $row['nombre']; ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Tipo</label>
        <input type="text" class="form-control" name="tipo" value="<?php echo $row['tipo']; ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Generacion</label>
        <input type="number" class="form-control" name="generacion" value="<?php echo $row['generacion']; ?>">
    </div>

        <div class="text-center">
            <button type="submit" class="btn btn-danger">Enviar</button>
            <a href="../vista/admin.php" class="btn btn-dark">Regresar</a>
        </div>
    </form>
  </body>