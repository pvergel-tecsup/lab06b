<?php
class BaseMySql
{
    static public function conexion()
    {
        try {
            $conn = "mysql:host=localhost;dbname=movies_db;port=3307;charset=utf8mb4";
            $usuario = "root";
            $password = "";
            $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
            $bd = new PDO($conn, $usuario, $password, $options);
            return $bd;

        } catch (PDOException $error) {
            echo '<h2>No fue posible conectarse a la base de datos...</h2>' . $error->getMessage();
            exit;
        }
    }

    static public function close($data)
    {
        $data = null;
    }
}
?>