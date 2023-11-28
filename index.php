<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Control de Inventario de Llaves</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Control de Inventario de Llaves</h1>
        <!-- tabla de llaves -->
        <table class="table">
            <thead>
                <tr>
                    <th>Referencia Local</th>
                    <th>Referencia Externa</th>
                    <th>Notas</th>
                    <th>Dirección</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="keysTableBody">
                <!-- dtable llaves -->
            </tbody>
        </table>

        <!-- btn añadir una nueva llave -->
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addKeyModal">Añadir Llave</button>
    </div>

    <!-- mdl nueva llave -->
    <div class="modal fade" id="addKeyModal" tabindex="-1" aria-labelledby="addKeyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addKeyModalLabel">Agregar Nueva Llave</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addKeyForm">
                        <div class="mb-3">
                            <label for="referenciaLocal" class="form-label">Referencia Local:</label>
                            <input type="text" class="form-control" id="referenciaLocal" name="referenciaLocal">
                        </div>
                        <div class="mb-3">
                            <label for="referenciaExterna" class="form-label">Referencia Externa:</label>
                            <input type="text" class="form-control" id="referenciaExterna" name="referenciaExterna">
                        </div>
                        <div class="mb-3">
                            <label for="notas" class="form-label">Notas:</label>
                            <textarea class="form-control" id="notas" name="notas"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="direccion" class="form-label">Dirección:</label>
                            <input type="text" class="form-control" id="direccion" name="direccion">
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- script de bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // cargar llaves desde el json
            function loadKeys() {
                fetch('get_keys.php') // Archivo PHP para obtener las llaves
                    .then(response => response.json())
                    .then(data => {
                        const keysTableBody = document.getElementById('keysTableBody');
                        keysTableBody.innerHTML = ''; // recargar tabla para agregar llaves

                        data.forEach(key => {
                            const row = `
                                <tr>
                                    <td>${key.referenciaLocal}</td>
                                    <td>${key.referenciaExterna}</td>
                                    <td>${key.notas}</td>
                                    <td>${key.direccion}</td>
                                    <td>
                                        <button class="btn btn-primary">Modificar</button>
                                    </td>
                                </tr>
                            `;
                            keysTableBody.innerHTML += row;
                        });
                    });
            }

            // volver a cargar la tabla con la llave agregada
            loadKeys();

            // formulario de añadir llave
            const addKeyForm = document.getElementById('addKeyForm');
            addKeyForm.addEventListener('submit', function (event) {
                event.preventDefault();

                const referenciaLocal = document.getElementById('referenciaLocal').value;
                const referenciaExterna = document.getElementById('referenciaExterna').value;
                const notas = document.getElementById('notas').value;
                const direccion = document.getElementById('direccion').value;

                // Enviar los datos del formulario al servidor PHP para guardar la nueva llave
                fetch('save_key.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        referenciaLocal,
                        referenciaExterna,
                        notas,
                        direccion
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        //si no hay errores, mostrar la tabla con la llave agregada
                        loadKeys();
                        // cerrar el modal de añadir llave
                        const modal = new bootstrap.Modal(document.getElementById('addKeyModal'));
                        modal.hide();
                    } else {
                        console.error('Error al guardar la llave');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            });
        });
    </script>
</body>
</html>
