# atenea
El sistema de control de inventario de llaves de la inmobiliaria es una aplicación web básica diseñada para administrar información sobre las llaves utilizadas por la inmobiliaria, como referencias locales, referencias externas, notas y direcciones asociadas a cada llave.
Atenea es una prueba de CRUD basado en php para la gestión de un "mini inventario" de llaves en el que, de cada llave, se registran:
- referencia local
- referencia externa
- dirección de cerradura asociada a llave
- notas

# Archivos Principales
- index.php: Página principal que muestra la interfaz de usuario y maneja la lógica de visualización y adición de llaves.
- save_key.php: Archivo PHP para guardar nuevas llaves en el archivo JSON.
- get_keys.php: Archivo PHP para obtener todas las llaves almacenadas en el archivo JSON.

# Uso del Sistema
Visualización de Llaves:

Al cargar la página index.php, se muestra una tabla con la información de las llaves almacenadas en el archivo keys.json.
La tabla se actualiza dinámicamente después de agregar una nueva llave.
 ## Añadir Nuevas Llaves:
Al hacer clic en el botón "Añadir Llave", se muestra un modal con un formulario para ingresar los detalles de una nueva llave.
Al enviar el formulario, los datos son procesados por save_key.php y se guarda la nueva llave en el archivo keys.json.
Después de agregar una llave con éxito, la tabla se actualiza automáticamente para mostrar la nueva entrada.


Atenea v1.0.0
