<?php
// archivo de conexión con la base de datos
    // variables de credenciales
$contraseña = "";
$usuario = "root";
$nombre_base_de_datos = "atenea";

// try/catch para comprobar conexión mediante las variables que paso.
    // como mi servidor de base de datos está en un contenedor, he añadido el puerto mapeado 3306.
try{
    $base_de_datos = new PDO('mysql:host=localhost:3306;dbname=' . $nombre_base_de_datos, $usuario, $contraseña);
}catch(Exception $e){
    // Mensaje de respuesta en caso de error con el contenido del mismo.
    echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}


