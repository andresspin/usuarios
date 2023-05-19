<?php
require_once 'models/UsuarioModel.php';

class UsuarioController
{
    private $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = new UsuarioModel();
    }


    public function crear()
    {
        // Verificar si se ha enviado el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Verificar si los campos requeridos están presentes y no están vacíos
            if (isset($_POST['nombre'], $_POST['correo'], $_POST['identificacion'], $_POST['clave']) && !empty($_POST['nombre']) && !empty($_POST['correo']) && !empty($_POST['identificacion']) && !empty($_POST['clave'])) {
                $nombre = $_POST['nombre'];
                $correo = $_POST['correo'];
                $identificacion = $_POST['identificacion'];
                $clave = $_POST['clave'];

                // Crear una instancia del modelo UsuarioModel
                $usuarioModel = new UsuarioModel();

                // Crear el usuario
                $resultado = $usuarioModel->crearUsuario($nombre, $correo, $identificacion, $clave);

                if ($resultado) {
                    echo "Usuario creado exitosamente.";
                } else {
                    echo "Error al crear el usuario.";
                }
            } else {
                die("Error: Debes completar todos los campos obligatorios.");
            }
        } else {
            // Vista del formulario de creación de usuario
            include 'views/createuserform.php';
        }
    }


// ...


    public function editar($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtén los datos del formulario
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $identificacion = $_POST['identificacion'];
            // Obtén otros campos del formulario, por ejemplo, el campo de imagen

            // Valida los datos si es necesario

            // Actualiza los campos del usuario con el ID proporcionado utilizando el modelo
            $this->usuarioModel->actualizarUsuario($id, $nombre, $correo, $identificacion);

            // Redirige a la página de éxito o muestra un mensaje de éxito
        } else {
            // Obtén los datos del usuario con el ID proporcionado utilizando el modelo
            $usuario = $this->usuarioModel->obtenerUsuario($id);

            // Muestra el formulario de edición de usuario con los datos del usuario obtenidos
            include 'views/edit.php';
        }
    }

    public function actualizar()
    {
        // Obtener los datos enviados por el formulario
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $identificacion = $_POST['identificacion'];

        // Crear una instancia del modelo UsuarioModel
        $usuarioModel = new UsuarioModel();

        // Llamar a la función actualizarUsuario del modelo
        $usuarioModel->actualizarUsuario($id, $nombre, $correo, $identificacion);

        // Redirigir a la página de listado de usuarios
        header("Location: index.php?action=listar");
    }

    public function eliminar($id)
    {
        // Elimina el usuario con el ID proporcionado utilizando el modelo
        $this->usuarioModel->eliminarUsuario($id);

        // Redirige a la página de éxito o muestra un mensaje de éxito
        include 'views/delete.php';
    }

    public function listar()
    {
        // Crear una instancia del modelo UsuarioModel
        $usuarioModel = new UsuarioModel();

        // Obtener la lista de usuarios
        $usuarios = $usuarioModel->obtenerTodosLosUsuarios();

        // Cargar la vista correspondiente y pasar los datos de los usuarios
        include 'views/listar.php';
    }

    // Otras funciones del controlador aquí
}
