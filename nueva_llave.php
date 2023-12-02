<?php
// verificar que el formualrio envió los datos
if (isset($_POST["rlocal"], $_POST["rexterna"], $_POST["rllavero"])) {
    // incluyo archivo de conexión a la base de datos
    include_once "pdo.php";

    // meter los valores del form en variables
    $rlocal = $_POST["rlocal"];
    $rexterna = $_POST["rexterna"];
    $rllavero = $_POST["rllavero"];

    // prearar la consulta para insertar los datos en la tabla llaves
    $sentencia = $base_de_datos->prepare("INSERT INTO llaves(rlocal, rexterna, rllavero) VALUES (?, ?, ?);");
    // ejecutar la sentencia preparada, el resultado correcto o incorrecto se guardará en la variable resultado
    $resultado = $sentencia->execute([$rlocal, $rexterna, $rllavero]); # Pasar en el mismo orden de los ?

    // verificar si la inserción fue exitosa mediante el valor de $resultado
    if ($resultado === TRUE) {
        echo "<h1>Llave añadida correctamente.</h1>";
        // redireccionar a index.php después de 1.5 segundos, lo sustituiré por una alerta de sweetalert2
        header("refresh:1.5;url=index.php");
    } else {
        echo "Algo salió mal.";
    }
}
?>
<h1>