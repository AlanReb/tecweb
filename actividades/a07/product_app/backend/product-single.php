<?php
    use TECWEB\MYAPI\Products as Products;
    include_once __DIR__.'/myapi/database.php';
    $p = New Products();
    $p->single($_GET['id']);
    echo $p->getData();
?>
