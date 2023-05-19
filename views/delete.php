<!-- eliminar.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Eliminar Usuario</title>
    <!-- Agrega tus estilos CSS aquí -->
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <h1>Eliminar Usuario</h1>
    <p>¿Estás seguro de que deseas eliminar este usuario?</p>
    <form action="index.php?action=eliminar" method="POST">
        <input type="hidden" name="id" value="<?php echo $usuario['USUARI_ConsInte__b']; ?>">
        <button type="submit">Eliminar</button>
    </form>
</body>

</html>