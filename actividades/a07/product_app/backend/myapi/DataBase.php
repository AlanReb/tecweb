<?php
abstract class DataBase {
    protected $conexion = NULL;
    
    public function inicializar($user,$pass,$db) {
        $this->conexion[] = @mysqli_connect(
            'localhost',
            $user,
            $pass,
            $db
        );
    }
}
?>