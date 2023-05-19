<?php
// database.php

require_once './config/config.php';

class Database
{
    private static $instance; // Variable para almacenar la instancia única de la base de datos
    private $host;
    private $username;
    private $password;
    private $dbName;

    private function __construct()
    {
        $this->host = DB_HOST;
        $this->username = DB_USERNAME;
        $this->password = DB_PASSWORD;
        $this->dbName = DB_NAME;
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function fetchAll($query, $params = [])
    {
        $conn = $this->connect();
        $stmt = $conn->prepare($query);

        if ($stmt === false) {
            die("Error en la consulta: " . $conn->error);
        }

        if ($params) {
            $types = str_repeat('s', count($params));
            $stmt->bind_param($types, ...$params);
        }

        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        $conn->close();

        return $result;
    }

    public function connect()
    {
        $conn = new mysqli($this->host, $this->username, $this->password, $this->dbName);

        if ($conn->connect_error) {
            die("Error de conexión a la base de datos: " . $conn->connect_error);
        }

        return $conn;
    }

    public function query($query, $params = [])
    {
        $conn = $this->connect();
        $stmt = $conn->prepare($query);

        if ($stmt === false) {
            die("Error en la consulta: " . $conn->error);
        }

        if ($params) {
            $types = str_repeat('s', count($params));
            $stmt->bind_param($types, ...$params);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();

        return $result;
    }

    public function fetchRow($query, $params = [])
    {
        $result = $this->query($query, $params);
        return $result->fetch_assoc();
    }

    public function getLastInsertId()
    {
        $conn = $this->connect();
        $lastInsertId = $conn->insert_id;
        $conn->close();

        return $lastInsertId;
    }
}
