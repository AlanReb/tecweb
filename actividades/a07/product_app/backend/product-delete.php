<?php
    include_once __DIR__.'/myapi/Products.php';
    $p = New Products('root', 'nomeacuerdo', 'marketzone');
    $p->delete($_GET['id']);
    echo $p->getData();
?>