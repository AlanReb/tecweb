<?php
    include_once __DIR__.'/myapi/Products.php';
    $p = New Producto();
    $p->edit(file_get_contents('php://input'));
    $p->getData();
?>
