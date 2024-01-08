<?php

session_start();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h1 class="text-center" style="background-color:black; color:white;"> Listado de Productos</h1>
    </div>
    <div class="container">
        <table class="table">
    <thead>
        <tr>
        <th scope="col">Id</th>
        <th scope="col">nombre</th>
        <th scope="col">tipo</th>
        <th scope="col">generacion</th>
        </tr>
    </thead>
    <tbody class="table-primary">
    <?php
      require("../datos/Conexion.php");

      $cn = Conexion::conectar();

      if (!$cn) {
          die("Error al conectar a la base de datos");
      }

       $sql = $cn->query("SELECT * FROM pokemons");

      // Verificar si la consulta fue exitosa
      if ($sql) {
         while ($resultado = $sql->fetch(PDO::FETCH_ASSOC)) {
      ?>
              <tr>
             <th scope="row"><?php echo $resultado['id']; ?></th>
             <td><?php echo $resultado['nombre']; ?></td>
             <td><?php echo $resultado['tipo']; ?></td>
             <td><?php echo $resultado['generacion']; ?></td>
             <th>
             <a href="../formularios/editarForm.php?Id=<?php echo $resultado['id']?>" id="botonNoEstilo" class="btn btn-warning">Editar</a>
             <a href="CRUD/eliminarDatos.php?Id=<?php echo $resultado['id']?>" id="botonNoEstilo" class="btn btn-danger">Eliminar</a>
           </th>
       </tr>
      <?php
       }
        } else {
        die("Error al ejecutar la consulta");
      }
    ?>
  </tbody>
    </table>
      <div class="container">
          <a href="../formularios/AgregarForm.php" class="btn btn-success">Agregar Producto</a>
      </div>



    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>


