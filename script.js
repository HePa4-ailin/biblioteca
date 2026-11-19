/**
 * Realiza la validación interactiva del formulario de libros antes de enviarlo
 * y gestiona las alertas visuales mediante parámetros en la URL.
 * 
 * @param {Event} e - El evento de envío del formulario.
 * @returns {void} Detiene el envío si hay campos vacíos o si el ISBN es menor a 10 caracteres.
 * @throws {Error} Alertas de interfaz si la validación falla.
 */

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('formLibro');

    if (form) {
        
        // Validación interactiva antes de enviar los datos al servidor
        form.addEventListener('submit', (e) => {
            const tituloLibro = document.getElementById('titulo').value.trim();
            const autorLibro = document.getElementById('autor').value.trim();
            const isbn = document.getElementById('isbn').value.trim();

            if (tituloLibro === "" || autorLibro === "" || isbn === "") {
                e.preventDefault(); // Detiene el envío del formulario
                alert('Por favor, rellena todos los campos antes de guardar.');
                return;
            }

            // Validación simple para que el formato ISBN tenga una longitud mínima
            if (isbn.length < 10) {
                e.preventDefault();
                alert('El campo ISBN parece demasiado corto o inválido.');
            }
        });
    }

    // Detectar si venimos de un registro exitoso mediante la URL
    const URLParams = new URLSearchParams(window.location.search);
    
    if (URLParams.get('success') === '1') {
        // Limpiar el parámetro de la URL de forma estética
        window.history.replaceState({}, document.title, window.location.pathname);
        alert('¡Libro registrado con éxito en el inventario!');
    }
});