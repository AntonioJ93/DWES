<?php
class Conexion extends PDO{
    const dsn = 'mysql:dbname=db_practica_php;host=localhost:3306';
    const usuario = 'root';
    const contraseña = 'Fullstack.2021';
    public function __construct()
    {
        try {
          return  parent::__construct(self::dsn, self::usuario, self::contraseña);
        } catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        }
    }

}


?>