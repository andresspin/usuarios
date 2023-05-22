<?php
require_once __DIR__ . '/../models/UsuarioModel.php';

class LoginController
{
    public function mostrarLogin()
    {
        // Mostrar la vista de inicio de sesión
        require_once '../views/login.php';
    }

    public function autenticar()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["email"];
            $password = $_POST["password"];

            $usuarioModel = new UsuarioModel();
            $usuario = $usuarioModel->autenticarUsuario($username, $password);
            echo ($usuario);
            if ($usuario) {
                
                // Autenticación exitosa
                session_start();
                $_SESSION["email"] = $usuario["USUARI_Correo___b"];

                // Redirigir al index o a la página principal
                header("Location: ../index.php");
                exit;
            } else {
                // Autenticación fallida
                $error = "Usuario o contraseña incorrectos";
                require_once "../views/login.php";
            }
        } else {
            // Mostrar el formulario de inicio de sesión
            require_once "../views/login.php";
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: ../views/login.php");
        exit;
    }
}
