<?php
    include_once __DIR__.'/myapi/Products.php';
    $p = New Producto();
    $p->singleByName($_GET['name']);
    $p->getData();
?>
