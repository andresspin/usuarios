<!-- crear.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Crear Usuario</title>
    <!-- Agrega tus estilos CSS aquí -->
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <h1>Crear Usuario</h1>
    <form action="index.php?action=crear" method="POST" enctype="multipart/form-data">
        <!-- Agrega los campos del formulario según los requisitos del ejercicio -->
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="email" name="correo" placeholder="Correo" required>
        <input type="password" name="clave" placeholder="clave" required>
        <input type="file" name="foto" accept="image/jpeg" required>
        <!-- Agrega los demás campos del formulario según los requisitos del ejercicio -->

        <button type="submit">Crear</button>
    </form>
</body>

</html>