/**
 * Procesa el formulario de registro para almacenar un nuevo libro en la base de datos.
 * 
 * @param {string} $_POST['titulo'] - Título del libro enviado por el formulario
 * @param {string} $_POST['autor'] - Autor del libro enviado por el formulario.
 * @param {string} $_POST['isbn'] - Código ISBN del libro.
 * @returns {void} Redirecciona de vuelta a index.php?success=1 si la inserción es exitosa.
 * @throws {Exception} Si falla la conexión con el servidor de base de datos o la consulta SQL.
 */

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = "fdb1029.awardspace.net"; // Reemplaza XX por el número de tu servidor
    $usuario = "4794856_pruebadb";
    $password = "salove2410";
    $base_datos = "4794856_pruebadb";

    $conexion = new mysqli($host, $usuario, $password, $base_datos);

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Limpiar variables para evitar inyecciones SQL básicas
    $tituloLibro = $conexion->real_escape_string($_POST['titulo']);
    $autorLibro = $conexion->real_escape_string($_POST['autor']);
    $isbn = $conexion->real_escape_string($_POST['isbn']);

    $sql = "INSERT INTO libros (titulo, autor, isbn) VALUES ('$tituloLibro', '$autorLibro', '$isbn')";

    if ($conexion->query($sql) === TRUE) {
        // Redireccionar de vuelta a la página principal si se guardó con éxito
        header("Location: index.php?success=1");
    } else {
        echo "Error al guardar el libro: " . $conexion->error;
    }

    $conexion->close();
}
?>