<?php
if (!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "pdo.php";

$sentencia = $base_de_datos->prepare("DELETE FROM llaves WHERE id = ?;");
$resultado = $sentencia->execute([$id]);

if ($resultado === TRUE) {
    echo "<h1>La llave ha sido eliminada</h1>";
    // Redireccionar a index.php después de 2 segundos
    header("refresh:1.5;url=index.php");
} else {
    echo "Algo salió mal";
}
?>
