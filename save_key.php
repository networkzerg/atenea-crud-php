<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $referenciaLocal = $_POST['referenciaLocal'] ?? '';
    $referenciaExterna = $_POST['referenciaExterna'] ?? '';
    $notas = $_POST['notas'] ?? '';
    $direccion = $_POST['direccion'] ?? '';

    // obtener llaves existentes o crear un arreglo vacío si el archivo no existe
    $keys = file_exists('keys.json') ? json_decode(file_get_contents('keys.json'), true) : [];

    // guardar nueva llave
    $newKey = [
        'referenciaLocal' => $referenciaLocal,
        'referenciaExterna' => $referenciaExterna,
        'notas' => $notas,
        'direccion' => $direccion
    ];

    $keys[] = $newKey;

    // guardar variables en el json
    file_put_contents('keys.json', json_encode($keys, JSON_PRETTY_PRINT));

    // respuesta de json treue
    echo json_encode(['success' => true]);
} else {
    // respuesta de json false
    echo json_encode(['success' => false]);
}
?>
