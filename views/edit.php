<!-- editar.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Editar Usuario</title>
    <!-- Agrega tus estilos CSS aquí -->
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <h1>Editar Usuario</h1>
    <form action="index.php?action=actualizar" method="POST" enctype="multipart/form-data">
        <!-- Agrega los campos del formulario según los requisitos del ejercicio -->
        <input type="hidden" name="id" value="<?php echo $usuario['USUARI_ConsInte__b']; ?>">
        <input type="text" name="nombre" placeholder="Nombre" value="<?php echo $usuario['USUARI_Nombre____b']; ?>" required>
        <input type="email" name="correo" placeholder="Correo" value="<?php echo $usuario['USUARI_Correo___b']; ?>" required>
        <input type="text" name="identificacion" placeholder="Identificación" value="<?php echo $usuario['USUARI_Identific_b']; ?>" required>
        <input type="file" name="foto" accept="image/jpeg">
        <!-- Agrega los demás campos del formulario según los requisitos del ejercicio -->

        <button type="submit">Actualizar</button>
    </form>
</body>

</html>