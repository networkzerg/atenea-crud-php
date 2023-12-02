<?php
include_once "pdo.php";

// Verificar si se envió un término de búsqueda
if (isset($_GET['search'])) {
    $search_term = $_GET['search'];

    try {
        // Consulta SQL para buscar llaves que coincidan con el término de búsqueda
        $sql = "SELECT * FROM llaves 
                WHERE rlocal LIKE :search_term 
                OR rexterna LIKE :search_term 
                OR rllavero LIKE :search_term";

        $stmt = $base_de_datos->prepare($sql);
        $stmt->bindValue(':search_term', "%$search_term%", PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($result && count($result) > 0) {
            // Mostrar los resultados de la búsqueda en una tabla con estilos de Bootstrap
            echo '<div class="container">';
            echo '<h2>Resultados de la búsqueda</h2>';
            echo '<table class="table table-bordered table-striped">';
            echo '<thead class="thead-dark">';
            echo '<tr>';
            echo '<th>Referencia Local</th>';
            echo '<th>Referencia Externa</th>';
            echo '<th>Referencia en Llavero</th>';
            echo '<th>Acciones</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            foreach ($result as $row) {
                echo '<tr>';
                echo '<td>' . $row["rlocal"] . '</td>';
                echo '<td>' . $row["rexterna"] . '</td>';
                echo '<td>' . $row["rllavero"] . '</td>';
                echo '<td><a href="editar_llave.php?id=' . $row["id"] . '" class="btn btn-secondary">Editar</a></td>';
                echo '<td><a href="borrar_llave.php?id=' . $row["id"] . '" class="btn btn-danger">Eliminar</a></td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        } else {
            echo "<div class='container'><p>No se encontraron resultados para la búsqueda: " . $search_term . "</p></div>";
        }
    } catch (PDOException $e) {
        echo "Error en la consulta: " . $e->getMessage();
    }
}
?>
