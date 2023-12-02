<?php
// se comprueba que se han recibido tanto el valor de id mediante GET como los valores del formulario mediante POST.
if (
    !isset($_POST["rlocalEditar"]) ||
    !isset($_POST["rexternaEditar"]) ||
    !isset($_POST["rllaveroEditar"]) ||
    !isset($_GET["id"])
) exit();

// incluyo el archivo de conexión
include_once "pdo.php";

// meto los valores del formulario en variables
try {
    $id = $_GET["id"];
    $rlocal = $_POST["rlocalEditar"];
    $rexterna = $_POST["rexternaEditar"];
    $rllavero = $_POST["rllaveroEditar"];

// preparo la sentencia de editar el registro en la base de datos
    $sentencia = $base_de_datos->prepare("UPDATE llaves SET rlocal = ?, rexterna = ?, rllavero = ? WHERE id = ?;");

// ejecuto la sentencia preparada pasando los valores que he recibido
    $resultado = $sentencia->execute([$rlocal, $rexterna, $rllavero, $id]); // Pasar en el mismo orden de los ?

    // verificar si la inserción fue exitosa mediante el valor de $resultado
    if ($resultado === TRUE) {
        echo "Cambios guardados";
        // Redireccionar a index.php después de 1.5 segundos
        header("refresh:1.5;url=index.php");
    } else {
        echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del usuario";
    }
// como es una operación más propensa a errores, he optado por hacerlo mediante un control de excepciones.
} catch (Exception $e) {
    echo "Error al actualizar los datos: " . $e->getMessage();
}
?>
