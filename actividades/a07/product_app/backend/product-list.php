<?php
    include_once __DIR__.'/myapi/Products.php';
    $p = New Products('root', 'nomeacuerdo', 'marketzone');
    $p->list();
    echo $p->getData();
?>