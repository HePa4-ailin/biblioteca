/**
 * Alterna el estado de disponibilidad de un libro específico (Disponible <-> Prestado).
 * 
 * @param {number} $_POST['id'] - Identificador único del libro a modificar.
 * @param {number} $_POST['actual'] - Estado de disponibilidad actual (1 para disponible, 0 para prestado).
 * @returns {void} Actualiza la base de datos y redirige a index.php.
 * @throws {Exception} Si ocurre un error de conexión o la consulta de actualización falla.
 */

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id']) && isset($_POST['actual'])) {
    $host = "fdb1029.awardspace.net"; // Reemplaza XX por el número de tu servidor
    $usuario = "4794856_pruebadb";
    $password = "salove2410";
    $base_datos = "4794856_pruebadb";

    $conexion = new mysqli($host, $usuario, $password, $base_datos);

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    $id = intval($_POST['id']);
    $estadoActual = intval($_POST['actual']);

    // Si estaba disponible (1), ahora será prestado (0). Si estaba prestado (0), será disponible (1).
    $nuevoEstado = ($estadoActual === 1) ? 0 : 1;

    $sql = "UPDATE libros SET disponible = $nuevoEstado WHERE id = $id";

    if ($conexion->query($sql) === TRUE) {
        // Redirecciona de vuelta con un parámetro de éxito de actualización
        header("Location: index.php?updated=1");
    } else {
        echo "Error al actualizar el estado: " . $conexion->error;
    }

    $conexion->close();
    
} else {
    header("Location: index.php");
}
?>