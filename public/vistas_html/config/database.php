<?php
class Database {
    private $host = "localhost";
    private $db_name = "yates"; // Nombre de tu base de datos
    private $username = "root"; // Usuario de tu base
    private $password = ""; // Contraseña, normalmente vacía en XAMPP

    public function conectar() {
        try {
            $conn = new PDO("mysql:host=$this->host;dbname=$this->db_name;charset=utf8", 
                            $this->username, 
                            $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}
?>
