<!-- createuserform.php -->

<!DOCTYPE html>
<html>

<head>
    <title>Crear Usuario</title>
    <style>
        /* Estilos CSS para el formulario */
        body {
            font-family: Arial, sans-serif;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        label,
        input {
            display: block;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <h2>Crear Usuario</h2>
    <form action="index.php?action=crear" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" required>

        <label for="identificacion">Identificacion:</label>
        <input type="text" id="identificacion" name="identificacion" required>

        <label for="clave">Contraseña:</label>
        <input type="password" id="clave" name="clave" required>

        <button type="submit">Crear</button>
    </form>
</body>

</html>