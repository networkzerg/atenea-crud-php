<?php
// coger llaves del json
$keys = file_exists('keys.json') ? json_decode(file_get_contents('keys.json'), true) : [];

// mostrar llaves formato json
echo json_encode($keys);
?>
