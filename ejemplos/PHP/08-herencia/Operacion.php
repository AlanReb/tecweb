<?php
class Operacion {
    protected $valor1;
    protected $valor2;
    protected $resultado;

    public function __construct($v1=0,$v2=0){
        $this->valor1 = $v1;
        $this->valor2 = $v2;
        $this->resultado = 0;
    }

    public function set_valor1($v1) {
        $this->valor1 = $v1;
    }

    public function set_valor2($v2) {
        $this->valor1 = $v2;
    }

    public function getResultado(){
        return $this->resultado;
    }
}

Class Suma extends Operacion{
    public function operar() {
        $this->resultado = $this->valor1 + $this->valor2;
    }
}

Class Resta extends Operacion{
    public function operar() {
        $this->resultado = $this->valor1 - $this->valor2;
    }
}

Class Producto extends Operacion{
    public function operar() {
        $this->resultado = $this->valor1 * $this->valor2;
    }
}

Class Division extends Operacion{
    public function operar() {
        $this->resultado = $this->valor1 / $this->valor2;
    }
}
?>