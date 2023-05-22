<?php
require_once '../controllers/LoginController.php';
session_start();

// Verificar si se ha enviado el formulario de inicio de sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validar los datos (puedes agregar validaciones adicionales según tus requisitos)

    // Crear una instancia del controlador de inicio de sesión
    $loginController = new LoginController();

    // Verificar la autenticación
    if ($loginController->autenticar($email, $password)) {
        // Iniciar sesión
        $_SESSION['email'] = $email;

        // Redirigir al usuario a la página principal o a otra página de tu elección
        header('Location: ../index.php?action=listar');
        exit;
    } else {
        // Mostrar mensaje de error si la autenticación falla
        $error = 'Usuario o contraseña incorrectos';
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Iniciar sesión</title>
</head>

<body>
    <h1>Iniciar sesión</h1>

    <?php if (isset($error)) : ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST" action="login.php">
        <div>
            <label for="email">Correo o usuario</label>
            <input type="text" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <button type="submit">Iniciar sesión</button>
        </div>
    </form>
</body>

</html>