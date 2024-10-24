<?php
class Menu {
    private $enlaces = array();
    private $titulos = array();

    public function cargar_opcion($link,$title) {
        $this->enlaces[] = $link;
        $this->titulos[] = $title;
    }

    public function mostrar() {
        
    }
}
?>