<?php
    use TECWEB\MYAPI\Products as Products;
    include_once __DIR__.'/myapi/database.php';
    $p = New Products();
    $p->edit(file_get_contents('php://input'));
    echo $p->getData();
?>
