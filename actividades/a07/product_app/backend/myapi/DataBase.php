<?php
abstract class DataBase {
    protected $conexion = NULL;
    
    public function __construct($user,$pass,$db) {
        $this->conexion[] = @mysqli_connect(
            'localhost',
            $user,
            $pass,
            $db
        );
        if(!$conexion) {
            die('Error de conexión (' . $this->conexion->connect_errno . ') ' . $this->conexion->connect_error);
        }
    }
}
?>