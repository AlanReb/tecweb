<?php
class Products extends DataBase{
    private $response = NULL;
    
    public function inicializar($user,$pass,$db) {
        $this->conexion[] = @mysqli_connect(
            'localhost',
            $user,
            $pass,
            $db
        );
        if(!$conexion) {
            $response = '¡Base de datos NO conectada!';
        } else {
            $response = '¡Base de datos conectada! :)';
        }
    }

    public function add($Object){

    }

    public function delete($string){

    }

    public function edit($Object){

    }

    public function list($string){

    }

    public function search($string){

    }

    public function single($string){

    }

    public function singleByName($string){

    }

    public function getResponse(){

    }










}
?>