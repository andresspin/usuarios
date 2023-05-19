<?php
// index.php

// Incluye los archivos de configuración y las librerías necesarias
require_once "./config/config.php";
require_once './config/database.php';
require_once './models/UsuarioModel.php';
require_once './controllers/UsuarioController.php';

// Implementa el enrutamiento para redirigir las solicitudes a los controladores adecuados según las URLs
$action = isset($_GET['action']) ? $_GET['action'] : '';

// Crea una instancia del controlador de usuarios
$usuarioController = new UsuarioController();

// Renderiza las vistas correspondientes en función de las acciones realizadas por el usuario
if ($action === 'crear') {
    $usuarioController->crear();
} elseif ($action === 'editar') {
    // Verificar si se ha pasado el parámetro "id" en la URL
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $usuarioController->editar($id);
    } else {
        // Manejar el caso cuando no se proporciona el parámetro "id"
        echo "Error: Debes proporcionar un ID para editar.";
    }
} elseif ($action === 'actualizar') {
    $usuarioController->actualizar();
} elseif ($action === 'eliminar') {
    // Verificar si se ha pasado el parámetro "id" en la URL
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $usuarioController->eliminar($id);
    } else {
        // Manejar el caso cuando no se proporciona el parámetro "id"
        echo "Error: Debes proporcionar un ID para eliminar.";
    }
} else {
    $usuarioController->listar();
}

