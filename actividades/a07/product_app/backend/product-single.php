<?php
    include_once __DIR__.'/myapi/Products.php';
    $p = New Producto();
    $p->single($_GET['id']);
    $p->getData();
?>
