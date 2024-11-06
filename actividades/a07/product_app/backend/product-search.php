<?php
    include_once __DIR__.'/myapi/Products.php';
    $p = New Producto();
    $p->search($_GET['search']);
    $p->getData();
?>