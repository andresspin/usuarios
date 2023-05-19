<!DOCTYPE html>
<html>

<head>
    <title>Listado de Usuarios</title>
</head>

<body>
    <h1>Listado de Usuarios</h1>
    <a href="index.php?action=crear">Crear Usuario</a>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Identificación</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($usuarios as $usuario) : ?>
            <tr>
                <td><?php echo isset($usuario['USUARI_Nombre____b']) ? $usuario['USUARI_Nombre____b'] : ''; ?></td>
                <td><?php echo isset($usuario['USUARI_Correo___b']) ? $usuario['USUARI_Correo___b'] : ''; ?></td>
                <td><?php echo isset($usuario['USUARI_Identific_b']) ? $usuario['USUARI_Identific_b'] : ''; ?></td>
                <td>
                    <a href="index.php?action=editar&id=<?php echo $usuario['USUARI_ConsInte__b'];   ?> ">Editar</a>
                    <a href="index.php?action=eliminar&id=<?php echo $usuario['USUARI_ConsInte__b']; ?> ">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>