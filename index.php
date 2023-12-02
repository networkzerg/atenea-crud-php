<?php
include_once "pdo.php"; // incluyo el archivo de conexión con la base de datos
include_once "header.php"; // incluyo el header de mi sitio que contiene el navbar
$sentencia = $base_de_datos->query("SELECT * FROM llaves;"); // operación de llamado del contenido de la tabla llaves
$llaves = $sentencia->fetchAll(PDO::FETCH_OBJ); // almacena row a row los resultados de la sentencia anterior en la variable llaves
?>

<!-- encabezado de html con enlaces de estilos y de animaciones de no he añadido aún -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
</head>

<!-- contenido de mi web -->
<body>
<!-- titulo de sección de listado -->
<div class="container mt-4">
    <h1 class=" display-3">Listado de llaves</h1> </div>

    <div class="container">
    <!-- cuadro de búsqueda, solo el html -->
        <!-- Pie del modal con posición en la esquina superior derecha -->
        <div class="modal-footer d-flex justify-content-end">
            <!-- Formulario de búsqueda -->
            <form action="buscar.php" method="GET" class="form-inline">
                <!-- Campos de búsqueda -->
                <input class="form-control mr-2" type="text" placeholder="WIP. Testeable." aria-label="Search" name="search">
                <!-- Botón para realizar la búsqueda -->
                <button class="btn btn-outline-primary" type="submit">Buscar</button>
            </form>
        </div> <br>

    <!-- tabla de llaves -->
    <table class="table">
        <!-- encabezado de la tabla -->
        <thead>
        <tr>
            <th>Referencia Local</th>
            <th>Referencia Externa</th>
            <th>Referencia en Llavero</th>
            <th>Acciones</th>
            <th></th>
        </tr>
        </thead>
        <!-- contenido de la tabla -->
        <tbody>
        <?php foreach($llaves as $llave){ ?>
            <!-- iteración para separar contenido del array que se guardó en $llaves -->
            <tr>
                <!-- saca el contenido del array y lo posiciona en la tabla -->
                <td><?php echo $llave->rlocal ?></td>
                <td><?php echo $llave->rexterna ?></td>
                <td><?php echo $llave->rllavero  ?></td>
                <!-- botones para editar y eliminar pasando el id mediante GET a editar_llave.php o borrar_llave.php -->
                <td><a href="<?php echo "editar_llave.php?id=" . $llave->id?>" class="btn btn-secondary">Editar</a></td>
                <td><a href="<?php echo "borrar_llave.php?id=" . $llave->id?>" class="btn btn-danger">Eliminar</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>


    <!-- Botón para abrir un modal de bootstrap para una nueva llave. Este está aquí porque quiero que se muestre sobre index.php,
    el de editar está en un sitio aparte para separar de cara al usuario ambas operaciones -->
        <div class="modal-footer d-flex justify-content-start">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevaLlaveModal">
                Añadir Nueva Llave
            </button>
        </div>

    <!-- Modal para añadir una llave -->
    <div class="modal fade" id="nuevaLlaveModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="nuevaLlaveModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title display-6" id="nuevaLlaveModalLabel">Nueva Llave</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario añadir una llave -->
                    <form method="post" action="nueva_llave.php">
                        <label for="rlocal">Referencia Local:</label>
                        <br>
                        <input name="rlocal" required type="text" id="rlocal" placeholder="Introduce la referencia">
                        <br><br>
                        <label for="rexterna">Referencia Externa:</label>
                        <br>
                        <input name="rexterna" required type="text" id="rexterna" placeholder="Introduce la referencia">
                        <br><br>
                        <label for="rllavero">Referencia en llavero:</label>
                        <br>
                        <input name="rllavero" required type="text" id="rllavero" placeholder="Introduce la referencia">
                        <br><br>
                        <input type="submit" class="btn btn-primary" value="Añadir llave">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Scripts de Bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
