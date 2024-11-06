<?php
    include_once __DIR__.'/myapi/Products.php';
    $p = New Producto();
    $p->add(file_get_contents('php://input'));
    $p->getData();

?>