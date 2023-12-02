<?php
// comprobar que se ha pasado por url (GET) el id de la llave, sino salir
if(!isset($_GET["id"])) exit();
// si se ha pasado, guardarlo dentro de la variable $id
$id = $_GET["id"];

// incluir el archivo de conexión con la base de datos y el header.
include_once "pdo.php";
include_once "header.php";
?>

<!-- cabezera de html-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
</head>
<body>

<!-- mensaje para el usuario -->
<div class="jumbotron">
    <h1 class="display-4">Edición de llaves</h1>
    <p class="lead">Al presionar el botón serás capaz de editar la referencia local, externa y en llavero de la llave con id: <?php echo $id; ?>
    De momento debes de introducir todos los campos, incluso si el valor que tiene es correcto.</p>
    <hr class="my-4">

    <!-- botón para abrir el modal de editar una llave -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#EditarLlaveModal">
        Editar Llave
    </button>
</div>

<!-- Modal para editar una llave -->
<div class="modal fade" id="EditarLlaveModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="EditarLlaveModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title display-6" id="EditarLlaveModalLabel">Editar Llave</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <!-- Formulario editar llave -->
                <!-- Se envía por post el contenido del formulario y con get el id a op_editar.php -->
                <form method="post" action="op_editar.php?id=<?php echo $id; ?>">
                    <label for="rlocalEditar">Referencia Local:</label>
                    <br>
                    <input name="rlocalEditar" required type="text" id="rlocalEditar" placeholder="Introduce la referencia">
                    <br><br>
                    <label for="rexternaEditar">Referencia Externa:</label>
                    <br>
                    <input name="rexternaEditar" required type="text" id="rexternaEditar" placeholder="Introduce la referencia">
                    <br><br>
                    <label for="rllaveroEditar">Referencia en llavero:</label>
                    <br>
                    <input name="rllaveroEditar" required type="text" id="rllaveroEditar" placeholder="Introduce la referencia">
                    <br><br>
                    <input type="submit" class="btn btn-primary" value="Editar llave">
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Scripts de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
