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
    $titulo = $conexion->real_escape_string($_POST['titulo']);
    $autor = $conexion->real_escape_string($_POST['autor']);
    $isbn = $conexion->real_escape_string($_POST['isbn']);

    $sql = "INSERT INTO libros (titulo, autor, isbn) VALUES ('$titulo', '$autor', '$isbn')";

    if ($conexion->query($sql) === TRUE) {
        // Redireccionar de vuelta a la página principal si se guardó con éxito
        header("Location: index.php?success=1");
    } else {
        echo "Error al guardar el libro: " . $conexion->error;
    }

    $conexion->close();
}
?>