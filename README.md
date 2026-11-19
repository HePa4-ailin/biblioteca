# Sistema de libreria
fecha: 18 de noviembre 2026
---
![libreria](https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1g-DDwa3p_uy_-Bz2UDLfX3cDERjpAoBJq_5-yIlkqQ&s=10)

Esta pagina  de sistema de  librería esta diseñada para agilizar y digitalizar la administración básica de una biblioteca escolar.

como usar:
1. da clic en el espacio titulo y escribe el nombre de libro: ejemplo noches blancas
2. hacer clic en el segundo campo e ingresar el nombre y apellido del autor. ejemplo Fiodor dostyoveski
3. hacer clic en el tercer campo e introducir el código numérico que identifica al libro. ejemplo 978-4567891230
4. presionar el botón verde “Guardar Libro”.
5. en el lado derecho aparecerá el libro agregado en la tabla inventario

### Creacion de archivos
1. Crea la carpeta llamado biblioteca
2. Crea el archivo index.php
3. Crea el archivo guardar.php
4. Crea el archivo script.js
5. Crea el archivo styles.css
6. Despues crea el archivo cambiarEstado.php

### Crear la base de datos y Tabla de registro de libros
**Ingresa a la siguiente pagina:**
[awardspace](https://cp1.awardspace.net/domain-manager/)

~~Crea una base de datos llamada libreria, si ya tienes omite este paso~~

Abre phpmyAdmin de awardspace y  ve a la seccion SQL
Escribe el siguiente codigo para crear la tabla:
```sql
CREATE TABLE libros (
  id INT AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(150) NOT NULL,
  autor VARCHAR(100) NOT NULL,
  isbn VARCHAR(20) NOT NULL,
  disponible INT DEFAULT 1
);
```

Ejecuta el codigo presionando el boton continuar

### Insertar los primeros 2 libros
- Una vez creada la tabla, vuelve abrir la seccion SQL
- Escribe las siguientes lineas de codigo, para agregar libros al registro

```sql
INSERT INTO libros (titulo, autor, isbn, disponible) VALUES
('Cien años de soledad', 'Gabriel García Márquez', '978-0307474728', 1),
('Don Quijote de la Mancha', 'Miguel de Cervantes', '978-8424937461', 1);
```
