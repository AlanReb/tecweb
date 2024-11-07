<?php
    include_once __DIR__.'/myapi/Products.php';
    $p = New Products();
    $p->edit(file_get_contents('php://input'));
    echo $p->getData();
?>
