<?php
    include_once __DIR__.'/myapi/Products.php';
    $p = New Producto();
    $p->delete($_GET['id']);
    $p->getData();
?>