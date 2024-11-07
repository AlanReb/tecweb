<?php
    use TECWEB\MYAPI\Products as Products;
    include_once __DIR__.'/myapi/database.php';
    $p = New Products();
    $p->singleByName($_GET['name']);
    $p->getData();
?>
