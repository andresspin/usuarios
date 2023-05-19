<?php
require_once 'config/database.php';

class UsuarioModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function crearUsuario($nombre, $correo, $identificacion, $clave)
    {
        // Genera una clave aleatoria para el usuario
        // $clave = generarClaveAleatoria();

        // Inserta los datos del usuario en la tabla USUARI
        $query = "INSERT INTO USUARI (USUARI_Nombre____b, USUARI_Correo___b, USUARI_Identific_b, USUARI_Clave_____b) 
              VALUES (?, ?, ?, ?)";
        $this->db->query($query, [$nombre, $correo, $identificacion, $clave]);

        // Verifica si se insertó correctamente el usuario
        if ($this->db->getLastInsertId() !== null) {
            // Obtén el ID del nuevo usuario insertado
            $usuarioId = $this->db->getLastInsertId();

            // Realiza otras operaciones si es necesario

            // Retorna el ID del nuevo usuario
            return $usuarioId;
        }

        // Si no se insertó correctamente, devuelve false
        return false;
    }


    public function actualizarUsuario($id, $nombre, $correo, $identificacion)
    {
        // Actualiza los campos del usuario en la tabla USUARI
        $query = "UPDATE USUARI 
                  SET USUARI_Nombre____b = ?, USUARI_Correo___b = ?, USUARI_Identific_b = ? 
                  WHERE USUARI_ConsInte__b = ?";
        $this->db->query($query, [$nombre, $correo, $identificacion, $id]);

        // Realiza otras operaciones si es necesario
    }

    public function obtenerUsuario($id)
    {
        // Obtiene los datos del usuario de la tabla USUARI utilizando su ID
        $query = "SELECT * FROM USUARI WHERE USUARI_ConsInte__b = ?";
        $usuario = $this->db->fetchRow($query, [$id]);

        // Retorna los datos del usuario
        return $usuario;
    }

    public function eliminarUsuario($id)
    {
        // Elimina el usuario de la tabla USUARI utilizando su ID
        $query = "DELETE FROM USUARI WHERE USUARI_ConsInte__b = ?";
        $this->db->query($query, [$id]);

        // Realiza otras operaciones si es necesario
    }
    public function obtenerTodosLosUsuarios()
    {
        // Obtiene todos los usuarios de la tabla USUARI
        $query = "SELECT * FROM USUARI";
        $usuarios = $this->db->fetchAll($query);

        // Retorna la lista de usuarios
        return $usuarios;
    }
    // Otras funciones del modelo aquí
}

// Función auxiliar para generar una clave aleatoria
function generarClaveAleatoria()
{
    // Implementa tu lógica para generar una clave aleatoria segura
    // Puedes utilizar funciones como password_hash() para generar una contraseña segura
    // Retorna la clave generada
}
